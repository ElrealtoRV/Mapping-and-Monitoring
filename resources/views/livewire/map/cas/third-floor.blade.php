<style>
    


/* Other styles... */

.CFR,
.CAS306,
.CAS305,
.CAS304,
.CAS303,
.CAS302,
.CAS301,
.CAS309,
.CAS310,
.CAS311,
.CEFR,
.GSS {
    position: absolute;
    cursor: pointer;
    display: flex;
    gap: 10px;
}

.CFR {
    top: 40px;
    left: 120px;
}
.CAS306 {
    top: 40px;
    left: 250px;
}
.CAS305 {
    top: 40px;
    left: 380px;
}
.CAS304 {
    top: 40px;
    left: 508px;
}
.CAS303 {
    top: 40px;
    left: 635px;
}
.CAS302 {
    top: 40px;
    left: 765px;
}
.CAS301 {
    top: 40px;
    left: 896px;
}
.CAS309 {
    top: 200px;
    left: 430px;
}
.CAS310 {
    top: 200px;
    left: 685px;
}
.CAS311 {
    top: 200px;
    left: 815px;
}
.CEFR {
    top: 200px;
    left: 945px;
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

    <div id="third-floor" class="floor-content">
        <img src="{{ asset('assets/img/3RDFLOOR.png') }}" alt="ThirdFloor" width="1000px" height="300px">
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
                         @foreach($fire_list->where('id', 37) as $fire_fetch_list)
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
    <span class="CEFR"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 36) as $fire_fetch_list)
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
    <span class="CAS311"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 35) as $fire_fetch_list)
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
    <span class="CAS310"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 31) as $fire_fetch_list)
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
    <span class="CAS309"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 29) as $fire_fetch_list)
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
    <span class="CAS306"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 32) as $fire_fetch_list)
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
    <span class="CAS305"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 33) as $fire_fetch_list)
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
    <span class="CAS304"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 34) as $fire_fetch_list)
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
    <span class="CAS303"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 39) as $fire_fetch_list)
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
    <span class="CAS302"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 38) as $fire_fetch_list)
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
    <span class="CAS301"><i class="fas fa-eye eye-icon"></i></span>
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
                         @foreach($fire_list->where('id', 28) as $fire_fetch_list)
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
    <span class="CFR"><i class="fas fa-eye eye-icon"></i></span>
</div>

        <h1>THIRD FLOOR</h1>
   
    </div>
</div>
