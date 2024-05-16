<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\RegularList;
use App\Models\EmployeeList;
use App\Http\Livewire\TodoList;
use App\Models\User;
use App\Models\Task;
use App\Models\Position;
use App\Models\FireList;
use Illuminate\Http\Request;

class Home extends Controller
{
    public $userId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash




    public function index()
    {

        $time = Carbon::now()->format('H');
        $operations = 0;

         
        $userCounts = User::count();
        $users = User::all();
        $tasks = Task::all();
        $fires = FireList::count();
        $affiliations = User::all();

        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
   
        $userCounts = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->count();
        

        return view('home', [
            'time' => $time,
            'operations' => $operations,
            'userCounts' => $userCounts,
            'users' => $users,
            'tasks' => $tasks,
            'fires' => $fires,
            'affiliations' => $affiliations,

        ]);
    }

    
}
