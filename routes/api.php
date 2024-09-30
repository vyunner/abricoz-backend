<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => '/auth'], function () {
    Route::post('/code', \App\Http\Controllers\Auth\AuthCodeController::class);
    Route::post('/login', \App\Http\Controllers\Auth\AuthLoginController::class);
    Route::post('/admin-code', \App\Http\Controllers\Auth\AuthAdminCodeController::class);
    Route::post('/admin-login', \App\Http\Controllers\Auth\AuthAdminLoginController::class);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/set-name', \App\Http\Controllers\Auth\AuthSetNameController::class);
    });
});

Route::group(['prefix' => '/brand'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::delete('/delete/{id}', \App\Http\Controllers\Brand\BrandDestroyController::class);
        Route::post('/update/{id}', \App\Http\Controllers\Brand\BrandUpdateController::class);
        Route::post('/store', \App\Http\Controllers\Brand\BrandStoreController::class);
    });

    Route::get('/index', \App\Http\Controllers\Brand\BrandIndexController::class);
});

Route::group(['prefix' => '/category'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::delete('/delete/{id}', \App\Http\Controllers\Category\CategoryDestroyController::class);
        Route::post('/store', \App\Http\Controllers\Category\CategoryStoreController::class);
        Route::post('/update/{id}', \App\Http\Controllers\Category\CategoryUpdateController::class);
    });

    Route::get('/index', \App\Http\Controllers\Category\CategoryIndexController::class);
    Route::get('/show/{id}', \App\Http\Controllers\Category\CategoryShowController::class);
});

Route::group(['prefix' => '/country'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::delete('/delete/{id}', \App\Http\Controllers\Country\CountryDestroyController::class);
        Route::post('/store', \App\Http\Controllers\Country\CountryStoreController::class);
        Route::post('/update/{id}', \App\Http\Controllers\Country\CountryUpdateController::class);
    });

    Route::get('/index', \App\Http\Controllers\Country\CountryIndexController::class);
});

Route::group(['prefix' => '/delivery-interval'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::delete('/delete/{id}', \App\Http\Controllers\DeliveryInterval\DeliveryIntervalDestroyController::class);
        Route::post('/store', \App\Http\Controllers\DeliveryInterval\DeliveryIntervalStoreController::class);
        Route::post('/update/{id}', \App\Http\Controllers\DeliveryInterval\DeliveryIntervalUpdateController::class);
    });

    Route::get('/index', \App\Http\Controllers\DeliveryInterval\DeliveryIntervalIndexController::class);
});

Route::group(['prefix' => '/favorite-product', 'middleware' => 'auth:sanctum'], function () {
    Route::delete('/delete/{id}', \App\Http\Controllers\FavoriteProduct\FavoriteProductDestroyController::class);
    Route::post('/store', \App\Http\Controllers\FavoriteProduct\FavoriteProductStoreController::class);
    Route::get('/index', \App\Http\Controllers\FavoriteProduct\FavoriteProductIndexController::class);
});

Route::group(['prefix' => '/order', 'middleware' => 'auth:sanctum'], function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::post('/update/{id}', \App\Http\Controllers\Order\OrderUpdateController::class);
    });

    Route::post('/store', \App\Http\Controllers\Order\OrderStoreController::class);
    Route::get('/index', \App\Http\Controllers\Order\OrderIndexController::class);
    Route::get('/show/{id}', \App\Http\Controllers\Order\OrderShowController::class);
    Route::get('/cancel/{id}', \App\Http\Controllers\Order\OrderCancelController::class);
    Route::get('/status', \App\Http\Controllers\Order\OrderLastStatusController::class);
});

Route::group(['prefix' => '/product'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/update/{id}', \App\Http\Controllers\Product\ProductUpdateController::class);
        Route::post('/store', \App\Http\Controllers\Product\ProductStoreController::class);
        Route::delete('/delete/{id}', \App\Http\Controllers\Product\ProductDestroyController::class);
    });

    Route::get('/index', \App\Http\Controllers\Product\ProductIndexController::class);
    Route::get('/get-top-selling', \App\Http\Controllers\Product\ProductGetTopSellingController::class);
    Route::get('/get-discounts', \App\Http\Controllers\Product\ProductGetDiscountsController::class);
    Route::get('/show/{id}', \App\Http\Controllers\Product\ProductShowController::class);
    Route::get('/search', \App\Http\Controllers\Product\ProductSearchController::class);
});

Route::group(['prefix' => '/sub-category'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/update', \App\Http\Controllers\SubCategory\SubCategoryUpdateController::class);
        Route::post('/store', \App\Http\Controllers\SubCategory\SubCategoryStoreController::class);
        Route::delete('/delete/{id}', \App\Http\Controllers\SubCategory\SubCategoryDestroyController::class);
    });

    Route::get('/index', \App\Http\Controllers\SubCategory\SubCategoryIndexController::class);
    Route::get('/show/{id}', \App\Http\Controllers\SubCategory\SubCategoryShowController::class);
});

Route::group(['prefix' => '/cart'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/check', \App\Http\Controllers\Cart\CartCheckController::class);
    });
});

Route::group(['prefix' => '/address'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/index', \App\Http\Controllers\Address\AddressIndexController::class);
        Route::delete('/delete/{id}', \App\Http\Controllers\Address\AddressDestroyController::class);
        Route::post('/update/{id}', \App\Http\Controllers\Address\AddressUpdateController::class);
        Route::post('/store', \App\Http\Controllers\Address\AddressStoreController::class);
    });
});

Route::group(['prefix' => '/desktop-banner'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/update', \App\Http\Controllers\DesktopBanner\DesktopBannerUpdateController::class);
        Route::post('/store', \App\Http\Controllers\DesktopBanner\DesktopBannerStoreController::class);
        Route::delete('/delete/{id}', \App\Http\Controllers\DesktopBanner\DesktopBannerDestroyController::class);
    });

    Route::get('/index', \App\Http\Controllers\DesktopBanner\DesktopBannerIndexController::class);
});

Route::group(['prefix' => '/mobile-banner'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/update', \App\Http\Controllers\MobileBanner\MobileBannerUpdateController::class);
        Route::post('/store', \App\Http\Controllers\MobileBanner\MobileBannerStoreController::class);
        Route::delete('/delete/{id}', \App\Http\Controllers\MobileBanner\MobileBannerDestroyController::class);
    });

    Route::get('/index', \App\Http\Controllers\MobileBanner\MobileBannerIndexController::class);
});

Route::group(['prefix' => '/robokassa'], function () {
    Route::post('/result', \App\Http\Controllers\Robokassa\RobokassaResultController::class);
    Route::post('/success', \App\Http\Controllers\Robokassa\RobokassaSuccessController::class);
    Route::post('/fail', \App\Http\Controllers\Robokassa\RobokassaFailController::class);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/get-url', \App\Http\Controllers\Robokassa\RobokassaGetUrlController::class);
    });
});

Route::group(['prefix' => '/payment-type'], function () {
    Route::get('/index', \App\Http\Controllers\PaymentType\PaymentTypeIndexController::class);
});

Route::group(['prefix' => '/district'], function () {
    Route::get('/index', \App\Http\Controllers\District\DistrictIndexController::class);
});

Route::group(['prefix' => '/city'], function () {
    Route::get('/index', \App\Http\Controllers\City\CityIndexController::class);
});

Route::group(['prefix' => '/user-device'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/store', \App\Http\Controllers\UserDevice\UserDeviceStoreController::class);
    });
});

Route::group(['prefix' => '/notification'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/send', \App\Http\Controllers\Notification\NotificationController::class);
    });
});

Route::group(['prefix' => '/admin'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::get('/get-roles', \App\Http\Controllers\Admin\AdminGetRolesController::class);
        Route::post('/set-roles', \App\Http\Controllers\Admin\AdminSetRolesController::class);
        Route::get('/get-user', \App\Http\Controllers\Admin\AdminGetUserController::class);
        Route::get('/get-users-with-roles', \App\Http\Controllers\Admin\AdminGetUsersWithRolesController::class);
    });
});
