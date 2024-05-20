<div>
<style>
    .popup {
    margin-top: 18px;
    display: flex;
    margin-left: 9px;
    margin-right: 9px;
    flex-direction: row;
    background-color: none;
    background:none;

}

.half {
    border: none; /* Just for visualization */
}

.first-half th{ 
    display: flex;
    flex-direction: row;
    background: transparent;
    color: #4e6b7a; 
    font-size: 15px;
    line-height: 1.5; 
    padding: 5px 10px; /* Adjust the padding to increase or decrease vertical spacing */
    border-right: 25px;
}



.second-half tr td{
    display: flex;
    flex-direction: row;
    background: none;
    color: blue;
    font-size: 15px;
    line-height: 1.5; 
    padding: 5px 10px; /* Adjust the padding to increase or decrease vertical spacing */
    border-right: 25px;
}

    .floor-content {
        display: inline-block;
        padding: 20px;
        position: relative;
    }



/* Other styles... */

.FacultyCenter,
.ReadingArea,
.LibraryReadingArea,
.LibraryBooksSection,
.InternalAuditOffice,
.InformationTechnologyOffice,
.ItoDirectorsOffice,
.LibraryStorageRoom,
.OfficeOfTheLibrarian,
.ReferenceAndPeriodicalsSection,
.LawSection,
.GraduateSchoolSection {
    position: absolute;
    cursor: pointer;
    display: flex;
    gap: 10px;
}

.FacultyCenter {
    top: 35px;
    left: 120px;
}

.ReadingArea {
    top: 35px;
    left: 445px;
}

.LibraryReadingArea {
    top: 35px;
    left: 830px;
}

.LibraryBooksSection {
    top: 35px;
    left: 965px;
}

.InternalAuditOffice {
    top: 215px;
    left: 120px;
    justify-content: space-between;
    gap: 5px;
}

.InformationTechnologyOffice {
    top: 205px;
    left: 180px;
    justify-content: space-between;
    gap: 5px;
}

.ItoDirectorsOffice {
    top: 205px;
    left: 250px;
    justify-content: space-between;
    gap: 5px;
}

.LibraryStorageRoom {
    top: 205px;
    left: 290px;
    justify-content: space-between;
    gap: 5px;
}

.OfficeOfTheLibrarian {
    top: 205px;
    left: 430px;
    justify-content: space-between;
    gap: 5px;
}

.ReferenceAndPeriodicalsSection {
    top: 205px;;
    left: 680px;
    justify-content: space-between;
    gap: 5px;
}

.LawSection {
    top: 205px;
    left: 810px;
    justify-content: space-between;
    gap: 5px;
}

.GraduateSchoolSection{
    top: 205px;
    left: 945px;
    justify-content: space-between;
    gap: 5px;
}

#eye-icon,
#edit-icon,
#plus-icon {
    font-size: small;
    display: inline-block;
    margin-left: 13px;
}

#edit-icon {
    color: green;
    margin-left: 5px;
}

#eye-icon {
    color: gray;
    margin-left: 20px;
}

.edit-icon {
    color: green;
    margin-left: -13px;
}

.eye-icon {
    color: gray;
    padding-right: 20px;
}
.plus-icon {
    color: black;
    padding-right: 20px;
}

#tooltipText {
  z-index: 9999;
  position: fixed;
  transform: translate(-50%, -50%);
  background-image: linear-gradient(to top, #007bff, #ffffff);
  color: #fff;
  white-space: nowrap;
  border-radius: 7px;
  visibility: hidden;
  opacity: 0;
  transition: opacity 0.5s ease;
  width: auto;
  height: 420px;
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
  padding-top: 10px;
  display: inline-block;
  border: 2px solid #007bff;
}

#tooltipText.active {
  top: 50%;
  left: 50%;
  visibility: visible;
  opacity: 1;
}

#tooltip:hover #tooltipText,
#tooltip.active {
  top: 50%;
  left: 50%;
  visibility: visible;
  opacity: 1;
}

#tooltipText.active .eye-icon {
  color: red; /* Change the color to red when #tooltipText has the active class */
}

.empty {
  color: #333333 !important;
  font-style: italic;
  font-weight: bold;
}

.HAHA {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  border: 1px solid #ccc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  width: 455px;
  height: 400px;
}

.HAHA-close {
  position: absolute;
  top: 5px;
  right: 5px;
  cursor: pointer;
}
@media (max-width: 767px) {
  #tooltip {
    font-size: 14px;
  }

  .half {
    width: 100%;
    float: none;
  }

  .second-half {
    margin-top: 20px;
  }

  table {
    width: 100%;
  }

  th, td {
    padding: 5px;
    font-size: 12px;
  }


}
@media (max-width: 768px) {
        .horizontal-scroll-container {
            width: 800px; /* Adjust this value based on your desired width for smaller screens */
        }
    }
</style>
<livewire:flash-message.flash-message />
<div class="scroll-container">
    <div id="second-floor" class="floor-content">
        <img src="{{ asset('assets/img/CasSecondFloor.png') }}" alt="SecondFloor" width="1000px" height="300px">

<div id="facultycenterIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="FacultyCenter"><i class="fas fa-plus plus-icon" wire:click="createFire('FACULTY CENTER')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireFacultyCenter->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireFacultyCenter as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="FacultyCenter"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireFacultyCenter as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="FacultyCenter"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>



<div id="readingareaIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="ReadingArea"><i class="fas fa-plus plus-icon" wire:click="createFire('READING AREA')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireReadingArea->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireReadingArea as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="ReadingArea"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireReadingArea as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="ReadingArea"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>



<div id="libraryreadingareaIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="LibraryReadingArea"><i class="fas fa-plus plus-icon" wire:click="createFire('LIBRARY READING AREA')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireLibraryReadingArea->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireLibraryReadingArea as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="LibraryReadingArea"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireLibraryReadingArea as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="LibraryReadingArea"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>

<div id="librarybookssectionIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="LibraryBooksSection"><i class="fas fa-plus plus-icon" wire:click="createFire('LIBRARY BOOKS SECTION')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireLibraryBooksSection->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireLibraryBooksSection as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="LibraryBooksSection"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireLibraryBooksSection as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="LibraryBooksSection"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>

<div id="internalaudditofficeIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="InternalAuditOffice"><i class="fas fa-plus plus-icon" style="margin-left: -5px; margin-top:70px;" wire:click="createFire('INTERNAL AUDIT OFFICE')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireInternalAuditOffice->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireInternalAuditOffice as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="InternalAuditOffice"><i class="fas fa-eye eye-icon"style="width:15px;"></i></span>
    </div>
@foreach($fireInternalAuditOffice as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="InternalAuditOffice"><i class="fas fa-edit edit-icon" style="margin-left: 15px; margin-top:70px;" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>

<div id="informationtechnologyofficeIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="InformationTechnologyOffice"><i class="fas fa-plus plus-icon"style="margin-left: -15px; margin-top:80px;" wire:click="createFire('INFORMATION TECHNOLOGY OFFICE')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireInformationTechnologyOffice->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireInformationTechnologyOffice as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="InformationTechnologyOffice"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireInformationTechnologyOffice as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="InformationTechnologyOffice"><i class="fas fa-edit edit-icon"style="margin-left: 10px; margin-top:80px;" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>


<div id="itodirectorsofficceIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="ItoDirectorsOffice"><i class="fas fa-plus plus-icon" style="margin-left:-25px;"wire:click="createFire('ITO DIRECTORS OFFICE')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireItoDirectorsOffice->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireItoDirectorsOffice as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="ItoDirectorsOffice"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireItoDirectorsOffice as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="ItoDirectorsOffice"><i class="fas fa-edit edit-icon" style="margin-left:-6px;"wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>

<div id="librarystorageroomIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="LibraryStorageRoom"><i class="fas fa-plus plus-icon" style="margin-left: 10px; margin-top:80px;" wire:click="createFire('LIBRARY STORAGE ROOM')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireLibraryStorageRoom->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireLibraryStorageRoom as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="LibraryStorageRoom"><i class="fas fa-eye eye-icon"style="margin-left:25px; width:5px;"></i></span>
    </div>
@foreach($fireLibraryStorageRoom as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="LibraryStorageRoom"><i class="fas fa-edit edit-icon"style="margin-left: 35px; margin-top:80px;"wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>


<div id="officeofthelibrarianIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="OfficeOfTheLibrarian"><i class="fas fa-plus plus-icon" wire:click="createFire('OFFICE OF THE LIBRARIAN')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireOfficeOfTheLibrarian->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireOfficeOfTheLibrarian as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="OfficeOfTheLibrarian"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireOfficeOfTheLibrarian as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="OfficeOfTheLibrarian"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>


<div id="referencesectionIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="ReferenceAndPeriodicalsSection"><i class="fas fa-plus plus-icon" wire:click="createFire('REFERENCE AND PERIODICALS SECTION')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireReferenceAndPeriodicalsSection->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireReferenceAndPeriodicalsSection as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="ReferenceAndPeriodicalsSection"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireReferenceAndPeriodicalsSection as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="ReferenceAndPeriodicalsSection"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>

<div id="lawsectionIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="LawSection"><i class="fas fa-plus plus-icon" wire:click="createFire('LAW SECTION')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireLawSection->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireLawSection as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="LawSection"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireLawSection as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="LawSection"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>


<div id="graduateschoolIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
    <span class="GraduateSchoolSection"><i class="fas fa-plus plus-icon" wire:click="createFire('GRADUATE SCHOOL SECTION')"></i></span>   
@endif
    <div id="tooltip">
        <span id="tooltipText"> 
            <h1>INFO</h1>
            <div class="popup">
                <div class="half first-half">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Firename</th>
                            <th>Serial Number</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Room</th>
                            <th>Installation date</th>
                            <th>Expiration date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireGraduateSchoolSection->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireGraduateSchoolSection as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td>{{$fires->description}}-</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        <span class="GraduateSchoolSection"><i class="fas fa-eye eye-icon"></i></span>
    </div>
@foreach($fireGraduateSchoolSection as $fires)
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Assistant'))
        <span class="GraduateSchoolSection"><i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})" ></i></span>
    @endif
@endforeach
</div>

</div>
<script>
    function editpopup() {
        var popup = document.getElementById('edit-popup');
        popup.style.display = 'block';
    }

    function closeEditPopup() {
        var popup = document.getElementById('edit-popup');
        popup.style.display = 'none';
    }
</script>
        <h1>SECOND FLOOR</h1>
    </div>
</div>
<div wire.ignore.self class="modal fade" id="MapFormModal" tabindex="-1" role="dialog" aria-labelledby="MapFormModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<livewire:map.form />
			</div>
		</div>
		@section('custom_script')
		@include('layouts.scripts.MapForm-scripts')
		@endsection
