
<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
                Edit Request
            @else
                Add Request
            @endif
        </h1>
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
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group local-forms">
                                <label>
                                 Request
                                    <span class="login-danger">*</span>
                                </label>
                                <select class="form-control select" wire:model="request">

                                <option value="" selected>Select a Request</option>
                                    <option value="Install Fire Extinguisher">Install Fire Extinguisher</option>
                                </select>
                                
                            </div>
                        </div>
                    <h5 class="text-warning">Request for Installing</h5>
                        <div class="row">
                      
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Building / Department</label>
                                        <select class="form-control select" wire:model="building" >
                                            <option value="" selected>Select a Building/ College</option>
                                            <option value="CAS" selected>CAS</option>
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
                                        <select class="form-control select" wire:model="floor" >
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
                                        <select class="form-control select" wire:model="room" >
                                            <option value="" selected>Select a Room</option>
                                            <option id="Ground-Floor" value="CAS DEAN OFFICE" selected>CAS DEAN OFFICE</option>
                                            <option id="Ground-Floor" value="CAS106" selected>CAS 106</option>
                                            <option id="Ground-Floor" value="CAS105" selected>CAS 105</option>
                                            <option id="Ground-Floor" value="CAS104" selected>CAS 104</option>
                                            <option id="Ground-Floor" value="MASS COMM LABORATORY" selected>MASS COMM LABORATORY</option>
                                            <option id="Ground-Floor" value="CAS103" selected>CAS 103</option>
                                            <option id="Ground-Floor" value="CAS102" selected>CAS 102</option>
                                            <option id="Ground-Floor" value="CAS101" selected>CAS 101</option>
                                            <option id="Ground-Floor" value="CAS107" selected>CAS 107</option>
                                            <option id="Ground-Floor" value="CAS108" selected>CAS 108</option>
                                            <option id="Ground-Floor" value="CAS109" selected>CAS 109</option>
                                            <option id="Ground-Floor" value="CAS110" selected>CAS 110</option>
                                            <option id="Ground-Floor" value="CAS111" selected>CAS 111</option>
                                            <option id="Ground-Floor" value="CAS112" selected>CAS 112</option>
                                            <option value="FACULTY CENTER" selected>FACULTY CENTER</option>
                                            <option value="READING AREA" selected>READING AREA</option>
                                            <option value="LIBRARY READING AREA" selected>LIBRARY READING AREA</option>
                                            <option value="LIBRARY BOOKS SECTION" selected>LIBRARY BOOKS SECTION</option>
                                            <option value="INTERNAL AUDIT OFFICE" selected>INTERNAL AUDIT OFFICE</option>
                                            <option value="INFORMATION TECHNOLOGY OFFICE" selected>INFORMATION TECHNOLOGY OFFICE</option>
                                            <option value="ITO DIRECTORS OFFICE" selected>ITO DIRECTOR'S OFFICE</option>
                                            <option value="LIBRARY STORAGE ROOM" selected>LIBRARY STORAGE ROOM</option>
                                            <option value="OFFICE OF THE LIBRARIAN" selected>OFFICE OF THE LIBRARIAN</option>
                                            <option value="REFERENCE AND PERIODICALS SECTION" selected>"REFERENCE AND PERIODICALS SECTION</option>
                                            <option value="lAW SECTION" selected>lAW SECTION</option>
                                            <option value="GRADUATE SCHOOL SECTION" selected>GRADUATE SCHOOL SECTION</option>
                                            

                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div> 
                    <h5 class="text-warning">Request for Maintenance</h5>
                    <div class="row">
                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group local-forms">
                                        <label>Type</label>
                                        <select class="form-control select" wire:model="type" >
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
                        </div>
                        
                            <div class="col-md-4"> 
                                <label>
                                    Brand Name
                                    <span class="login-danger"></span>
                                </label>
                                <input class="form-control" type="text" wire:model="firename" placeholder />
                           
                            </div>
                    
                        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
