<?php

namespace App\Http\Livewire\Report;

use App\Models\FireListHistory;
use Livewire\Component;

class History extends Component
{
    public function render()
    {
        $history = FireListHistory::all();
        return view('livewire.report.history',[
            'history' => $history,
        ]);
    }
}
