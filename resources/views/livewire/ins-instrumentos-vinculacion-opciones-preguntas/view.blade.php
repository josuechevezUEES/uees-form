@section('title', __('Ins Instrumentos Vinculacion Opciones Preguntas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Ins Instrumentos Vinculacion Opciones Pregunta Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Ins Instrumentos Vinculacion Opciones Preguntas">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Ins Instrumentos Vinculacion Opciones Preguntas
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.insInstrumentosVinculacionOpcionesPreguntas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Opcion Id</th>
								<th>Pregunta Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($insInstrumentosVinculacionOpcionesPreguntas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->opcion_id }}</td>
								<td>{{ $row->pregunta_id }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Ins Instrumentos Vinculacion Opciones Pregunta id {{$row->id}}? \nDeleted Ins Instrumentos Vinculacion Opciones Preguntas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $insInstrumentosVinculacionOpcionesPreguntas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>