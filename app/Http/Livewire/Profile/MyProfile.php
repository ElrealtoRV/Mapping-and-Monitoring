<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfile extends Component
{
    public $userId;
    public $first_name;
    public $last_name;
    public $age;
    public $contnum;
    public $idnum;
    public $bdate;
    public $password;
    public $password_confirmation;
    public $editMode = false; // Add this property
    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer|min:18',
        'contnum' => 'required|digits:11',
        'idnum' => 'required|numeric|digits:9',
        'email' => 'required',
        'bdate' => 'required|date',
        'password' => 'nullable|min:6|confirmed',
    ];

    public function mount()
    {
        $user = Auth::user(); // Get authenticated user
        $this->userId = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->age = $user->age;
        $this->contnum = $user->contnum;
        $this->idnum = $user->idnum;
        $this->email = $user->email;
        $this->bdate = $user->bdate;
    }

    public function saveChanges()
    {
        $this->validate();

        // Find the user by ID
        $user = User::find($this->userId);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->age = $this->age;
        $user->contnum = $this->contnum;
        $user->idnum = $this->idnum;
         $user->email = $this->email;
        $user->bdate = $this->bdate;
        if (!empty($this->password)) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        $this->editMode = false; // Disable edit mode after saving changes
        session()->flash('message', 'Profile updated successfully!');
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
        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Retrieve the user with the authenticated user's ID
        $users = User::where('id', $userId)->get();

        return view('livewire.profile.my-profile', [
            'users' => $users,
        ]);
    }
}
