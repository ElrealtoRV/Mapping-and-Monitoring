<?php

namespace App\Http\Livewire\Record;

use Livewire\Component;
use App\Models\FireList;

class RecordList extends Component
{
    public $recordId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshRecord' => '$refresh',
        'deleteRecord',
        'editRecord',
        'deleteConfirmRecord'
        
    ];
   
    public function mount()
    {
        $this->fire = FireList::all();

    }
    public function render()
    {


        $fire = FireList::all();
        

        

            return view('livewire.record.record-list',[
                'fire' => $fire,
            ]); 
    }
}
