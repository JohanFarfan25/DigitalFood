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
							<input type="text" id="searchInput" class="form-control me-3" placeholder="Search users..." aria-label="Search">
						</div>
						@role('Super Admin')
						<a href="/role-create" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Role</a>
						@endrole
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
										Team Id
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Name
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Guard Name
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Creation Date
									</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($roles as $index => $role)
								<tr>
									<td class="ps-4">
										<p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
									</td>
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
											<span class="badge badge-sm bg-gradient-success">view</span>
										</a>
									</td>
									@role('Super Admin')
									<td class="text-center">
										<a href="/roles-destroy/{{ $role->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Role">
											<span class="badge badge-sm bg-gradient-secondary">delete</span>
										</a>
									</td>
									@endrole
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
<script>
	(function($) {
		'use strict';
		$('#example').DataTable();
		$('#data-table-2').DataTable();
		$('#data-table-2').on('draw.dt', function() {
			$('select').selectpicker();
		});
		$('#data-table-3 tfoot th').each(function() {
			var title = $(this).text();
			$(this).append('<input type="text" class="form-control mt-2" placeholder="Search ' + title + '" />');
		});

		// DataTable
		var table = $('#data-table-3').DataTable();

		// Apply the search
		table.columns().every(function() {
			var that = this;
			$('input', this.footer()).on('keyup change', function() {
				if (that.search() !== this.value) {
					that
						.search(this.value)
						.draw();
				}
			});
		});

		//DataTable-4
		var table = $('#data-table-4').DataTable({
			"scrollY": "500px",
			"paging": false
		});
		$('.toggle-vis').on('click', function(e) {
			e.preventDefault();
			// Get the column API object
			var column = table.column($(this).attr('data-column'));
			// Toggle the visibility
			column.visible(!column.visible());
		});

		var table = $('#data-table-5').DataTable({
			"ajax": "objects.txt",
			"columns": [{
					"data": "name"
				},
				{
					"data": "position"
				},
				{
					"data": "office"
				},
				{
					"data": "extn"
				},
				{
					"data": "start_date"
				},
				{
					"data": "salary"
				}
			]
		});

		// Add event listener for opening and closing details
		$('#data-table-5 tbody').on('click', 'td.details-control', function() {
			var tr = $(this).closest('tr');
			var row = table.row(tr);

			if (row.child.isShown()) {
				// This row is already open - close it
				row.child.hide();
				tr.removeClass('shown');
			} else {
				// Open this row
				row.child(format(row.data())).show();
				tr.addClass('shown');
			}
		});

		/* Formatting function for row details - modify as you need */
		function format(d) {
			// `d` is the original data object for the row
			return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
				'<tr>' +
				'<td>Full name:</td>' +
				'<td>' + d.name + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Extension number:</td>' +
				'<td>' + d.extn + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Extra info:</td>' +
				'<td>And any further details here (images etc)...</td>' +
				'</tr>' +
				'</table>';
		}


		var table = $('#data-table-6').DataTable({
			"ajax": "objects.txt",
			"columns": [{
					"className": 'details-control',
					"orderable": false,
					"data": null,
					"defaultContent": ''
				},
				{
					"data": "name"
				},
				{
					"data": "position"
				},
				{
					"data": "office"
				},
				{
					"data": "salary"
				}
			],
			"order": [
				[1, 'asc']
			]
		});

		// Add event listener for opening and closing details
		$('#data-table-6 tbody').on('click', 'td.details-control', function() {
			var tr = $(this).closest('tr');
			var row = table.row(tr);

			if (row.child.isShown()) {
				// This row is already open - close it
				row.child.hide();
				tr.removeClass('shown');
			} else {
				// Open this row
				row.child(format(row.data())).show();
				tr.addClass('shown');
			}
		});
		$('select').selectpicker();
	})(jQuery);
</script>
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