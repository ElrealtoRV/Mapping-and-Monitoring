

<div class="modal-content">
<div class="modal-header" style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">

   
    @if ($userId)
        <span>Edit User</span>
    @else
        <button class="tablinks" onclick="openTab(event, 'AddEmployee')">Add Employee</button>
        <button class="tablinks" onclick="openTab(event, 'AddUser')">Add User</button>
        
    @endif
    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
    @if ($errors->any())
    <span class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
    @endif
    <div class="tabcontent" id="AddEmployee">
        <h1>Add Employee</h1>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
           
                <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Personal Information</h5>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group local-forms">
                                <label>
                                    First Name
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="first_name" placeholder />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group local-forms">
                                <label>Middle Name</label>
                                <input class="form-control" type="text" wire:model="middle_name" placeholder />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group local-forms">
                                <label>
                                    Last Name
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="last_name" placeholder />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Age
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="number" wire:model="age" placeholder />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Birthdate
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="date" wire:model="bdate" placeholder />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Contant Information</h5>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Contact Number
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="contnum" placeholder />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Email
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="email" wire:model="email" placeholder />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Work Information</h5>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Employee ID
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="idnum" placeholder />
                        </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>Office</label>
                                <select class="form-control select" wire:model="office">

                                    <option value="" >Select an office</option>
                                        <option value="BGO" >Building And Ground Office</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (!isset($userId))
                        <div class="row">
                        <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Security Information</h5>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>
                                        Password
                                        <span class="login-danger">*</span>
                                    </label>
                                    <input class="form-control" type="password" wire:model="password" placeholder />
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>
                                        Confirm Password
                                        <span class="login-danger">*</span>
                                    </label>
                                    <input class="form-control" type="password" wire:model="password_confirmation"
                                        placeholder />
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($userId)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" wire:model="password" placeholder />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" type="password" wire:model="password_confirmation" placeholder />
                                    </div>
                                </div>
                            </div>
                        @endif


                   

                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="table-responsive">
                                <table class="table border-0 custom-table comman-table mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%"></th>
                                            <th style="width: 70%">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($selectedRoles))
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                <input type="checkbox" wire:model.defer="selectedRoles"
                                                    class="form-input" value="{{ $role->id }}" {{ in_array($role->id,
                                                $selectedRoles) ? 'checked' : '' }}>
							</td>
							<td>
								<span class="text-capitalize">{{ $role->name }}</span>
							</td>
							</tr>
							@endforeach
							@else

							@endif
							</tbody>
							</table>
						</div> --}}
                            <div style="height: 150px; overflow-y: scroll;">
                                @if (empty($selectedRoles))
                                @forelse ($filteredRoles as $role)

                                        <div class="form-check mb-2">
                                            <input wire:model.defer="roleCheck" type="checkbox" class="form-check-input"
                                                value="{{ $role->name }}" id="{{ $role->name }}">
                                            <label class="form-check-label text-capitalize" for="{{ $role->name }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @empty
                                        <p>No roles found</p>
                                    @endforelse
                                @else
                                @forelse ($filteredRoles as $role)

                                        <div class="form-check mb-2">
                                            <input wire:model.defer="selectedRoles" type="checkbox"
                                                class="form-check-input" value="{{ $role->name }}"
                                                id="{{ $role->name }}"
                                                {{ in_array($role->name, $selectedRoles) ? 'checked' : '' }}>
                                            <label class="form-check-label text-capitalize" for="{{ $role->name }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @empty
                                        <p>No roles found</p>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

				
            </div>
           
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
                                                                                               


<div id="AddUser" class="tabcontent">
    @if ($errors->any())
    <span class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
    @endif
    <h1>Add Requester</h1>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
           
                <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Personal Information</h5>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group local-forms">
                                <label>
                                    First Name
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="first_name" placeholder />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group local-forms">
                                <label>Middle Name</label>
                                <input class="form-control" type="text" wire:model="middle_name" placeholder />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group local-forms">
                                <label>
                                    Last Name
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="last_name" placeholder />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Age
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="number" wire:model="age" placeholder />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Birthdate
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="date" wire:model="bdate" placeholder />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Contant Information</h5>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Contact Number
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="contnum" placeholder />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                    Email
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="email" wire:model="email" placeholder />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Status Information</h5>
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                     ID
                                    <span class="login-danger">*</span>
                                </label>
                                <input class="form-control" type="text" wire:model="idnum" placeholder />
                        </div>
                        </div>

   
                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>Office</label>
                                <select class="form-control select" wire:model="office">

                                    <option value="" >Select an office</option>
                                        <option value="CasDean" >Cas Dean Office</option>
                                        <option value="CbaDean" >CBA Dean Office</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>College</label>
                                <select class="form-control select" wire:model="college">
                                    <option value="" selected>Select a College / Building</option>
                                    <option value="CAS">College of Arts and Sciences (CAS)</option>
                                    <option value="CBA">College of Business Administration (CBA)</option>
                                    <option value="CTEd">College of Teacher Education (CTEd)</option>
                                    <option value="CNPAHS">College of Nursing, Pharmacy, and Allied Health Sciences (CNPAHS)</option>
                                    <option value="CIT">College of Industrial Technology (CIT)</option>
                                    <option value="COL">College of Law (COL)</option>
                                    <option value="ADMIN BUILDING">Admin Building</option>
                                    <option value="GRAGUATE SCHOOL">GRADUATE SCHOOL</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    @if (!isset($userId))
                        <div class="row">
                        <h5 style=" color: orange; margin-top: -5px; padding:10px; font-size:15px;">Security Information</h5>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>
                                        Password
                                        <span class="login-danger">*</span>
                                    </label>
                                    <input class="form-control" type="password" wire:model="password" placeholder />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>
                                        Confirm Password
                                        <span class="login-danger">*</span>
                                    </label>
                                    <input class="form-control" type="password" wire:model="password_confirmation"
                                        placeholder />
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($userId)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" wire:model="password" placeholder />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" type="password" wire:model="password_confirmation" placeholder />
                                    </div>
                                </div>
                            </div>
                        @endif


                
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                        <div style="height: 150px; overflow-y: scroll;">
                                    @if (empty($selectedRoles))
                                        @forelse ($filteredUserRoles as $role)
                                            @if ($role->name == 'Dean')
                                                <div class="form-check mb-2">
                                                    <input wire:model.defer="roleCheck" type="checkbox" class="form-check-input"
                                                        value="{{ $role->name }}" id="{{ $role->name }}">
                                                    <label class="form-check-label text-capitalize" for="{{ $role->name }}">
                                                        {{ $role->name }}
                                                    </label>
                                                </div>
                                            @endif
                                        @empty
                                            <p>No roles found</p>
                                        @endforelse
                                    @else
                                        @forelse ($filteredRoles as $role)
                                            @if ($role->name == 'Dean') 
                                                <div class="form-check mb-2">
                                                    <input wire:model.defer="selectedRoles" type="checkbox"
                                                        class="form-check-input" value="{{ $role->name }}"
                                                        id="{{ $role->name }}"
                                                        {{ in_array($role->name, $selectedRoles) ? 'checked' : '' }}>
                                                    <label class="form-check-label text-capitalize" for="{{ $role->name }}">
                                                        {{ $role->name }}
                                                    </label>
                                                </div>
                                            @endif
                                        @empty
                                            <p>No roles found</p>
                                        @endforelse
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
				
            </div>
           
        </div>
       
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>



<script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
