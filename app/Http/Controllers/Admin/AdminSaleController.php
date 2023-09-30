<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSaleController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:penjualan create'])->only(['create', 'store']);
        $this->middleware(['permission:penjualan delete'])->only(['destroy']);
        $this->middleware(['permission:penjualan index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:penjualan update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sale.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $products = Product::where('status', 1)
            ->when(
                $request->search && $request->search != "",
                function ($query) use ($request) {
                    $query->where('code', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('specification', 'LIKE', '%' . $request->search . '%');
                }
            )
            ->orderBy('name', 'ASC')
            ->paginate(9);
        $members = User::where('status', 1)
            ->where('name', '!=', 'Super Admin')
            ->where('approved', 1)
            ->orderBy('name', 'ASC')
            ->pluck('name', 'id');

        return view('admin.sale.create', compact('products', 'members'));
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

    public function addToCart(Request $request)
    {
        //
    }
}
