<div>
<style>	
.table tbody tr:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
</style>
<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">User List</li>
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
									<h3>User List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
										@if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('Head'))
											<a wire:click="createUser" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a>
										@endif
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
									<form id="filterForm" >
										

										<input type="text" class="form-control" wire:model="search" placeholder="Search users...">
										<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
											<select wire:model="filter">
												<option value="all">All</option>
												<option value="users">Users</option>
												<option value="employees">Employees</option>
												
											</select>
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
									<th style="width: 30%;color:white;">Name</th>
									<th style="width: 25%;color:white;">Email</th>
									<th style="color:white;">Role</th>
									<th style="width: 15%;color:white;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
								<tr>
									<td class="text-capitalize">
										{{ $user->first_name }} {{ $user->middle_name ?? '' }}
										{{ $user->last_name }}
									</td>

									<td>
										{{ $user->email }}
									</td>
									<td>
										@foreach($user->roles as $role)
										<li>{{ $role->name }}</li>
										@endforeach
									</td>
									<td class="text-center">


										 <a class="btn btn-danger btn-sm mx-1"
                                                    wire:click="deleteUser({{ $user->id }})" title="Delete">
											Delete <i class="fa fa-trash"></i>
											</a> 
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
		<script>

				document.addEventListener('DOMContentLoaded', function () {
					var fireIcons = document.querySelectorAll('.box-info li i.fa-fire-extinguisher');

					if (fireIcons.length > 0) {
						// Add a specific class to the last fire extinguisher icon
						fireIcons[fireIcons.length - 1].classList.add('fas-fire-extinguisher-red');
					}

					const filterSelect = document.getElementById('filterSelect');
						const filterForm = document.getElementById('filterForm');

						filterSelect.addEventListener('change', function () {
							filterForm.submit();
						});
				});
				</script>

		{{-- Modal --}}
		<div wire.ignore.self class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<livewire:user.user-form />
			</div>
		</div>
		@section('custom_script')
		@include('layouts.scripts.user-scripts')
		@endsection
</div>