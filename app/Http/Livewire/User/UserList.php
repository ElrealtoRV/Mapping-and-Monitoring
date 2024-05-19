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
    public $filter = '';
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

    public function render()
    {
        $query = User::query();

        // Exclude admin users
        $query->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        });

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($subQuery) {
                $subQuery->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('roles', function ($roleQuery) {
                        $roleQuery->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }

        // Apply role-based filter
        if ($this->filter === 'users') {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'Dean');
            });
        } elseif ($this->filter === 'employees') {
            $query->whereHas('roles', function ($query) {
                $query->whereIn('name', ['Head', 'Maintenance Personnel','Secretary']);
            });
        } elseif ($this->filter === 'all') {
            // No additional filter needed for "All" option
        }

        $users = $query->get();

        return view('livewire.user.user-list', [
            'users' => $users,
        ]);
    }
}
