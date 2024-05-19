
<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Maintenance Record</li>
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
									<h3>Maintenance Record</h3>
									<div class="doctor-search-blk">

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
							<div class="col-sm-2">

							</div>
							<div class="col-sm-2">

							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">
									<th style="width:10%; color:white;">Type</th>
									<th style="width:10%; color:white;">Name</th>
									<th style="width:10%;  color:white;">Serial Number</th>
									<th style="width:10%; color:white;">Location</th>
									<th style="width:10%; color:white;">Maintenance Date</th>
									<th style="width:10%; color:white;">New Expiration Date</th>
									<th style="width:10%; color:white;">Description</th>
									<th style="width:10%; color:white;">Findings</th>
									<th style="width:10%%; color:white;">Status</th>
									<th style="width:10%%; text-align: center;color:white;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($fire as $fires)
								<tr>
                                <td>{{  $fires->type  }}</td>
                                <td>{{ $fires->firename }}</td>
                                <td>{{  $fires->serial_number }}</td>
                                <td>{{ $fires->building . '/ ' . $fires->floor . '/' . $fires->room }}</td>
                                <td>{{  $fires->installation_date }}</td>
                                <td>{{  $fires->expiration_date }}</td>
								<td>{{  $fires->description }}</td>
								<td>{{  $fires->finding }}</td>
                                <td>{{  $fires->status }}</td>
										
									
									<td class="text-center">
										<div class="btn-group" role="group">
											<a class="btn btn-danger btn-sm mx-1" wire:click="deleteRecord({{ $fires->id }})" title="Delete">
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
