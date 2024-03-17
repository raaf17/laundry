<?php

$routes->group('settings', ['namespace' => '\App\Modules\Settings\Controllers'], function ($subroutes) {
    $subroutes->get('/', 'Settings::index');
    $subroutes->get('profile', 'Settings::profile');
});
