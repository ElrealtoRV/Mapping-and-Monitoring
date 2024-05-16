<?php

use App\Http\Livewire\Request\UserRequest;
use App\Http\Livewire\Status\StatusList;
use App\Http\Livewire\User\UserList;
use App\Http\Livewire\ActivityLog\ActivityLog;
use App\Http\Livewire\RegularUser\RegularUserList;
use App\Http\Livewire\Employee\Employee;
use App\Http\Livewire\Type\Type;
use App\Http\Livewire\Setting\Setting;
use App\Http\Livewire\Location\Location;
use App\Http\Livewire\Inspection\Inspection;
use App\Http\Livewire\Request\RequestList;
use App\Http\Livewire\AddRequest\AddRequest;
use App\Http\Livewire\AddTaskModal\AddTaskModal;
use App\Http\Livewire\FireExtinguisher\FireExtinguisher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home;
use App\Http\Livewire\Authentication\RoleList;
use App\Http\Livewire\Authentication\PermissionList;
use App\Http\Livewire\Position\PositionList;
use App\Http\Livewire\HomePage\HomePage;
use App\Http\Livewire\Profile\MyProfile;
use App\Http\Livewire\Affiliation\AffiliationList;
use App\Http\Livewire\Office\OfficeList;
use App\Http\Livewire\Record\RecordList;
use App\Http\Livewire\Map\BuildingList;
use App\Http\Livewire\Map\Cas\CasFloor;
use App\Http\Livewire\Map\Cas\GroundFloor;
use App\Http\Livewire\Department\DepartmentList;
use App\Http\Livewire\Task\TaskManager;
use App\Http\Livewire\Task\TaskList;
use App\Http\Livewire\Report\ReportList;
use App\Http\Livewire\ExpiredList\ExpiredList;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('status', StatusList::class);
    Route::get('role', RoleList::class);
    Route::get('permission', PermissionList::class);
    Route::view('setting', 'setting')->name('setting');
   
});
Route::group(['middleware' => ['role:admin|Head|Maintenance Personnel|Dean']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('setting', setting::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //map
    Route::get('map', BuildingList::class);
    Route::get('/cas-floor', CasFloor::class)->name('cas.floor');

});
Route::group(['middleware' => ['role:admin|Head']], function () {
    Route::get('user', UserList::class);
    Route::get('positions', PositionList::class);
    Route::get('office',OfficeList::class);
    Route::get('location', Location::class);
    Route::get('inspection', Inspection::class);
    Route::get('fire-extinguisher', FireExtinguisher::class);
    Route::get('expired-list',FireExtinguisher::class);
    // Route::get('fire-form', Cas::class);
    Route::get('record', RecordList::class);
    Route::get('/report', ReportList::class)->name('report');
   






});
Route::group(['middleware' => ['role:Maintenance Personnel|Dean']], function () {
    Route::get('/home', [Home::class, 'index'])->name('home');
    Route::get('/home-page', HomePage::class);
  
});

Route::group(['middleware' => ['role:Head|Maintenance Personnel|Dean']], function () {

    Route::get('my-profile', MyProfile::class);
  
});
Route::group(['middleware' => ['role:Dean']], function () {
    Route::get('user-request', UserRequest::class);
});
Route::group(['middleware' => ['role:Maintenance Personnel']], function () {
    Route::get('/task-list', TaskList::class);
});
Route::group(['middleware' => ['role:Head']], function () {
    Route::get('request', RequestList::class);
    Route::get('add-request', AddRequest::class);
    Route::get('/task-manager', TaskManager::class);
    Route::get('/task-form', TaskManager::class);

});
require __DIR__.'/auth.php';
