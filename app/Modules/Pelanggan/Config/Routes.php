<?php

$routes->group('pelanggan', ['namespace' => '\App\Modules\Pelanggan\Controllers'], function ($subroutes) {
    $subroutes->get('/', 'Pelanggan::index');
    $subroutes->get('new', 'Pelanggan::new');
    $subroutes->post('create', 'Pelanggan::create');
    $subroutes->get('edit/(:any)', 'Pelanggan::edit/$1');
    $subroutes->post('update/(:any)', 'Pelanggan::update/$1');
    $subroutes->delete('delete', 'Pelanggan::delete');
    $subroutes->get('trash', 'Pelanggan::trash');
    $subroutes->get('restore/(:any)', 'Pelanggan::restore/$1');
    $subroutes->get('restore', 'Pelanggan::restore');
    $subroutes->post('delete2/(:any)', 'Pelanggan::delete2/$1');
    $subroutes->delete('delete2', 'Pelanggan::delete2');
});
