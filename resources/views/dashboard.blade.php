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
									<i class='con fas fa-fire-extinguisher' ></i>
									<span class="text">
										<h3>2543</h3>
										<p>Expired Fire Extinguisher</p>
									</span>
								</li>
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
											<form method="get" action="/dashboard">
											<input type="text"  id="searchInput" placeholder="Search...">
											<i class='bx bx-search search-icon'></i>
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

									@forelse ($regular as $regularuser)
										<tr data-type="user">
											<td>
												
												<p>{{ $regularuser->first_name }} {{ $regularuser->last_name }}</p>
											</td>
											<td>    @foreach($regularuser->roles as $role)
													<li>{{ $role->name }}</li>
													@endforeach
											</td>
											
											
										</tr>
										@empty
										<tr>
											<td colspan="3"></td>
										</tr>
									@endforelse


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
						    <div>
								<!-- @if(auth()->user()->hasRole('admin'))
									@livewire('activity-log.activity-log')
								@endif -->

							</div>
							

			<script>

				document.addEventListener('DOMContentLoaded', function () {
					var fireIcons = document.querySelectorAll('.box-info li i.fa-fire-extinguisher');

					if (fireIcons.length > 0) {
						// Add a specific class to the last fire extinguisher icon
						fireIcons[fireIcons.length - 1].classList.add('fas-fire-extinguisher-red');
					}
				});

				// Listen for the 'viewTask' event and show the view modal




				</script>
		</x-app-layout>
	@endif
