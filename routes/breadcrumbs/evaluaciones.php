<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('evaluaciones.tipos', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Evaluaciones');
    $trail->push('Tipos', route('evaluaciones.tipos'));
});
