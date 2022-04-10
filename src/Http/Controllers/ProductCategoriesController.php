<?php

namespace Lab3\AbstractShopPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lab3\AbstractShopPackage\Http\Resources\ProductCategoryResource;
use Lab3\AbstractShopPackage\Models\ProductCategory;

class ProductCategoriesController extends Controller
{
    public function loadAllProductsCategories()
    {
        $categories = ProductCategory::all();
        return view('lab3.abstract-shop-package.productCategories.allCategories', compact('categories'));
    }

    public function loadProductCategoryById($id)
    {
        $category = ProductCategory::find($id);
        return new ProductCategoryResource($category);
    }

    public function openProductCategoryAdding()
    {
        return view('lab3.abstract-shop-package.productCategories.processProductCategory');
    }

    public function addProductCategory(Request $request)
    {
        $request = $request->validate([
            "category_name" => 'required|string',
        ]);
        try {
            $category = ProductCategory::create($request);
            return redirect()->route('productCategory.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка.");
        }
    }

    public function openProductCategoryEditing($id)
    {
        $category = ProductCategory::find($id);
        if (!is_null($category))
            return view('lab3.abstract-shop-package.productCategories.processProductCategory', compact('category'));
        die("Категория не найдена.");
    }

    public function updateProductCategory(Request $request)
    {
        try {
            $request = $request->validate([
                "id" => 'required',
                "category_name" => 'required|string',
            ]);
            $category = ProductCategory::find($request['id']);
            $category->update($request);
            return redirect()->route('productCategory.loadAll');
        }
        catch (\Exception $exception)
        {
            die("Произошла ошибка обновления");
        }
    }

    public function deleteProductCategory($id)
    {
        try {
            ProductCategory::destroy($id);
        }
        catch (\Exception $exception) {
            die("Произошла ошибка удаления.");
        }
    }
}
