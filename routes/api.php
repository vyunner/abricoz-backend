<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/auth'], function () {
    Route::post('/code', Controllers\Auth\AuthCodeController::class);
    Route::post('/login', Controllers\Auth\AuthLoginController::class);
    Route::post('/admin-code', Controllers\Auth\AuthAdminCodeController::class);
    Route::post('/admin-login', Controllers\Auth\AuthAdminLoginController::class);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/set-name', Controllers\Auth\AuthSetNameController::class);
    });
});

Route::group(['prefix' => '/category'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::delete('/delete/{id}', Controllers\Category\CategoryDestroyController::class);
        Route::post('/store', Controllers\Category\CategoryStoreController::class);
        Route::post('/update/{id}', Controllers\Category\CategoryUpdateController::class);
    });

    Route::get('/index', Controllers\Category\CategoryIndexController::class);
    Route::get('/show/{id}', Controllers\Category\CategoryShowController::class);
});

Route::group(['prefix' => '/delivery-interval'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::delete('/delete/{id}', Controllers\DeliveryInterval\DeliveryIntervalDestroyController::class);
        Route::post('/store', Controllers\DeliveryInterval\DeliveryIntervalStoreController::class);
        Route::post('/update/{id}', Controllers\DeliveryInterval\DeliveryIntervalUpdateController::class);
    });

    Route::get('/index', Controllers\DeliveryInterval\DeliveryIntervalIndexController::class);
});

Route::group(['prefix' => '/favorite-product', 'middleware' => 'auth:sanctum'], function () {
    Route::delete('/delete/{id}', Controllers\FavoriteProduct\FavoriteProductDestroyController::class);
    Route::post('/store', Controllers\FavoriteProduct\FavoriteProductStoreController::class);
    Route::get('/index', Controllers\FavoriteProduct\FavoriteProductIndexController::class);
});

Route::group(['prefix' => '/epay'], function () {
    Route::get('/get-save-card-token/{user_id}', Controllers\Epay\EpayGetSaveCardToken::class);
    Route::post('/save-card-success', Controllers\Epay\EpaySaveCardSuccessController::class);
    Route::post('/failure', Controllers\Epay\EpayFailureController::class)->name('epay.failure');
});

Route::group(['prefix' => '/user-card', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/index', Controllers\UserCard\UserCardIndexController::class);
    Route::delete('/delete/{id}', Controllers\UserCard\UserCardDeleteController::class);
});


Route::group(['prefix' => '/order', 'middleware' => 'auth:sanctum'], function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::post('/update/{id}', Controllers\Order\OrderUpdateController::class);
    });

    Route::post('/store', Controllers\Order\OrderStoreController::class);
    Route::get('/index', Controllers\Order\OrderIndexController::class);
    Route::get('/show/{id}', Controllers\Order\OrderShowController::class);
    Route::get('/cancel/{id}', Controllers\Order\OrderCancelController::class);
    Route::get('/payment-link/{id}', Controllers\Order\OrderCreatePaymentLinkController::class);
    Route::get('/status', Controllers\Order\OrderLastStatusController::class);
    Route::get('/active-orders', Controllers\Order\OrderActiveOrdersController::class);
});

Route::group(['prefix' => '/product'], function () {
    Route::get('/index', Controllers\Product\ProductIndexController::class);
    Route::get('/show/{id}', Controllers\Product\ProductShowController::class);
    Route::get('/search', Controllers\Product\ProductSearchController::class);
});

Route::group(['prefix' => '/sub-category'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/update/{id}', Controllers\SubCategory\SubCategoryUpdateController::class);
        Route::post('/store', Controllers\SubCategory\SubCategoryStoreController::class);
        Route::delete('/delete/{id}', Controllers\SubCategory\SubCategoryDestroyController::class);
    });

    Route::get('/index', Controllers\SubCategory\SubCategoryIndexController::class);
    Route::get('/show/{id}', Controllers\SubCategory\SubCategoryShowController::class);
});

Route::group(['prefix' => '/cart'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/check', Controllers\Cart\CartCheckController::class);
    });
});

Route::group(['prefix' => '/address'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/index', Controllers\Address\AddressIndexController::class);
        Route::delete('/delete/{id}', Controllers\Address\AddressDestroyController::class);
        Route::post('/update/{id}', Controllers\Address\AddressUpdateController::class);
        Route::post('/store', Controllers\Address\AddressStoreController::class);
    });
});

Route::group(['prefix' => '/desktop-banner'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/update', Controllers\DesktopBanner\DesktopBannerUpdateController::class);
        Route::post('/store', Controllers\DesktopBanner\DesktopBannerStoreController::class);
        Route::delete('/delete/{id}', Controllers\DesktopBanner\DesktopBannerDestroyController::class);
    });

    Route::get('/index', Controllers\DesktopBanner\DesktopBannerIndexController::class);
});

Route::group(['prefix' => '/mobile-banner'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/store', Controllers\MobileBanner\MobileBannerStoreController::class);
    });

    Route::get('/index', Controllers\MobileBanner\MobileBannerIndexController::class);
});

Route::group(['prefix' => '/robokassa'], function () {
    Route::post('/result', Controllers\Robokassa\RobokassaResultController::class);
    Route::post('/success', Controllers\Robokassa\RobokassaSuccessController::class);
    Route::post('/fail', Controllers\Robokassa\RobokassaFailController::class);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/get-url', Controllers\Robokassa\RobokassaGetUrlController::class);
    });
});

Route::group(['prefix' => '/payment-type'], function () {
    Route::get('/index', Controllers\PaymentType\PaymentTypeIndexController::class);
});

Route::group(['prefix' => '/city'], function () {
    Route::get('/index', Controllers\City\CityIndexController::class);
});

Route::group(['prefix' => '/user-device'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/store', Controllers\UserDevice\UserDeviceStoreController::class);
    });
});

Route::group(['prefix' => '/notification'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::post('/send', Controllers\Notification\NotificationController::class);
    });
});

Route::group(['prefix' => '/admin'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::get('/get-roles', Controllers\Admin\AdminGetRolesController::class);
        Route::post('/set-roles', Controllers\Admin\AdminSetRolesController::class);
        Route::get('/get-user', Controllers\Admin\AdminGetUserController::class);
        Route::get('/get-users-with-roles', Controllers\Admin\AdminGetUsersWithRolesController::class);


        Route::post('/export-product', Controllers\Admin\AdminExportProductController::class);
    });
});

Route::group(['prefix' => '/warehouseman'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin|warehouseman']], function () {
        Route::get('/index', Controllers\Warehouseman\WarehousemanIndexController::class);
        Route::get('/show/{id}', Controllers\Warehouseman\WarehousemanShowController::class);
        Route::post('/accept', Controllers\Warehouseman\WarehousemanAcceptController::class);
        Route::post('/complete', Controllers\Warehouseman\WarehousemanCompleteController::class);
        Route::get('/get-current-order', Controllers\Warehouseman\WarehousemanGetCurrentOrderController::class);
    });
});

Route::group(['prefix' => '/courier'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin|courier']], function () {
        Route::get('/get-current-orders', Controllers\Courier\CourierGetCurrentOrdersController::class);
        Route::post('/complete-order', Controllers\Courier\CourierCompleteOrderController::class);
        Route::post('/accept-order', Controllers\Courier\CourierAcceptOrderController::class);
    });
});

Route::group(['prefix' => '/dispatcher'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin|dispatcher']], function () {
        Route::get('/get-unassigned-orders', Controllers\Dispatcher\DispatcherGetUnassignedOrdersController::class);
        Route::get('/get-assigned-orders', Controllers\Dispatcher\DispatcherGetAssignedOrdersController::class);
        Route::get('/get-couriers', Controllers\Dispatcher\DispatcherGetCouriersController::class);
        Route::post('/assign-orders', Controllers\Dispatcher\DispatcherAssignOrdersController::class);
        Route::post('/unassign-orders', Controllers\Dispatcher\DispatcherUnassignOrdersController::class);
    });
});

Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::post('/test', Controllers\Test\TestController::class);
});

Route::group(['prefix' => '/point'], function () {
    Route::get('/index', Controllers\Point\PointIndexController::class);
});

Route::group(['prefix' => '/user'], function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::delete('/delete', Controllers\User\UserDeleteController::class);
        Route::get('/me', Controllers\User\UserMeController::class);
    });
});

Route::group(['prefix' => '/warehouse'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin|head-warehouse']], function () {
        Route::get('/search', Controllers\Warehouse\WarehouseSearchController::class);
        Route::post('/create-product', Controllers\Warehouse\WarehouseCreateProductController::class);
        Route::get('/get-products', Controllers\Warehouse\WarehouseGetProductsController::class);
        Route::put('/update-product/{id}', Controllers\Warehouse\WarehouseUpdateProductController::class);
        Route::delete('/delete-product/{id}', Controllers\Warehouse\WarehouseDeleteProductController::class);
        Route::get('/get-subcategories', Controllers\Warehouse\WarehouseGetSubcategoriesController::class);
        Route::post('/create-subcategory', Controllers\Warehouse\WarehouseCreateSubcategoryController::class);

        Route::delete('/delete-subcategory/{id}', Controllers\Warehouse\WarehouseDeleteSubcategoryController::class);

        Route::post('/create-category', Controllers\Warehouse\WarehouseCreateCategoryController::class);
        Route::get('/get-categories', Controllers\Warehouse\WarehouseGetCategoriesController::class);
        Route::put('/update-category/{id}', Controllers\Warehouse\WarehouseUpdateCategoryController::class);
        Route::delete('/delete-category/{id}', Controllers\Warehouse\WarehouseDeleteCategoryController::class);

        Route::post('/add-photo-product/{id}', Controllers\Warehouse\WarehouseAddPhotoProductController::class);
    });
});

Route::group(['prefix' => '/head-warehouse'], function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:admin|head-warehouse']], function () {
        Route::delete('/delete-order/{id}', Controllers\HeadWarehouse\HeadWarehouseDeleteOrderController::class);
        Route::get('/search-product', Controllers\HeadWarehouse\HeadWarehouseSearchProductController::class);
        Route::post('/change-fields-product/{id}', Controllers\HeadWarehouse\HeadWarehouseChangeFieldsProductController::class);
    });
});

Route::group(['prefix' => '/app'], function () {
    Route::get('/status', Controllers\App\AppStatusController::class);
    Route::get('/get-min-cart-price', Controllers\App\AppGetMinCartPriceController::class);
    Route::get('/get-settings', Controllers\App\AppGetSettingsController::class);
});

Route::group(['prefix' => '/ad'], function () {
    Route::post('/click', Controllers\Ad\AdClickController::class);
});

Route::group(['prefix' => '/pos'], function () {
//    Route::post('/auth-login', Controllers\Pos\PosAuthLoginController::class);
//    Route::post('/auth-code', Controllers\Pos\PosAuthCodeController::class);

    Route::group(['middleware' => ['auth:sanctum', 'role:admin|head-warehouse']], function () {
        Route::get('/search-product', Controllers\Pos\PosSearchProductController::class);
        Route::post('/change-product-amount', Controllers\Pos\PosChangeProductAmountController::class);
        Route::post('/update-product/{id}', Controllers\Pos\PosUpdateProductController::class);
        Route::get('/get-subcategories', Controllers\Pos\PosGetSubcategories::class);
    });
});
