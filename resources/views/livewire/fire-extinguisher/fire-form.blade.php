
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="modal-content" style="max-width: 800px; width: 100%;">
            <div class="modal-header" style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">
                <h1 class="modal-title fs-5" style="color: white;">
                    @if ($fireId)
                        Edit Fire Extinguisher
                    @elseif ($viewMode)
                        View Fire Extinguisher
                    @else
                        Install Fire Extinguisher
                    @endif
                </h1>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"  aria-label="Close"></button>
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
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Type</label>
                                        <select class="form-control select" wire:model="type" @if($viewMode) disabled @endif>
                                            <option value="" selected>Select a Types</option>
                                            <option value="water" selected>Water</option>
                                            <option value="foam" selected>Foam</option>
                                            <option value="CO2" selected>Carbon Dioxide CO2</option>
                                            <option value="dry chemical powder" selected>Dry Powder</option>
                                            <option value="wet chemical" selected>Wet Chemical</option>
                                            <option value="powder" selected>Powder</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Name</label>
                                        <input class="form-control" type="text" wire:model="firename" placeholder @if($viewMode) readonly @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Serial Number</label>
                                        <input class="form-control" type="text" wire:model="serial_number" placeholder @if($viewMode) readonly @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Building / Department</label>
                                        <select class="form-control select" wire:model="building" @if($viewMode) disabled @endif>
                                            <option value="" selected>Select a Building/ College</option>
                                            <option value="CAS" selected>CAS</option>
                                            <option value="CIT" selected>CIT</option>
                                            <option value="CBA" selected>CBA</option>
                                            <option value="ADMIN" selected>ADMIN BUILDING</option>
                                            <option value="CNPAS" selected>CNPAS</option>
                                            <option value="CTED" selected>CTED</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Floor</label>
                                        <select class="form-control select" wire:model="floor" @if($viewMode) disabled @endif>
                                            <option value="" selected>Select a Floor</option>
                                            <option value="Ground-Floor" selected>GROUND FLOOR</option>
                                            <option value="Second-Floor" selected>SECOND FLOOR</option>
                                            <option value="Third-Floor" selected>THIRD FLOOR</option>
                                            <option value="FOURTH-Floor" selected>FOURTH FLOOR</option>
                                            <option value="FIFTH-Floor" selected>FIFTH FLOOR</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Room / Office</label>
                                        <select class="form-control select" wire:model="room" @if($viewMode) disabled @endif>
                                            <option value="" selected>Select a Room</option>
                                            <option value="CAS DEAN OFFICE" selected>CAS DEAN OFFICE</option>
                                            <option value="CAS106" selected>CAS 106</option>
                                            <option value="CAS105" selected>CAS 105</option>
                                            <option value="CAS104" selected>CAS 104</option>
                                            <option value="MASS COMM LABORATORY" selected>MASS COMM LABORATORY</option>
                                            <option value="CAS103" selected>CAS 103</option>
                                            <option value="CAS102" selected>CAS 102</option>
                                            <option value="CAS101" selected>CAS 101</option>
                                            <option value="CAS107" selected>CAS 107</option>
                                            <option value="CAS108" selected>CAS 108</option>
                                            <option value="CAS109" selected>CAS 109</option>
                                            <option value="CAS110" selected>CAS 110</option>
                                            <option value="CAS111" selected>CAS 111</option>
                                            <option value="CAS112" selected>CAS 112</option>
                                            

                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    @if ($fireId)
                                        <div class="col-md-6">
                                            <div class="form-group local-forms">
                                                <label>Maintenance Date</label>
                                                <input class="form-control" type="date" id="date" wire:model="installation_date" @if($viewMode) readonly @endif />
                                                @error('maintenance_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group local-forms">
                                                <label>New Expiration Date</label>
                                                <input class="form-control" type="date" id="expiry-date" wire:model="expiration_date" @if($viewMode) readonly @endif />
                                                @error('expiration_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-md-6">
                                            <div class="form-group local-forms">
                                                <label>Installation Date</label>
                                                <input class="form-control" type="date" id="date" wire:model="installation_date" @if($viewMode) readonly @endif />
                                                @error('maintenance_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group local-forms">
                                                <label>Expiration Date</label>
                                                <input class="form-control" type="date" id="expiry-date" wire:model="expiration_date" @if($viewMode) readonly @endif />
                                                @error('expiration_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($fireId) <!-- Only display the Finding dropdown in edit mode -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group local-forms">
                                                <label>
                                                    Finding
                                                    <span class="login-danger">*</span>
                                                </label>
                                                <select id="findingsDropdown" class="form-control select" wire:model="finding">
                                                    <option value="" selected>Select a Finding</option> 
                                                    <option value="physicalDamage">Physical Damage</option>
                                                    <option value="pressureGauge">Pressure Gauge</option>
                                                    <option value="tamperSeal">Tamper Seal</option>
                                                    <option value="lockingPin">Locking Pin</option>
                                                    <option value="weight">Weight</option>
                                                    <option value="manufacturerLabel">Manufacturer's Label</option>
                                                    <option value="serviceDate">Last Service Date</option>
                                                </select>        
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group local-forms">
                                        <label>Description</label>
                                        <input class="form-control" type="text" wire:model="description" @if($viewMode) readonly @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Status</label>
                                        <select class="form-control" wire:model="status" @if($viewMode) disabled @endif>
                                            <option value=" ">Select</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Refill">Refill</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if ($viewMode)
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @else
                        <button type="submit" class="btn btn-primary">Save</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change',function(ev){
                var data = $('#expiry-date').val();
                Livewire.emit('expiration_date', data);
            })
        });
    </script>
@endpush