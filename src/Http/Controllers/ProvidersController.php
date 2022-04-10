<?php

namespace Lab3\AbstractShopPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lab3\AbstractShopPackage\Http\Resources\ProviderResource;
use Lab3\AbstractShopPackage\Models\Provider;

class ProvidersController extends Controller
{
    public function loadAllProviders()
    {
        $providers = Provider::all();
        return view('providers.allProvidersPage', compact('providers'));
    }

    public function loadProviderById($id)
    {
        $provider = Provider::find($id);
        return new ProviderResource($provider);
    }

    public function openProviderAdding()
    {
        return view('providers.processProviderPage');
    }

    public function addProvider(Request $request)
    {
        $request = $request->validate([
            "provider_name" => 'required|string',
            "country" => 'required',
            "city" => 'required',
            "address" => 'required',
            "email" => 'email|nullable',
            "phone" => 'nullable',
            "postal_code" => 'required'
        ]);
        try {
            $provider = Provider::create($request);
            return redirect()->route('provider.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка.");
        }
    }

    public function openProviderEditing($id)
    {
        $provider = Provider::find($id);
        if (!is_null($provider))
            return view('providers.processProviderPage', compact('provider'));
        die("Поставщик не найден.");
    }

    public function updateProvider(Request $request)
    {
        try {
            $request = $request->validate([
                "id" => 'required',
                "provider_name" => 'required|string',
                "country" => 'required',
                "city" => 'required',
                "address" => 'required',
                "email" => 'email|nullable',
                "phone" => 'nullable',
                "postal_code" => 'required'
            ]);
            $provider = Provider::find($request['id']);
            $provider->update($request);
            return redirect()->route('provider.loadAll');
        }
        catch (\Exception $exception)
        {
            die("Произошла ошибка обновления");
        }
    }

    public function deleteProvider($id)
    {
        try {
            Provider::destroy($id);
        }
        catch (\Exception $exception) {
            die("Произошла ошибка удаления.");
        }
    }
}
