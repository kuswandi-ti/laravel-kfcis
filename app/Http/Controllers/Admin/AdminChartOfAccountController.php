<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminChartOfAccountRequest;

class AdminChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parent_coa = ChartOfAccount::where('parent_id', NULL)->get();
        return view('admin.coa.index', compact('parent_coa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parent_coa = ChartOfAccount::where('parent_id', NULL)->get();
        return view('admin.coa.create', compact('parent_coa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminChartOfAccountRequest $request)
    {
        $store = ChartOfAccount::create([
            'code' => $request->code,
            'slug' => Str::slug($request->code),
            'name' => $request->name,
            'parent_id' => $request->parent,
            'beginning_balance' => unformatAmount($request->beginning_balance),
            'created_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.coa.index')->with('success', __('Data chart of account berhasil dibuat'));
        } else {
            return redirect()->route('admin.coa.index')->with('error', __('Data chart of account gagal dibuat'));
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
    public function edit(ChartOfAccount $coa)
    {
        $parent_coa = ChartOfAccount::where('parent_id', NULL)->get();
        return view('admin.coa.edit', compact('parent_coa', 'coa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChartOfAccount $coa, AdminChartOfAccountRequest $request)
    {
        $store = $coa->update([
            'code' => $request->code,
            'slug' => Str::slug($request->code),
            'name' => $request->name,
            'parent_id' => $request->parent,
            'beginning_balance' => unformatAmount($request->beginning_balance),
            'updated_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.coa.index')->with('success', __('Data chart of account berhasil diperbarui'));
        } else {
            return redirect()->route('admin.coa.index')->with('error', __('Data chart of account gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
