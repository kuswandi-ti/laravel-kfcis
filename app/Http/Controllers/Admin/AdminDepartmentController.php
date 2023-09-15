<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminDepartmentRequest;
use App\Http\Requests\Admin\AdminDepartmentStoreRequest;
use App\Http\Requests\Admin\AdminDepartmentUpdateRequest;

class AdminDepartmentController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:department create'])->only(['create', 'store']);
        $this->middleware(['permission:department delete'])->only(['destroy']);
        $this->middleware(['permission:department index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:department restore'])->only(['restore']);
        $this->middleware(['permission:department update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.department.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminDepartmentRequest $request)
    {
        $store = Department::create([
            'name' => capitalAllWord($request->name),
            'slug' => Str::slug($request->name),
            'created_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.department.index')->with('success', __('Data departemen berhasil dibuat'));
        } else {
            return redirect()->route('admin.department.index')->with('error', __('Data departemen gagal dibuat'));
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
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Department $department, AdminDepartmentRequest $request)
    {
        $update = $department->update([
            'name' => capitalAllWord($request->name),
            'slug' => Str::slug($request->name),
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.department.index')->with('success', __('Data departemen berhasil diperbarui'));
        } else {
            return redirect()->route('admin.department.index')->with('error', __('Data departemen gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $destroy = $department->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => auth()->user()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data departemen berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data departemen gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data departemen gagal dihapus')
            ]);
        }
    }

    public function restore(Department $department)
    {
        $restore = $department->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => auth()->user()->name,
        ]);

        if ($restore) {
            return redirect()->back()->with('success', __('Data departemen berhasil dipulihkan'));
        } else {
            return redirect()->back()->with('error', __('Data departemen gagal dipulihkan'));
        }
    }

    public function data(Request $request)
    {
        $query = Department::orderBy('name', 'ASC')->with('sections')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('sections', function ($query) {
                $section = '';
                foreach ($query->sections as $item) {
                    $section .= '<span class="badge bg-outline-danger">' . $item->name . '</span>&nbsp;';
                }
                return $section;
            })
            ->editColumn('status', function ($query) {
                return '<h6><span class="badge bg-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</span></h6>';
            })
            ->addColumn('action', function ($query) {
                if (canAccess(['department update'])) {
                    $update = '
                        <li>
                            <a href="' . route('admin.department.edit', $query) . '" class="dropdown-item border-bottom">
                                <i class="bx bx-edit-alt fs-20"></i> ' . __("Ubah") . '
                            </a>
                        </li>
                    ';
                }
                if ($query->status == 1) {
                    if (canAccess(['department delete'])) {
                        $delete = '
                            <li>
                                <a href="' . route('admin.department.destroy', $query) . '" class="dropdown-item border-bottom delete_item">
                                    <i class="bx bx-trash fs-20"></i> ' . __("Hapus") . '
                                </a>
                            </li>
                        ';
                    }
                } else {
                    if (canAccess(['department restore'])) {
                        $restore = '
                            <li>
                                <a href="' . route('admin.department.restore', $query) . '" class="dropdown-item border-bottom restore_item">
                                    <i class="bx bx-sync fs-20"></i> ' . __("Pulihkan") . '
                                </a>
                            </li>
                        ';
                    }
                }
                if (canAccess(['department update', 'department delete', 'department restore'])) {
                    return '<div class="dropdown ms-3">
                                <a href="javascript:void(0);" class="border-0 fs-14" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded fs-20"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu" style="">' .
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
