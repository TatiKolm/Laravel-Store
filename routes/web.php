<?php

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrademarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AppController::class,"mainPage"])->name("app.main");

Route::middleware("locale")->group(function (){
    Route::get('/', [AppController::class, "mainPage"])->name("app.main");
    Route::get('lang/{lang}', [AppController::class, "changeLocale"])->name("app.change-lang");
    Route::get('news', [AppController::class, "newsPage"])->name("app.news");
    Route::get('product/{productSlug}', [AppController::class, 'showProduct'])->name('app.product');

    Route::get('add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add-product');
    Route::get('cart', [CartController::class, 'cartPage'])->name('cart');
    Route::put('cart/items/{item}/edit', [CartController::class, 'changeQty'])->name('cart.item.qty-update');
    Route::delete('cart/items/{item}', [CartController::class, 'destroy'])->name('cart.item.destroy');

    Route::get('catalog/trademarks/{trademarkSlug}', [AppController::class, 'getProductBYTrademark'])->name('app.catalog-by-trademark');

    Route::post('cart/set-promocode', [CartController::class, 'applyPromocode'])->name('cart.apply-promocode');
    Route::get('cart/unset-promocode', [CartController::class, 'cancelPromocode'])->name('cart.cancel-promocode');



    Route::middleware(['auth'])->group(function(){

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'categoriesList'])->name("categories.list");
            Route::get('create', [CategoryController::class, 'createCategory'])->name("categories.create");
            Route::post('create', [CategoryController::class, 'storeCategory'])->name("categories.store");
            Route::get('{categoryId}/edit', [CategoryController::class, 'editCategory'])->name("categories.edit");
            Route::put('{categoryId}/edit', [CategoryController::class, 'updateCategory'])->name("categories.update");
            Route::delete('{categoryId}', [CategoryController::class, 'deleteCategory'])->name("categories.delete");
        });
        
        
        Route::prefix('articles')->group(function () {
            Route::get('/', [ArticleController::class, 'index'])->name("articles.index");
            Route::get('create', [ArticleController::class, 'create'])->name("articles.create");
            Route::post('create', [ArticleController::class, 'store'])->name("articles.store");
            Route::get('{articleId}/edit', [ArticleController::class, 'edit'])->name("articles.edit");
            Route::put('{articleId}/edit', [ArticleController::class, 'update'])->name("articles.update");
            Route::delete('{articleId}', [ArticleController::class, 'delete'])->name("articles.delete");
            Route::get('{articleSlug}', [ArticleController::class, 'show'])->name("articles.show");
            Route::get('{articleId}/remove-image', [ArticleController::class, 'removeImage'])->name("articles.remove-image");
        });

        Route::resource('trademarks', TrademarkController::class);

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name("products.index");
            Route::get('create', [ProductController::class, 'create'])->name("products.create");
            Route::post('create', [ProductController::class, 'store'])->name("products.store");
            Route::get('{product}/edit', [ProductController::class, 'edit'])->name("products.edit");
            Route::put('{product}/edit', [ProductController::class, 'update'])->name("products.update");
            Route::delete('{product}', [ProductController::class, 'destroy'])->name("products.destroy");
            Route::get('{productSlug}', [ProductController::class, 'show'])->name("products.show");
            
        });
        Route::prefix('users')->middleware('role:super-admin|admin')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name("users.index");
            Route::get('{user}/edit', [UserController::class, 'edit'])->name("users.edit");
            Route::put('{user}/edit', [UserController::class, 'update'])->name("users.update");
        });
        
        Route::prefix('roles')->middleware('role:super-admin')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name("roles.index");
            Route::get('create', [RoleController::class, 'create'])->name("roles.create");
            Route::post('create', [RoleController::class, 'store'])->name("roles.store");
            Route::get('{role}/edit', [RoleController::class, 'edit'])->name("roles.edit");
            Route::put('{role}/edit', [RoleController::class, 'update'])->name("roles.update");
        });

        Route::prefix('permissions')->middleware('role:super-admin')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name("permissions.index");
            Route::get('create', [PermissionController::class, 'create'])->name("permissions.create");
            Route::post('create', [PermissionController::class, 'store'])->name("permissions.store");
        });

        Route::get('checkout', [OrderController::class, 'checkoutPage'])->name('app.checkout');
        Route::post('checkout', [OrderController::class, 'storeOrder'])->name('app.store-order');
        Route::get('order/{order}/thankyou', [OrderController::class, 'thankyouPage'])->name('app.order-thankyou');

        Route::get('orders', [OrderController::class, 'orders'])->name('admin.orders');

        Route::prefix('admin')->group(function (){
            Route::resource('orders', AdminOrderController::class);

            Route::get("change-order-status/{order}", [AdminOrderController::class, "changeStatus"])->name('order.change-status');
        });

        Route::post('logout', [AuthController::class, 'logout'])->name("auth.logout");

    });

    Route::middleware(['guest'])->group(function ()
        {
            Route::get('register', [AuthController::class, 'registerPage'])->name("auth.register");
            Route::post('register', [AuthController::class, 'storeUser'])->name("auth.store-user");
            Route::get('login', [AuthController::class, 'loginPage'])->name("auth.login-page");
            Route::post('login', [AuthController::class, 'login'])->name("auth.login");
            
        });    
    
});

Route::get('super-admin/test', [AppController::class, 'addPrice']);



