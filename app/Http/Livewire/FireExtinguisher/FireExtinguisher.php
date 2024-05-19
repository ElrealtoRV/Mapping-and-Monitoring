<?php

namespace App\Http\Livewire\FireExtinguisher;

use Livewire\Component;
use App\Models\FireList;
use Carbon\Carbon;

class FireExtinguisher extends Component
{
    public $fireId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
    public $statuses = ['Active', 'Expired'];

   
    

    protected $listeners = [
        'refreshParentFireExtinguisher' => '$refresh',
        'deleteFire',
        'editFire',
        'viewFire',
        'deleteConfirmFire'
        
    ];

    public function mount()
    {
        $this->fire = FireList::all();

    }
    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function createFire()
    {
        $this->emit('resetInputFields');
        $this->emit('openFireModal');
    }

    public function editFire($fireId)
    {
        $this->fireId = $fireId;
        $this->emit('fireId', $this->fireId);
        $this->emit('openFireModal');
        
    }
    public function viewFire($fireId)
    {
        $this->fireId = $fireId;
        $this->emit('openFireModal', $this->fireId);
    }
    public function deleteFire($fireId)
    {
        FireList::destroy($fireId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function isExpirationDateCloseToWarning($expirationDate)
    {
        $expirationDate = Carbon::parse($expirationDate);
        $warningDate = $expirationDate->subYears(2);
        return Carbon::now()->gte($warningDate);
    }

    public function render()
{
    $fireWithWarningStatus = $this->fire->map(function($fire) {
        $fire->is_expiration_warning = $this->isExpirationDateCloseToWarning($fire->expiration_date);
        return $fire;
    });
    $query = FireList::query();

    // Eager load relationships


    // Apply search filter
    if (!empty($this->search)) {
        $query->where(function ($subQuery) {
            $subQuery->where('type', 'LIKE', '%' . $this->search . '%')
                ->orWhere('firename', 'LIKE', '%' . $this->search . '%')
                ->orWhere('serial_number', 'LIKE', '%' . $this->search . '%')
                ->orWhere('building', 'LIKE', '%' . $this->search . '%')
                ->orWhere('floor', 'LIKE', '%' . $this->search . '%')
                ->orWhere('room', 'LIKE', '%' . $this->search . '%');
        });
    } else {
        // If the search term is empty, return all records
        $query->whereRaw('1 = 1');
    }
    
    // Fetch results
    $fire = $query->get();
    

    // Fetch types if needed

    $fireWithWarningStatus = $this->fire->map(function($fire) {
        $fire->is_expiration_warning = $this->isExpirationDateCloseToWarning($fire->expiration_date);

        // Check if the fire extinguisher is expired
        if (Carbon::now()->gt(Carbon::parse($fire->expiration_date))) {
            $fire->status = 'Expired';
        }
        return $fire;
    });
    $this->fire = $query->get()->map(function ($fire) {
        if (Carbon::now()->greaterThan(Carbon::parse($fire->expiration_date))) {
            $fire->status = 'Expired';
        }
        return $fire;
    });
    $expiredFireIds = $this->fire->filter(function ($fire) {
        return Carbon::now()->gt(Carbon::parse($fire->expiration_date));
    })->pluck('id');


    return view('livewire.fire-extinguisher.fire-extinguisher', [
        'fire' => $fire,
        'fire_id' => $fireWithWarningStatus,
      
   
    ]);
}

}