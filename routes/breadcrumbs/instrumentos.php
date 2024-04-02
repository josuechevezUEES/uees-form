<?php

use App\Models\TiposEvaluacione;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('instrumentos_evaluaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Instrumentos', route('instrumentos_evaluaciones.index'));
});
