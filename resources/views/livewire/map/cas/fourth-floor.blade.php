
<style>


/* Other styles... */

.MC,
.RR,
.CR,
.CONROOM,
.UEO,
.RA,
.TR3,
.TR2,
.TR1,
.CONTROL1,
.CONTROL2,
.IRS,
.CL2,
.CL1,
.CMR,
.LMR {
    position: absolute;
    cursor: pointer;
    display: flex;
    gap: 10px;
}

.MC {
    top: 40px;
    left: 120px;
}
.CR {
    top: 40px;
    left: 385px;
}
.TR3 {
    top: 40px;
    left: 575px;
}
.TR2 {
    top: 40px;
    left: 708px;
}
.TR1 {
    top: 40px;
    left: 840px;
}
.CONTROL1 {
    top: 200px;
    left: 120px;
}
.CONTROL2 {
    top: 255px;
    left: 120px;
}
.IRS {
    top: 200px;
    left: 430px;
}
.CL2 {
    top: 200px;
    left: 560px;
}
.CL1 {
    top: 200px;
    left: 705px;
}
.CMR {
    top: 200px;
    left: 825px;
}
.LMR {
    top: 200px;
    left: 955px;
}
#eye-icon,
#edit-icon {
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
    padding-right: 25px;
}
@media (max-width: 768px) {
        .horizontal-scroll-container {
            width: 800px; /* Adjust this value based on your desired width for smaller screens */
        }
    }
</style>
<div class="scroll-container">
<div class="horizontal-scroll-container">
    <div id="fourth-floor" class="floor-content">
        <img src="{{ asset('assets/img/CAS4THFLOOR.png') }}" alt="FourthFloor" width="1000px" height="300px"> 
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 50) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="MC"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 47) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="CR"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 48) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="IRS"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 49) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="CONTROL1"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 45) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="CL1"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 46) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="CL2"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 41) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="TR1"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 42) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="TR2"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 43) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="TR3"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 40) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="LMR"><i class="fas fa-eye eye-icon"></i></span>
</div>
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
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
            <div class="half second-half">
                <table>
                         @foreach($fire_list->where('id', 44) as $fire_fetch_list)
                <tr>
            <td class="{{ empty($fire_fetch_list['type']) ? 'empty' : '' }}">{{ $fire_fetch_list['type'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['firename']) ? 'empty' : '' }}">{{ $fire_fetch_list['firename'] ?: 'Empty' }}</td>
            <td class="{{ empty($fire_fetch_list['serial_number']) ? 'empty' : '' }}">{{ $fire_fetch_list['serial_number'] ?: 'Empty' }}</td>
            <td>{{ $fire_fetch_list->firebuilding->building }}</td>
            <td>{{ $fire_fetch_list->firefloor->floor }}</td>
            <td>{{ $fire_fetch_list->fireroom->room }}</td>
            <td>{{ $fire_fetch_list['installation_date']}}</td>
            <td>{{ $fire_fetch_list['expiration_date']}}</td>
            <td class="{{ empty($fire_fetch_list['status']) ? 'empty' : '' }}">{{ $fire_fetch_list['status'] ?: 'Empty' }}</td>
        </tr>
        @endforeach
                </table>
            </div>
        </div>
    </span>
    <span class="CMR"><i class="fas fa-eye eye-icon"></i></span>
</div>
        <h1>FOURTH FLOOR</h1>

    </div>
</div>


