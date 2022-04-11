<?php

use Illuminate\Support\Facades\Route;
use Lab3\AbstractShopPackage\Http\Controllers\ClientsController;
use Lab3\AbstractShopPackage\Http\Controllers\OrdersController;
use Lab3\AbstractShopPackage\Http\Controllers\ProductCategoriesController;
use Lab3\AbstractShopPackage\Http\Controllers\ProductsController;
use Lab3\AbstractShopPackage\Http\Controllers\ProductStoragesController;
use Lab3\AbstractShopPackage\Http\Controllers\ProvidersController;


Route::group(['middleware' => 'web'], function () {
    // Client routes
    Route::get('/openClientAdding', [ClientsController::class, "openClientAdding"])->name('client.openAdding');
    Route::get('/openClientEditing/{id}', [ClientsController::class, "openClientEditing"])->name('client.openEditing');
    Route::get('/clients/all', [ClientsController::class, "loadAllClients"])->name('client.loadAll');
    Route::get('/clients/{id}', [ClientsController::class, "loadClientById"])->name('client.loadById');
    Route::post('/addClient', [ClientsController::class, "addClient"])->name('client.store');
    Route::put('/updateClient', [ClientsController::class, "updateClient"])->name('client.update');
    Route::delete('/deleteClient/{id}', [ClientsController::class, "deleteClient"])->name('client.delete');

//Order routes
    Route::get('/openOrderAdding', [OrdersController::class, "openOrderAdding"])->name('order.openAdding');
    Route::get('/openOrderEditing/{id}', [OrdersController::class, "openOrderEditing"])->name('order.openEditing');
    Route::get('/orders/all', [OrdersController::class, "loadAllOrders"])->name('order.loadAll');
    Route::get('/orders/{id}', [OrdersController::class, "loadOrderById"])->name('order.loadById');
    Route::post('/addOrder', [OrdersController::class, "addOrder"])->name('order.store');
    Route::put('/updateOrder', [OrdersController::class, "updateOrder"])->name('order.update');
    Route::delete('/deleteOrder/{id}', [OrdersController::class, "deleteOrder"])->name('order.delete');

//Product routes
    Route::get('/openProductAdding', [ProductsController::class, "openProductAdding"])->name('product.openAdding');
    Route::get('/openProductEditing/{id}', [ProductsController::class, "openProductEditing"])->name('product.openEditing');
    Route::get('/products/all', [ProductsController::class, "loadAllProducts"])->name('product.loadAll');
    Route::get('/products/{id}', [ProductsController::class, "loadProductById"])->name('product.loadById');
    Route::post('/addProduct', [ProductsController::class, "addProduct"])->name('product.store');
    Route::put('/updateProduct', [ProductsController::class, "updateProduct"])->name('product.update');
    Route::delete('/deleteProduct/{id}', [ProductsController::class, "deleteProduct"])->name('product.delete');

//ProductCategory routes
    Route::get('/openProductCategoryAdding', [ProductCategoriesController::class, "openProductCategoryAdding"])->name('productCategory.openAdding');
    Route::get('/openProductCategoryEditing/{id}', [ProductCategoriesController::class, "openProductCategoryEditing"])->name('productCategory.openEditing');
    Route::get('/productsCategories/all', [ProductCategoriesController::class, "loadAllProductsCategories"])->name('productCategory.loadAll');
    Route::get('/productsCategories/{id}', [ProductCategoriesController::class, "loadProductCategoryById"])->name('productCategory.loadById');
    Route::post('/addProductCategory', [ProductCategoriesController::class, "addProductCategory"])->name('productCategory.store');
    Route::put('/updateProductCategory', [ProductCategoriesController::class, "updateProductCategory"])->name('productCategory.update');
    Route::delete('/deleteProductCategory/{id}', [ProductCategoriesController::class, "deleteProductCategory"])->name('productCategory.delete');

//ProductStorage routes
    Route::get('/openProductStorageAdding', [ProductStoragesController::class, "openProductStorageAdding"])->name('productStorage.openAdding');
    Route::get('/openProductStorageEditing/{id}', [ProductStoragesController::class, "openProductStorageEditing"])->name('productStorage.openEditing');
    Route::get('/productsStorage/all', [ProductStoragesController::class, "loadAllProductsStorages"])->name('productStorage.loadAll');
    Route::get('/productsStorages/{id}', [ProductStoragesController::class, "loadProductStorageById"])->name('productStorage.loadById');
    Route::post('/addProductStorage', [ProductStoragesController::class, "addProductStorage"])->name('productStorage.store');
    Route::put('/updateProductStorage', [ProductStoragesController::class, "updateProductStorage"])->name('productStorage.update');
    Route::delete('/deleteProductStorage/{id}', [ProductStoragesController::class, "deleteProductStorage"])->name('productStorage.delete');

//Provider routes
    Route::get('/openProviderAdding', [ProvidersController::class, "openProviderAdding"])->name('provider.openAdding');
    Route::get('/openProviderEditing/{id}', [ProvidersController::class, "openProviderEditing"])->name('provider.openEditing');
    Route::get('/providers/all', [ProvidersController::class, "loadAllProviders"])->name('provider.loadAll');
    Route::get('/providers/{id}', [ProvidersController::class, "loadProviderById"])->name('provider.loadById');
    Route::post('/addProvider', [ProvidersController::class, "addProvider"])->name('provider.store');
    Route::put('/updateProvider', [ProvidersController::class, "updateProvider"])->name('provider.update');
    Route::delete('/deleteProvider/{id}', [ProvidersController::class, "deleteProvider"])->name('provider.delete');
});

