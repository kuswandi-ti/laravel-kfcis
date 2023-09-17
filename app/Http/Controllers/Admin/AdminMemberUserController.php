<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Section;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminMemberUserRequest;

class AdminMemberUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota approve', ['only' => ['approve']]);
        $this->middleware('permission:anggota create', ['only' => ['create', 'store']]);
        $this->middleware('permission:anggota delete', ['only' => ['destroy']]);
        $this->middleware('permission:anggota index', ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:anggota restore', ['only' => ['restore']]);
        $this->middleware('permission:anggota update', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::where('status', 1)->orderBy('name')->get();
        $sections = Section::where('status', 1)->orderBy('name')->get();

        $members = User::when($request->has('department') && $request->department != "", function ($query) use ($request) {
            $query->whereHas('department', function ($q) use ($request) {
                $q->where('slug', $request->department);
            });
        })
            ->when($request->has('section') && $request->section != "", function ($query) use ($request) {
                $query->whereHas('section', function ($q) use ($request) {
                    $q->where('slug', $request->section);
                });
            })
            ->when($request->has('employee_group') && $request->employee_group != "", function ($query) use ($request) {
                $query->where('employee_group', $request->employee_group);
            })
            ->when($request->has('approve') && $request->approve != "", function ($query) use ($request) {
                if ($request->approve == 1) {
                    $query->where('approved_at', '!=', null);
                } else {
                    $query->where('approved_at', '==', null);
                }
            })
            ->when($request->has('status') && $request->status != "", function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when(
                $request->search && $request->search != "",
                function ($query) use ($request) {
                    $query->where('nik', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('employee_group', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('account_number', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('account_name', 'LIKE', '%' . $request->search . '%');
                }
            )
            ->orderBy('name', 'ASC')
            ->paginate(8);

        return view('admin.member.index', compact('departments', 'sections', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');
        $sections = Section::where('status', '1')->orderBy('name')->pluck('name', 'id');

        return view('admin.member.create', compact('departments', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminMemberUserRequest $request)
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
            'approved_at' => saveDateTimeNow(),
            'approved_by' => auth()->user()->name,
            'created_by' => auth()->user()->name,
        ]);

        // TODO : Send email verifikasi saat approve, tidak disini saat create

        if ($store) {
            return redirect()->route('admin.member.index')->with('success', __('Data anggota koperasi berhasil dibuat'));
        } else {
            return redirect()->route('admin.member.index')->with('error', __('Data anggota koperasi gagal dibuat'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $member)
    {
        return view('admin.member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $member)
    {
        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');
        $sections = Section::where('status', '1')->orderBy('name')->pluck('name', 'id');

        return view('admin.member.edit', compact('member', 'departments', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminMemberUserRequest $request, User $member)
    {
        $update = $member->update([
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
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.member.index')->with('success', __('Data anggota koperasi berhasil diperbarui'));
        } else {
            return redirect()->route('admin.member.index')->with('error', __('Data anggota koperasi gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $member)
    {
        try {
            $destroy = $member->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => auth()->user()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data anggota koperasi berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data anggota koperasi gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data anggota koperasi gagal dihapus')
            ]);
        }
    }

    public function restore(User $member)
    {
        $restore = $member->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => auth()->user()->name,
        ]);

        if ($restore) {
            return redirect()->route('admin.member.index')->with('success', __('Data anggota koperasi berhasil dipulihkan'));
        } else {
            return redirect()->route('admin.member.index')->with('error', __('Data anggota koperasi gagal dipulihkan'));
        }
    }
}
