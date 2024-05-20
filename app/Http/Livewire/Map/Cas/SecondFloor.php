<?php

namespace App\Http\Livewire\Map\Cas;

use Livewire\Component;
use App\Models\FireList;
use App\Models\TypeList;
use App\Models\LocationList;
use Carbon\Carbon;

class SecondFloor extends Component
{
    public $selectedFloor = 'second-floor';
    public $statuses = ['Active', 'Expired'];
    public $fireId;
    public $selectedRoom = '';
    public $fireFacultyCenter = [];
    public $fireReadingArea = [];
    public $fireLibraryReadingArea = [];
    public $fireLibraryBooksSection = [];
    public $fireInternalAuditOffice = [];
    public $fireInformationTechnologyOffice = [];
    public $fireItoDirectorsOffice = [];
    public $fireLibraryStorageRoom = [];
    public $fireOfficeOfTheLibrarian = [];
    public $fireReferenceAndPeriodicalsSection = [];
    public $fireLawSection = [];
    public $fireGraduateSchoolSection = [];

    public function showFloor($floor)
    {
        $this->selectedFloor = $floor;
    }
    public function mount()
    {
        $this->fireFacultyCenter = FireList::where('room', 'FACULTY CENTER')->get();
        $this->fireReadingArea = FireList::where('room', 'READING AREA')->get();
        $this->fireLibraryReadingArea = FireList::where('room', 'LIBRARY READING AREA')->get();
        $this->fireLibraryBooksSection = FireList::where('room', 'LIBRARY BOOKS SECTION')->get();
        $this->fireInternalAuditOffice = FireList::where('room', 'INTERNAL AUDIT OFFICE')->get();
        $this->fireInformationTechnologyOffice = FireList::where('room', 'INFORMATION TECHNOLOGY OFFICE')->get();
        $this->fireItoDirectorsOffice = FireList::where('room', 'ITO DIRECTORS OFFICE')->get();
        $this->fireLibraryStorageRoom = FireList::where('room', 'LIBRARY STORAGE ROOM')->get();
        $this->fireOfficeOfTheLibrarian = FireList::where('room', 'OFFICE OF THE LIBRARIAN')->get();
        $this->fireReferenceAndPeriodicalsSection = FireList::where('room', 'REFERENCE AND PERIODICALS SECTION')->get();
        $this->fireLawSection = FireList::where('room', 'LAW SECTION')->get();
        $this->fireGraduateSchoolSection = FireList::where('room', 'GRADUATE SCHOOL SECTION')->get();

    }
    public function createFire($roomId)
    {
        $this->selectedRoom = $roomId;
        $this->emit('resetInputFields');
        $this->emit('openMapFormModal');
    }
    public function editFire($fireId)
    {
        $this->fireId = $fireId;
        $this->emit('fireId', $this->fireId);
        $this->emit('openMapFormModal');
        
    }

    public function render()
    {
        $query = FireList::query();
        $fire = $query->get();
        FireList::where('expiration_date', '<', Carbon::now())
        ->update(['status' => 'Expired']);
        return view('livewire.map.cas.second-floor',[
            'fireFacultyCenter' => $this->fireFacultyCenter,
            'fireReadingArea' => $this->fireReadingArea,
            'fireLibraryReadingArea' => $this->fireLibraryReadingArea,
            'fireLibraryBooksSection' => $this->fireLibraryBooksSection,
            'fireInternalAuditOffice' => $this->fireInternalAuditOffice,
            'fireInformationTechnologyOffice' => $this->fireInformationTechnologyOffice,
            'fireItoDirectorsOffice' => $this->fireItoDirectorsOffice,
            'fireLibraryStorageRoom' => $this->fireLibraryStorageRoom,
            'fireOfficeOfTheLibrarian' => $this->fireOfficeOfTheLibrarian,
            'fireReferenceAndPeriodicalsSection' => $this->fireReferenceAndPeriodicalsSection,
            'fireLawSection' => $this->fireLawSection,
            'fireGraduateSchoolSection' => $this->fireGraduateSchoolSection,
        ]);
    }
}
