<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProductRequest;

class AdminProductController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:product create'])->only(['create', 'store']);
        $this->middleware(['permission:product delete'])->only(['destroy']);
        $this->middleware(['permission:product index'])->only(['index', 'show', 'data']);
        $this->middleware(['permission:product restore'])->only(['restore']);
        $this->middleware(['permission:product update'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::when($request->has('status') && $request->status != "", function ($query) use ($request) {
            $query->where('status', $request->status);
        })
            ->when(
                $request->search && $request->search != "",
                function ($query) use ($request) {
                    $query->where('code', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('specification', 'LIKE', '%' . $request->search . '%');
                }
            )
            ->orderBy('name', 'ASC')
            ->paginate(8);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminProductRequest $request)
    {
        $imagePath = $this->handleImageUpload($request, 'image_barang', $request->old_image_barang, 'products');

        $store = Product::create([
            'code' => $request->code,
            'slug' => Str::slug($request->code),
            'name' => $request->name,
            'specification' => $request->specification,
            'image' => !empty($imagePath) ? $imagePath : $request->old_image_barang,
            'price_hpp' => unformatAmount($request->price_hpp),
            'price_sell' => unformatAmount($request->price_sell),
            'margin' => unformatAmount($request->margin),
            'created_by' => auth()->user()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.product.index')->with('success', __('Data barang penjualan berhasil dibuat'));
        } else {
            return redirect()->route('admin.product.index')->with('error', __('Data barang penjualan gagal dibuat'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, AdminProductRequest $request)
    {
        $imagePath = $this->handleImageUpload($request, 'image_barang', $request->old_image_barang, 'products');

        $update = $product->update([
            'code' => $request->code,
            'slug' => Str::slug($request->code),
            'name' => $request->name,
            'specification' => $request->specification,
            'image' => !empty($imagePath) ? $imagePath : $request->old_image_barang,
            'price_hpp' => unformatAmount($request->price_hpp),
            'price_sell' => unformatAmount($request->price_sell),
            'margin' => unformatAmount($request->margin),
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.product.index')->with('success', __('Data barang penjualan berhasil diperbarui'));
        } else {
            return redirect()->route('admin.product.index')->with('error', __('Data barang penjualan gagal diperbarui'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $destroy = $product->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => auth()->user()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('Data barang penjualan berhasil dihapus')
                ]);
            } else {
                return response([
                    'status' => 'error',
                    'message' => __('Data barang penjualan gagal dihapus')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Data barang penjualan gagal dihapus')
            ]);
        }
    }

    public function restore(Product $product)
    {
        $restore = $product->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => auth()->user()->name,
        ]);

        if ($restore) {
            return redirect()->route('admin.product.index')->with('success', __('Data barang penjualan berhasil dipulihkan'));
        } else {
            return redirect()->route('admin.product.index')->with('error', __('Data barang penjualan gagal dipulihkan'));
        }
    }
}
