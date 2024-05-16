<div>
<style>
	/* Styles for screens smaller than 768px (e.g., mobile devices) */
@media (max-width: 767px) {
    /* CSS rules for mobile screens */
    .card-table {
        font-size: 14px;
    }
    .table th, .table td {
        padding: 0.5rem;
    }
    .btn {
        font-size: 12px;
        padding: 0.25rem 0.5rem;
    }
}
</style>
<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Fire Extinguisher List</li>
				</ul>
			</div>
		</div>
	</div>
	<livewire:flash-message.flash-message />
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div class="card card-table show-entire">
				<div class="card-body">
					<div class="page-table-header mb-2">
						<div class="row align-items-center">
							<div class="col">
								<div class="doctor-table-blk">
									<h3>Fire Extinguisher List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createFire" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
									<form>
										<input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search" name="search">
										<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-md-6 col-sm-12">

							</div>
							<div class="col-md-6 col-sm-12">

							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">
									<th style="width: 5%; color:white;">Type</th>
									<th style="width: 5%; color:white;">Name</th>
									<th style="width: 5%;  color:white;">Serial Number</th>
									<th style="width:5%; color:white;">Building / Department</th>
									<th style="width:5%; color:white;">Floor</th>
									<th style="width:5%; color:white;">Room</th>
									<th style="width: 5%; color:white;">Installation Date</th>
									<th style="width: 5%; color:white;">Expiration Date</th>
									<th style="width: 10%; color:white;">Status</th>
									<th style="width: 10%; text-align: center;color:white;">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($fire as $fire_fetch_list)
       					<tr>
       					     <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
       					     <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
       					     <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
       					     <td>{{ $fire_fetch_list->building }}</td>
       					     <td>{{ $fire_fetch_list->floor }}</td>
       					     <td>{{ $fire_fetch_list->room }}</td>
       					     <td>{{ $fire_fetch_list['installation_date']}}</td>
							<td>{{ $fire_fetch_list['expiration_date']}}</td>
       					     <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
       					
									<td class="text-center">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editFire({{ $fire_fetch_list->id }})" title="Edit">
												<i class='fa fa-pen-to-square'></i>
											</button>

											<a class="btn btn-danger btn-sm mx-1" wire:click="deleteFire({{ $fire_fetch_list->id }})" title="Delete">
												<i class="fa fa-trash"></i>
											</a>
										</div>
																				</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		
</div>