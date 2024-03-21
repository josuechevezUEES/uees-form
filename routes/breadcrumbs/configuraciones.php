<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('configuraciones.evaluaciones.tipos_evaluadores', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Configuraciones');
    $trail->push('Evaluadores', route('configuraciones.evaluaciones.tipos_evaluadores'));
});

Breadcrumbs::for('configuraciones.evaluaciones.tipos_evaluados', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Configuraciones');
    $trail->push('Evaluados', route('configuraciones.evaluaciones.tipos_evaluados'));
});
