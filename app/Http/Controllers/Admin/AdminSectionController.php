<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminSectionRequest;

class AdminSectionController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:section create'])->only(['create', 'store']);
        $this->middleware(['permission:section delete'])->only(['destroy']);
        $this->middleware(['permission:section index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:section restore'])->only(['restore']);
        $this->middleware(['permission:section update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.section.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where([
            ['status', 1],
        ])->orderBy('name')->pluck('name', 'id');

        return view('admin.section.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminSectionRequest $request)
    {
        $store = Section::create([
            'name' => capitalAllWord($request->name),
            'slug' => Str::slug($request->name),
            'department_id' => $request->department,
            'created_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.section.index')->with('success', __('Data bagian berhasil dibuat'));
        } else {
            return redirect()->route('admin.section.index')->with('error', __('Data bagian gagal dibuat'));
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
    public function edit(Section $section)
    {
        $departments = Department::where([
            ['status', 1],
        ])->orderBy('name')->pluck('name', 'id');

        return view('admin.section.edit', compact('departments', 'section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Section $section, AdminSectionRequest $request)
    {
        $update = $section->update([
            'name' => capitalAllWord($request->name),
            'slug' => Str::slug($request->name),
            'department_id' => $request->department,
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.section.index')->with('success', __('Data section berhasil diperbarui'));
        } else {
            return redirect()->route('admin.section.index')->with('error', __('Data section gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        try {
            $destroy = $section->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => auth()->user()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data section berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data section gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data section gagal dihapus')
            ]);
        }
    }

    public function restore(Section $section)
    {
        $restore = $section->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => auth()->user()->name,
        ]);

        if ($restore) {
            return redirect()->back()->with('success', __('Data section berhasil dipulihkan'));
        } else {
            return redirect()->back()->with('error', __('Data section gagal dipulihkan'));
        }
    }

    public function data(Request $request)
    {
        $query = Section::orderBy('name', 'ASC')->with('department')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('department', function ($query) {
                return $query->department->name;
            })
            ->editColumn('status', function ($query) {
                return '<h6><span class="badge bg-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</span></h6>';
            })
            ->addColumn('action', function ($query) {
                if (canAccess(['bagian update'])) {
                    $update = '
                        <li>
                            <a href="' . route('admin.section.edit', $query) . '" class="dropdown-item border-bottom">
                                <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                            </a>
                        </li>
                    ';
                }
                if ($query->status == 1) {
                    if (canAccess(['bagian delete'])) {
                        $delete = '
                            <li>
                                <a href="' . route('admin.section.destroy', $query) . '" class="dropdown-item border-bottom delete_item">
                                    <i class="bx bx-trash fs-20"></i> ' . __("Hapus") . '
                                </a>
                            </li>
                        ';
                    }
                } else {
                    if (canAccess(['bagian restore'])) {
                        $restore = '
                            <li>
                                <a href="' . route('admin.section.restore', $query) . '" class="dropdown-item border-bottom restore_item">
                                    <i class="bx bx-sync fs-20"></i> ' . __("Pulihkan") . '
                                </a>
                            </li>
                        ';
                    }
                }
                if (canAccess(['bagian update', 'bagian delete', 'bagian restore'])) {
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
