<div class="content">
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                <li class="breadcrumb-item active">Approved List</li>
            </ul>
        </div>
    </div>
</div>
	<livewire:flash-message.flash-message />
	<div>
	@if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div class="card card-table show-entire">
				<div class="card-body">
                    
					<div class="page-table-header mb-2">
						<div class="row align-items-center">
							<div class="col">
							<div class="doctor-table-blk">
                                <h1>Approve List</h1>
							<div class="col-auto text-end float-end ms-auto download-grp">
									<div class="top-nav-search table-search-blk">
										<form>
											<input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search" name="search">
											<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
										</form>

									</div>
								</div>
</div>
					
					{{--Request list here--}}
					
					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>
								<th style="width: 5%">Transaction Id</th>
									<th style="width: 5%">Requester</th>
									<th style="width: 5%">Id Number</th>
									<th style="width: 5%">College</th>
									<th style="width: 5%">Role</th>									
									<th style="width: 5%">Request</th>
									<th style="width: 5%">Building</th>
									<th style="width: 5%">Floor</th>
									<th style="width: 5%">Room</th>
                                    <th style="width: 5%">Approve By</th>
									
									<th style="width: 5%; text-align: center;">Action</th>
									
								</tr>
							</thead>
							<tbody>
							@foreach($approveRequests as $approveRequest)
								
								<td>{{ $approveRequest->request->transaction_id }}</td>
								<td>{{ $approveRequest->request->user->first_name . ' ' . $approveRequest->request->user->last_name }}</td>
								<td>{{ $approveRequest->request->user->idnum }}</td>
								<td>{{ $approveRequest->request->user->college }}</td>
								<td>{{ $approveRequest->request->user->role }}</td>
								<td>{{ $approveRequest->request->request }}</td>
								<td>{{ $approveRequest->request->building }}</td>
								<td>{{ $approveRequest->request->floor }}</td>
								<td>{{ $approveRequest->request->room }}</td>
								<td>{{ $approveRequest->user->first_name . ' ' . $approveRequest->user->last_name }}</td> <!-- Approver's name -->
								<td class="text-center">
									<div class="btn-group" role="group">
										<a class="btn btn-success btn-sm mx-1"  wire:click="$emit('openTaskModal', '{{ $approveRequest->id }}')">
											<i class="fas fa-edit">Post</i> <!-- Assuming you're using Font Awesome -->
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

    
		{{-- Modal --}}
		<div wire:ignore.self class="modal fade" id="AddTask" tabindex="-1" role="dialog"
    aria-labelledby="AddTask" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <livewire:request.task-form />
    </div>
</div>
        @section('custom_script')
            @include('layouts.scripts.task-script')
        @endsection
	</div>
</div>

<style>
	/* Responsive Styles */
	@media (max-width: 767px) {
		/* Adjust styles for screens smaller than 768px */
		.page-table-header .row {
			flex-direction: column;
			align-items: flex-start;
		}

		.page-table-header .col,
		.page-table-header .col-auto {
			width: 100%;
			margin-bottom: 10px;
		}

		.doctor-table-blk {
			flex-direction: column;
			align-items: flex-start;
		}

		.doctor-search-blk {
			margin-top: 10px;
		}

		.table-search-blk form {
			display: flex;
			align-items: center;
		}

		.table-search-blk form input[type="text"] {
			flex-grow: 1;
			margin-right: 10px;
		}

		/* Adjust table styles for smaller screens */
		.table th,
		.table td {
			font-size: 12px;
			padding: 8px;
		}

		.btn-group .btn {
			font-size: 12px;
			padding: 4px 8px;
		}
	}
	.table tbody tr:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
</style>


	