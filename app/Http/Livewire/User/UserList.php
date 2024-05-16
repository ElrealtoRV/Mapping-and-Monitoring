<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use Livewire\Component;

class UserList extends Component
{
    public $userId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentUser' => '$refresh',
        'deleteUser',
        'editUser',
        'deleteConfirmUser'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createUser()
    {
        $this->emit('resetInputFields');
        $this->emit('openUserModal');
    }

    public function editUser($userId)
    {
        $this->userId = $userId;
        $this->emit('userId', $this->userId);
        $this->emit('openUserModal');
    }

    public function deleteUser($userId)
    {
        User::destroy($userId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render(Request $request)
    {
        $search = '';
        $filter = '';
    
        // Check if the search term is provided in the request
        if ($request->has('search')) {
            $search = $request->input('search');
        }
        if ($request->has('filter')) {
            $filter = $request->input('filter');
        }
        
        $users = User::query();
        
        
        $users->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        });
    
        if (!empty($this->search)) {
            $users->where(function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('college', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('roles', function ($RoleQuery) {
                        $RoleQuery->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }
        
        // Check if the filter option is provided in the request
        if ($filter === 'users') {
            $users->whereHas('roles', function ($query) {
                $query->where('name', 'Dean');   
            });
        } elseif ($filter === 'employees') {
            $users->whereHas('roles', function ($query) {
                $query->whereIn('name', ['Head', 'Maintenance Personnel']);
            });
        } elseif ($filter === 'all') {
            // No additional filter needed for "All" option
        }
    
        $users = $users->get();
    
        return view('livewire.user.user-list', [
            'users' => $users ?? [],
            'search' => $search,
            'filter' => $filter,
        ]);
    }
}
