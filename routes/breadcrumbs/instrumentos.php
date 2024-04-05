<?php

use App\Models\InsInstrumentosEvaluacione;
use App\Models\InsInstrumentosSeccione;
use App\Models\TiposEvaluacione;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('instrumentos_evaluaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Instrumentos', route('instrumentos_evaluaciones.index'));
});


Breadcrumbs::for('instrumentos_evaluaciones.secciones', function (BreadcrumbTrail $trail, $instrumento_id) {
    $trail->parent('instrumentos_evaluaciones.index');
    $instrumento = InsInstrumentosEvaluacione::find($instrumento_id);
    $trail->push($instrumento->nombre);
    $trail->push('Secciones', route('instrumentos_evaluaciones.secciones', ['instrumento_id' => $instrumento_id]));
});

Breadcrumbs::for('instrumentos_evaluaciones.secciones.cuestionarios', function (BreadcrumbTrail $trail, $instrumento_id, $seccion_id) {
    $trail->parent('instrumentos_evaluaciones.secciones', $seccion_id);
    $seccion = InsInstrumentosSeccione::find($seccion_id);
    $trail->push($seccion->nombre);
    $trail->push('Cuestionario', route('instrumentos_evaluaciones.secciones.cuestionarios', ['seccion_id' => $seccion_id, 'instrumento_id' => $instrumento_id]));
});
