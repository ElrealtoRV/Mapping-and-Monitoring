
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
                                @foreach ($addrequests as $addrequest)
                                    <option value="{{ $addrequest->id }}">
                                        {{ $addrequest->description }}
                                    </option>
                                @endforeach
                                </select>
                                
                            </div>
                        </div>
                    <h5 class="text-warning">Request for Installing</h5>
                        <div class="row">
                        <div class="col-md-4">
                                <label>
                                   Building
                                    <span class="login-danger"></span>
                                </label>
                                <select class="form-control select" wire:model="building">

                                    <option value="" selected>Select a Building</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->building }}">
                                            {{ $location->building }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                       

                        <div class="col-md-4">
                                <label>
                                   Floor
                                    <span class="login-danger"></span>
                                </label>
                                <select class="form-control select" wire:model="floor">

                                    <option value="" selected>Select a Floor</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->floor }}">
                                            {{ $location->floor }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="col-md-4">
                           
                                <label>
                                    Room
                                    <span class="login-danger">*</span>
                                </label>
                                <select class="form-control select" wire:model="room">

                                    <option value="" selected>Select a Room</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->room }}">
                                            {{ $location->room }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div> 
                    <h5 class="text-warning">Request for Maintenance</h5>
                    <div class="row">
                        <div class="col-md-4">            
                                <label>
                                   Type
                                    <span class="login-danger"></span>
                                </label>
                                <select class="form-control select" wire:model="type">

                                    <option value="" selected>Select a Types</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->description }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                        
                            <div class="col-md-4"> 
                                <label>
                                    Brand Name
                                    <span class="login-danger"></span>
                                </label>
                                <input class="form-control" type="text" wire:model="firename" placeholder />
                           
                            </div>
                    
                        <div class="col-md-4">
                                <label>
                                    Serial Number
                                    <span class="login-danger"></span>
                                </label>
                                <input class="form-control" type="text" wire:model="serial_number" placeholder />
                            </div>
                        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
