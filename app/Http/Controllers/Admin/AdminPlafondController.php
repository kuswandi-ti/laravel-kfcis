<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plafond;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPlafondRequest;

class AdminPlafondController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:plafon create'])->only(['create', 'store']);
        $this->middleware(['permission:plafon delete'])->only(['destroy']);
        $this->middleware(['permission:plafon index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:plafon update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.plafond.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plafond $plafond)
    {
        return view('admin.plafond.edit', compact('plafond'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Plafond $plafond, AdminPlafondRequest $request)
    {
        $update = $plafond->update([
            'warranty' => $request->warranty,
            'asset' => $request->asset,
            'index' => $request->index,
            'max_loan' => $request->max_loan,
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.plafond.index')->with('success', __('Data plafon pinjaman berhasil diperbarui'));
        } else {
            return redirect()->route('admin.plafond.index')->with('error', __('Data plafon pinjaman gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plafond $plafond)
    {
        try {
            $destroy = $plafond->delete();

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data plafon pinjaman berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data plafon pinjaman gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data plafon pinjaman gagal dihapus')
            ]);
        }
    }

    public function data(Request $request)
    {
        $query = Plafond::orderBy('level', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('warranty', function ($query) {
                return formatAmount($query->warranty);
            })
            ->editColumn('asset', function ($query) {
                return formatAmount($query->asset);
            })
            ->editColumn('index', function ($query) {
                return formatAmount($query->index);
            })
            ->editColumn('max_loan', function ($query) {
                return formatAmount($query->max_loan);
            })
            ->addColumn('action', function ($query) {
                if (canAccess(['plafon update'])) {
                    $update = '
                            <li>
                                <a class="dropdown-item border-bottom" href="' . route('admin.plafond.edit', $query) . '">
                                    <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                                </a>
                            </li>
                        ';
                }
                if (canAccess(['plafon delete'])) {
                    // $delete = '
                    //         <li>
                    //             <a class="dropdown-item border-bottom delete_item" href="' . route('admin.plafond.destroy', $query) . '">
                    //                 <i class="bx bx-trash fs-20"></i> ' . __("Hapus") . '
                    //             </a>
                    //         </li>
                    //     ';
                }
                if (canAccess(['plafon update', 'plafon delete'])) {
                    return '<div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-cog fs-16"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">' .
                        (!empty($update) ? $update : '') .
                        (!empty($delete) ? $delete : '') . '
                                </ul>
                            </div>';
                } else {
                    return '<span class="badge rounded-pill bg-outline-danger">' . __("Tidak ada akses") . '</span>';
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
