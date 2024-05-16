<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\FireList;
use App\Models\TypeList;
use App\Models\LocationList;
use Carbon\Carbon;
use Livewire\Livewire;

class ReportList extends Component
{
    public $action = '';  //flash
    public $message = '';  //flash



       public function render()
{
   


    return view('livewire.report.report-list', [
   
    ]);
}

}