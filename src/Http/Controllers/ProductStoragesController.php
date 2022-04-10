<?php

namespace Lab3\AbstractShopPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lab3\AbstractShopPackage\Http\Resources\ProductStorageResource;
use Lab3\AbstractShopPackage\Models\ProductStorage;
use Lab3\AbstractShopPackage\Models\Provider;

class ProductStoragesController extends Controller
{
    public function loadAllProductsStorages()
    {
        $storages = ProductStorage::all();
        return view('productStorages.allStoragesPage', compact('storages'));
    }

    public function loadProductStorageById($id)
    {
        $storage = ProductStorage::find($id);
        return new ProductStorageResource($storage);
    }

    public function openProductStorageAdding()
    {
        $providers = Provider::query()->select('id', 'provider_name')->get();
        return view('productStorages.processStoragePage', compact('providers'));
    }

    public function addProductStorage(Request $request)
    {
        $request = $request->validate([
            "storage_name" => 'required|string',
            "country" => 'required',
            "city" => 'required',
            "storage_address" => 'required',
            "provider_id" => 'required'
        ]);
        try {
            $storage = ProductStorage::create($request);
            return redirect()->route('productStorage.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка.");
        }
    }

    public function openProductStorageEditing($id)
    {
        $storage = ProductStorage::find($id);
        $providers = Provider::query()->select('id', 'provider_name')->get();
        if (!is_null($storage))
            return view('productStorages.processStoragePage', compact('storage', 'providers'));
        die("Склад не найден.");
    }

    public function updateProductStorage(Request $request)
    {
        try {
            $request = $request->validate([
                "id" => 'required',
                "storage_name" => 'required|string',
                "country" => 'required',
                "city" => 'required',
                "storage_address" => 'required',
                "provider_id" => 'required'
            ]);
            $storage = ProductStorage::find($request['id']);
            $storage->update($request);
            return redirect()->route('productStorage.loadAll');
        }
        catch (\Exception $exception)
        {
            die("Произошла ошибка обновления");
        }
    }

    public function deleteProductStorage($id)
    {
        try {
            ProductStorage::destroy($id);
        }
        catch (\Exception $exception) {
            die("Произошла ошибка удаления.");
        }
    }
}
