@extends('layouts.user_type.auth')
@section('content')
<link rel="stylesheet" href="../../css/styles.css">
<div>
	<div class="container-fluid">
		<div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
			<span class="mask bg-gradient-primary opacity-6"></span>
		</div>
		<div class="card card-body blur shadow-blur mx-4 mt-n5">
			<div class="row gx-4">
				<div class="col-auto my-auto">
					<div class="h-100">
						<h5 class="mt-2">
							Roles
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
			<div class="card mb-4 mx-4">
				<div class="card-header pb-0">
					<div class="d-flex flex-row justify-content-between">
						<div style="width: 50%;">
							<input type="text" id="searchInput" class="form-control me-3" placeholder="Search roles..." aria-label="Search">
						</div>
						<!-- @role('Super Admin') -->
						<a href="/role-create" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nuevo Rol</a>
						<!-- @endrole -->
					</div>
				</div>
				<div class="card-body px-0 pt-0 pb-2 mt-3">
					<div class="table-responsive p-0">
						<table id="example" class="table  align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										ID
									</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										Identificación
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Nombre
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Nombre del guardia
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Fecha de Creación
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Acciones
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($roles as $index => $role)
								<tr>
									<td class="text-center">
										<p class="text-xs font-weight-bold mb-0">{{ $role->id }}</p>
									</td>
									<td class="text-center">
										<p class="text-xs font-weight-bold mb-0">{{ $role->team_id }}</p>
									</td>
									<td class="text-center">
										<p class="text-xs font-weight-bold mb-0">{{ $role->name }}</p>
									</td>
									<td class="text-center">
										<p class="text-xs font-weight-bold mb-0">{{ $role->guard_name }}</p>
									</td>
									<td class="text-center">
										<span class="text-secondary text-xs font-weight-bold">{{ $role->created_at->format('d/m/Y') }}</span>
									</td>
									<td class="text-center">
										<a href="/role-view/{{ $role->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Role">
											<span class="badge badge-sm bg-gradient-success">Ver</span>
										</a>
									</td>
									<!-- @role('Super Admin') -->
									<td class="text-center">
										<a href="/roles-destroy/{{ $role->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Role">
											<span class="badge badge-sm bg-gradient-secondary">Eliminar</span>
										</a>
									</td>
									<!-- @endrole -->
								</tr>
								@endforeach
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('searchInput');
		const tableRows = document.querySelectorAll('tbody tr');

		searchInput.addEventListener('input', function() {
			const searchTerm = searchInput.value.toLowerCase();

			tableRows.forEach(row => {
				const rowText = row.textContent.toLowerCase();
				if (rowText.includes(searchTerm)) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		});
	});
</script>