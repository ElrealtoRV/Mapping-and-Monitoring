
<div class="modal-content">
    <div class="modal-header" style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">
        <h1 class="modal-title fs-5" style="color:white;">
            @if ($taskId)
            Edit Task
            @else
            Add Task
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
                    <div class="form-group local-forms">
                        <label>
                            Task
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="task_name" placeholder />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label for="user_id">Assigned To</label>
                        <select wire:model="user_id" id="user_id">
                            <option value="">Select User</option>
                            @php
                                    $users = \App\Models\User::whereHas('roles', function ($query) {
                                        $query->where('name', 'Maintenance Personnel');
                                    })->get();
                                @endphp
                            @if ($users)
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                                @else
                                    <option value="">No users found</option>
                            @endif
                        </select>
                      
                    </div>
                </div>



            <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Due Date
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="date" wire:model="due_date" placeholder />
                    </div>
                </div>
                <div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
    </form>
</div>

