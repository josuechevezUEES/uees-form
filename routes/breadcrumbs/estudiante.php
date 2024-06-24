<?php

use App\Models\EvaEvaluacione;
use App\Models\InsInstrumentosEvaluacione;
use App\Models\InsInstrumentosSeccione;
use App\Models\TiposEvaluacione;
use App\Models\TiposEvaluado;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('estudiantes.evaluaciones.secciones', function (BreadcrumbTrail $trail, $evaluacion_id) {
    $trail->parent('home');
    $record = EvaEvaluacione::find($evaluacion_id);
    $trail->push($record->tiposEvaluacione->nombre, route('estudiantes.evaluaciones.secciones', ['evaluacion_id' => $evaluacion_id]));
});

Breadcrumbs::for('estudiantes.evaluaciones.seccion', function (BreadcrumbTrail $trail, $evaluacion_id, $seccion_id) {
    $trail->parent('estudiantes.evaluaciones.secciones', $evaluacion_id);

    $record = InsInstrumentosSeccione::find($seccion_id);

    $trail->push('Seccion');

    $trail->push($record->nombre, route('estudiantes.evaluaciones.secciones', [
        'evaluacion_id' => $evaluacion_id,
        'seccion_id' => $seccion_id
    ]));
});

Breadcrumbs::for('estudiantes.evaluaciones.ver', function (BreadcrumbTrail $trail, $instrumento_id) {
    $trail->parent('estudiantes.evaluaciones.index');
    $instrumento = TiposEvaluacione::find($instrumento_id);
    $trail->push($instrumento->nombre);
    $trail->push('Secciones', route('instrumentos_evaluaciones.secciones', ['instrumento_id' => $instrumento_id]));
});
