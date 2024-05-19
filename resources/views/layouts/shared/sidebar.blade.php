
<div class="sidebar"  id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div class="sidebar-menu" style="margin-top: 20px;" id="sidebar-menu">
			<ul>
						@if(auth()->user()->hasRole('Maintenance Personnel') || auth()->user()->hasRole('Dean'))
								<li>
								<a href="home"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
									<span>Home</span></a>
								</li>
						@endif
						@if( auth()->user()->hasRole('Dean'))
							<li class="submenu">
								<a href="#"><span class="menu-side"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg></i></span>
									<span>Request</span> <span class="menu-arrow"></span>
								</a>

								<ul style="display: none;">

									<li><a href="{{ asset('user-request') }}">Request List</a></li>
									
								</ul>
							</li>
							@endif
			@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head')||auth()->user()->hasRole('Secretary'))

			<li class="menu-title">Core</li>
				<li>
					<a href="dashboard"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
						<span>Dashboard</span></a>
				</li>
				@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
						<span>User Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						
						@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
						<li><a href="{{ asset('user') }}">Users</a></li>
						@endif
					</ul>	
				</li>
				@endif
			@endif
				@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Secretary')||auth()->user()->hasRole('Dean'))
				<li>
					<a href="map"><span class="menu-side"><i class="fas fa-map-marker"></i></span>
						<span>Map</span>
					</a>
				</li>
				@endif
				@if(auth()->user()->hasRole('Maintenance Personnel'))
				<li>
					<a href="{{ asset('task-list') }}"><span class="menu-side"><i  class='bx bx-task'></i></span>
						<span>Task</span>
					</a>
				</li>
				@endif
				@if(auth()->user()->hasRole('Head')||auth()->user()->hasRole('admin')||auth()->user()->hasRole('Secretary'))
				<li>
					<a href="{{ asset('task-manager') }}"><span class="menu-side"><i  class='bx bx-task'></i></span>
						<span>Task</span>
					</a>
				</li>
				@endif
				@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fas fa-fire-extinguisher"></i></span>
						<span>FEM System</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="{{ asset('fire-extinguisher') }}">Fire Extinguisher</a></li>
						<li><a href="{{ asset('record') }}">Record</a></li>
						<!-- <li><a href="{{ asset('expired-list') }}">Expired List</a></li> -->
						<!-- <li><a href="{{ asset('type') }}">Type</a></li>
						<li><a href="{{ asset('location') }}">Location</a></li> -->
						
					</ul>
				</li>
				@endif
				@if(auth()->user()->hasRole('Head')||auth()->user()->hasRole('admin')||auth()->user()->hasRole('Secretary'))
				<li class="submenu">
					<a href="#"><span class="menu-side"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
							<line x1="16" y1="2" x2="16" y2="6"></line>
							<line x1="8" y1="2" x2="8" y2="6"></line>
							<line x1="3" y1="10" x2="21" y2="10"></line>
						</svg></span>
						<span>Request</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">
					@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head')||auth()->user()->hasRole('Secretary'))
						<li><a href="{{ asset('approve-list') }}">Approve List</a></li>
						@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
						<li><a href="{{ asset('add-request') }}">Add Request</a></li>
						<li><a href="{{ asset('request') }}">Request List</a></li>
						@endif
					@endif
					</ul>
				</li>
				@endif


				@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head'))
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-list"></i></span>
						<span>Reports</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">	

						
						<li><a href="/report">Report</a></li>
						@if(auth()->user()->hasRole('admin'))
						<li><a href="activity-log">Activity Log</a></li>
						<li><a href="/history">History</a></li>
						@endif
					</ul>
				</li>
				
						<li class="menu-title">System</li>
						
						<li class="submenu">
							<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
								<span>Setup</span> <span class="menu-arrow"></span>
							</a>

							<ul style="display: none;">
							@if(auth()->user()->hasRole('admin'))
								<li><a href="/positions">Position</a></li>
							@endif
							
							@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
								<li><a href="{{ asset('inspection ') }}">Inspection Findings</a></li>
							@endif
							</ul>
						</li>
						@endif
						@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Dean')||auth()->user()->hasRole('Secretary'))

						<li class="submenu">
							<a href="#"><span class="menu-side"><i class="fa-solid fa-cog"></i></span>
								<span>Setting</span> <span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li><a href="setting">setting</a></li>
								@if(auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Dean')||auth()->user()->hasRole('Secretary'))
								<li><a href="my-profile">Profile</a></li>
								@endif
							</ul>
						</li>
						@endif
						
								<li class="submenu">
									<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
										<i class='bx bxs-log-out-circle'></i>
										<span>Logout</span>
									</a>
								</li>
							

						
			</ul>
			</div>
	</div>
</div>