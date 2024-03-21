<?php

use App\Models\TiposEvaluacione;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('evaluaciones.tipos', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Tipos Evaluaciones', route('evaluaciones.tipos'));
});


Breadcrumbs::for('evaluaciones.tipos.configuraciones', function (BreadcrumbTrail $trail, $tipo_evaluacion_id) {
    $trail->parent('evaluaciones.tipos', route('evaluaciones.tipos'));
    $record = TiposEvaluacione::find($tipo_evaluacion_id);
    $trail->push($record->nombre);
    $trail->push('Configuraciones', route('evaluaciones.tipos.configuraciones', ['tipo_evaluacion_id' => $tipo_evaluacion_id]));
});
