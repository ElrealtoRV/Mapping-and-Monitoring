	@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head') ||auth()->user()->hasRole('Maintenance Personnel')|| auth()->user()->hasRole('Staff')|| auth()->user()->hasRole('Student'))


		<x-app-layout>
			<div class="content">
			<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			

			<div class="good-morning-blk" >
				<div class="row">   
					<div class="col-md-6">
						<div class="morning-user">
							<h2>
								@php
									$currentTime = now()->hour;
								@endphp

								@if ($currentTime < 12)
									Good Morning,
								@elseif ($currentTime > 18)
									Good Afternoon,
								@else
									Good Evening,
								@endif

								<span class="text-capitalize">
									{{ auth()->user()->first_name }}
									{{ auth()->user()->last_name }}
								</span>
							</h2>
							<p>Have a nice day at work</p>
						</div>
					</div>
					<div class="col-md-6 position-blk">
						<div class="morning-img">
							<img src="assets/img/fire.png" alt>
						</div>
					</div>
				</div>
			</div>

			@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head') || auth()->user()->hasRole('Maintenance Personnel'))
			<div class="head-title">
				<div class="left">
					<ul class="box-info">
					@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head') ||auth()->user()->hasRole('Maintenance Personnel'))
						<li>
							<i class="fas fa-fire-extinguisher"></i>
							<span class="text">
									@if($fires == 0)
										<h3>{{ $fires }}</h3>
										<p>Fire Extinguisher</p>
									@else
										<h3>{{ $fires }}</h3>
										<p>Fire Extinguisher{{ $fires != 1 ? 's' : '' }}</p>
									@endif
							</span>
						</li>
						@endif
						@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
						<li>

						<i class='bx bxs-group'></i>
						<span class="text">
							@php
								$totalRegularUsers = \App\Models\User::where('role', 'Student')->count() + \App\Models\User::where('role', 'Staff')->count();
							@endphp

							@if($totalRegularUsers == 0)
								<h3>{{ $totalRegularUsers }}</h3>
								<p>User</p>
							@else
								<h3>{{ $totalRegularUsers }}</h3>
								<p>User{{ $totalRegularUsers != 1 ? 's' : '' }}</p>
							@endif
						</span>
					</li>

								
							<li>
							<i class='bx bxs-briefcase'></i>
						<span class="text">
							@php
								$totalEmployee = \App\Models\User::where('role', 'Head')->count() + \App\Models\User::where('role', 'Maintenance Personnel')->count();
							@endphp

							@if($totalEmployee == 0)
								<h3>{{ $totalEmployee }}</h3>
								<p>Employee</p>
							@else
								<h3>{{ $totalEmployee }}</h3>
								<p>Employee{{ $totalEmployee != 1 ? 's' : '' }}</p>
							@endif
						</span>
					</li>
					@endif

								<li>
									<i class='fas fa-fire-extinguisher' ></i>
									<span class="text">
										<h3>2543</h3>
										<p>Expired Fire Extinguisher</p>
									</span>
								</li>
								@if(auth()->user()->hasRole('Head'))
								<li>
									<i class='bx bx-task' ></i>
									<span class="text">
									@if($tasks == 0)
										<h3>{{ $tasks }}</h3>
										<p>Task</p>
									@else
										<h3>{{ $tasks }}</h3>
										<p>Task{{ $tasks!= 1 ? 's' : '' }}</p>
									@endif
								</span>
								</li>
								
								<li>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
										</svg>
									<span class="text">


									@if($requests == 0)
										<h3>{{ $requests }}</h3>
										<p>Request</p>
									@else
										<h3>{{ $requests }}</h3>
										<p>Request{{ $requests!= 1 ? 's' : '' }}</p>
									@endif
								</span>
								</li>
								@endif
							</ul> 
						</div>
					</div>
					@endif
					@if(auth()->user()->hasRole('admin'))
					<div class="table-container">
						<div class="table-data">
									<div class="order">
										<div class="user-list">
											<h1>Lists of Users & Employee</h1>
											<form id="filterForm" method="get" action="{{ route('dashboard') }}">
												<input type="text" name="search" id="searchInput" placeholder="Search..." value="{{ $search }}">
												<button type="submit"><i class='bx bx-search search-icon'></i></button>
												<select name="filter" id="filterSelect">
												<option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All</option>
												<option value="users" {{ $filter === 'users' ? 'selected' : '' }}>Users</option>
												<option value="employees" {{ $filter === 'employees' ? 'selected' : '' }}>Employees</option>
												</select>
											
											</form>
											</div>
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Position</th>
													
												</tr>
											</thead>
											<tbody>

									
									@forelse ($users as $user)
										<tr data-type="user">
											<td>
												
												<p>{{  $user->first_name }} {{  $user->last_name }}</p>
											</td>
											<td>    @foreach($user->roles as $role)
													<li>{{ $role->name }}</li>
													@endforeach</td>
										</tr>
										@empty
										<tr>
											<td colspan="3">No users found</td>
										</tr>
									@endforelse
									</tbody>
								</table>
							</div>
						</div>
</div>
						@endif	
							

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

				// Listen for the 'viewTask' event and show the view modal




				</script>
		</x-app-layout>
	@endif
