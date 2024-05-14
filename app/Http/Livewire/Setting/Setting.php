<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\User;

class Setting extends Component
{
    public function render()
    {
            // Retrieve the authenticated user's ID
    $userId = auth()->id();

    // Retrieve the user with the authenticated user's ID
    $users = User::where('id', $userId)->get();

        return view('livewire.setting.setting',[
            'users' => $users,
        ]);
    }
}
