<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

            <style id="language-style">
            /* starts out as display none and is replaced with js later  */
                        body .content .bash-example code {
                display: none;
            }
                        body .content .javascript-example code {
                display: none;
            }
                    </style>
    
            <script>
            var tryItOutBaseUrl = "https://api.abricoz.kz";
            var useCsrf = Boolean();
            var csrfUrl = "/sanctum/csrf-cookie";
        </script>
        <script src="{{ asset("/vendor/scribe/js/tryitout-4.35.0.js") }}"></script>
    
    <script src="{{ asset("/vendor/scribe/js/theme-default-4.35.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-address" class="tocify-header">
                <li class="tocify-item level-1" data-unique="address">
                    <a href="#address">Address</a>
                </li>
                                    <ul id="tocify-subheader-address" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="address-GETapi-address-index">
                                <a href="#address-GETapi-address-index">Список</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="address-DELETEapi-address-delete--id-">
                                <a href="#address-DELETEapi-address-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="address-POSTapi-address-update--id-">
                                <a href="#address-POSTapi-address-update--id-">Обновление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="address-POSTapi-address-store">
                                <a href="#address-POSTapi-address-store">Создание</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin">
                    <a href="#admin">Admin</a>
                </li>
                                    <ul id="tocify-subheader-admin" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-GETapi-admin-get-roles">
                                <a href="#admin-GETapi-admin-get-roles">GetRoles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-POSTapi-admin-set-roles">
                                <a href="#admin-POSTapi-admin-set-roles">SetRoles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-GETapi-admin-get-user">
                                <a href="#admin-GETapi-admin-get-user">GetUser</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-GETapi-admin-get-users-with-roles">
                                <a href="#admin-GETapi-admin-get-users-with-roles">GetUsersWithRoles</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-auth" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth">
                    <a href="#auth">Auth</a>
                </li>
                                    <ul id="tocify-subheader-auth" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-code">
                                <a href="#auth-POSTapi-auth-code">Отправить код</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-login">
                                <a href="#auth-POSTapi-auth-login">Авторизация</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-admin-code">
                                <a href="#auth-POSTapi-auth-admin-code">Отправить код</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-admin-login">
                                <a href="#auth-POSTapi-auth-admin-login">AuthAdminLogin</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-set-name">
                                <a href="#auth-POSTapi-auth-set-name">SetName</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-cart" class="tocify-header">
                <li class="tocify-item level-1" data-unique="cart">
                    <a href="#cart">Cart</a>
                </li>
                                    <ul id="tocify-subheader-cart" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="cart-POSTapi-cart-check">
                                <a href="#cart-POSTapi-cart-check">Cart Check</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-category" class="tocify-header">
                <li class="tocify-item level-1" data-unique="category">
                    <a href="#category">Category</a>
                </li>
                                    <ul id="tocify-subheader-category" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="category-DELETEapi-category-delete--id-">
                                <a href="#category-DELETEapi-category-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-POSTapi-category-store">
                                <a href="#category-POSTapi-category-store">Создание</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-POSTapi-category-update--id-">
                                <a href="#category-POSTapi-category-update--id-">Обновление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-GETapi-category-index">
                                <a href="#category-GETapi-category-index">Список</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-GETapi-category-show--id-">
                                <a href="#category-GETapi-category-show--id-">Элемент</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-city" class="tocify-header">
                <li class="tocify-item level-1" data-unique="city">
                    <a href="#city">City</a>
                </li>
                                    <ul id="tocify-subheader-city" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="city-GETapi-city-index">
                                <a href="#city-GETapi-city-index">Список</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-deliveryinterval" class="tocify-header">
                <li class="tocify-item level-1" data-unique="deliveryinterval">
                    <a href="#deliveryinterval">DeliveryInterval</a>
                </li>
                                    <ul id="tocify-subheader-deliveryinterval" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="deliveryinterval-DELETEapi-delivery-interval-delete--id-">
                                <a href="#deliveryinterval-DELETEapi-delivery-interval-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deliveryinterval-POSTapi-delivery-interval-store">
                                <a href="#deliveryinterval-POSTapi-delivery-interval-store">Создание</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deliveryinterval-POSTapi-delivery-interval-update--id-">
                                <a href="#deliveryinterval-POSTapi-delivery-interval-update--id-">Обновление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deliveryinterval-GETapi-delivery-interval-index">
                                <a href="#deliveryinterval-GETapi-delivery-interval-index">Список</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-desktopbanner" class="tocify-header">
                <li class="tocify-item level-1" data-unique="desktopbanner">
                    <a href="#desktopbanner">DesktopBanner</a>
                </li>
                                    <ul id="tocify-subheader-desktopbanner" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="desktopbanner-POSTapi-desktop-banner-update">
                                <a href="#desktopbanner-POSTapi-desktop-banner-update">Изменение порядка баннеров</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="desktopbanner-POSTapi-desktop-banner-store">
                                <a href="#desktopbanner-POSTapi-desktop-banner-store">Создание</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="desktopbanner-DELETEapi-desktop-banner-delete--id-">
                                <a href="#desktopbanner-DELETEapi-desktop-banner-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="desktopbanner-GETapi-desktop-banner-index">
                                <a href="#desktopbanner-GETapi-desktop-banner-index">Список</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-notification-send">
                                <a href="#endpoints-POSTapi-notification-send">POST api/notification/send</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-warehouseman-accept">
                                <a href="#endpoints-POSTapi-warehouseman-accept">Закрепление заказа за складским работником</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-warehouseman-complete">
                                <a href="#endpoints-POSTapi-warehouseman-complete">Завершение заказа складским работником</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-courier-get-current-orders">
                                <a href="#endpoints-GETapi-courier-get-current-orders">GET api/courier/get-current-orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-courier-complete-order">
                                <a href="#endpoints-POSTapi-courier-complete-order">POST api/courier/complete-order</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-courier-accept-order">
                                <a href="#endpoints-POSTapi-courier-accept-order">POST api/courier/accept-order</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dispatcher-get-unassigned-orders">
                                <a href="#endpoints-GETapi-dispatcher-get-unassigned-orders">GET api/dispatcher/get-unassigned-orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dispatcher-get-assigned-orders">
                                <a href="#endpoints-GETapi-dispatcher-get-assigned-orders">GET api/dispatcher/get-assigned-orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dispatcher-get-couriers">
                                <a href="#endpoints-GETapi-dispatcher-get-couriers">GET api/dispatcher/get-couriers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dispatcher-assign-orders">
                                <a href="#endpoints-POSTapi-dispatcher-assign-orders">POST api/dispatcher/assign-orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dispatcher-unassign-orders">
                                <a href="#endpoints-POSTapi-dispatcher-unassign-orders">POST api/dispatcher/unassign-orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-test">
                                <a href="#endpoints-POSTapi-test">POST api/test</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-point-index">
                                <a href="#endpoints-GETapi-point-index">GET api/point/index</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-user-delete">
                                <a href="#endpoints-DELETEapi-user-delete">DELETE api/user/delete</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-warehouse-search">
                                <a href="#endpoints-GETapi-warehouse-search">GET api/warehouse/search</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-warehouse-create-product">
                                <a href="#endpoints-POSTapi-warehouse-create-product">POST api/warehouse/create-product</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-warehouse-get-products">
                                <a href="#endpoints-GETapi-warehouse-get-products">GET api/warehouse/get-products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-warehouse-update-product--id-">
                                <a href="#endpoints-PUTapi-warehouse-update-product--id-">PUT api/warehouse/update-product/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-warehouse-delete-product--id-">
                                <a href="#endpoints-DELETEapi-warehouse-delete-product--id-">DELETE api/warehouse/delete-product/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-warehouse-get-subcategories">
                                <a href="#endpoints-GETapi-warehouse-get-subcategories">GET api/warehouse/get-subcategories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-warehouse-create-subcategory">
                                <a href="#endpoints-POSTapi-warehouse-create-subcategory">POST api/warehouse/create-subcategory</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-warehouse-delete-subcategory--id-">
                                <a href="#endpoints-DELETEapi-warehouse-delete-subcategory--id-">DELETE api/warehouse/delete-subcategory/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-warehouse-create-category">
                                <a href="#endpoints-POSTapi-warehouse-create-category">POST api/warehouse/create-category</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-warehouse-get-categories">
                                <a href="#endpoints-GETapi-warehouse-get-categories">GET api/warehouse/get-categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-warehouse-update-category--id-">
                                <a href="#endpoints-PUTapi-warehouse-update-category--id-">PUT api/warehouse/update-category/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-warehouse-delete-category--id-">
                                <a href="#endpoints-DELETEapi-warehouse-delete-category--id-">DELETE api/warehouse/delete-category/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-warehouse-add-photo-product--id-">
                                <a href="#endpoints-POSTapi-warehouse-add-photo-product--id-">POST api/warehouse/add-photo-product/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-favoriteproduct" class="tocify-header">
                <li class="tocify-item level-1" data-unique="favoriteproduct">
                    <a href="#favoriteproduct">FavoriteProduct</a>
                </li>
                                    <ul id="tocify-subheader-favoriteproduct" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="favoriteproduct-DELETEapi-favorite-product-delete--id-">
                                <a href="#favoriteproduct-DELETEapi-favorite-product-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="favoriteproduct-POSTapi-favorite-product-store">
                                <a href="#favoriteproduct-POSTapi-favorite-product-store">Создание</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="favoriteproduct-GETapi-favorite-product-index">
                                <a href="#favoriteproduct-GETapi-favorite-product-index">Список</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-mobilebanner" class="tocify-header">
                <li class="tocify-item level-1" data-unique="mobilebanner">
                    <a href="#mobilebanner">MobileBanner</a>
                </li>
                                    <ul id="tocify-subheader-mobilebanner" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="mobilebanner-POSTapi-mobile-banner-update">
                                <a href="#mobilebanner-POSTapi-mobile-banner-update">Обновление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mobilebanner-POSTapi-mobile-banner-store">
                                <a href="#mobilebanner-POSTapi-mobile-banner-store">Создание</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mobilebanner-DELETEapi-mobile-banner-delete--id-">
                                <a href="#mobilebanner-DELETEapi-mobile-banner-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mobilebanner-GETapi-mobile-banner-index">
                                <a href="#mobilebanner-GETapi-mobile-banner-index">Список</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-order" class="tocify-header">
                <li class="tocify-item level-1" data-unique="order">
                    <a href="#order">Order</a>
                </li>
                                    <ul id="tocify-subheader-order" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="order-POSTapi-order-update--id-">
                                <a href="#order-POSTapi-order-update--id-">Обновление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-POSTapi-order-store">
                                <a href="#order-POSTapi-order-store">Создание заказа</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-GETapi-order-index">
                                <a href="#order-GETapi-order-index">Список</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-GETapi-order-show--id-">
                                <a href="#order-GETapi-order-show--id-">Элемент</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-GETapi-order-cancel--id-">
                                <a href="#order-GETapi-order-cancel--id-">Отмена заказа</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-GETapi-order-status">
                                <a href="#order-GETapi-order-status">Проверка на оплату последнего заказа</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-GETapi-order-active-orders">
                                <a href="#order-GETapi-order-active-orders">Список активных заказов</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-paymenttype" class="tocify-header">
                <li class="tocify-item level-1" data-unique="paymenttype">
                    <a href="#paymenttype">PaymentType</a>
                </li>
                                    <ul id="tocify-subheader-paymenttype" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="paymenttype-GETapi-payment-type-index">
                                <a href="#paymenttype-GETapi-payment-type-index">Index</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-product" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product">
                    <a href="#product">Product</a>
                </li>
                                    <ul id="tocify-subheader-product" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-GETapi-product-index">
                                <a href="#product-GETapi-product-index">Список</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETapi-product-show--id-">
                                <a href="#product-GETapi-product-show--id-">Элемент</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETapi-product-search">
                                <a href="#product-GETapi-product-search">Поиск</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-robokassa" class="tocify-header">
                <li class="tocify-item level-1" data-unique="robokassa">
                    <a href="#robokassa">Robokassa</a>
                </li>
                                    <ul id="tocify-subheader-robokassa" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="robokassa-POSTapi-robokassa-result">
                                <a href="#robokassa-POSTapi-robokassa-result">Result</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="robokassa-POSTapi-robokassa-success">
                                <a href="#robokassa-POSTapi-robokassa-success">Success</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="robokassa-POSTapi-robokassa-fail">
                                <a href="#robokassa-POSTapi-robokassa-fail">Fail</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="robokassa-GETapi-robokassa-get-url">
                                <a href="#robokassa-GETapi-robokassa-get-url">Ссылка</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-subcategory" class="tocify-header">
                <li class="tocify-item level-1" data-unique="subcategory">
                    <a href="#subcategory">SubCategory</a>
                </li>
                                    <ul id="tocify-subheader-subcategory" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="subcategory-POSTapi-sub-category-update">
                                <a href="#subcategory-POSTapi-sub-category-update">Обновление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="subcategory-POSTapi-sub-category-store">
                                <a href="#subcategory-POSTapi-sub-category-store">Создание</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="subcategory-DELETEapi-sub-category-delete--id-">
                                <a href="#subcategory-DELETEapi-sub-category-delete--id-">Удаление</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="subcategory-GETapi-sub-category-index">
                                <a href="#subcategory-GETapi-sub-category-index">Список</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="subcategory-GETapi-sub-category-show--id-">
                                <a href="#subcategory-GETapi-sub-category-show--id-">Элемент</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-userdevice" class="tocify-header">
                <li class="tocify-item level-1" data-unique="userdevice">
                    <a href="#userdevice">UserDevice</a>
                </li>
                                    <ul id="tocify-subheader-userdevice" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="userdevice-POSTapi-user-device-store">
                                <a href="#userdevice-POSTapi-user-device-store">Создание</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-warehouseman" class="tocify-header">
                <li class="tocify-item level-1" data-unique="warehouseman">
                    <a href="#warehouseman">Warehouseman</a>
                </li>
                                    <ul id="tocify-subheader-warehouseman" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="warehouseman-GETapi-warehouseman-index">
                                <a href="#warehouseman-GETapi-warehouseman-index">GET api/warehouseman/index</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="warehouseman-GETapi-warehouseman-show--id-">
                                <a href="#warehouseman-GETapi-warehouseman-show--id-">Отображение информации о заказе</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="warehouseman-GETapi-warehouseman-get-current-order">
                                <a href="#warehouseman-GETapi-warehouseman-get-current-order">Display the current assigned order for the warehouseman</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a
                    href="{{ route("scribe.postman") }}">View Postman collection</a>
            </li>
                            <li style="padding-bottom: 5px;"><a
                    href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 28, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://api.abricoz.kz</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<pre><code>This API is not authenticated.</code></pre>

        <h1 id="address">Address</h1>

    

                                <h2 id="address-GETapi-address-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-address-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/address/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/address/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-address-index">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-address-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-address-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-address-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-address-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-address-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-address-index" data-method="GET"
      data-path="api/address/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-address-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-address-index"
                    onclick="tryItOut('GETapi-address-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-address-index"
                    onclick="cancelTryOut('GETapi-address-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-address-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/address/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-address-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-address-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="address-DELETEapi-address-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-address-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/address/delete/et"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/address/delete/et"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-address-delete--id-">
</span>
<span id="execution-results-DELETEapi-address-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-address-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-address-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-address-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-address-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-address-delete--id-" data-method="DELETE"
      data-path="api/address/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-address-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-address-delete--id-"
                    onclick="tryItOut('DELETEapi-address-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-address-delete--id-"
                    onclick="cancelTryOut('DELETEapi-address-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-address-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/address/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-address-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-address-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-address-delete--id-"
               value="et"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>et</code></p>
            </div>
                    </form>

                    <h2 id="address-POSTapi-address-update--id-">Обновление</h2>

<p>
    </p>



<span id="example-requests-POSTapi-address-update--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/address/update/fugit"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"city_id\": 14,
    \"address_street_and_house\": \"voluptas\",
    \"address_apartment\": \"enim\",
    \"address_entrance\": \"commodi\",
    \"address_floor\": \"iste\",
    \"address_comment\": \"sed\",
    \"longitude\": \"dolorem\",
    \"latitude\": \"non\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/address/update/fugit"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "city_id": 14,
    "address_street_and_house": "voluptas",
    "address_apartment": "enim",
    "address_entrance": "commodi",
    "address_floor": "iste",
    "address_comment": "sed",
    "longitude": "dolorem",
    "latitude": "non"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-address-update--id-">
</span>
<span id="execution-results-POSTapi-address-update--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-address-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-address-update--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-address-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-address-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-address-update--id-" data-method="POST"
      data-path="api/address/update/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-address-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-address-update--id-"
                    onclick="tryItOut('POSTapi-address-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-address-update--id-"
                    onclick="cancelTryOut('POSTapi-address-update--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-address-update--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/address/update/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-address-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-address-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-address-update--id-"
               value="fugit"
               data-component="url">
    <br>
<p>The ID of the update. Example: <code>fugit</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="city_id"                data-endpoint="POSTapi-address-update--id-"
               value="14"
               data-component="body">
    <br>
<p>Example: <code>14</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_street_and_house</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_street_and_house"                data-endpoint="POSTapi-address-update--id-"
               value="voluptas"
               data-component="body">
    <br>
<p>Example: <code>voluptas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_apartment</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_apartment"                data-endpoint="POSTapi-address-update--id-"
               value="enim"
               data-component="body">
    <br>
<p>Example: <code>enim</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_entrance</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_entrance"                data-endpoint="POSTapi-address-update--id-"
               value="commodi"
               data-component="body">
    <br>
<p>Example: <code>commodi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_floor</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_floor"                data-endpoint="POSTapi-address-update--id-"
               value="iste"
               data-component="body">
    <br>
<p>Example: <code>iste</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_comment</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_comment"                data-endpoint="POSTapi-address-update--id-"
               value="sed"
               data-component="body">
    <br>
<p>Example: <code>sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="longitude"                data-endpoint="POSTapi-address-update--id-"
               value="dolorem"
               data-component="body">
    <br>
<p>Example: <code>dolorem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="latitude"                data-endpoint="POSTapi-address-update--id-"
               value="non"
               data-component="body">
    <br>
<p>Example: <code>non</code></p>
        </div>
        </form>

                    <h2 id="address-POSTapi-address-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-address-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/address/store"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"city_id\": 15,
    \"address_street_and_house\": \"ratione\",
    \"address_apartment\": \"quia\",
    \"address_entrance\": \"dolorum\",
    \"address_floor\": \"maxime\",
    \"address_comment\": \"id\",
    \"latitude\": \"et\",
    \"longitude\": \"sint\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/address/store"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "city_id": 15,
    "address_street_and_house": "ratione",
    "address_apartment": "quia",
    "address_entrance": "dolorum",
    "address_floor": "maxime",
    "address_comment": "id",
    "latitude": "et",
    "longitude": "sint"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-address-store">
</span>
<span id="execution-results-POSTapi-address-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-address-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-address-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-address-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-address-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-address-store" data-method="POST"
      data-path="api/address/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-address-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-address-store"
                    onclick="tryItOut('POSTapi-address-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-address-store"
                    onclick="cancelTryOut('POSTapi-address-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-address-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/address/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-address-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-address-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="city_id"                data-endpoint="POSTapi-address-store"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_street_and_house</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address_street_and_house"                data-endpoint="POSTapi-address-store"
               value="ratione"
               data-component="body">
    <br>
<p>Example: <code>ratione</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_apartment</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address_apartment"                data-endpoint="POSTapi-address-store"
               value="quia"
               data-component="body">
    <br>
<p>Example: <code>quia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_entrance</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address_entrance"                data-endpoint="POSTapi-address-store"
               value="dolorum"
               data-component="body">
    <br>
<p>Example: <code>dolorum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_floor</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address_floor"                data-endpoint="POSTapi-address-store"
               value="maxime"
               data-component="body">
    <br>
<p>Example: <code>maxime</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_comment</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_comment"                data-endpoint="POSTapi-address-store"
               value="id"
               data-component="body">
    <br>
<p>Example: <code>id</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="latitude"                data-endpoint="POSTapi-address-store"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="longitude"                data-endpoint="POSTapi-address-store"
               value="sint"
               data-component="body">
    <br>
<p>Example: <code>sint</code></p>
        </div>
        </form>

                <h1 id="admin">Admin</h1>

    

                                <h2 id="admin-GETapi-admin-get-roles">GetRoles</h2>

<p>
    </p>



<span id="example-requests-GETapi-admin-get-roles">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/admin/get-roles"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/admin/get-roles"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-admin-get-roles">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-admin-get-roles" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-admin-get-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-get-roles"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-get-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-admin-get-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-get-roles" data-method="GET"
      data-path="api/admin/get-roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-get-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-get-roles"
                    onclick="tryItOut('GETapi-admin-get-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-get-roles"
                    onclick="cancelTryOut('GETapi-admin-get-roles');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-get-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/get-roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-get-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-get-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="admin-POSTapi-admin-set-roles">SetRoles</h2>

<p>
    </p>



<span id="example-requests-POSTapi-admin-set-roles">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/admin/set-roles"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"user_id\": 20,
    \"role_ids\": [
        4
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/admin/set-roles"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "user_id": 20,
    "role_ids": [
        4
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-admin-set-roles">
</span>
<span id="execution-results-POSTapi-admin-set-roles" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-admin-set-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-set-roles"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-set-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-admin-set-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-set-roles" data-method="POST"
      data-path="api/admin/set-roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-set-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-set-roles"
                    onclick="tryItOut('POSTapi-admin-set-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-set-roles"
                    onclick="cancelTryOut('POSTapi-admin-set-roles');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-set-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/set-roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-set-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-set-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="user_id"                data-endpoint="POSTapi-admin-set-roles"
               value="20"
               data-component="body">
    <br>
<p>Example: <code>20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role_ids</code></b>&nbsp;&nbsp;
    <small>integer[]</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="role_ids[0]"                data-endpoint="POSTapi-admin-set-roles"
               data-component="body">
        <input type="number" style="display: none"
               name="role_ids[1]"                data-endpoint="POSTapi-admin-set-roles"
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="admin-GETapi-admin-get-user">GetUser</h2>

<p>
    </p>



<span id="example-requests-GETapi-admin-get-user">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/admin/get-user"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"phone\": \"illum\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/admin/get-user"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "phone": "illum"
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-admin-get-user">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-admin-get-user" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-admin-get-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-get-user"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-get-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-admin-get-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-get-user" data-method="GET"
      data-path="api/admin/get-user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-get-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-get-user"
                    onclick="tryItOut('GETapi-admin-get-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-get-user"
                    onclick="cancelTryOut('GETapi-admin-get-user');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-get-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/get-user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-get-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-get-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="GETapi-admin-get-user"
               value="illum"
               data-component="body">
    <br>
<p>Example: <code>illum</code></p>
        </div>
        </form>

                    <h2 id="admin-GETapi-admin-get-users-with-roles">GetUsersWithRoles</h2>

<p>
    </p>



<span id="example-requests-GETapi-admin-get-users-with-roles">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/admin/get-users-with-roles"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/admin/get-users-with-roles"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-admin-get-users-with-roles">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-admin-get-users-with-roles" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-admin-get-users-with-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-get-users-with-roles"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-get-users-with-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-admin-get-users-with-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-get-users-with-roles" data-method="GET"
      data-path="api/admin/get-users-with-roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-get-users-with-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-get-users-with-roles"
                    onclick="tryItOut('GETapi-admin-get-users-with-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-get-users-with-roles"
                    onclick="cancelTryOut('GETapi-admin-get-users-with-roles');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-get-users-with-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/get-users-with-roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-get-users-with-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-get-users-with-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="auth">Auth</h1>

    

                                <h2 id="auth-POSTapi-auth-code">Отправить код</h2>

<p>
    </p>



<span id="example-requests-POSTapi-auth-code">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/auth/code"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"phone\": \"nisi\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/auth/code"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "phone": "nisi"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-auth-code">
</span>
<span id="execution-results-POSTapi-auth-code" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-auth-code"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-code"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-code" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-auth-code">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-code" data-method="POST"
      data-path="api/auth/code"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-code', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-code"
                    onclick="tryItOut('POSTapi-auth-code');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-code"
                    onclick="cancelTryOut('POSTapi-auth-code');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-code"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/code</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-code"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-code"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-code"
               value="nisi"
               data-component="body">
    <br>
<p>Example: <code>nisi</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-login">Авторизация</h2>

<p>
    </p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/auth/login"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"phone\": \"occaecati\",
    \"code\": \"minus\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/auth/login"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "phone": "occaecati",
    "code": "minus"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-login"
               value="occaecati"
               data-component="body">
    <br>
<p>Example: <code>occaecati</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-auth-login"
               value="minus"
               data-component="body">
    <br>
<p>Example: <code>minus</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-admin-code">Отправить код</h2>

<p>
    </p>



<span id="example-requests-POSTapi-auth-admin-code">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/auth/admin-code"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"phone\": \"fugit\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/auth/admin-code"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "phone": "fugit"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-auth-admin-code">
</span>
<span id="execution-results-POSTapi-auth-admin-code" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-auth-admin-code"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-admin-code"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-admin-code" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-auth-admin-code">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-admin-code" data-method="POST"
      data-path="api/auth/admin-code"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-admin-code', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-admin-code"
                    onclick="tryItOut('POSTapi-auth-admin-code');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-admin-code"
                    onclick="cancelTryOut('POSTapi-auth-admin-code');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-admin-code"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/admin-code</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-admin-code"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-admin-code"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-admin-code"
               value="fugit"
               data-component="body">
    <br>
<p>Example: <code>fugit</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-admin-login">AuthAdminLogin</h2>

<p>
    </p>



<span id="example-requests-POSTapi-auth-admin-login">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/auth/admin-login"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"phone\": \"qui\",
    \"code\": \"non\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/auth/admin-login"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "phone": "qui",
    "code": "non"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-auth-admin-login">
</span>
<span id="execution-results-POSTapi-auth-admin-login" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-auth-admin-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-admin-login"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-admin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-auth-admin-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-admin-login" data-method="POST"
      data-path="api/auth/admin-login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-admin-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-admin-login"
                    onclick="tryItOut('POSTapi-auth-admin-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-admin-login"
                    onclick="cancelTryOut('POSTapi-auth-admin-login');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-admin-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/admin-login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-admin-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-admin-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-admin-login"
               value="qui"
               data-component="body">
    <br>
<p>Example: <code>qui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-auth-admin-login"
               value="non"
               data-component="body">
    <br>
<p>Example: <code>non</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-set-name">SetName</h2>

<p>
    </p>



<span id="example-requests-POSTapi-auth-set-name">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/auth/set-name"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"firstname\": \"odit\",
    \"lastname\": \"dignissimos\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/auth/set-name"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "firstname": "odit",
    "lastname": "dignissimos"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-auth-set-name">
</span>
<span id="execution-results-POSTapi-auth-set-name" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-auth-set-name"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-set-name"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-set-name" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-auth-set-name">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-set-name" data-method="POST"
      data-path="api/auth/set-name"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-set-name', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-set-name"
                    onclick="tryItOut('POSTapi-auth-set-name');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-set-name"
                    onclick="cancelTryOut('POSTapi-auth-set-name');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-set-name"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/set-name</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-set-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-set-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>firstname</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="firstname"                data-endpoint="POSTapi-auth-set-name"
               value="odit"
               data-component="body">
    <br>
<p>Example: <code>odit</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lastname</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="lastname"                data-endpoint="POSTapi-auth-set-name"
               value="dignissimos"
               data-component="body">
    <br>
<p>Example: <code>dignissimos</code></p>
        </div>
        </form>

                <h1 id="cart">Cart</h1>

    

                                <h2 id="cart-POSTapi-cart-check">Cart Check</h2>

<p>
    </p>



<span id="example-requests-POSTapi-cart-check">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/cart/check"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"products\": [
        \"rem\"
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/cart/check"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "products": [
        "rem"
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-cart-check">
</span>
<span id="execution-results-POSTapi-cart-check" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-cart-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cart-check"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cart-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-cart-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cart-check" data-method="POST"
      data-path="api/cart/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cart-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cart-check"
                    onclick="tryItOut('POSTapi-cart-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cart-check"
                    onclick="cancelTryOut('POSTapi-cart-check');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cart-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cart/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cart-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cart-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <details>
                <summary style="padding-bottom: 10px;">
                    <b style="line-height: 2;"><code>products</code></b>&nbsp;&nbsp;
    <small>integer[]</small>
&nbsp;
 &nbsp;
<br>

                </summary>
                                                            <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="products.0.product_id"                data-endpoint="POSTapi-cart-check"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
                        </div>
                                                                                <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>product_quantity</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="products.0.product_quantity"                data-endpoint="POSTapi-cart-check"
               value="2"
               data-component="body">
    <br>
<p>Значение поля value должно быть не меньше 1. Example: <code>2</code></p>
                        </div>
                                                </details>
        </div>
        </form>

                <h1 id="category">Category</h1>

    

                                <h2 id="category-DELETEapi-category-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-category-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/category/delete/nostrum"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/category/delete/nostrum"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-category-delete--id-">
</span>
<span id="execution-results-DELETEapi-category-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-category-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-category-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-category-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-category-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-category-delete--id-" data-method="DELETE"
      data-path="api/category/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-category-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-category-delete--id-"
                    onclick="tryItOut('DELETEapi-category-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-category-delete--id-"
                    onclick="cancelTryOut('DELETEapi-category-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-category-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/category/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-category-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-category-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-category-delete--id-"
               value="nostrum"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>nostrum</code></p>
            </div>
                    </form>

                    <h2 id="category-POSTapi-category-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-category-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/category/store"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                    --form "name_ru=aut"                \
                                            --form "name_kz=soluta"                \
                                            --form "name_en=aut"                \
                                                --form "desktop_image=@/tmp/phpxVwfX4"                 \
                                            --form "mobile_image=@/tmp/phppPPTrV"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/category/store"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                        body.append('name_ru', 'aut');
                                body.append('name_kz', 'soluta');
                                body.append('name_en', 'aut');
                                    body.append('desktop_image', document.querySelector('input[name="desktop_image"]').files[0]);
                                body.append('mobile_image', document.querySelector('input[name="mobile_image"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-category-store">
</span>
<span id="execution-results-POSTapi-category-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-category-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-category-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-category-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-category-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-category-store" data-method="POST"
      data-path="api/category/store"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-category-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-category-store"
                    onclick="tryItOut('POSTapi-category-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-category-store"
                    onclick="cancelTryOut('POSTapi-category-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-category-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/category/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-category-store"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-category-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desktop_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="desktop_image"                data-endpoint="POSTapi-category-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpxVwfX4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mobile_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="mobile_image"                data-endpoint="POSTapi-category-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phppPPTrV</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-category-store"
               value="aut"
               data-component="body">
    <br>
<p>Example: <code>aut</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-category-store"
               value="soluta"
               data-component="body">
    <br>
<p>Example: <code>soluta</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_en</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_en"                data-endpoint="POSTapi-category-store"
               value="aut"
               data-component="body">
    <br>
<p>Example: <code>aut</code></p>
        </div>
        </form>

                    <h2 id="category-POSTapi-category-update--id-">Обновление</h2>

<p>
    </p>



<span id="example-requests-POSTapi-category-update--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/category/update/facilis"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                    --form "name_ru=et"                \
                                            --form "name_kz=ea"                \
                                                --form "desktop_image=@/tmp/phpMXPgBt"                 \
                                            --form "mobile_image=@/tmp/phpfD1HnE"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/category/update/facilis"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                        body.append('name_ru', 'et');
                                body.append('name_kz', 'ea');
                                    body.append('desktop_image', document.querySelector('input[name="desktop_image"]').files[0]);
                                body.append('mobile_image', document.querySelector('input[name="mobile_image"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-category-update--id-">
</span>
<span id="execution-results-POSTapi-category-update--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-category-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-category-update--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-category-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-category-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-category-update--id-" data-method="POST"
      data-path="api/category/update/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-category-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-category-update--id-"
                    onclick="tryItOut('POSTapi-category-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-category-update--id-"
                    onclick="cancelTryOut('POSTapi-category-update--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-category-update--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/category/update/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-category-update--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-category-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-category-update--id-"
               value="facilis"
               data-component="url">
    <br>
<p>The ID of the update. Example: <code>facilis</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desktop_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="desktop_image"                data-endpoint="POSTapi-category-update--id-"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpMXPgBt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mobile_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="mobile_image"                data-endpoint="POSTapi-category-update--id-"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpfD1HnE</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-category-update--id-"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-category-update--id-"
               value="ea"
               data-component="body">
    <br>
<p>Example: <code>ea</code></p>
        </div>
        </form>

                    <h2 id="category-GETapi-category-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-category-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/category/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"perPage\": 15,
    \"page\": 7
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/category/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "perPage": 15,
    "page": 7
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-category-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 46
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;total&quot;: 14,
        &quot;total_pages&quot;: 2,
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;desktop_image_url&quot;: &quot;/storage/categories/apple.svg&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/fruits_and_vegetables_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Фрукты и овощи&quot;,
                &quot;name_kz&quot;: &quot;Жеміс және тамақтық нәрселер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;desktop_image_url&quot;: &quot;/storage/categories/drumstick.svg&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/meat_products_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Мясная продукция&quot;,
                &quot;name_kz&quot;: &quot;Мақта өнімдері&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;desktop_image_url&quot;: &quot;/storage/categories/fish.svg&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/fish_and_seafood_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Рыба и морепродукты&quot;,
                &quot;name_kz&quot;: &quot;Балық және деуінділер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;desktop_image_url&quot;: &quot;/storage/categories/milk.svg&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/milk_cheese_butter_eggs_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Молоко, сыр, масло, яйца&quot;,
                &quot;name_kz&quot;: &quot;Сүт, сыр, мас, жұмыртқа&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;desktop_image_url&quot;: &quot;/storage/categories/bagguette.svg&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/bread_and_pastries_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Хлеб и выпечка&quot;,
                &quot;name_kz&quot;: &quot;Нан, нан өнімдері&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;desktop_image_url&quot;: &quot;/storage/categories/drink.svg&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/drinks_and_juices_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Напитки и соки&quot;,
                &quot;name_kz&quot;: &quot;Сусындар және шырындар&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 7,
                &quot;desktop_image_url&quot;: &quot;&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/cereals_and_canned_foods_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Крупы и консервы&quot;,
                &quot;name_kz&quot;: &quot;Жармалар мен консервілер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 8,
                &quot;desktop_image_url&quot;: &quot;&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/greens_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Зелень&quot;,
                &quot;name_kz&quot;: &quot;Көкөністер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 9,
                &quot;desktop_image_url&quot;: &quot;&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/ready_meals_and_snacks_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Готовая еда и снэки&quot;,
                &quot;name_kz&quot;: &quot;Дайын тағамдар мен снэктер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 10,
                &quot;desktop_image_url&quot;: &quot;&quot;,
                &quot;mobile_image_url&quot;: &quot;/storage/categories/culinary_mobile.png&quot;,
                &quot;name_ru&quot;: &quot;Кулинария&quot;,
                &quot;name_kz&quot;: &quot;Аспаздық өнімдер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            }
        ]
    },
    &quot;message&quot;: &quot;Список категорий успешно загружен!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-category-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-category-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-category-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-category-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-category-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-category-index" data-method="GET"
      data-path="api/category/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-category-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-category-index"
                    onclick="tryItOut('GETapi-category-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-category-index"
                    onclick="cancelTryOut('GETapi-category-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-category-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/category/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-category-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-category-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="perPage"                data-endpoint="GETapi-category-index"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="page"                data-endpoint="GETapi-category-index"
               value="7"
               data-component="body">
    <br>
<p>Example: <code>7</code></p>
        </div>
        </form>

                    <h2 id="category-GETapi-category-show--id-">Элемент</h2>

<p>
    </p>



<span id="example-requests-GETapi-category-show--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/category/show/quibusdam"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/category/show/quibusdam"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-category-show--id-">
                    <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 45
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;App\\Http\\Controllers\\Category\\CategoryShowController::__invoke(): Argument #1 ($id) must be of type int, string given, called in /var/www/vendor/laravel/framework/src/Illuminate/Routing/Controller.php on line 54&quot;,
    &quot;exception&quot;: &quot;TypeError&quot;,
    &quot;file&quot;: &quot;/var/www/app/Http/Controllers/Category/CategoryShowController.php&quot;,
    &quot;line&quot;: 19,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\Category\\CategoryShowController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php&quot;,
            &quot;line&quot;: 43,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 260,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 205,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 806,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 159,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 135,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 87,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 807,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 784,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 748,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 737,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 200,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 99,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php&quot;,
            &quot;line&quot;: 62,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 175,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 300,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 91,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 236,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 166,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 95,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 125,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 72,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 53,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 211,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 326,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 181,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 1096,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 324,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 175,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 201,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-category-show--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-category-show--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-category-show--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-category-show--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-category-show--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-category-show--id-" data-method="GET"
      data-path="api/category/show/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-category-show--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-category-show--id-"
                    onclick="tryItOut('GETapi-category-show--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-category-show--id-"
                    onclick="cancelTryOut('GETapi-category-show--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-category-show--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/category/show/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-category-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-category-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-category-show--id-"
               value="quibusdam"
               data-component="url">
    <br>
<p>The ID of the show. Example: <code>quibusdam</code></p>
            </div>
                    </form>

                <h1 id="city">City</h1>

    

                                <h2 id="city-GETapi-city-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-city-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/city/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/city/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-city-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 35
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Актобе&quot;,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
        }
    ],
    &quot;message&quot;: &quot;Баннеры успешно загружены!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-city-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-city-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-city-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-city-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-city-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-city-index" data-method="GET"
      data-path="api/city/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-city-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-city-index"
                    onclick="tryItOut('GETapi-city-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-city-index"
                    onclick="cancelTryOut('GETapi-city-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-city-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/city/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-city-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-city-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="deliveryinterval">DeliveryInterval</h1>

    

                                <h2 id="deliveryinterval-DELETEapi-delivery-interval-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-delivery-interval-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/delivery-interval/delete/eius"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/delivery-interval/delete/eius"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-delivery-interval-delete--id-">
</span>
<span id="execution-results-DELETEapi-delivery-interval-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-delivery-interval-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-delivery-interval-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-delivery-interval-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-delivery-interval-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-delivery-interval-delete--id-" data-method="DELETE"
      data-path="api/delivery-interval/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-delivery-interval-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-delivery-interval-delete--id-"
                    onclick="tryItOut('DELETEapi-delivery-interval-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-delivery-interval-delete--id-"
                    onclick="cancelTryOut('DELETEapi-delivery-interval-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-delivery-interval-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/delivery-interval/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-delivery-interval-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-delivery-interval-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-delivery-interval-delete--id-"
               value="eius"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>eius</code></p>
            </div>
                    </form>

                    <h2 id="deliveryinterval-POSTapi-delivery-interval-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-delivery-interval-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/delivery-interval/store"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"name\": \"dolores\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/delivery-interval/store"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "name": "dolores"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-delivery-interval-store">
</span>
<span id="execution-results-POSTapi-delivery-interval-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-delivery-interval-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-delivery-interval-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-delivery-interval-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-delivery-interval-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-delivery-interval-store" data-method="POST"
      data-path="api/delivery-interval/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-delivery-interval-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-delivery-interval-store"
                    onclick="tryItOut('POSTapi-delivery-interval-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-delivery-interval-store"
                    onclick="cancelTryOut('POSTapi-delivery-interval-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-delivery-interval-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/delivery-interval/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-delivery-interval-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-delivery-interval-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-delivery-interval-store"
               value="dolores"
               data-component="body">
    <br>
<p>Example: <code>dolores</code></p>
        </div>
        </form>

                    <h2 id="deliveryinterval-POSTapi-delivery-interval-update--id-">Обновление</h2>

<p>
    </p>



<span id="example-requests-POSTapi-delivery-interval-update--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/delivery-interval/update/nam"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"name\": \"et\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/delivery-interval/update/nam"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "name": "et"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-delivery-interval-update--id-">
</span>
<span id="execution-results-POSTapi-delivery-interval-update--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-delivery-interval-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-delivery-interval-update--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-delivery-interval-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-delivery-interval-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-delivery-interval-update--id-" data-method="POST"
      data-path="api/delivery-interval/update/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-delivery-interval-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-delivery-interval-update--id-"
                    onclick="tryItOut('POSTapi-delivery-interval-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-delivery-interval-update--id-"
                    onclick="cancelTryOut('POSTapi-delivery-interval-update--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-delivery-interval-update--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/delivery-interval/update/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-delivery-interval-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-delivery-interval-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-delivery-interval-update--id-"
               value="nam"
               data-component="url">
    <br>
<p>The ID of the update. Example: <code>nam</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-delivery-interval-update--id-"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
        </form>

                    <h2 id="deliveryinterval-GETapi-delivery-interval-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-delivery-interval-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/delivery-interval/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/delivery-interval/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-delivery-interval-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 44
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;delivery_intervals&quot;: {
            &quot;2025-01-29&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;07:00 - 10:00&quot;,
                    &quot;start_time&quot;: &quot;07:00&quot;,
                    &quot;end_time&quot;: &quot;10:00&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;10:00 - 13:00&quot;,
                    &quot;start_time&quot;: &quot;10:00&quot;,
                    &quot;end_time&quot;: &quot;13:00&quot;
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;13:00 - 16:00&quot;,
                    &quot;start_time&quot;: &quot;13:00&quot;,
                    &quot;end_time&quot;: &quot;16:00&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;16:00 - 19:00&quot;,
                    &quot;start_time&quot;: &quot;16:00&quot;,
                    &quot;end_time&quot;: &quot;19:00&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;19:00 - 22:00&quot;,
                    &quot;start_time&quot;: &quot;19:00&quot;,
                    &quot;end_time&quot;: &quot;22:00&quot;
                }
            ],
            &quot;2025-01-30&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;07:00 - 10:00&quot;,
                    &quot;start_time&quot;: &quot;07:00&quot;,
                    &quot;end_time&quot;: &quot;10:00&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;10:00 - 13:00&quot;,
                    &quot;start_time&quot;: &quot;10:00&quot;,
                    &quot;end_time&quot;: &quot;13:00&quot;
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;13:00 - 16:00&quot;,
                    &quot;start_time&quot;: &quot;13:00&quot;,
                    &quot;end_time&quot;: &quot;16:00&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;16:00 - 19:00&quot;,
                    &quot;start_time&quot;: &quot;16:00&quot;,
                    &quot;end_time&quot;: &quot;19:00&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;19:00 - 22:00&quot;,
                    &quot;start_time&quot;: &quot;19:00&quot;,
                    &quot;end_time&quot;: &quot;22:00&quot;
                }
            ]
        },
        &quot;current_time&quot;: &quot;2025-01-28 19:23:58&quot;
    },
    &quot;message&quot;: &quot;Список временных интервалов успешно загружен.&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-delivery-interval-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-delivery-interval-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-delivery-interval-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-delivery-interval-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-delivery-interval-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-delivery-interval-index" data-method="GET"
      data-path="api/delivery-interval/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-delivery-interval-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-delivery-interval-index"
                    onclick="tryItOut('GETapi-delivery-interval-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-delivery-interval-index"
                    onclick="cancelTryOut('GETapi-delivery-interval-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-delivery-interval-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/delivery-interval/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-delivery-interval-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-delivery-interval-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="desktopbanner">DesktopBanner</h1>

    

                                <h2 id="desktopbanner-POSTapi-desktop-banner-update">Изменение порядка баннеров</h2>

<p>
    </p>



<span id="example-requests-POSTapi-desktop-banner-update">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/desktop-banner/update"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"banners\": [
        \"ut\"
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/desktop-banner/update"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "banners": [
        "ut"
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-desktop-banner-update">
</span>
<span id="execution-results-POSTapi-desktop-banner-update" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-desktop-banner-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-desktop-banner-update"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-desktop-banner-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-desktop-banner-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-desktop-banner-update" data-method="POST"
      data-path="api/desktop-banner/update"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-desktop-banner-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-desktop-banner-update"
                    onclick="tryItOut('POSTapi-desktop-banner-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-desktop-banner-update"
                    onclick="cancelTryOut('POSTapi-desktop-banner-update');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-desktop-banner-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/desktop-banner/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-desktop-banner-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-desktop-banner-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <details>
                <summary style="padding-bottom: 10px;">
                    <b style="line-height: 2;"><code>banners</code></b>&nbsp;&nbsp;
    <small>string[]</small>
&nbsp;
 &nbsp;
<br>

                </summary>
                                                            <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="banners.0.id"                data-endpoint="POSTapi-desktop-banner-update"
               value="non"
               data-component="body">
    <br>
<p>Example: <code>non</code></p>
                        </div>
                                                                                <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>number</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="banners.0.number"                data-endpoint="POSTapi-desktop-banner-update"
               value="9"
               data-component="body">
    <br>
<p>Example: <code>9</code></p>
                        </div>
                                                </details>
        </div>
        </form>

                    <h2 id="desktopbanner-POSTapi-desktop-banner-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-desktop-banner-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/desktop-banner/store"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                        --form "ru_image=@/tmp/php8erokZ"                 \
                                            --form "kz_image=@/tmp/phpBT5vTi"                 \
                                            --form "en_image=@/tmp/phpsnU39Y"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/desktop-banner/store"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                            body.append('ru_image', document.querySelector('input[name="ru_image"]').files[0]);
                                body.append('kz_image', document.querySelector('input[name="kz_image"]').files[0]);
                                body.append('en_image', document.querySelector('input[name="en_image"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-desktop-banner-store">
</span>
<span id="execution-results-POSTapi-desktop-banner-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-desktop-banner-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-desktop-banner-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-desktop-banner-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-desktop-banner-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-desktop-banner-store" data-method="POST"
      data-path="api/desktop-banner/store"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-desktop-banner-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-desktop-banner-store"
                    onclick="tryItOut('POSTapi-desktop-banner-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-desktop-banner-store"
                    onclick="cancelTryOut('POSTapi-desktop-banner-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-desktop-banner-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/desktop-banner/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-desktop-banner-store"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-desktop-banner-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ru_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="ru_image"                data-endpoint="POSTapi-desktop-banner-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/php8erokZ</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kz_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="kz_image"                data-endpoint="POSTapi-desktop-banner-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpBT5vTi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>en_image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="en_image"                data-endpoint="POSTapi-desktop-banner-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpsnU39Y</code></p>
        </div>
        </form>

                    <h2 id="desktopbanner-DELETEapi-desktop-banner-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-desktop-banner-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/desktop-banner/delete/deleniti"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/desktop-banner/delete/deleniti"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-desktop-banner-delete--id-">
</span>
<span id="execution-results-DELETEapi-desktop-banner-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-desktop-banner-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-desktop-banner-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-desktop-banner-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-desktop-banner-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-desktop-banner-delete--id-" data-method="DELETE"
      data-path="api/desktop-banner/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-desktop-banner-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-desktop-banner-delete--id-"
                    onclick="tryItOut('DELETEapi-desktop-banner-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-desktop-banner-delete--id-"
                    onclick="cancelTryOut('DELETEapi-desktop-banner-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-desktop-banner-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/desktop-banner/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-desktop-banner-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-desktop-banner-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-desktop-banner-delete--id-"
               value="deleniti"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>deleniti</code></p>
            </div>
                    </form>

                    <h2 id="desktopbanner-GETapi-desktop-banner-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-desktop-banner-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/desktop-banner/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/desktop-banner/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-desktop-banner-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 38
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;image_url_ru&quot;: &quot;/storage/desktop-banners/2_ru.png&quot;,
            &quot;image_url_kz&quot;: &quot;/storage/desktop-banners/2_kz.png&quot;,
            &quot;image_url_en&quot;: &quot;/storage/desktop-banners/2_en.png&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;image_url_ru&quot;: &quot;/storage/desktop-banners/3_ru.png&quot;,
            &quot;image_url_kz&quot;: &quot;/storage/desktop-banners/3_kz.png&quot;,
            &quot;image_url_en&quot;: &quot;/storage/desktop-banners/3_en.png&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;image_url_ru&quot;: &quot;/storage/desktop-banners/4_ru.png&quot;,
            &quot;image_url_kz&quot;: &quot;/storage/desktop-banners/4_kz.png&quot;,
            &quot;image_url_en&quot;: &quot;/storage/desktop-banners/4_en.png&quot;,
            &quot;number&quot;: 3,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;image_url_ru&quot;: &quot;/storage/desktop-banners/5_ru.png&quot;,
            &quot;image_url_kz&quot;: &quot;/storage/desktop-banners/5_kz.png&quot;,
            &quot;image_url_en&quot;: &quot;/storage/desktop-banners/5_en.png&quot;,
            &quot;number&quot;: 4,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        }
    ],
    &quot;message&quot;: &quot;Баннеры успешно загружены!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-desktop-banner-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-desktop-banner-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-desktop-banner-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-desktop-banner-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-desktop-banner-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-desktop-banner-index" data-method="GET"
      data-path="api/desktop-banner/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-desktop-banner-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-desktop-banner-index"
                    onclick="tryItOut('GETapi-desktop-banner-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-desktop-banner-index"
                    onclick="cancelTryOut('GETapi-desktop-banner-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-desktop-banner-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/desktop-banner/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-desktop-banner-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-desktop-banner-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-notification-send">POST api/notification/send</h2>

<p>
    </p>



<span id="example-requests-POSTapi-notification-send">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/notification/send"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/notification/send"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-notification-send">
</span>
<span id="execution-results-POSTapi-notification-send" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-notification-send"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-notification-send"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-notification-send" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-notification-send">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-notification-send" data-method="POST"
      data-path="api/notification/send"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-notification-send', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-notification-send"
                    onclick="tryItOut('POSTapi-notification-send');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-notification-send"
                    onclick="cancelTryOut('POSTapi-notification-send');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-notification-send"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/notification/send</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-notification-send"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-notification-send"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-warehouseman-accept">Закрепление заказа за складским работником</h2>

<p>
    </p>



<span id="example-requests-POSTapi-warehouseman-accept">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/warehouseman/accept"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"order_id\": 13
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouseman/accept"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "order_id": 13
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-warehouseman-accept">
</span>
<span id="execution-results-POSTapi-warehouseman-accept" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-warehouseman-accept"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-warehouseman-accept"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-warehouseman-accept" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-warehouseman-accept">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-warehouseman-accept" data-method="POST"
      data-path="api/warehouseman/accept"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-warehouseman-accept', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-warehouseman-accept"
                    onclick="tryItOut('POSTapi-warehouseman-accept');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-warehouseman-accept"
                    onclick="cancelTryOut('POSTapi-warehouseman-accept');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-warehouseman-accept"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/warehouseman/accept</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-warehouseman-accept"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-warehouseman-accept"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="order_id"                data-endpoint="POSTapi-warehouseman-accept"
               value="13"
               data-component="body">
    <br>
<p>Example: <code>13</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-warehouseman-complete">Завершение заказа складским работником</h2>

<p>
    </p>



<span id="example-requests-POSTapi-warehouseman-complete">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/warehouseman/complete"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"order_id\": 11
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouseman/complete"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "order_id": 11
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-warehouseman-complete">
</span>
<span id="execution-results-POSTapi-warehouseman-complete" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-warehouseman-complete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-warehouseman-complete"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-warehouseman-complete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-warehouseman-complete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-warehouseman-complete" data-method="POST"
      data-path="api/warehouseman/complete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-warehouseman-complete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-warehouseman-complete"
                    onclick="tryItOut('POSTapi-warehouseman-complete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-warehouseman-complete"
                    onclick="cancelTryOut('POSTapi-warehouseman-complete');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-warehouseman-complete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/warehouseman/complete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-warehouseman-complete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-warehouseman-complete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="order_id"                data-endpoint="POSTapi-warehouseman-complete"
               value="11"
               data-component="body">
    <br>
<p>Example: <code>11</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-courier-get-current-orders">GET api/courier/get-current-orders</h2>

<p>
    </p>



<span id="example-requests-GETapi-courier-get-current-orders">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/courier/get-current-orders"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/courier/get-current-orders"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-courier-get-current-orders">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-courier-get-current-orders" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-courier-get-current-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-courier-get-current-orders"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-courier-get-current-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-courier-get-current-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-courier-get-current-orders" data-method="GET"
      data-path="api/courier/get-current-orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-courier-get-current-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-courier-get-current-orders"
                    onclick="tryItOut('GETapi-courier-get-current-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-courier-get-current-orders"
                    onclick="cancelTryOut('GETapi-courier-get-current-orders');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-courier-get-current-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/courier/get-current-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-courier-get-current-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-courier-get-current-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-courier-complete-order">POST api/courier/complete-order</h2>

<p>
    </p>



<span id="example-requests-POSTapi-courier-complete-order">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/courier/complete-order"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"order_id\": \"facere\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/courier/complete-order"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "order_id": "facere"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-courier-complete-order">
</span>
<span id="execution-results-POSTapi-courier-complete-order" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-courier-complete-order"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-courier-complete-order"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-courier-complete-order" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-courier-complete-order">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-courier-complete-order" data-method="POST"
      data-path="api/courier/complete-order"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-courier-complete-order', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-courier-complete-order"
                    onclick="tryItOut('POSTapi-courier-complete-order');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-courier-complete-order"
                    onclick="cancelTryOut('POSTapi-courier-complete-order');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-courier-complete-order"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/courier/complete-order</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-courier-complete-order"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-courier-complete-order"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="POSTapi-courier-complete-order"
               value="facere"
               data-component="body">
    <br>
<p>Example: <code>facere</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-courier-accept-order">POST api/courier/accept-order</h2>

<p>
    </p>



<span id="example-requests-POSTapi-courier-accept-order">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/courier/accept-order"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"order_id\": \"molestias\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/courier/accept-order"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "order_id": "molestias"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-courier-accept-order">
</span>
<span id="execution-results-POSTapi-courier-accept-order" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-courier-accept-order"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-courier-accept-order"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-courier-accept-order" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-courier-accept-order">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-courier-accept-order" data-method="POST"
      data-path="api/courier/accept-order"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-courier-accept-order', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-courier-accept-order"
                    onclick="tryItOut('POSTapi-courier-accept-order');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-courier-accept-order"
                    onclick="cancelTryOut('POSTapi-courier-accept-order');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-courier-accept-order"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/courier/accept-order</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-courier-accept-order"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-courier-accept-order"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="POSTapi-courier-accept-order"
               value="molestias"
               data-component="body">
    <br>
<p>Example: <code>molestias</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-dispatcher-get-unassigned-orders">GET api/dispatcher/get-unassigned-orders</h2>

<p>
    </p>



<span id="example-requests-GETapi-dispatcher-get-unassigned-orders">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/dispatcher/get-unassigned-orders"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/dispatcher/get-unassigned-orders"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-dispatcher-get-unassigned-orders">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-dispatcher-get-unassigned-orders" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-dispatcher-get-unassigned-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dispatcher-get-unassigned-orders"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dispatcher-get-unassigned-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-dispatcher-get-unassigned-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dispatcher-get-unassigned-orders" data-method="GET"
      data-path="api/dispatcher/get-unassigned-orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dispatcher-get-unassigned-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dispatcher-get-unassigned-orders"
                    onclick="tryItOut('GETapi-dispatcher-get-unassigned-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dispatcher-get-unassigned-orders"
                    onclick="cancelTryOut('GETapi-dispatcher-get-unassigned-orders');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dispatcher-get-unassigned-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dispatcher/get-unassigned-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dispatcher-get-unassigned-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dispatcher-get-unassigned-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dispatcher-get-assigned-orders">GET api/dispatcher/get-assigned-orders</h2>

<p>
    </p>



<span id="example-requests-GETapi-dispatcher-get-assigned-orders">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/dispatcher/get-assigned-orders"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/dispatcher/get-assigned-orders"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-dispatcher-get-assigned-orders">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-dispatcher-get-assigned-orders" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-dispatcher-get-assigned-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dispatcher-get-assigned-orders"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dispatcher-get-assigned-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-dispatcher-get-assigned-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dispatcher-get-assigned-orders" data-method="GET"
      data-path="api/dispatcher/get-assigned-orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dispatcher-get-assigned-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dispatcher-get-assigned-orders"
                    onclick="tryItOut('GETapi-dispatcher-get-assigned-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dispatcher-get-assigned-orders"
                    onclick="cancelTryOut('GETapi-dispatcher-get-assigned-orders');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dispatcher-get-assigned-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dispatcher/get-assigned-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dispatcher-get-assigned-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dispatcher-get-assigned-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dispatcher-get-couriers">GET api/dispatcher/get-couriers</h2>

<p>
    </p>



<span id="example-requests-GETapi-dispatcher-get-couriers">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/dispatcher/get-couriers"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/dispatcher/get-couriers"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-dispatcher-get-couriers">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-dispatcher-get-couriers" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-dispatcher-get-couriers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dispatcher-get-couriers"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dispatcher-get-couriers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-dispatcher-get-couriers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dispatcher-get-couriers" data-method="GET"
      data-path="api/dispatcher/get-couriers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dispatcher-get-couriers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dispatcher-get-couriers"
                    onclick="tryItOut('GETapi-dispatcher-get-couriers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dispatcher-get-couriers"
                    onclick="cancelTryOut('GETapi-dispatcher-get-couriers');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dispatcher-get-couriers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dispatcher/get-couriers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dispatcher-get-couriers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dispatcher-get-couriers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-dispatcher-assign-orders">POST api/dispatcher/assign-orders</h2>

<p>
    </p>



<span id="example-requests-POSTapi-dispatcher-assign-orders">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/dispatcher/assign-orders"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"user_id\": \"nobis\",
    \"order_ids\": [
        \"ut\"
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/dispatcher/assign-orders"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "user_id": "nobis",
    "order_ids": [
        "ut"
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-dispatcher-assign-orders">
</span>
<span id="execution-results-POSTapi-dispatcher-assign-orders" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-dispatcher-assign-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dispatcher-assign-orders"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dispatcher-assign-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-dispatcher-assign-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dispatcher-assign-orders" data-method="POST"
      data-path="api/dispatcher/assign-orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dispatcher-assign-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dispatcher-assign-orders"
                    onclick="tryItOut('POSTapi-dispatcher-assign-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dispatcher-assign-orders"
                    onclick="cancelTryOut('POSTapi-dispatcher-assign-orders');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dispatcher-assign-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dispatcher/assign-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dispatcher-assign-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dispatcher-assign-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="POSTapi-dispatcher-assign-orders"
               value="nobis"
               data-component="body">
    <br>
<p>Example: <code>nobis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_ids</code></b>&nbsp;&nbsp;
    <small>string[]</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_ids[0]"                data-endpoint="POSTapi-dispatcher-assign-orders"
               data-component="body">
        <input type="text" style="display: none"
               name="order_ids[1]"                data-endpoint="POSTapi-dispatcher-assign-orders"
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-POSTapi-dispatcher-unassign-orders">POST api/dispatcher/unassign-orders</h2>

<p>
    </p>



<span id="example-requests-POSTapi-dispatcher-unassign-orders">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/dispatcher/unassign-orders"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"user_id\": \"labore\",
    \"order_ids\": [
        \"et\"
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/dispatcher/unassign-orders"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "user_id": "labore",
    "order_ids": [
        "et"
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-dispatcher-unassign-orders">
</span>
<span id="execution-results-POSTapi-dispatcher-unassign-orders" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-dispatcher-unassign-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dispatcher-unassign-orders"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dispatcher-unassign-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-dispatcher-unassign-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dispatcher-unassign-orders" data-method="POST"
      data-path="api/dispatcher/unassign-orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dispatcher-unassign-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dispatcher-unassign-orders"
                    onclick="tryItOut('POSTapi-dispatcher-unassign-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dispatcher-unassign-orders"
                    onclick="cancelTryOut('POSTapi-dispatcher-unassign-orders');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dispatcher-unassign-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dispatcher/unassign-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dispatcher-unassign-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dispatcher-unassign-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="POSTapi-dispatcher-unassign-orders"
               value="labore"
               data-component="body">
    <br>
<p>Example: <code>labore</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_ids</code></b>&nbsp;&nbsp;
    <small>string[]</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_ids[0]"                data-endpoint="POSTapi-dispatcher-unassign-orders"
               data-component="body">
        <input type="text" style="display: none"
               name="order_ids[1]"                data-endpoint="POSTapi-dispatcher-unassign-orders"
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-POSTapi-test">POST api/test</h2>

<p>
    </p>



<span id="example-requests-POSTapi-test">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/test"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/test"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-test">
</span>
<span id="execution-results-POSTapi-test" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-test"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-test"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-test" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-test">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-test" data-method="POST"
      data-path="api/test"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-test', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-test"
                    onclick="tryItOut('POSTapi-test');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-test"
                    onclick="cancelTryOut('POSTapi-test');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-test"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/test</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-test"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-test"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-point-index">GET api/point/index</h2>

<p>
    </p>



<span id="example-requests-GETapi-point-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/point/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"city_id\": 6
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/point/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "city_id": 6
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-point-index">
                    <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 34
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Значение поля city id не существует.&quot;,
    &quot;errors&quot;: {
        &quot;city_id&quot;: [
            &quot;Значение поля city id не существует.&quot;
        ]
    }
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-point-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-point-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-point-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-point-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-point-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-point-index" data-method="GET"
      data-path="api/point/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-point-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-point-index"
                    onclick="tryItOut('GETapi-point-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-point-index"
                    onclick="cancelTryOut('GETapi-point-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-point-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/point/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-point-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-point-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="city_id"                data-endpoint="GETapi-point-index"
               value="6"
               data-component="body">
    <br>
<p>Example: <code>6</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-user-delete">DELETE api/user/delete</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-user-delete">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/user/delete"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/user/delete"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-user-delete">
</span>
<span id="execution-results-DELETEapi-user-delete" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-user-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-user-delete"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-user-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-user-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-user-delete" data-method="DELETE"
      data-path="api/user/delete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-user-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-user-delete"
                    onclick="tryItOut('DELETEapi-user-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-user-delete"
                    onclick="cancelTryOut('DELETEapi-user-delete');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-user-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/user/delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-user-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-user-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-warehouse-search">GET api/warehouse/search</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouse-search">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouse/search"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/search"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouse-search">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouse-search" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouse-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouse-search"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouse-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouse-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouse-search" data-method="GET"
      data-path="api/warehouse/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouse-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouse-search"
                    onclick="tryItOut('GETapi-warehouse-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouse-search"
                    onclick="cancelTryOut('GETapi-warehouse-search');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouse-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouse/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouse-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouse-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-warehouse-create-product">POST api/warehouse/create-product</h2>

<p>
    </p>



<span id="example-requests-POSTapi-warehouse-create-product">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/warehouse/create-product"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"subcategory_id\": \"doloremque\",
    \"manufacturer\": \"rerum\",
    \"where\": \"dolorem\",
    \"name_ru\": \"voluptatem\",
    \"name_kz\": \"facere\",
    \"description_ru\": \"a\",
    \"description_kz\": \"necessitatibus\",
    \"weight\": \"dignissimos\",
    \"calories\": 41837003.9142,
    \"proteins\": 15964303.22,
    \"fats\": 0.514334,
    \"carbohydrates\": 202.0734,
    \"price\": 18,
    \"discount\": 20,
    \"price_with_discount\": 4,
    \"total_sales\": 11,
    \"amount\": 22,
    \"is_active\": true
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/create-product"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "subcategory_id": "doloremque",
    "manufacturer": "rerum",
    "where": "dolorem",
    "name_ru": "voluptatem",
    "name_kz": "facere",
    "description_ru": "a",
    "description_kz": "necessitatibus",
    "weight": "dignissimos",
    "calories": 41837003.9142,
    "proteins": 15964303.22,
    "fats": 0.514334,
    "carbohydrates": 202.0734,
    "price": 18,
    "discount": 20,
    "price_with_discount": 4,
    "total_sales": 11,
    "amount": 22,
    "is_active": true
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-warehouse-create-product">
</span>
<span id="execution-results-POSTapi-warehouse-create-product" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-warehouse-create-product"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-warehouse-create-product"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-warehouse-create-product" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-warehouse-create-product">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-warehouse-create-product" data-method="POST"
      data-path="api/warehouse/create-product"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-warehouse-create-product', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-warehouse-create-product"
                    onclick="tryItOut('POSTapi-warehouse-create-product');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-warehouse-create-product"
                    onclick="cancelTryOut('POSTapi-warehouse-create-product');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-warehouse-create-product"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/warehouse/create-product</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-warehouse-create-product"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-warehouse-create-product"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subcategory_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="subcategory_id"                data-endpoint="POSTapi-warehouse-create-product"
               value="doloremque"
               data-component="body">
    <br>
<p>Example: <code>doloremque</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>manufacturer</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="manufacturer"                data-endpoint="POSTapi-warehouse-create-product"
               value="rerum"
               data-component="body">
    <br>
<p>Example: <code>rerum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>where</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="where"                data-endpoint="POSTapi-warehouse-create-product"
               value="dolorem"
               data-component="body">
    <br>
<p>Example: <code>dolorem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-warehouse-create-product"
               value="voluptatem"
               data-component="body">
    <br>
<p>Example: <code>voluptatem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-warehouse-create-product"
               value="facere"
               data-component="body">
    <br>
<p>Example: <code>facere</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description_ru"                data-endpoint="POSTapi-warehouse-create-product"
               value="a"
               data-component="body">
    <br>
<p>Example: <code>a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description_kz"                data-endpoint="POSTapi-warehouse-create-product"
               value="necessitatibus"
               data-component="body">
    <br>
<p>Example: <code>necessitatibus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>weight</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="weight"                data-endpoint="POSTapi-warehouse-create-product"
               value="dignissimos"
               data-component="body">
    <br>
<p>Example: <code>dignissimos</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>calories</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="calories"                data-endpoint="POSTapi-warehouse-create-product"
               value="41837003.9142"
               data-component="body">
    <br>
<p>Example: <code>41837003.9142</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>proteins</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="proteins"                data-endpoint="POSTapi-warehouse-create-product"
               value="15964303.22"
               data-component="body">
    <br>
<p>Example: <code>15964303.22</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fats</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="fats"                data-endpoint="POSTapi-warehouse-create-product"
               value="0.514334"
               data-component="body">
    <br>
<p>Example: <code>0.514334</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>carbohydrates</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="carbohydrates"                data-endpoint="POSTapi-warehouse-create-product"
               value="202.0734"
               data-component="body">
    <br>
<p>Example: <code>202.0734</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="price"                data-endpoint="POSTapi-warehouse-create-product"
               value="18"
               data-component="body">
    <br>
<p>Example: <code>18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>discount</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="discount"                data-endpoint="POSTapi-warehouse-create-product"
               value="20"
               data-component="body">
    <br>
<p>Example: <code>20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price_with_discount</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="price_with_discount"                data-endpoint="POSTapi-warehouse-create-product"
               value="4"
               data-component="body">
    <br>
<p>Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_sales</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="total_sales"                data-endpoint="POSTapi-warehouse-create-product"
               value="11"
               data-component="body">
    <br>
<p>Example: <code>11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="amount"                data-endpoint="POSTapi-warehouse-create-product"
               value="22"
               data-component="body">
    <br>
<p>Значение поля value должно быть не меньше 0. Example: <code>22</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
    <small>boolean</small>
&nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-warehouse-create-product" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-warehouse-create-product"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-warehouse-create-product" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-warehouse-create-product"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-warehouse-get-products">GET api/warehouse/get-products</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouse-get-products">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouse/get-products"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/get-products"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouse-get-products">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouse-get-products" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouse-get-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouse-get-products"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouse-get-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouse-get-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouse-get-products" data-method="GET"
      data-path="api/warehouse/get-products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouse-get-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouse-get-products"
                    onclick="tryItOut('GETapi-warehouse-get-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouse-get-products"
                    onclick="cancelTryOut('GETapi-warehouse-get-products');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouse-get-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouse/get-products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouse-get-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouse-get-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-warehouse-update-product--id-">PUT api/warehouse/update-product/{id}</h2>

<p>
    </p>



<span id="example-requests-PUTapi-warehouse-update-product--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
"https://api.abricoz.kz/api/warehouse/update-product/sint"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"manufacturer\": \"explicabo\",
    \"where\": \"saepe\",
    \"name_ru\": \"illum\",
    \"name_kz\": \"eaque\",
    \"description_ru\": \"suscipit\",
    \"description_kz\": \"cum\",
    \"weight\": \"temporibus\",
    \"calories\": 462.73,
    \"proteins\": 26801467.91,
    \"fats\": 2446364.3423865,
    \"carbohydrates\": 498,
    \"price\": 15,
    \"discount\": 19,
    \"price_with_discount\": 19,
    \"total_sales\": 15,
    \"amount\": 55,
    \"is_active\": false
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/update-product/sint"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "manufacturer": "explicabo",
    "where": "saepe",
    "name_ru": "illum",
    "name_kz": "eaque",
    "description_ru": "suscipit",
    "description_kz": "cum",
    "weight": "temporibus",
    "calories": 462.73,
    "proteins": 26801467.91,
    "fats": 2446364.3423865,
    "carbohydrates": 498,
    "price": 15,
    "discount": 19,
    "price_with_discount": 19,
    "total_sales": 15,
    "amount": 55,
    "is_active": false
};

fetch(url, {
method: "PUT",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-PUTapi-warehouse-update-product--id-">
</span>
<span id="execution-results-PUTapi-warehouse-update-product--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-PUTapi-warehouse-update-product--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-warehouse-update-product--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-warehouse-update-product--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-PUTapi-warehouse-update-product--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-warehouse-update-product--id-" data-method="PUT"
      data-path="api/warehouse/update-product/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-warehouse-update-product--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-warehouse-update-product--id-"
                    onclick="tryItOut('PUTapi-warehouse-update-product--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-warehouse-update-product--id-"
                    onclick="cancelTryOut('PUTapi-warehouse-update-product--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-warehouse-update-product--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/warehouse/update-product/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="sint"
               data-component="url">
    <br>
<p>The ID of the update product. Example: <code>sint</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subcategory_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="subcategory_id"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>manufacturer</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="manufacturer"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="explicabo"
               data-component="body">
    <br>
<p>Example: <code>explicabo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>where</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="where"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="saepe"
               data-component="body">
    <br>
<p>Example: <code>saepe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="illum"
               data-component="body">
    <br>
<p>Example: <code>illum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="eaque"
               data-component="body">
    <br>
<p>Example: <code>eaque</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="description_ru"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="suscipit"
               data-component="body">
    <br>
<p>Example: <code>suscipit</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="description_kz"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="cum"
               data-component="body">
    <br>
<p>Example: <code>cum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>weight</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="weight"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="temporibus"
               data-component="body">
    <br>
<p>Example: <code>temporibus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>calories</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="calories"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="462.73"
               data-component="body">
    <br>
<p>Example: <code>462.73</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>proteins</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="proteins"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="26801467.91"
               data-component="body">
    <br>
<p>Example: <code>26801467.91</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fats</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="fats"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="2446364.3423865"
               data-component="body">
    <br>
<p>Example: <code>2446364.3423865</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>carbohydrates</code></b>&nbsp;&nbsp;
    <small>number</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="carbohydrates"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="498"
               data-component="body">
    <br>
<p>Example: <code>498</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="price"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>discount</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="discount"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="19"
               data-component="body">
    <br>
<p>Example: <code>19</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price_with_discount</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="price_with_discount"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="19"
               data-component="body">
    <br>
<p>Example: <code>19</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_sales</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="total_sales"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="amount"                data-endpoint="PUTapi-warehouse-update-product--id-"
               value="55"
               data-component="body">
    <br>
<p>Значение поля value должно быть не меньше 0. Example: <code>55</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
    <small>boolean</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <label data-endpoint="PUTapi-warehouse-update-product--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-warehouse-update-product--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-warehouse-update-product--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-warehouse-update-product--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-warehouse-delete-product--id-">DELETE api/warehouse/delete-product/{id}</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-warehouse-delete-product--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/warehouse/delete-product/iure"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/delete-product/iure"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-warehouse-delete-product--id-">
</span>
<span id="execution-results-DELETEapi-warehouse-delete-product--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-warehouse-delete-product--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-warehouse-delete-product--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-warehouse-delete-product--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-warehouse-delete-product--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-warehouse-delete-product--id-" data-method="DELETE"
      data-path="api/warehouse/delete-product/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-warehouse-delete-product--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-warehouse-delete-product--id-"
                    onclick="tryItOut('DELETEapi-warehouse-delete-product--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-warehouse-delete-product--id-"
                    onclick="cancelTryOut('DELETEapi-warehouse-delete-product--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-warehouse-delete-product--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/warehouse/delete-product/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-warehouse-delete-product--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-warehouse-delete-product--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-warehouse-delete-product--id-"
               value="iure"
               data-component="url">
    <br>
<p>The ID of the delete product. Example: <code>iure</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-warehouse-get-subcategories">GET api/warehouse/get-subcategories</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouse-get-subcategories">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouse/get-subcategories"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/get-subcategories"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouse-get-subcategories">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouse-get-subcategories" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouse-get-subcategories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouse-get-subcategories"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouse-get-subcategories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouse-get-subcategories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouse-get-subcategories" data-method="GET"
      data-path="api/warehouse/get-subcategories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouse-get-subcategories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouse-get-subcategories"
                    onclick="tryItOut('GETapi-warehouse-get-subcategories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouse-get-subcategories"
                    onclick="cancelTryOut('GETapi-warehouse-get-subcategories');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouse-get-subcategories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouse/get-subcategories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouse-get-subcategories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouse-get-subcategories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-warehouse-create-subcategory">POST api/warehouse/create-subcategory</h2>

<p>
    </p>



<span id="example-requests-POSTapi-warehouse-create-subcategory">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/warehouse/create-subcategory"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                    --form "category_id=quis"                \
                                            --form "name_ru=exercitationem"                \
                                            --form "name_kz=nisi"                \
                                                --form "image_url=@/tmp/php2EKxOH"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/create-subcategory"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                        body.append('category_id', 'quis');
                                body.append('name_ru', 'exercitationem');
                                body.append('name_kz', 'nisi');
                                    body.append('image_url', document.querySelector('input[name="image_url"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-warehouse-create-subcategory">
</span>
<span id="execution-results-POSTapi-warehouse-create-subcategory" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-warehouse-create-subcategory"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-warehouse-create-subcategory"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-warehouse-create-subcategory" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-warehouse-create-subcategory">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-warehouse-create-subcategory" data-method="POST"
      data-path="api/warehouse/create-subcategory"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-warehouse-create-subcategory', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-warehouse-create-subcategory"
                    onclick="tryItOut('POSTapi-warehouse-create-subcategory');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-warehouse-create-subcategory"
                    onclick="cancelTryOut('POSTapi-warehouse-create-subcategory');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-warehouse-create-subcategory"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/warehouse/create-subcategory</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-warehouse-create-subcategory"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-warehouse-create-subcategory"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="POSTapi-warehouse-create-subcategory"
               value="quis"
               data-component="body">
    <br>
<p>Example: <code>quis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_url</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="image_url"                data-endpoint="POSTapi-warehouse-create-subcategory"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 2048 Кб. Example: <code>/tmp/php2EKxOH</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-warehouse-create-subcategory"
               value="exercitationem"
               data-component="body">
    <br>
<p>Example: <code>exercitationem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-warehouse-create-subcategory"
               value="nisi"
               data-component="body">
    <br>
<p>Example: <code>nisi</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-warehouse-delete-subcategory--id-">DELETE api/warehouse/delete-subcategory/{id}</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-warehouse-delete-subcategory--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/warehouse/delete-subcategory/corporis"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/delete-subcategory/corporis"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-warehouse-delete-subcategory--id-">
</span>
<span id="execution-results-DELETEapi-warehouse-delete-subcategory--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-warehouse-delete-subcategory--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-warehouse-delete-subcategory--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-warehouse-delete-subcategory--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-warehouse-delete-subcategory--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-warehouse-delete-subcategory--id-" data-method="DELETE"
      data-path="api/warehouse/delete-subcategory/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-warehouse-delete-subcategory--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-warehouse-delete-subcategory--id-"
                    onclick="tryItOut('DELETEapi-warehouse-delete-subcategory--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-warehouse-delete-subcategory--id-"
                    onclick="cancelTryOut('DELETEapi-warehouse-delete-subcategory--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-warehouse-delete-subcategory--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/warehouse/delete-subcategory/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-warehouse-delete-subcategory--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-warehouse-delete-subcategory--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-warehouse-delete-subcategory--id-"
               value="corporis"
               data-component="url">
    <br>
<p>The ID of the delete subcategory. Example: <code>corporis</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-warehouse-create-category">POST api/warehouse/create-category</h2>

<p>
    </p>



<span id="example-requests-POSTapi-warehouse-create-category">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/warehouse/create-category"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"name_ru\": \"et\",
    \"name_kz\": \"eum\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/create-category"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "name_ru": "et",
    "name_kz": "eum"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-warehouse-create-category">
</span>
<span id="execution-results-POSTapi-warehouse-create-category" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-warehouse-create-category"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-warehouse-create-category"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-warehouse-create-category" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-warehouse-create-category">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-warehouse-create-category" data-method="POST"
      data-path="api/warehouse/create-category"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-warehouse-create-category', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-warehouse-create-category"
                    onclick="tryItOut('POSTapi-warehouse-create-category');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-warehouse-create-category"
                    onclick="cancelTryOut('POSTapi-warehouse-create-category');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-warehouse-create-category"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/warehouse/create-category</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-warehouse-create-category"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-warehouse-create-category"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-warehouse-create-category"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-warehouse-create-category"
               value="eum"
               data-component="body">
    <br>
<p>Example: <code>eum</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-warehouse-get-categories">GET api/warehouse/get-categories</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouse-get-categories">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouse/get-categories"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/get-categories"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouse-get-categories">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouse-get-categories" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouse-get-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouse-get-categories"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouse-get-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouse-get-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouse-get-categories" data-method="GET"
      data-path="api/warehouse/get-categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouse-get-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouse-get-categories"
                    onclick="tryItOut('GETapi-warehouse-get-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouse-get-categories"
                    onclick="cancelTryOut('GETapi-warehouse-get-categories');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouse-get-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouse/get-categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouse-get-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouse-get-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-warehouse-update-category--id-">PUT api/warehouse/update-category/{id}</h2>

<p>
    </p>



<span id="example-requests-PUTapi-warehouse-update-category--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
"https://api.abricoz.kz/api/warehouse/update-category/explicabo"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"name_ru\": \"voluptatum\",
    \"name_kz\": \"sequi\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/update-category/explicabo"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "name_ru": "voluptatum",
    "name_kz": "sequi"
};

fetch(url, {
method: "PUT",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-PUTapi-warehouse-update-category--id-">
</span>
<span id="execution-results-PUTapi-warehouse-update-category--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-PUTapi-warehouse-update-category--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-warehouse-update-category--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-warehouse-update-category--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-PUTapi-warehouse-update-category--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-warehouse-update-category--id-" data-method="PUT"
      data-path="api/warehouse/update-category/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-warehouse-update-category--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-warehouse-update-category--id-"
                    onclick="tryItOut('PUTapi-warehouse-update-category--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-warehouse-update-category--id-"
                    onclick="cancelTryOut('PUTapi-warehouse-update-category--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-warehouse-update-category--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/warehouse/update-category/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-warehouse-update-category--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-warehouse-update-category--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-warehouse-update-category--id-"
               value="explicabo"
               data-component="url">
    <br>
<p>The ID of the update category. Example: <code>explicabo</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="PUTapi-warehouse-update-category--id-"
               value="voluptatum"
               data-component="body">
    <br>
<p>Example: <code>voluptatum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="PUTapi-warehouse-update-category--id-"
               value="sequi"
               data-component="body">
    <br>
<p>Example: <code>sequi</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-warehouse-delete-category--id-">DELETE api/warehouse/delete-category/{id}</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-warehouse-delete-category--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/warehouse/delete-category/sint"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/delete-category/sint"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-warehouse-delete-category--id-">
</span>
<span id="execution-results-DELETEapi-warehouse-delete-category--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-warehouse-delete-category--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-warehouse-delete-category--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-warehouse-delete-category--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-warehouse-delete-category--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-warehouse-delete-category--id-" data-method="DELETE"
      data-path="api/warehouse/delete-category/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-warehouse-delete-category--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-warehouse-delete-category--id-"
                    onclick="tryItOut('DELETEapi-warehouse-delete-category--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-warehouse-delete-category--id-"
                    onclick="cancelTryOut('DELETEapi-warehouse-delete-category--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-warehouse-delete-category--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/warehouse/delete-category/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-warehouse-delete-category--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-warehouse-delete-category--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-warehouse-delete-category--id-"
               value="sint"
               data-component="url">
    <br>
<p>The ID of the delete category. Example: <code>sint</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-warehouse-add-photo-product--id-">POST api/warehouse/add-photo-product/{id}</h2>

<p>
    </p>



<span id="example-requests-POSTapi-warehouse-add-photo-product--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/warehouse/add-photo-product/assumenda"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                        --form "photo=@/tmp/phpeQpnx8"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouse/add-photo-product/assumenda"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                            body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-warehouse-add-photo-product--id-">
</span>
<span id="execution-results-POSTapi-warehouse-add-photo-product--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-warehouse-add-photo-product--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-warehouse-add-photo-product--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-warehouse-add-photo-product--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-warehouse-add-photo-product--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-warehouse-add-photo-product--id-" data-method="POST"
      data-path="api/warehouse/add-photo-product/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-warehouse-add-photo-product--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-warehouse-add-photo-product--id-"
                    onclick="tryItOut('POSTapi-warehouse-add-photo-product--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-warehouse-add-photo-product--id-"
                    onclick="cancelTryOut('POSTapi-warehouse-add-photo-product--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-warehouse-add-photo-product--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/warehouse/add-photo-product/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-warehouse-add-photo-product--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-warehouse-add-photo-product--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-warehouse-add-photo-product--id-"
               value="assumenda"
               data-component="url">
    <br>
<p>The ID of the add photo product. Example: <code>assumenda</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="POSTapi-warehouse-add-photo-product--id-"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 2048 Кб. Example: <code>/tmp/phpeQpnx8</code></p>
        </div>
        </form>

                <h1 id="favoriteproduct">FavoriteProduct</h1>

    

                                <h2 id="favoriteproduct-DELETEapi-favorite-product-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-favorite-product-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/favorite-product/delete/qui"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/favorite-product/delete/qui"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-favorite-product-delete--id-">
</span>
<span id="execution-results-DELETEapi-favorite-product-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-favorite-product-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-favorite-product-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-favorite-product-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-favorite-product-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-favorite-product-delete--id-" data-method="DELETE"
      data-path="api/favorite-product/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-favorite-product-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-favorite-product-delete--id-"
                    onclick="tryItOut('DELETEapi-favorite-product-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-favorite-product-delete--id-"
                    onclick="cancelTryOut('DELETEapi-favorite-product-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-favorite-product-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/favorite-product/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-favorite-product-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-favorite-product-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-favorite-product-delete--id-"
               value="qui"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>qui</code></p>
            </div>
                    </form>

                    <h2 id="favoriteproduct-POSTapi-favorite-product-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-favorite-product-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/favorite-product/store"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"product_id\": 3
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/favorite-product/store"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "product_id": 3
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-favorite-product-store">
</span>
<span id="execution-results-POSTapi-favorite-product-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-favorite-product-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-favorite-product-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-favorite-product-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-favorite-product-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-favorite-product-store" data-method="POST"
      data-path="api/favorite-product/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-favorite-product-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-favorite-product-store"
                    onclick="tryItOut('POSTapi-favorite-product-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-favorite-product-store"
                    onclick="cancelTryOut('POSTapi-favorite-product-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-favorite-product-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/favorite-product/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-favorite-product-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-favorite-product-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="product_id"                data-endpoint="POSTapi-favorite-product-store"
               value="3"
               data-component="body">
    <br>
<p>Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="favoriteproduct-GETapi-favorite-product-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-favorite-product-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/favorite-product/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"perPage\": 11,
    \"page\": 9
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/favorite-product/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "perPage": 11,
    "page": 9
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-favorite-product-index">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-favorite-product-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-favorite-product-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-favorite-product-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-favorite-product-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-favorite-product-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-favorite-product-index" data-method="GET"
      data-path="api/favorite-product/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-favorite-product-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-favorite-product-index"
                    onclick="tryItOut('GETapi-favorite-product-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-favorite-product-index"
                    onclick="cancelTryOut('GETapi-favorite-product-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-favorite-product-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/favorite-product/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-favorite-product-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-favorite-product-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="perPage"                data-endpoint="GETapi-favorite-product-index"
               value="11"
               data-component="body">
    <br>
<p>Example: <code>11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="page"                data-endpoint="GETapi-favorite-product-index"
               value="9"
               data-component="body">
    <br>
<p>Example: <code>9</code></p>
        </div>
        </form>

                <h1 id="mobilebanner">MobileBanner</h1>

    

                                <h2 id="mobilebanner-POSTapi-mobile-banner-update">Обновление</h2>

<p>
    </p>



<span id="example-requests-POSTapi-mobile-banner-update">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/mobile-banner/update"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"banners\": [
        \"sit\"
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/mobile-banner/update"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "banners": [
        "sit"
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-mobile-banner-update">
</span>
<span id="execution-results-POSTapi-mobile-banner-update" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-mobile-banner-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mobile-banner-update"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mobile-banner-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-mobile-banner-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mobile-banner-update" data-method="POST"
      data-path="api/mobile-banner/update"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mobile-banner-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mobile-banner-update"
                    onclick="tryItOut('POSTapi-mobile-banner-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mobile-banner-update"
                    onclick="cancelTryOut('POSTapi-mobile-banner-update');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mobile-banner-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mobile-banner/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mobile-banner-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mobile-banner-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <details>
                <summary style="padding-bottom: 10px;">
                    <b style="line-height: 2;"><code>banners</code></b>&nbsp;&nbsp;
    <small>string[]</small>
&nbsp;
 &nbsp;
<br>

                </summary>
                                                            <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="banners.0.id"                data-endpoint="POSTapi-mobile-banner-update"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
                        </div>
                                                                                <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>number</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="banners.0.number"                data-endpoint="POSTapi-mobile-banner-update"
               value="14"
               data-component="body">
    <br>
<p>Example: <code>14</code></p>
                        </div>
                                                </details>
        </div>
        </form>

                    <h2 id="mobilebanner-POSTapi-mobile-banner-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-mobile-banner-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/mobile-banner/store"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                    --form "title_ru=ldlphuezblvt"                \
                                            --form "title_kz=pzdefehxmvcqauqfui"                \
                                            --form "title_en=wzvulnfgakzp"                \
                                                --form "image_ru=@/tmp/phpfuj1zA"                 \
                                            --form "image_kz=@/tmp/phpuZloQz"                 \
                                            --form "image_en=@/tmp/phpZYGqe4"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/mobile-banner/store"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                        body.append('title_ru', 'ldlphuezblvt');
                                body.append('title_kz', 'pzdefehxmvcqauqfui');
                                body.append('title_en', 'wzvulnfgakzp');
                                    body.append('image_ru', document.querySelector('input[name="image_ru"]').files[0]);
                                body.append('image_kz', document.querySelector('input[name="image_kz"]').files[0]);
                                body.append('image_en', document.querySelector('input[name="image_en"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-mobile-banner-store">
</span>
<span id="execution-results-POSTapi-mobile-banner-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-mobile-banner-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mobile-banner-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mobile-banner-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-mobile-banner-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mobile-banner-store" data-method="POST"
      data-path="api/mobile-banner/store"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mobile-banner-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mobile-banner-store"
                    onclick="tryItOut('POSTapi-mobile-banner-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mobile-banner-store"
                    onclick="cancelTryOut('POSTapi-mobile-banner-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mobile-banner-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mobile-banner/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mobile-banner-store"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mobile-banner-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_ru</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image_ru"                data-endpoint="POSTapi-mobile-banner-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpfuj1zA</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_kz</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image_kz"                data-endpoint="POSTapi-mobile-banner-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpuZloQz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_en</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image_en"                data-endpoint="POSTapi-mobile-banner-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpZYGqe4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="title_ru"                data-endpoint="POSTapi-mobile-banner-store"
               value="ldlphuezblvt"
               data-component="body">
    <br>
<p>Количество символов в значении поля value не может превышать 10000. Example: <code>ldlphuezblvt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="title_kz"                data-endpoint="POSTapi-mobile-banner-store"
               value="pzdefehxmvcqauqfui"
               data-component="body">
    <br>
<p>Количество символов в значении поля value не может превышать 10000. Example: <code>pzdefehxmvcqauqfui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title_en</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="title_en"                data-endpoint="POSTapi-mobile-banner-store"
               value="wzvulnfgakzp"
               data-component="body">
    <br>
<p>Количество символов в значении поля value не может превышать 10000. Example: <code>wzvulnfgakzp</code></p>
        </div>
        </form>

                    <h2 id="mobilebanner-DELETEapi-mobile-banner-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-mobile-banner-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/mobile-banner/delete/itaque"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/mobile-banner/delete/itaque"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-mobile-banner-delete--id-">
</span>
<span id="execution-results-DELETEapi-mobile-banner-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-mobile-banner-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mobile-banner-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-mobile-banner-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-mobile-banner-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-mobile-banner-delete--id-" data-method="DELETE"
      data-path="api/mobile-banner/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mobile-banner-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-mobile-banner-delete--id-"
                    onclick="tryItOut('DELETEapi-mobile-banner-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-mobile-banner-delete--id-"
                    onclick="cancelTryOut('DELETEapi-mobile-banner-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-mobile-banner-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/mobile-banner/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-mobile-banner-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-mobile-banner-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-mobile-banner-delete--id-"
               value="itaque"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>itaque</code></p>
            </div>
                    </form>

                    <h2 id="mobilebanner-GETapi-mobile-banner-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-mobile-banner-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/mobile-banner/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/mobile-banner/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-mobile-banner-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 37
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;image_url&quot;: &quot;/storage/mobile-banners/strawberry_ru.jpeg&quot;,
            &quot;title_ru&quot;: &quot;Заказывайте клубнику в новом приложении от Abricoz!&quot;,
            &quot;title_kz&quot;: &quot;Abricoz жаңа қосымшасында құлпынайға тапсырыс беріңіз!&quot;,
            &quot;title_en&quot;: &quot;Order strawberries in the new Abricoz app!&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;image_url&quot;: &quot;/storage/mobile-banners/mandarin_ru.jpeg&quot;,
            &quot;title_ru&quot;: &quot;Одинокий мандарин требует покупки на Abricoz&rsquo;е!&quot;,
            &quot;title_kz&quot;: &quot;Abricoz-та жалғыз мандарин сатып алуды талап етеді!&quot;,
            &quot;title_en&quot;: &quot;A lonely mandarin demands a purchase on Abricoz&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        }
    ],
    &quot;message&quot;: &quot;Баннеры успешно загружены!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-mobile-banner-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-mobile-banner-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mobile-banner-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mobile-banner-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-mobile-banner-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mobile-banner-index" data-method="GET"
      data-path="api/mobile-banner/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mobile-banner-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mobile-banner-index"
                    onclick="tryItOut('GETapi-mobile-banner-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mobile-banner-index"
                    onclick="cancelTryOut('GETapi-mobile-banner-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mobile-banner-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mobile-banner/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mobile-banner-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mobile-banner-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="order">Order</h1>

    

                                <h2 id="order-POSTapi-order-update--id-">Обновление</h2>

<p>
    </p>



<span id="example-requests-POSTapi-order-update--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/order/update/veniam"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"order_status_id\": 9,
    \"delivery_interval_id\": 11,
    \"delivery_date\": \"2025-01-28T19:23:58\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/update/veniam"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "order_status_id": 9,
    "delivery_interval_id": 11,
    "delivery_date": "2025-01-28T19:23:58"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-order-update--id-">
</span>
<span id="execution-results-POSTapi-order-update--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-order-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-order-update--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-order-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-order-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-order-update--id-" data-method="POST"
      data-path="api/order/update/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-order-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-order-update--id-"
                    onclick="tryItOut('POSTapi-order-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-order-update--id-"
                    onclick="cancelTryOut('POSTapi-order-update--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-order-update--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/order/update/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-order-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-order-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-order-update--id-"
               value="veniam"
               data-component="url">
    <br>
<p>The ID of the update. Example: <code>veniam</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_status_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="order_status_id"                data-endpoint="POSTapi-order-update--id-"
               value="9"
               data-component="body">
    <br>
<p>Example: <code>9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_interval_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="delivery_interval_id"                data-endpoint="POSTapi-order-update--id-"
               value="11"
               data-component="body">
    <br>
<p>Example: <code>11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-order-update--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_comment</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="address_comment"                data-endpoint="POSTapi-order-update--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_comment</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="order_comment"                data-endpoint="POSTapi-order-update--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_date</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_date"                data-endpoint="POSTapi-order-update--id-"
               value="2025-01-28T19:23:58"
               data-component="body">
    <br>
<p>Значение поля value должно быть корректной датой. Example: <code>2025-01-28T19:23:58</code></p>
        </div>
        </form>

                    <h2 id="order-POSTapi-order-store">Создание заказа</h2>

<p>
    </p>



<span id="example-requests-POSTapi-order-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/order/store"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"delivery_interval_id\": 16,
    \"payment_type_id\": 8,
    \"address_id\": 18,
    \"delivery_date\": \"2025-01-28\",
    \"products\": [
        \"distinctio\"
    ]
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/store"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "delivery_interval_id": 16,
    "payment_type_id": 8,
    "address_id": 18,
    "delivery_date": "2025-01-28",
    "products": [
        "distinctio"
    ]
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-order-store">
</span>
<span id="execution-results-POSTapi-order-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-order-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-order-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-order-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-order-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-order-store" data-method="POST"
      data-path="api/order/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-order-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-order-store"
                    onclick="tryItOut('POSTapi-order-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-order-store"
                    onclick="cancelTryOut('POSTapi-order-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-order-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/order/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-order-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-order-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_interval_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="delivery_interval_id"                data-endpoint="POSTapi-order-store"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_type_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="payment_type_id"                data-endpoint="POSTapi-order-store"
               value="8"
               data-component="body">
    <br>
<p>Example: <code>8</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="address_id"                data-endpoint="POSTapi-order-store"
               value="18"
               data-component="body">
    <br>
<p>Example: <code>18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_date</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_date"                data-endpoint="POSTapi-order-store"
               value="2025-01-28"
               data-component="body">
    <br>
<p>Значение поля value должно быть корректной датой. Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2025-01-28</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <details>
                <summary style="padding-bottom: 10px;">
                    <b style="line-height: 2;"><code>products</code></b>&nbsp;&nbsp;
    <small>integer[]</small>
&nbsp;
 &nbsp;
<br>

                </summary>
                                                            <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="products.0.product_id"                data-endpoint="POSTapi-order-store"
               value="9"
               data-component="body">
    <br>
<p>Example: <code>9</code></p>
                        </div>
                                                                                <div style="margin-left: 14px; clear: unset;">
                            <b style="line-height: 2;"><code>product_quantity</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="products.0.product_quantity"                data-endpoint="POSTapi-order-store"
               value="56"
               data-component="body">
    <br>
<p>Значение поля value должно быть не меньше 1. Example: <code>56</code></p>
                        </div>
                                                </details>
        </div>
        </form>

                    <h2 id="order-GETapi-order-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-order-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/order/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"perPage\": 16,
    \"page\": 12
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "perPage": 16,
    "page": 12
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-order-index">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-order-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-order-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-order-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-index" data-method="GET"
      data-path="api/order/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-index"
                    onclick="tryItOut('GETapi-order-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-index"
                    onclick="cancelTryOut('GETapi-order-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="perPage"                data-endpoint="GETapi-order-index"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="page"                data-endpoint="GETapi-order-index"
               value="12"
               data-component="body">
    <br>
<p>Example: <code>12</code></p>
        </div>
        </form>

                    <h2 id="order-GETapi-order-show--id-">Элемент</h2>

<p>
    </p>



<span id="example-requests-GETapi-order-show--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/order/show/accusantium"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"isLast\": false
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/show/accusantium"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "isLast": false
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-order-show--id-">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-order-show--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-order-show--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-show--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-show--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-order-show--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-show--id-" data-method="GET"
      data-path="api/order/show/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-show--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-show--id-"
                    onclick="tryItOut('GETapi-order-show--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-show--id-"
                    onclick="cancelTryOut('GETapi-order-show--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-show--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order/show/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-order-show--id-"
               value="accusantium"
               data-component="url">
    <br>
<p>The ID of the show. Example: <code>accusantium</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>isLast</code></b>&nbsp;&nbsp;
    <small>boolean</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <label data-endpoint="GETapi-order-show--id-" style="display: none">
            <input type="radio" name="isLast"
                   value="true"
                   data-endpoint="GETapi-order-show--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-order-show--id-" style="display: none">
            <input type="radio" name="isLast"
                   value="false"
                   data-endpoint="GETapi-order-show--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="order-GETapi-order-cancel--id-">Отмена заказа</h2>

<p>
    </p>



<span id="example-requests-GETapi-order-cancel--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/order/cancel/aut"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/cancel/aut"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-order-cancel--id-">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-order-cancel--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-order-cancel--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-cancel--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-cancel--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-order-cancel--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-cancel--id-" data-method="GET"
      data-path="api/order/cancel/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-cancel--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-cancel--id-"
                    onclick="tryItOut('GETapi-order-cancel--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-cancel--id-"
                    onclick="cancelTryOut('GETapi-order-cancel--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-cancel--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order/cancel/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-cancel--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-cancel--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-order-cancel--id-"
               value="aut"
               data-component="url">
    <br>
<p>The ID of the cancel. Example: <code>aut</code></p>
            </div>
                    </form>

                    <h2 id="order-GETapi-order-status">Проверка на оплату последнего заказа</h2>

<p>
    </p>



<span id="example-requests-GETapi-order-status">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/order/status"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/status"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-order-status">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-order-status" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-order-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-status"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-order-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-status" data-method="GET"
      data-path="api/order/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-status"
                    onclick="tryItOut('GETapi-order-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-status"
                    onclick="cancelTryOut('GETapi-order-status');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="order-GETapi-order-active-orders">Список активных заказов</h2>

<p>
    </p>



<span id="example-requests-GETapi-order-active-orders">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/order/active-orders"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"perPage\": 7,
    \"page\": 3
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/order/active-orders"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "perPage": 7,
    "page": 3
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-order-active-orders">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-order-active-orders" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-order-active-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-active-orders"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-active-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-order-active-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-active-orders" data-method="GET"
      data-path="api/order/active-orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-active-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-active-orders"
                    onclick="tryItOut('GETapi-order-active-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-active-orders"
                    onclick="cancelTryOut('GETapi-order-active-orders');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-active-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order/active-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-active-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-active-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="perPage"                data-endpoint="GETapi-order-active-orders"
               value="7"
               data-component="body">
    <br>
<p>Example: <code>7</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="page"                data-endpoint="GETapi-order-active-orders"
               value="3"
               data-component="body">
    <br>
<p>Example: <code>3</code></p>
        </div>
        </form>

                <h1 id="paymenttype">PaymentType</h1>

    

                                <h2 id="paymenttype-GETapi-payment-type-index">Index</h2>

<p>
    </p>



<span id="example-requests-GETapi-payment-type-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/payment-type/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/payment-type/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-payment-type-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 36
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Наличные&quot;,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Банковская карта (RoboKassa)&quot;,
            &quot;created_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-28T13:43:04.000000Z&quot;
        }
    ],
    &quot;message&quot;: &quot;Список способов оплаты успешно отображен!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-payment-type-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-payment-type-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payment-type-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-payment-type-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-payment-type-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-payment-type-index" data-method="GET"
      data-path="api/payment-type/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payment-type-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payment-type-index"
                    onclick="tryItOut('GETapi-payment-type-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payment-type-index"
                    onclick="cancelTryOut('GETapi-payment-type-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payment-type-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payment-type/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-payment-type-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-payment-type-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="product">Product</h1>

    

                                <h2 id="product-GETapi-product-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-product-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/product/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"perPage\": 15,
    \"page\": 1,
    \"category_id\": 4,
    \"subcategory_id\": [
        6
    ],
    \"name\": \"nisi\",
    \"min_price\": 7,
    \"max_price\": 15
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/product/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "perPage": 15,
    "page": 1,
    "category_id": 4,
    "subcategory_id": [
        6
    ],
    "name": "nisi",
    "min_price": 7,
    "max_price": 15
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-product-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 43
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;total&quot;: 0,
        &quot;total_pages&quot;: 1,
        &quot;min_price&quot;: null,
        &quot;max_price&quot;: null,
        &quot;products&quot;: []
    },
    &quot;message&quot;: &quot;Список продуктов успешно загружен!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-product-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-product-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-product-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-product-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-product-index" data-method="GET"
      data-path="api/product/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-product-index"
                    onclick="tryItOut('GETapi-product-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-product-index"
                    onclick="cancelTryOut('GETapi-product-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-product-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-product-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-product-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="perPage"                data-endpoint="GETapi-product-index"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="page"                data-endpoint="GETapi-product-index"
               value="1"
               data-component="body">
    <br>
<p>Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="category_id"                data-endpoint="GETapi-product-index"
               value="4"
               data-component="body">
    <br>
<p>Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subcategory_id</code></b>&nbsp;&nbsp;
    <small>integer[]</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="subcategory_id[0]"                data-endpoint="GETapi-product-index"
               data-component="body">
        <input type="number" style="display: none"
               name="subcategory_id[1]"                data-endpoint="GETapi-product-index"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-product-index"
               value="nisi"
               data-component="body">
    <br>
<p>Example: <code>nisi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_price</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="min_price"                data-endpoint="GETapi-product-index"
               value="7"
               data-component="body">
    <br>
<p>Example: <code>7</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_price</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="max_price"                data-endpoint="GETapi-product-index"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
        </form>

                    <h2 id="product-GETapi-product-show--id-">Элемент</h2>

<p>
    </p>



<span id="example-requests-GETapi-product-show--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/product/show/doloremque"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/product/show/doloremque"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-product-show--id-">
                    <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 42
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Product] doloremque&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 487,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 463,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 146,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 159,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 135,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 87,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 807,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 784,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 748,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 737,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 200,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 99,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php&quot;,
            &quot;line&quot;: 62,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 175,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 300,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 91,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 236,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 166,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 95,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 125,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 72,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 53,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 211,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 326,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 181,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 1096,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 324,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 175,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 201,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-product-show--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-product-show--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product-show--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-product-show--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-product-show--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-product-show--id-" data-method="GET"
      data-path="api/product/show/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product-show--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-product-show--id-"
                    onclick="tryItOut('GETapi-product-show--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-product-show--id-"
                    onclick="cancelTryOut('GETapi-product-show--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-product-show--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product/show/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-product-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-product-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-product-show--id-"
               value="doloremque"
               data-component="url">
    <br>
<p>The ID of the show. Example: <code>doloremque</code></p>
            </div>
                    </form>

                    <h2 id="product-GETapi-product-search">Поиск</h2>

<p>
    </p>



<span id="example-requests-GETapi-product-search">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/product/search"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"name\": \"odit\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/product/search"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "name": "odit"
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-product-search">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 41
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Результаты поиска&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-product-search" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-product-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product-search"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-product-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-product-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-product-search" data-method="GET"
      data-path="api/product/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-product-search"
                    onclick="tryItOut('GETapi-product-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-product-search"
                    onclick="cancelTryOut('GETapi-product-search');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-product-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-product-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-product-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-product-search"
               value="odit"
               data-component="body">
    <br>
<p>Example: <code>odit</code></p>
        </div>
        </form>

                <h1 id="robokassa">Robokassa</h1>

    

                                <h2 id="robokassa-POSTapi-robokassa-result">Result</h2>

<p>
    </p>



<span id="example-requests-POSTapi-robokassa-result">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/robokassa/result"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/robokassa/result"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-robokassa-result">
</span>
<span id="execution-results-POSTapi-robokassa-result" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-robokassa-result"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-robokassa-result"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-robokassa-result" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-robokassa-result">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-robokassa-result" data-method="POST"
      data-path="api/robokassa/result"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-robokassa-result', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-robokassa-result"
                    onclick="tryItOut('POSTapi-robokassa-result');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-robokassa-result"
                    onclick="cancelTryOut('POSTapi-robokassa-result');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-robokassa-result"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/robokassa/result</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-robokassa-result"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-robokassa-result"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="robokassa-POSTapi-robokassa-success">Success</h2>

<p>
    </p>



<span id="example-requests-POSTapi-robokassa-success">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/robokassa/success"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/robokassa/success"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-robokassa-success">
</span>
<span id="execution-results-POSTapi-robokassa-success" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-robokassa-success"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-robokassa-success"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-robokassa-success" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-robokassa-success">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-robokassa-success" data-method="POST"
      data-path="api/robokassa/success"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-robokassa-success', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-robokassa-success"
                    onclick="tryItOut('POSTapi-robokassa-success');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-robokassa-success"
                    onclick="cancelTryOut('POSTapi-robokassa-success');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-robokassa-success"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/robokassa/success</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-robokassa-success"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-robokassa-success"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="robokassa-POSTapi-robokassa-fail">Fail</h2>

<p>
    </p>



<span id="example-requests-POSTapi-robokassa-fail">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/robokassa/fail"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/robokassa/fail"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-robokassa-fail">
</span>
<span id="execution-results-POSTapi-robokassa-fail" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-robokassa-fail"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-robokassa-fail"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-robokassa-fail" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-robokassa-fail">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-robokassa-fail" data-method="POST"
      data-path="api/robokassa/fail"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-robokassa-fail', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-robokassa-fail"
                    onclick="tryItOut('POSTapi-robokassa-fail');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-robokassa-fail"
                    onclick="cancelTryOut('POSTapi-robokassa-fail');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-robokassa-fail"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/robokassa/fail</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-robokassa-fail"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-robokassa-fail"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="robokassa-GETapi-robokassa-get-url">Ссылка</h2>

<p>
    </p>



<span id="example-requests-GETapi-robokassa-get-url">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/robokassa/get-url"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/robokassa/get-url"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-robokassa-get-url">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-robokassa-get-url" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-robokassa-get-url"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-robokassa-get-url"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-robokassa-get-url" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-robokassa-get-url">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-robokassa-get-url" data-method="GET"
      data-path="api/robokassa/get-url"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-robokassa-get-url', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-robokassa-get-url"
                    onclick="tryItOut('GETapi-robokassa-get-url');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-robokassa-get-url"
                    onclick="cancelTryOut('GETapi-robokassa-get-url');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-robokassa-get-url"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/robokassa/get-url</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-robokassa-get-url"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-robokassa-get-url"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="subcategory">SubCategory</h1>

    

                                <h2 id="subcategory-POSTapi-sub-category-update">Обновление</h2>

<p>
    </p>



<span id="example-requests-POSTapi-sub-category-update">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/sub-category/update"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                    --form "category_id=9"                \
                                            --form "name_ru=aliquam"                \
                                            --form "name_kz=sed"                \
                                                --form "image=@/tmp/phpVgael8"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/sub-category/update"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                        body.append('category_id', '9');
                                body.append('name_ru', 'aliquam');
                                body.append('name_kz', 'sed');
                                    body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-sub-category-update">
</span>
<span id="execution-results-POSTapi-sub-category-update" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-sub-category-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sub-category-update"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-sub-category-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-sub-category-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-sub-category-update" data-method="POST"
      data-path="api/sub-category/update"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sub-category-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-sub-category-update"
                    onclick="tryItOut('POSTapi-sub-category-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-sub-category-update"
                    onclick="cancelTryOut('POSTapi-sub-category-update');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-sub-category-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sub-category/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-sub-category-update"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-sub-category-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="category_id"                data-endpoint="POSTapi-sub-category-update"
               value="9"
               data-component="body">
    <br>
<p>Example: <code>9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-sub-category-update"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/phpVgael8</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-sub-category-update"
               value="aliquam"
               data-component="body">
    <br>
<p>Example: <code>aliquam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-sub-category-update"
               value="sed"
               data-component="body">
    <br>
<p>Example: <code>sed</code></p>
        </div>
        </form>

                    <h2 id="subcategory-POSTapi-sub-category-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-sub-category-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/sub-category/store"    \
            --header "Content-Type: multipart/form-data"            \
                    --header "Accept: application/json"            \
                                    --form "category_id=4"                \
                                            --form "name_ru=error"                \
                                            --form "name_kz=commodi"                \
                                                --form "image=@/tmp/php2XWk3G"             </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/sub-category/store"
);

    const headers = {
            "Content-Type": "multipart/form-data",
            "Accept": "application/json",
            };

    const body = new FormData();
                        body.append('category_id', '4');
                                body.append('name_ru', 'error');
                                body.append('name_kz', 'commodi');
                                    body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-sub-category-store">
</span>
<span id="execution-results-POSTapi-sub-category-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-sub-category-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sub-category-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-sub-category-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-sub-category-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-sub-category-store" data-method="POST"
      data-path="api/sub-category/store"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sub-category-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-sub-category-store"
                    onclick="tryItOut('POSTapi-sub-category-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-sub-category-store"
                    onclick="cancelTryOut('POSTapi-sub-category-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-sub-category-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sub-category/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-sub-category-store"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-sub-category-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="category_id"                data-endpoint="POSTapi-sub-category-store"
               value="4"
               data-component="body">
    <br>
<p>Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
    <small>file</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-sub-category-store"
               value=""
               data-component="body">
    <br>
<p>Файл, указанный в поле value, должен быть изображением. Размер файла в поле value не может быть больше 10000 Кб. Example: <code>/tmp/php2XWk3G</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_ru</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_ru"                data-endpoint="POSTapi-sub-category-store"
               value="error"
               data-component="body">
    <br>
<p>Example: <code>error</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name_kz</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name_kz"                data-endpoint="POSTapi-sub-category-store"
               value="commodi"
               data-component="body">
    <br>
<p>Example: <code>commodi</code></p>
        </div>
        </form>

                    <h2 id="subcategory-DELETEapi-sub-category-delete--id-">Удаление</h2>

<p>
    </p>



<span id="example-requests-DELETEapi-sub-category-delete--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
"https://api.abricoz.kz/api/sub-category/delete/cum"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/sub-category/delete/cum"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-DELETEapi-sub-category-delete--id-">
</span>
<span id="execution-results-DELETEapi-sub-category-delete--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-DELETEapi-sub-category-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sub-category-delete--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-sub-category-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-DELETEapi-sub-category-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-sub-category-delete--id-" data-method="DELETE"
      data-path="api/sub-category/delete/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sub-category-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-sub-category-delete--id-"
                    onclick="tryItOut('DELETEapi-sub-category-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-sub-category-delete--id-"
                    onclick="cancelTryOut('DELETEapi-sub-category-delete--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-sub-category-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sub-category/delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-sub-category-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-sub-category-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-sub-category-delete--id-"
               value="cum"
               data-component="url">
    <br>
<p>The ID of the delete. Example: <code>cum</code></p>
            </div>
                    </form>

                    <h2 id="subcategory-GETapi-sub-category-index">Список</h2>

<p>
    </p>



<span id="example-requests-GETapi-sub-category-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/sub-category/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"perPage\": 8,
    \"page\": 14
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/sub-category/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "perPage": 8,
    "page": 14
};

fetch(url, {
method: "GET",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-sub-category-index">
                    <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 40
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;total&quot;: 20,
        &quot;total_pages&quot;: 2,
        &quot;subCategory&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;category_id&quot;: 1,
                &quot;image_url&quot;: &quot;/storage/subcategories/fruits.png&quot;,
                &quot;name_ru&quot;: &quot;Фрукты&quot;,
                &quot;name_kz&quot;: &quot;Жеміс&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;category_id&quot;: 1,
                &quot;image_url&quot;: &quot;/storage/subcategories/ovoshi.png&quot;,
                &quot;name_ru&quot;: &quot;Овощи&quot;,
                &quot;name_kz&quot;: &quot;Тамақтық нәрселер&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;category_id&quot;: 1,
                &quot;image_url&quot;: &quot;/storage/subcategories/zelen.png&quot;,
                &quot;name_ru&quot;: &quot;Зелень&quot;,
                &quot;name_kz&quot;: &quot;Жапырақ&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;category_id&quot;: 1,
                &quot;image_url&quot;: &quot;/storage/subcategories/gribi.png&quot;,
                &quot;name_ru&quot;: &quot;Грибы&quot;,
                &quot;name_kz&quot;: &quot;Күріш&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;category_id&quot;: 4,
                &quot;image_url&quot;: &quot;/storage/subcategories/moloko.png&quot;,
                &quot;name_ru&quot;: &quot;Молоко, сметана&quot;,
                &quot;name_kz&quot;: &quot;Сүт, каймак&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;category_id&quot;: 4,
                &quot;image_url&quot;: &quot;/storage/subcategories/yogurti.png&quot;,
                &quot;name_ru&quot;: &quot;Йогурты, сырки&quot;,
                &quot;name_kz&quot;: &quot;Йогурттар, сыр қорытындары&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 7,
                &quot;category_id&quot;: 4,
                &quot;image_url&quot;: &quot;/storage/subcategories/sir.png&quot;,
                &quot;name_ru&quot;: &quot;Сыры&quot;,
                &quot;name_kz&quot;: &quot;Сырлар&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 8,
                &quot;category_id&quot;: 4,
                &quot;image_url&quot;: &quot;/storage/subcategories/yaico.png&quot;,
                &quot;name_ru&quot;: &quot;Яйца&quot;,
                &quot;name_kz&quot;: &quot;Жұмыртқалар&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 9,
                &quot;category_id&quot;: 4,
                &quot;image_url&quot;: &quot;/storage/subcategories/maslo.png&quot;,
                &quot;name_ru&quot;: &quot;Масло&quot;,
                &quot;name_kz&quot;: &quot;Мас&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            },
            {
                &quot;id&quot;: 10,
                &quot;category_id&quot;: 6,
                &quot;image_url&quot;: &quot;/storage/subcategories/kofe.png&quot;,
                &quot;name_ru&quot;: &quot;Кофе&quot;,
                &quot;name_kz&quot;: &quot;Кофе&quot;,
                &quot;created_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-28T13:43:03.000000Z&quot;
            }
        ]
    },
    &quot;message&quot;: &quot;Список подкатегорий успешно загружен!&quot;,
    &quot;http_code&quot;: 200,
    &quot;status&quot;: &quot;success&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-sub-category-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-sub-category-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sub-category-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sub-category-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-sub-category-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sub-category-index" data-method="GET"
      data-path="api/sub-category/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sub-category-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sub-category-index"
                    onclick="tryItOut('GETapi-sub-category-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sub-category-index"
                    onclick="cancelTryOut('GETapi-sub-category-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sub-category-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sub-category/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sub-category-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sub-category-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="perPage"                data-endpoint="GETapi-sub-category-index"
               value="8"
               data-component="body">
    <br>
<p>Example: <code>8</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
    <small>integer</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="number" style="display: none"
               step="any"                name="page"                data-endpoint="GETapi-sub-category-index"
               value="14"
               data-component="body">
    <br>
<p>Example: <code>14</code></p>
        </div>
        </form>

                    <h2 id="subcategory-GETapi-sub-category-show--id-">Элемент</h2>

<p>
    </p>



<span id="example-requests-GETapi-sub-category-show--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/sub-category/show/culpa"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/sub-category/show/culpa"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-sub-category-show--id-">
                    <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            x-ratelimit-limit: 60
                                            x-ratelimit-remaining: 39
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\SubCategory] culpa&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 487,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 463,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 146,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 159,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 135,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 87,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 807,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 784,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 748,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 737,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 200,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 99,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php&quot;,
            &quot;line&quot;: 62,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 183,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 175,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 144,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 300,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 91,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 236,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 166,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 95,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 125,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 72,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 53,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 211,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 326,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 181,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 1096,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 324,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 175,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 201,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-sub-category-show--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-sub-category-show--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sub-category-show--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sub-category-show--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-sub-category-show--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sub-category-show--id-" data-method="GET"
      data-path="api/sub-category/show/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sub-category-show--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sub-category-show--id-"
                    onclick="tryItOut('GETapi-sub-category-show--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sub-category-show--id-"
                    onclick="cancelTryOut('GETapi-sub-category-show--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sub-category-show--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sub-category/show/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sub-category-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sub-category-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-sub-category-show--id-"
               value="culpa"
               data-component="url">
    <br>
<p>The ID of the show. Example: <code>culpa</code></p>
            </div>
                    </form>

                <h1 id="userdevice">UserDevice</h1>

    

                                <h2 id="userdevice-POSTapi-user-device-store">Создание</h2>

<p>
    </p>



<span id="example-requests-POSTapi-user-device-store">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
"https://api.abricoz.kz/api/user-device/store"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"            \
                        --data "{
    \"device_id\": \"et\",
    \"fcm_token\": \"quisquam\",
    \"staff_fcm_token\": \"enim\"
}"
</code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/user-device/store"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

            let body = {
    "device_id": "et",
    "fcm_token": "quisquam",
    "staff_fcm_token": "enim"
};

fetch(url, {
method: "POST",
    headers,
            body: JSON.stringify(body),
    }).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-POSTapi-user-device-store">
</span>
<span id="execution-results-POSTapi-user-device-store" hidden>
    <blockquote>Received response<span
            id="execution-response-status-POSTapi-user-device-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-device-store"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-user-device-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-POSTapi-user-device-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-user-device-store" data-method="POST"
      data-path="api/user-device/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-device-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-device-store"
                    onclick="tryItOut('POSTapi-user-device-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-device-store"
                    onclick="cancelTryOut('POSTapi-user-device-store');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-device-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user-device/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-user-device-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-user-device-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>device_id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="device_id"                data-endpoint="POSTapi-user-device-store"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fcm_token</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="fcm_token"                data-endpoint="POSTapi-user-device-store"
               value="quisquam"
               data-component="body">
    <br>
<p>Example: <code>quisquam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>staff_fcm_token</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
    <i>optional</i>
 &nbsp;
                <input type="text" style="display: none"
                              name="staff_fcm_token"                data-endpoint="POSTapi-user-device-store"
               value="enim"
               data-component="body">
    <br>
<p>Example: <code>enim</code></p>
        </div>
        </form>

                <h1 id="warehouseman">Warehouseman</h1>

    

                                <h2 id="warehouseman-GETapi-warehouseman-index">GET api/warehouseman/index</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouseman-index">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouseman/index"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouseman/index"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouseman-index">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouseman-index" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouseman-index"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouseman-index"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouseman-index" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouseman-index">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouseman-index" data-method="GET"
      data-path="api/warehouseman/index"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouseman-index', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouseman-index"
                    onclick="tryItOut('GETapi-warehouseman-index');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouseman-index"
                    onclick="cancelTryOut('GETapi-warehouseman-index');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouseman-index"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouseman/index</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouseman-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouseman-index"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="warehouseman-GETapi-warehouseman-show--id-">Отображение информации о заказе</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouseman-show--id-">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouseman/show/veritatis"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouseman/show/veritatis"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouseman-show--id-">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouseman-show--id-" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouseman-show--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouseman-show--id-"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouseman-show--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouseman-show--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouseman-show--id-" data-method="GET"
      data-path="api/warehouseman/show/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouseman-show--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouseman-show--id-"
                    onclick="tryItOut('GETapi-warehouseman-show--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouseman-show--id-"
                    onclick="cancelTryOut('GETapi-warehouseman-show--id-');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouseman-show--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouseman/show/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouseman-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouseman-show--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
    <small>string</small>
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-warehouseman-show--id-"
               value="veritatis"
               data-component="url">
    <br>
<p>The ID of the show. Example: <code>veritatis</code></p>
            </div>
                    </form>

                    <h2 id="warehouseman-GETapi-warehouseman-get-current-order">Display the current assigned order for the warehouseman</h2>

<p>
    </p>



<span id="example-requests-GETapi-warehouseman-get-current-order">
<blockquote>Example request:</blockquote>


        <div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
--get "https://api.abricoz.kz/api/warehouseman/get-current-order"    \
            --header "Content-Type: application/json"            \
                    --header "Accept: application/json"    </code></pre></div>

    
        <div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
"https://api.abricoz.kz/api/warehouseman/get-current-order"
);

    const headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
            };

fetch(url, {
method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

    </span>

<span id="example-responses-GETapi-warehouseman-get-current-order">
                    <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                            <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">                        cache-control: no-cache, private
                                            content-type: application/json
                                            vary: Origin
                     </code></pre></details>
                        <pre>
                                        
                    <code class="language-json"
                          style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
                 </pre>
            </span>
<span id="execution-results-GETapi-warehouseman-get-current-order" hidden>
    <blockquote>Received response<span
            id="execution-response-status-GETapi-warehouseman-get-current-order"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warehouseman-get-current-order"
                            data-empty-response-text="<Empty response>"
                            style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warehouseman-get-current-order" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code
            id="execution-error-message-GETapi-warehouseman-get-current-order">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warehouseman-get-current-order" data-method="GET"
      data-path="api/warehouseman/get-current-order"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warehouseman-get-current-order', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warehouseman-get-current-order"
                    onclick="tryItOut('GETapi-warehouseman-get-current-order');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warehouseman-get-current-order"
                    onclick="cancelTryOut('GETapi-warehouseman-get-current-order');"
                    hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warehouseman-get-current-order"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warehouseman/get-current-order</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warehouseman-get-current-order"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warehouseman-get-current-order"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
