<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Task</li>
				</ul>
			</div>
		</div>
	</div>
  <livewire:flash-message.flash-message />
    {{-- Flash messages --}}
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
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
									<h3>Task List</h3>
									<div class="doctor-search-blk">
									</div>
								</div>
							</div>
							<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
								<form>
										<input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
										<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
									</form>

								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">
                                <th style="width: 20%; color:white;">Task</th>
                                <th style="width: 20%; color:white;">Personnel Maintenance</th>
                                <th style="width: 20%; color:white;">Due Date</th>
                                <th style="width: 20%; color:white;">Status</th>
                                <th style="width: 20%; text-align: center; color:white;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($tasks as $task)
									<tr>
										<td>
											{{ $task->task_name }}
										</td>
                                        <td>
										{{ $task->user->first_name }} {{ $task->user->last_name }}
										</td>
										<td>
											{{ $task->due_date }}
										</td>
                                        <td>
											{{ $task->status }}
										</td>
										<td class="text-center">
											<div class="btn-group" role="group">
												<a class="btn btn-success btn-sm mx-1" wire:click="completeTask({{ $task->id }})" title="Complete">
													<i class="fa fa-check"></i>
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
	</div>
</div>