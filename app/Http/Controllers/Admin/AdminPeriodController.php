<?php

namespace App\Http\Controllers\Admin;

use App\Models\Period;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPeriodRequest;

class AdminPeriodController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:periode create'])->only(['create', 'store']);
        $this->middleware(['permission:periode delete'])->only(['destroy']);
        $this->middleware(['permission:periode index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:periode restore'])->only(['restore']);
        $this->middleware(['permission:periode update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.period.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPeriodRequest $request)
    {
        if (isset($request->status)) {
            Period::where('status', 1)
                ->update(['status' => 0]);
        }
        $store = Period::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => isset($request->status) ? 1 : 0,
            'created_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.period.index')->with('success', __('Data periode berhasil dibuat'));
        } else {
            return redirect()->route('admin.period.index')->with('error', __('Data periode gagal dibuat'));
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
    public function edit(Period $period)
    {
        return view('admin.period.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Period $period, AdminPeriodRequest $request)
    {
        if (isset($request->status)) {
            Period::where('status', 1)
                ->update(['status' => 0]);
        }
        $update = $period->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => isset($request->status) ? 1 : 0,
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.period.index')->with('success', __('Data periode berhasil diperbarui'));
        } else {
            return redirect()->route('admin.period.index')->with('error', __('Data periode gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        try {
            $destroy = $period->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => auth()->user()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data periode berhasil dinonaktifkan')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data periode gagal dinonaktifkan')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data periode gagal dinonaktifkan')
            ]);
        }
    }

    public function restore(Period $period)
    {
        Period::where('status', 1)
                ->update(['status' => 0]);

        $restore = $period->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => auth()->user()->name,
        ]);

        if ($restore) {
            return redirect()->back()->with('success', __('Data periode berhasil dipulihkan'));
        } else {
            return redirect()->back()->with('error', __('Data periode gagal dipulihkan'));
        }
    }

    public function data(Request $request)
    {
        $query = Period::orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()->editColumn('status', function ($query) {
                return '<h6><span class="badge bg-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</span></h6>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    if (canAccess(['periode update'])) {
                        $update = '
                            <li>
                                <a class="dropdown-item border-bottom" href="' . route('admin.period.edit', $query) . '">
                                    <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                                </a>
                            </li>
                        ';
                    }
                    if (canAccess(['periode delete'])) {
                        $delete = '
                            <li>
                                <a class="dropdown-item border-bottom deactivate" href="' . route('admin.period.destroy', $query) . '">
                                    <i class="bx bx-volume-mute fs-20"></i> ' . __("Nonaktifkan") . '
                                </a>
                            </li>
                        ';
                    }
                } else {
                    if (canAccess(['periode restore'])) {
                        $restore = '
                            <li>
                                <a class="dropdown-item border-bottom" href="' . route('admin.period.restore', $query) . '">
                                    </i><i class="bx bx-volume-full fs-20"></i> ' . __("Aktifkan") . '
                                </a>
                            </li>
                        ';
                    }
                }
                if (canAccess(['periode update', 'periode delete', 'periode restore'])) {
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
