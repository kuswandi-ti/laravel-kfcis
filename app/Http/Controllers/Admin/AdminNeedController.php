<?php

namespace App\Http\Controllers\Admin;

use App\Models\Need;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminNeedRequest;

class AdminNeedController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:keperluan create'])->only(['create', 'store']);
        $this->middleware(['permission:keperluan delete'])->only(['destroy']);
        $this->middleware(['permission:keperluan index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:keperluan update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.need.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.need.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminNeedRequest $request)
    {
        $store = Need::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'created_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.need.index')->with('success', __('Data keperluan berhasil dibuat'));
        } else {
            return redirect()->route('admin.need.index')->with('error', __('Data keperluan gagal dibuat'));
        }
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
    public function edit(Need $need)
    {
        return view('admin.need.edit', compact('need'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Need $need, AdminNeedRequest $request)
    {
        $update = $need->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.need.index')->with('success', __('Data keperluan berhasil diperbarui'));
        } else {
            return redirect()->route('admin.need.index')->with('error', __('Data keperluan gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Need $need)
    {
        try {
            $destroy = $need->delete();

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data keperluan berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data keperluan gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data keperluan gagal dihapus')
            ]);
        }
    }

    public function data(Request $request)
    {
        $query = Need::orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                if (canAccess(['keperluan update'])) {
                    $update = '
                            <li>
                                <a class="dropdown-item border-bottom" href="' . route('admin.need.edit', $query) . '">
                                    <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                                </a>
                            </li>
                        ';
                }
                if (canAccess(['keperluan delete'])) {
                    $delete = '
                            <li>
                                <a class="dropdown-item border-bottom delete_item" href="' . route('admin.need.destroy', $query) . '">
                                    <i class="bx bx-trash fs-20"></i> ' . __("Hapus") . '
                                </a>
                            </li>
                        ';
                }
                if (canAccess(['keperluan update', 'keperluan delete'])) {
                    return '<div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-cog fs-16"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">' .
                        (!empty($update) ? $update : '') .
                        (!empty($restore) ? $restore : '') .
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
