<?php

$routes->group('users', ['namespace' => '\App\Modules\Users\Controllers'], function ($subroutes) {
    $subroutes->get('/', 'Users::index');
    $subroutes->get('new', 'Users::new');
    $subroutes->post('create', 'Users::create');
    $subroutes->get('edit/(:any)', 'Users::edit/$1');
    $subroutes->post('update/(:any)', 'Users::update/$1');
    $subroutes->delete('delete', 'Users::delete');
    $subroutes->get('trash', 'Users::trash');
    $subroutes->get('restore/(:any)', 'Users::restore/$1');
    $subroutes->get('restore', 'Users::restore');
    $subroutes->post('delete2/(:any)', 'Users::delete2/$1');
    $subroutes->delete('delete2', 'Users::delete2');
});
