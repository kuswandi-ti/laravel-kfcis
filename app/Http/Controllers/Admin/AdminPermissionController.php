<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\AdminPermissionStoreRequest;
use App\Http\Requests\Admin\AdminPermissionUpdateRequest;

class AdminPermissionController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:permission create'])->only(['create', 'store']);
        $this->middleware(['permission:permission delete'])->only(['destroy']);
        $this->middleware(['permission:permission index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:permission update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPermissionStoreRequest $request)
    {
        $permission = new Permission();

        $permission->name = $request->permission_name;
        $permission->group_name = $request->group_name;
        $permission->save();

        return redirect()->back()->with('success', __('Data permission berhasil dibuat'));
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
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permission.index', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPermissionUpdateRequest $request, string $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->name = $request->permission_name;
        $permission->group_name = $request->group_name;
        $permission->save();

        return redirect()->back()->with('success', __('Data permission berhasil diupdate'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            return response([
                'status' => 'success',
                'message' => __('Data permission berhasil dihapus'),
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data permission gagal dihapus'),
            ]);
        }
    }

    public function data(Request $request)
    {
        $query = Permission::orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                if (canAccess(['permission update'])) {
                    $update = '
                        <li>
                            <a href="' . route('admin.permission.edit', $query->id) . '" class="dropdown-item border-bottom">
                                <i class="bx bxs-edit-alt"></i> ' . __("Ubah") . '
                            </a>
                        </li>
                    ';
                }
                if (canAccess(['permission delete'])) {
                    $delete = '
                        <li>
                            <a href="' . route('admin.permission.destroy', $query->id) . '" class="dropdown-item border-bottom delete_item">
                                <i class="bx bxs-trash"></i> ' . __("Hapus") . '
                            </a>
                        </li>
                    ';
                }
                if (canAccess(['permission update', 'permission delete'])) {
                    return '<div class="dropdown ms-3">
                                <a href="javascript:void(0);" class="text-muted border-0 fs-14" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu" style="">' .
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
