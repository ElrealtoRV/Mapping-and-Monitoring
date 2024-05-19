<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestLists;
use App\Models\User;
use App\Models\Task;
use App\Models\Position;
use App\Models\FireList;


use Carbon\Carbon;

class DashboardController extends Controller
{
    public $userId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash


    public function expiredNotif(Request $request)
    {
        // Fetch count of fire extinguishers with status "expired"
        $expiredCount = FireList::where('status', 'Expired')->count();
    
        // You can customize the response format according to your needs
        return response()->json([
            'expiredCount' => $expiredCount
        ]);
    }
    public function installFireNotif(Request $request)
    {
        // Fetch count of fire extinguishers with status "Installed"
        $installCount = FireList::where('status', 'Active')->count();
    
        // You can customize the response format according to your needs
        return response()->json([
            'installCount' => $installCount
        ]);
    }
    
    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function index(Request $request)
    {
        
        $userCounts = User::count();
        $users = User::all();
        $fires = FireList::count();
        $this->expiredFireCount = FireList::where('status', 'Expired')->count(); // Count expired fire extinguishers
        $tasks = Task::count();
        $requests = RequestLists::count();
    
        // Initialize $search and $filter variables
        $search = '';
        $filter = '';
    
        // Check if the search term is provided in the request
        if ($request->has('search')) {
            $search = $request->input('search');
        }
    
        // Check if the filter option is provided in the request
        if ($request->has('filter')) {
            $filter = $request->input('filter');
        }
    
        // Apply search filter if search term is provided
        $usersQuery = User::query();
        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhereHas('roles', function ($roleQuery) use ($search) {
                        $roleQuery->where('name', 'like', '%' . $search . '%');
                    });
            });
        }
    
        // Apply filter based on the selected option
        if ($filter === 'users') {
            $usersQuery->whereHas('roles', function ($query) {
                $query->where('name', 'Dean');
                    
            });
        } elseif ($filter === 'employees') {
            $usersQuery->whereHas('roles', function ($query) {
                $query->whereIn('name', ['Head', 'Maintenance Personnel','Secretary']);
            });
        } elseif ($filter === 'all') {
            // No additional filter needed for "All" option
        }
    
        $users = $usersQuery->get();
        $userCounts = $usersQuery->count();
    
        if ($request->ajax()) {
            // If the request is AJAX, return the filtered users data as HTML
            return view('dashboard', [
                'users' => $users,
            ])->render();
        }
    
        return view('dashboard', [
            'userCounts' => $userCounts,
            'users' => $users,
            'fires' => $fires,
            'expiredFireCount' => $this->expiredFireCount,
            'tasks' => $tasks,
            'requests' => $requests,
            'search' => $search,
            'filter' => $filter,
            

        ]);
    }
     
}