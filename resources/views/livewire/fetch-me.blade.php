<div class="icon-container">
<span class="IAO"><i class="fas fa-eye eye-icon"></i></span>
<span class="LBS"><i class="fas fa-eye eye-icon"></i></span>
<span class="IAO"><i class="fas fa-eye eye-icon"></i></span>
<span class="LBS"><i class="fas fa-eye eye-icon"></i></span>
<span class="IAO"><i class="fas fa-eye eye-icon"></i></span>
<span class="LBS"><i class="fas fa-eye eye-icon"></i></span>
    <!-- Add more icons here -->
    <div class="popup" id="popup">
    <table>
                    <tr>
                        <th>Type</th>
                        <th>Firename</th>
                        <th>Serial Number</th>
                        <th>Building</th>
                        <th>Floor</th>
                        <th>Room</th>
                        <th>Installtion date</th>
                        <th>expiration date</th>
                        <th>Status</th>
                    </tr>
                </table>
    </div>
</div>
<style>


.popup {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    padding: 10px;
    z-index: 1;
}

.icon-container:hover .popup {
    display: block;
}

</style>