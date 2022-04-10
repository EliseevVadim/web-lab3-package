<?php

namespace Lab3\AbstractShopPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lab3\AbstractShopPackage\Http\Resources\ClientResource;
use Lab3\AbstractShopPackage\Models\Client;

class ClientsController extends Controller
{
    public function loadAllClients()
    {
        $clients = Client::all();
        return view('lab3.abstract-shop-package.clients.allClientsPage', compact('clients'));
    }

    public function loadClientById($id)
    {
        $client = Client::find($id);
        return new ClientResource($client);
    }

    public function openClientAdding()
    {
        return view('lab3.abstract-shop-package.clients.processClientPage');
    }

    public function addClient(Request $request)
    {
        $request = $request->validate([
            "client_full_name" => 'required|string',
            "INN" => 'required',
            "address" => 'required',
            "email" => 'email|nullable',
            "phone" => 'nullable'
        ]);
        try {
            $client = Client::create($request);
            return redirect()->route('client.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка.");
        }
    }

    public function openClientEditing($id)
    {
        $client = Client::find($id);
        if (!is_null($client))
            return view('lab3.abstract-shop-package.clients.processClientPage', compact('client'));
        die("Клиент не найден.");
    }

    public function updateClient(Request $request)
    {
        try {
            $request = $request->validate([
                "id" => 'required',
                "client_full_name" => 'required|string',
                "INN" => 'required',
                "address" => 'required',
                "email" => 'email|nullable',
                "phone" => 'nullable'
            ]);
            $client = Client::find($request['id']);
            $client->update($request);
            return redirect()->route('client.loadAll');
        }
        catch (\Exception $exception)
        {
            die("Произошла ошибка обновления");
        }
    }

    public function deleteClient($id)
    {
        try {
            Client::destroy($id);
        }
        catch (\Exception $exception) {
            die("Произошла ошибка удаления.");
        }
    }
}
