<?php

namespace Lab3\AbstractShopPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Lab3\AbstractShopPackage\Http\Resources\ProductResource;
use Lab3\AbstractShopPackage\Models\Product;
use Lab3\AbstractShopPackage\Models\ProductCategory;
use Lab3\AbstractShopPackage\Models\ProductStorage;
use Lab3\AbstractShopPackage\Models\Provider;

class ProductsController extends Controller
{
    public function loadAllProducts()
    {
        $products = Product::all();
        return view('products.allProductsPage', compact('products'));
    }

    public function loadProductById($id)
    {
        $product = Product::find($id);
        return new ProductResource($product);
    }

    public function openProductAdding()
    {
        $categories = ProductCategory::all();
        $storages = ProductStorage::all();
        $providers = Provider::all();
        return view('products.processProductPage', compact('categories', 'storages', 'providers'));
    }

    public function addProduct(Request $request)
    {
        $file = $request->file('image_path');
        $filename = uniqid() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        $request = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image_path' => 'required|mimes:png,jpg,jpeg,gif',
            'category_id' => 'required',
            'provider_id' => 'required',
            'storage_id' => 'required',
        ]);
        $path = $file->store('public');
        $request["image_path"] = $path;
        try {
            $product = Product::create($request);
            return redirect()->route('product.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка.");
        }
    }

    public function openProductEditing($id)
    {
        $product = Product::find($id);
        $categories = ProductCategory::all();
        $storages = ProductStorage::all();
        $providers = Provider::all();
        if (!is_null($product))
            return view('products.processProductPage', compact('product', 'categories', 'storages', 'providers'));
        die("Товар не найден.");
    }

    public function updateProduct(Request $request)
    {
        try {
            $file = $request->file('image_path');
            if (!is_null($file))
                $filename = uniqid() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $request = $request->validate([
                "id" => 'required',
                'product_name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|integer',
                'image_path' => 'nullable|mimes:png,jpg,jpeg,gif',
                'category_id' => 'required',
                'provider_id' => 'required',
                'storage_id' => 'required',
            ]);
            $product = Product::find($request['id']);
            if (!isset($request['image_path']))
                $request['image_path'] = $product->image_path;
            else {
                $path = $file->store('public');
                $filename = Product::query()->select('image_path')
                    ->where('id', '=', $request['id'])
                    ->get()
                    ->first()->image_path;
                File::delete(storage_path('app/'.$filename));
                $request["image_path"] = $path;
            }
            $product->update($request);
            return redirect()->route('product.loadAll');
        }
        catch (\Exception $exception)
        {
            die("Произошла ошибка обновления");
        }
    }

    public function deleteProduct($id)
    {
        try {
            $filename = Product::query()->select('image_path')
                ->where('id', '=', $id)
                ->get()
                ->first()->image_path;
            File::delete(storage_path('app/'.$filename));
            Product::destroy($id);
        }
        catch (\Exception $exception) {
            die("Произошла ошибка удаления.");
        }
    }
}
