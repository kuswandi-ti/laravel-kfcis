<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function restore($id)
    {
        // $member = Member::findOrFail($id);

        // $member->status = 1;
        // $member->restored_at = saveDateTimeNow();
        // $member->restored_by = getLoggedUser()->name;
        // $member->save();

        // return redirect()->route('admin.member.index')->with('success', __('admin.Restore member user successfully'));
    }

    public function data(Request $request)
    {
        // $query = Member::orderBy('name', 'ASC');

        // return datatables($query)
        //     ->addIndexColumn()
        //     ->editColumn('image', function ($query) {
        //         if (!empty($query->image)) {
        //             return '<figure class="avatar"><img src="' . url(config('common.path_storage') . $query->image) . '"></figure>';
        //         } else {
        //             return '<figure class="avatar"><img src="' . url(config('common.path_storage') . config('common.default_image_circle')) . '"></figure>';
        //         }
        //     })
        //     ->editColumn('role', function ($query) {
        //         $badge = $query->roles->pluck('name')->first() == getGuardTextAdmin() ? 'danger' : 'dark';
        //         return '<div class="badge badge-' . $badge . '">' . $query->roles->pluck('name')->first() . '</div>';
        //     })
        //     ->editColumn('status', function ($query) {
        //         return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
        //     })
        //     ->addColumn('action', function ($query) {
        //         if ($query->status == 1) {
        //             if (canAccess(['member admin user update'])) {
        //                 $update = '
        //                     <a href="' . route('admin.member.edit', $query->id) . '" class="btn btn-primary btn-sm">
        //                         <i class="fas fa-edit"></i>
        //                     </a>
        //                 ';
        //             }
        //             if (canAccess(['member admin user delete'])) {
        //                 $delete = '
        //                     <a href="' . route('admin.member.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
        //                         <i class="fas fa-trash-alt"></i>
        //                     </a>
        //                 ';
        //             }
        //             return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
        //         } else {
        //             if (canAccess(['member admin user restore'])) {
        //                 return '
        //                     <a href="' . route('admin.member.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
        //                         <i class="fas fa-undo"></i>
        //                     </a>
        //                 ';
        //             }
        //         }
        //     })
        //     ->rawColumns(['action'])
        //     ->escapeColumns([])
        //     ->make(true);
    }
}
