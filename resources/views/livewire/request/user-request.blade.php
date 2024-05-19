<div class="content">
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                <li class="breadcrumb-item active">Request List</li>
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
									@if ($showRequestList)
										<h3>My Request</h3>
										<div class="doctor-search-blk">
											<div class="add-group">
												<a wire:click="createRequest" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt></a>
											</div>
										</div>
									@endif
								</div>
								<!-- <div class="col-sm-12 mt-2">
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-primary" wire:click="showRequestList">Request List</button>
									<button type="button" class="btn btn-success" wire:click="showApproveList">Approve List</button>
								</div>
							</div> -->
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
					
					{{--Request list here--}}
					@if ($showRequestList)
					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>								
									<th style="width: 5%">Request</th>
									<th style="width: 5%">Type</th>
									<th style="width: 5%">Serial Number</th>
									<th style="width: 5%">Building</th>
									<th style="width: 5%">Floor</th>
									<th style="width: 5%">Room</th>
									<th style="width: 5%">Approve By:</th>
									<th style="width: 5%">Approve At:</th>
                                    <th style="width: 5%">Status</th>
									<th style="width: 5%; text-align: center;">Action</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach ($requests as $request)
								<tr>
								<td>{{  $request->request }}</td>
								<td>{{  $request->type  }}</td>
                                <td>{{  $request->serial_number  ?? 'No Serial provided'}}</td>
								<td>{{  $request->building ?? 'No Building provided'}}</td>
								<td>{{  $request->floor  ?? 'No Floor provided' }}</td>
								<td>{{  $request->room  ?? 'No Building provided' }}</td>
								<td>{{ $request->approver ?? 'Waiting For Approval' }}</td>
								<td>{{ $request->approved_at ?? 'Not Approved Yet' }}</td>
                                <td>{{  $request->status  }}</td>
                                
                                
										
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-secondary btn-sm mx-1" wire:click="cancelRequest({{ $request->id }})" title="Cancel">
                                            Cancel<i class="fas fa-times"></i>
                                        </a>
                                        <a class="btn btn-success btn-sm mx-1" wire:click="editRequest({{ $request->id }})" title="Edit">
                                            <i class="bx bxs-edit"></i>
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
		@else
    {{-- Approve list --}}
    <div class="table-responsive">
        <table class="table border-0 custom-table comman-table datatable mb-0">
            <thead>
                <tr>
                    <th>Requester</th>
                    <th>ID Number</th>
                    <th>Request</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvedRequests as $approvedRequest)
                    <tr>
                        <td>{{ $approvedRequest->regularUser->first_name }} {{ $approvedRequest->regularUser->last_name }}</td>
                        <td>{{ $approvedRequest->regularUser->idnum }}</td>
                        <td>{{ $approvedRequest->request->affiliation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
</div>
		{{-- Modal --}}
		<div wire.ignore.self class="modal fade" id="RequestModal" tabindex="-1" role="dialog" aria-labelledby="RequestModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<livewire:request.request-form />
			</div>
		</div>
		@section('custom_script')
		@include('layouts.scripts.request-scripts')
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