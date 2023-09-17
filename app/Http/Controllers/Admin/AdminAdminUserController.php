<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Section;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminAdminUserRequest;

class AdminAdminUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pengurus create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pengurus delete', ['only' => ['destroy']]);
        $this->middleware('permission:pengurus index', ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:pengurus restore', ['only' => ['restore']]);
        $this->middleware('permission:pengurus update', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->orderBy('name')->pluck('name', 'name');
        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');
        $sections = Section::where('status', '1')->orderBy('name')->pluck('name', 'id');

        return view('admin.admin.create', compact('roles', 'departments', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminAdminUserRequest $request)
    {
        $store = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'employee_group' => $request->employee_group,
            'join_date' => $request->join_date,
            'department_id' => $request->department,
            'section_id' => $request->section,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'start_work_date' => $request->start_work_date,
            'simpanan_pokok' => $request->simpanan_pokok,
            'simpanan_wajib' => $request->simpanan_wajib,
            'simpanan_sukarela' => $request->simpanan_sukarela,
            'simpanan_sukarela_tetap' => $request->simpanan_sukarela_tetap,
            'approved_at' => saveDateTimeNow(),
            'approved_by' => auth()->user()->name,
            'created_by' => auth()->user()->name,
        ]);

        $store->assignRole($request->role);

        // TODO : Send email verifikasi

        if ($store) {
            return redirect()->route('admin.admin.index')->with('success', __('Data pengurus koperasi berhasil dibuat'));
        } else {
            return redirect()->route('admin.admin.index')->with('error', __('Data pengurus koperasi gagal dibuat'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        $roles = Role::where('name', '!=', 'Super Admin')->orderBy('name')->pluck('name', 'id');
        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');
        $sections = Section::where('status', '1')->orderBy('name')->pluck('name', 'id');

        return view('admin.admin.edit', compact('admin', 'roles', 'departments', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $admin, AdminAdminUserRequest $request)
    {
        $update = $admin->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'employee_group' => $request->employee_group,
            'join_date' => $request->join_date,
            'department_id' => $request->department,
            'section_id' => $request->section,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'start_work_date' => $request->start_work_date,
            'simpanan_pokok' => $request->simpanan_pokok,
            'simpanan_wajib' => $request->simpanan_wajib,
            'simpanan_sukarela' => $request->simpanan_sukarela,
            'simpanan_sukarela_tetap' => $request->simpanan_sukarela_tetap,
            'updated_by' => auth()->user()->name,
        ]);

        $admin->syncRoles($request->role);

        if ($update) {
            return redirect()->route('admin.admin.index')->with('success', __('Data pengurus koperasi berhasil diperbarui'));
        } else {
            return redirect()->route('admin.admin.index')->with('error', __('Data pengurus koperasi gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        try {
            $destroy = $admin->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => auth()->user()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data pengurus koperasi berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data pengurus koperasi gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data pengurus koperasi gagal dihapus')
            ]);
        }
    }

    public function restore(User $admin)
    {
        $restore = $admin->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => auth()->user()->name,
        ]);

        if ($restore) {
            return redirect()->route('admin.admin.index')->with('success', __('Data pengurus koperasi berhasil dipulihkan'));
        } else {
            return redirect()->route('admin.admin.index')->with('error', __('Data pengurus koperasi gagal dipulihkan'));
        }
    }

    public function data(Request $request)
    {
        $query = User::orderBy('name', 'ASC')
            ->with('department')
            ->with('section')
            ->get()->filter(
                fn ($user) => $user->roles->where('name', '!=', 'Super Admin')->toArray()
            );

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('image', function ($query) {
                if (!empty($query->image)) {
                    return '<img src="' . url(config('common.path_storage') . $query->image) . '" class="img-fluid rounded-pill" width="45" height="45">';
                } else {
                    return '<img src="' . url(config('common.path_template_admin') . config('common.image_user_profile_small')) . '" class="img-fluid rounded-pill" width="45" height="45">';
                }
            })
            ->editColumn('department', function ($query) {
                return $query->department->name;
            })
            ->editColumn('section', function ($query) {
                return $query->section->name;
            })
            ->editColumn('role', function ($query) {
                return $query->getRoleNames()->first();
            })
            ->editColumn('status', function ($query) {
                return '<h6><span class="badge bg-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</span></h6>';
            })
            ->addColumn('action', function ($query) {
                if (canAccess(['pengurus update'])) {
                    $update = '
                        <li>
                            <a href="' . route('admin.admin.edit', $query) . '" class="dropdown-item border-bottom">
                                <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                            </a>
                        </li>
                    ';
                }
                if ($query->status == 1) {
                    if (canAccess(['pengurus delete'])) {
                        $delete = '
                            <li>
                                <a href="' . route('admin.admin.destroy', $query) . '" class="dropdown-item border-bottom delete_item">
                                    <i class="bx bx-trash fs-20"></i> ' . __("Hapus") . '
                                </a>
                            </li>
                        ';
                    }
                } else {
                    if (canAccess(['pengurus restore'])) {
                        $restore = '
                            <li>
                                <a href="' . route('admin.admin.restore', $query) . '" class="dropdown-item border-bottom restore_item">
                                    <i class="bx bx-sync fs-20"></i> ' . __("Pulihkan") . '
                                </a>
                            </li>
                        ';
                    }
                }
                if (canAccess(['pengurus update', 'pengurus delete', 'pengurus restore'])) {
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
