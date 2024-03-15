<?php

$routes->group('dashboard', ['namespace' => '\App\Modules\Dashboard\Controllers'], function ($subroutes) {
    $subroutes->get('/', 'Dashboard::index');
});