<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/', 'namespace' => 'Site'], function () {

    //--------------------------------- Home -----------------------------------------------------------    

    Route::group(['prefix' => '/', 'namespace' => 'Home'], function () {

        Route::get('/', [App\Http\Controllers\Site\Home\HomeController::class, 'getShow'])
            ->name('Site-HomeGetShow');      
    });



    //--------------------------------- Auth -----------------------------------------------------------    

    Route::group(['prefix' => '/login', 'namespace' => 'Login'], function () {

        Route::get('/', [App\Http\Controllers\Site\Auth\Login\LoginController::class, 'getShow'])
            ->name('login');   
            
        Route::post('/', [App\Http\Controllers\Site\Auth\Login\LoginController::class, 'postLogin'])
            ->name('postLogin');     
    });


    //--------------------------------- Logout -------------------------------------------------------------

    Route::post('/', [App\Http\Controllers\Site\Auth\Login\LoginController::class, 'postLogout'])
    ->name('postLogout');

    

    Route::group(['prefix' => '/register', 'namespace' => 'Register'], function () {

        Route::get('/', [App\Http\Controllers\Site\Auth\Register\RegisterController::class, 'getShow'])
            ->name('Site-RegisterGetShow');
            
        Route::get('/create', [App\Http\Controllers\Site\Auth\Register\RegisterController::class, 'getCreate'])
            ->name('Site-RegisterGetCreate'); 
            
        Route::post('/store', [App\Http\Controllers\Site\Auth\Register\RegisterController::class, 'postStore'])
            ->name('Site-RegisterPostStore');      
    });


    //--------------------------------- About -----------------------------------------------------------    

    Route::group(['prefix' => '/about', 'namespace' => 'About'], function () {

        Route::get('/', [App\Http\Controllers\Site\About\AboutController::class, 'getShow'])
            ->name('Site-AboutGetShow');      
    });



    //--------------------------------- Setting -----------------------------------------------------------    

    Route::group(['prefix' => '/setting', 'namespace' => 'Setting'], function () {

        Route::get('/', [App\Http\Controllers\Site\Setting\SettingController::class, 'getShow'])
            ->name('Site-SettingGetShow');      
    });



    //--------------------------------- Seller -----------------------------------------------------------    

    Route::group(['prefix' => '/seller', 'namespace' => 'Seller'], function () {

        Route::get('/', [App\Http\Controllers\Site\Seller\SellerController::class, 'getShow'])
            ->name('Site-SellerGetShow');      
    });



    //--------------------------------- Space -----------------------------------------------------------    

    Route::group(['prefix' => '/space', 'namespace' => 'Space'], function () {

        Route::get('/', [App\Http\Controllers\Site\Space\SpaceController::class, 'getShow'])
            ->name('Site-SpaceGetShow');  
            
        Route::post('/store', [App\Http\Controllers\Site\Space\SpaceController::class, 'PostStore'])
            ->name('Site-SpacePostStore');      
    });



    //--------------------------------- Profil -----------------------------------------------------------    

    Route::group(['prefix' => '/profil', 'namespace' => 'Profil'], function () {

        Route::get('/', [App\Http\Controllers\Site\Profil\ProfilController::class, 'getShow'])
            ->name('Site-ProfilGetShow');      
    });



    //--------------------------------- product -----------------------------------------------------------    

    Route::group(['prefix' => '/product', 'namespace' => 'Product'], function () {

        Route::get('/', [App\Http\Controllers\Site\Product\ProductController::class, 'getShow'])
            ->name('Site-ProductGetShow');
            
        Route::post('/store', [App\Http\Controllers\Site\Product\ProductController::class, 'postStore'])
            ->name('Site-ProductPostStore');    
    });



    //--------------------------------- shop -----------------------------------------------------------    

    Route::group(['prefix' => '/shop', 'namespace' => 'Shop'], function () {

        Route::get('/', [App\Http\Controllers\Site\Shop\ShopController::class, 'getShow'])
            ->name('Site-ShopGetShow');      
    });


    //--------------------------------- Order -----------------------------------------------------------    

    Route::group(['prefix' => '/order', 'namespace' => 'Order'], function () {

        Route::get('/', [App\Http\Controllers\Site\Order\OrderController::class, 'getShow'])
            ->name('Site-OrderGetShow');
            
        Route::post('/confirm', [App\Http\Controllers\Site\Order\OrderController::class, 'postConfirm'])
            ->name('Site-OrderPostConfirm');
    });



    //--------------------------------- Cart -----------------------------------------------------------    

    Route::group(['prefix' => '/cart', 'namespace' => 'Cart'], function () {

        Route::get('/', [App\Http\Controllers\Site\Cart\CartController::class, 'getShow'])
            ->name('Site-CartGetShow'); 
            
        Route::post('/add/{id}', [App\Http\Controllers\Site\Cart\CartController::class, 'postAdd'])
            ->name('Site-CartPostAdd');
            
        Route::get('/remove/{id}', [App\Http\Controllers\Site\Cart\CartController::class, 'getRemove'])
            ->name('Site-CartGetRemove');     
    });


    //--------------------------------- Delivery -----------------------------------------------------------    

    Route::group(['prefix' => '/delivery', 'namespace' => 'Delivery'], function () {

        Route::post('/store', [App\Http\Controllers\Site\Delivery\DeliveryController::class, 'postStore'])
            ->name('Site-DeliveryPostStore');    
    });


});
