<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home', route('home'));
    $trail->push('Roles', route('roles.index'));
});

