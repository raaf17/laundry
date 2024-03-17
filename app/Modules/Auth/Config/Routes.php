<?php

$routes->group('auth', ['namespace' => '\App\Modules\Auth\Controllers'], function ($subroutes) {
    $subroutes->get('login', 'Auth::login');
    $subroutes->get('register', 'Auth::register');
    $subroutes->post('authLogin', 'Auth::authLogin');
    $subroutes->get('logout', 'Auth::logout');
});
