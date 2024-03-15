<?php

$routes->group('jenis', ['namespace' => '\App\Modules\Jenis\Controllers'], function ($subroutes) {
    $subroutes->get('/', 'Jenis::index');
    $subroutes->get('new', 'Jenis::new');
    $subroutes->post('create', 'Jenis::create');
    $subroutes->get('edit/(:any)', 'Jenis::edit/$1');
    $subroutes->post('update/(:any)', 'Jenis::update/$1');
    $subroutes->delete('delete', 'Jenis::delete');
    $subroutes->get('trash', 'Jenis::trash');
    $subroutes->get('restore/(:any)', 'Jenis::restore/$1');
    $subroutes->get('restore', 'Jenis::restore');
    $subroutes->post('delete2/(:any)', 'Jenis::delete2/$1');
    $subroutes->delete('delete2', 'Jenis::delete2');
});
