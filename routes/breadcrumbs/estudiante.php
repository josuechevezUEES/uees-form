<?php

use App\Models\InsInstrumentosEvaluacione;
use App\Models\TiposEvaluacione;
use App\Models\TiposEvaluado;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('estudiantes.evaluaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Evaluaciones');
});

Breadcrumbs::for('estudiantes.evaluaciones.ver', function (BreadcrumbTrail $trail, $instrumento_id) {
    $trail->parent('estudiantes.evaluaciones.index');
    $instrumento = TiposEvaluacione::find($instrumento_id);
    $trail->push($instrumento->nombre);
    $trail->push('Secciones', route('instrumentos_evaluaciones.secciones', ['instrumento_id' => $instrumento_id]));
});
