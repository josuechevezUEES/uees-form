@section('title', 'Secciones')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones', $instrumento_id) }}
@stop

<div class="container-fluid">
    <div class="row justify-content-center">
        @forelse($insInstrumentosSecciones as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->instrumento_id }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->literal }}</td>
                <td>{{ $row->fondo_img }}</td>
                <td>{{ $row->estado }}</td>
                <td width="90">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </a>
                        <ul class="dropdown-menu">
                            <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item"
                                    wire:click="edit({{ $row->id }})"><i class="fa fa-edit"></i> Edit </a></li>
                            <li><a class="dropdown-item"
                                    onclick="confirm('Confirm Delete Ins Instrumentos Seccione id {{ $row->id }}? \nDeleted Ins Instrumentos Secciones cannot be recovered!')||event.stopImmediatePropagation()"
                                    wire:click="destroy({{ $row->id }})"><i class="fa fa-trash"></i> Delete
                                </a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @empty
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center p-5">
                            Secciones No Encontradas
                        </p>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="float-end">{{ $insInstrumentosSecciones->links() }}</div>

    </div>
</div>
