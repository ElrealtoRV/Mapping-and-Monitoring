<div>
<style>
  
    .floor-content {
        display: inline-block;
        position: relative;
    }


.CasDean,
.CAS106,
.CAS105,
.CAS104,
.MCL,
.CAS103,
.CAS102,
.CAS101,
.CAS107,
.CAS108,
.CAS109,
.CAS110,
.CAS111,
.CAS112,
.CAS-SSG {
    position: absolute;
    cursor: pointer;
    display: flex;
    gap: 10px;
}
  .CasDean{
    top: 45px;
    left: 113px;
  }
  .CAS106{
    top: 45px;
    left: 233px;
  }
  .CAS105{
    top: 45px;
    left: 353px;
  }
  .CAS104{
    top: 45px;
    left: 470px;
  }
  .MCL{
    top: 45px;
    left: 540px;
  }
  .CAS103{
    top: 45px;
    left: 645px;
  }
  .CAS102{
    top: 45px;
    left: 765px;
  }
  .CAS101{
    top: 45px;
    left: 885px;
  }
  .CAS107{
    top: 220px;
    left: 173px;
  }
  .CAS108{
    top: 200px;
    left: 265px;
  }
  .CAS109{
    top: 200px;
    left: 385px;
  }
  .CAS-SSG{
    top: 200px;
    left: 485px;
  }
  .CAS110{
    top: 200px;
    left: 620px;
  }
  .CAS111{
    top: 200px;
    left: 740px;
  }
  .CAS112{
    top: 200px;
    left: 857px;
  }

  #eye-icons,
  #edit-icons {
      font-size: small;
      display: inline-block;
      margin-left: 13px;
  }

  #edit-icons {
      color: green;
      margin-left: -3px;
  }

  #eye-icons {
      color: gray;
      margin-left: 15px;
  }
  #plus-icons{
      color: black;
      margin-left: -35px;
  }

  .edit-icon {
      color: green;
      margin-left: -13px;
  }
  .plus-icon{
      color: black;
      margin-left: -30px;
  }
  .circle-icon{
    margin-left: -70px;
  }

  .eye-icon {
      color: gray;
      padding-right: 25px;
  }
  .active {
    background-color: green; /* Active state background color */
}

.inactive {
    background-color: orange; /* Inactive state background color */
}

.refill {
    background-color: blue; /* Refill state background color */
}
#tooltipText{

margin-top:-200px !important;
margin-left:-500px !important;

}
.popup {
    background-color:red;
}


</style>
<livewire:flash-message.flash-message />
<div class="scroll-container">
    <div id="ground-floor" class="floor-content">
        
<img src="{{ asset('assets/img/GroundFloor.png') }}" alt="GroundFloor" width="1000px" height="300px">
<!-- Display the icon outside of the loop -->
<div id="casDeanIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CasDean"><i class="fas fa-plus plus-icon" wire:click="createFire('CASDEAN')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CasDean"><i class="fas fa-plus plus-icon" wire:click="createFire('CASDEAN')"></i></span>
    @endif

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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>

                <div class="half second-half">
                    <table>
                        <!-- Check if there is data available -->
                        @if($fireCasDean->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCasDean as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            
        </span>
        
        <span class="CasDean"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>



<div id="cas106Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS106"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS106')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas106->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas106 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS106"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>



<div id="cas105Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS105"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS105')"></i></span>
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas105->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas105 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS105"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>

<div id="cas104Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS104"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS104')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS104"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS104')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas104->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas104 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
    
        <span class="CAS104"><i class="fas fa-eye eye-icon"></i></span>
    
</div>
</div>

<div id="mclIcon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="MCL"><i class="fas fa-plus plus-icon" wire:click="createFire('MCL')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="MCL"><i class="fas fa-plus plus-icon" wire:click="createFire('MCL')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireMassComm->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireMassComm as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="MCL"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>

<div id="cas103Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS103"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS103')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS103"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS103')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas103->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas103 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS103"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>
<div id="cas102Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS102"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS102')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS102"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS102')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas102->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas102 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS102"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>

<div id="cas101Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS101"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS101')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS101"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS101')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas101->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas101 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS101"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>

<div id="cas107Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS107"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS107')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS107"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS107')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas107->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas107 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS107"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>
<div id="cas108Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS108"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS108')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS108"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS108')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas108->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas108 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS108"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>
<div id="cas109Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS109"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS109')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS109"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS109')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas109->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas109 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS109"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>
<div id="cas110Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS110"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS110')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS110"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS110')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas110->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas110 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS110"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>
<div id="cas111Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS111"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS111')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS111"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS111')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas111->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas111 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS111"><i class="fas fa-eye eye-icon"></i></span>
    </div>
</div>
<div id="cas112Icon" class="classroom">
@if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
    <span class="CAS112"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS112')"></i></span>
@endif
    <div id="tooltip">
    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('head')||auth()->user()->hasRole('Maintenance Personnel'))
        <span class="CAS112"><i class="fas fa-plus plus-icon" wire:click="createFire('CAS112')"></i></span>
@endif
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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
                <div class="half second-half">
                    <table>
                    @if($fireCas112->isEmpty())
                        <tr>
                            <td colspan="9">No data available</td>
                        </tr>
                        @else
                        <!-- Loop through the data if available -->
                        @foreach($fireCas112 as $fires)
                        <tr>
                            <td>{{ $fires->type }}</td>
                            <td class="{{ empty($fires['firename']) ? 'empty' : '' }}">{{ $fires['firename'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['serial_number']) ? 'empty' : '' }}">{{ $fires['serial_number'] ?: 'Empty' }}</td>
                            <td>{{ $fires->building }}</td>
                            <td>{{ $fires->floor }}</td>
                            <td>{{ $fires->room }}</td>
                            <td class="{{ empty($fires['installation_date']) ? 'empty' : '' }}">{{ $fires['installation_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['expiration_date']) ? 'empty' : '' }}">{{ $fires['expiration_date'] ?: 'Empty' }}</td>
                            <td class="{{ empty($fires['status']) ? 'empty' : '' }}">{{ $fires['status'] ?: 'Empty' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </span>
        <span class="CAS112"><i class="fas fa-eye eye-icon"></i></span>
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
        <h1>GROUND FLOOR</h1>
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
