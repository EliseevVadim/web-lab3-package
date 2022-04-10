<?php

namespace Lab3\AbstractShopPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lab3\AbstractShopPackage\Http\Resources\OrderResource;
use Lab3\AbstractShopPackage\Models\Client;
use Lab3\AbstractShopPackage\Models\Order;
use Lab3\AbstractShopPackage\Models\Product;

class OrdersController extends Controller
{
    public function loadAllOrders()
    {
        $orders = Order::all();
        return view('lab3.abstract-shop-package.orders.allOrders', compact('orders'));
    }

    public function loadOrderById($id)
    {
        $order = Order::find($id);
        return new OrderResource($order);
    }

    public function openOrderAdding()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('lab3.abstract-shop-package.orders.processOrder', compact('clients', 'products'));
    }

    public function addOrder(Request $request)
    {
        $request = $request->validate([
            'client_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer',
            'sum' => 'required'
        ]);
        try {
            $order = Order::create($request);
            $clientId = $request['client_id'];
            $client = Client::find($clientId);
            $client->orders_count++;
            $client->save();
            return redirect()->route('order.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка добавления.");
        }
    }

    public function openOrderEditing($id)
    {
        $order = Order::find($id);
        $clients = Client::all();
        $products = Product::all();
        if (!is_null($order))
            return view('lab3.abstract-shop-package.orders.processOrder', compact('order', 'clients', 'products'));
        die("Товар не найден.");
    }

    public function updateOrder(Request $request)
    {
        try {
            $request = $request->validate([
                'id' => 'required',
                'client_id' => 'required',
                'product_id' => 'required',
                'quantity' => 'required|integer',
                'sum' => 'required'
            ]);
            $order = Order::find($request["id"]);
            $order->update($request);
            return redirect()->route('order.loadAll');
        }
        catch (\Exception $exception) {
            die("Произошла ошибка обновления.");
        }
    }

    public function deleteOrder($id)
    {
        try {
            Order::destroy($id);
        }
        catch (\Exception $exception) {
            die("Произошла ошибка удаления.");
        }
    }
}
