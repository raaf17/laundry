<?php

$routes->group('pengeluaran', ['namespace' => '\App\Modules\Pengeluaran\Controllers'], function ($subroutes) {
    $subroutes->get('/', 'Pengeluaran::index');
    $subroutes->get('new', 'Pengeluaran::new');
    $subroutes->post('create', 'Pengeluaran::create');
    $subroutes->get('edit/(:any)', 'Pengeluaran::edit/$1');
    $subroutes->post('update/(:any)', 'Pengeluaran::update/$1');
    $subroutes->get('detail/(:any)', 'Pengeluaran::detail/$1');
    $subroutes->delete('delete', 'Pengeluaran::delete');
    $subroutes->get('trash', 'Pengeluaran::trash');
    $subroutes->get('restore/(:any)', 'Pengeluaran::restore/$1');
    $subroutes->get('restore', 'Pengeluaran::restore');
    $subroutes->post('delete2/(:any)', 'Pengeluaran::delete2/$1');
    $subroutes->delete('delete2', 'Pengeluaran::delete2');
});
