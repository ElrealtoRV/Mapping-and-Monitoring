<div>
    {{-- The Master doesn't talk, he acts. --}}
</div>
<style>

.fire-ext {
  height: 35px;
  width: 45px
}
.image-with-text {
    display: flex;
    align-items: center;
    margin-top: -35px;
}
.image-with-text p {
  font-size: 20px;
  margin-top: 15px;
  margin-left: -12px;

}

.text-next-to-image {
    margin-left: 10px; 
}
span{
  font-weight: bold;
  font-size: 26px
}
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px; /* Location of the modal */
    }

    /* Modal content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }
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
        <span class="MC" onclick="openModal('')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="MC" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="CR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
        <span class="CR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"id="edit-icon"></i></span>
        <span class="TR3" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="TR3" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="TR2" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="TR2" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="TR1" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="TR1" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="CONTROL1" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
        <span class="CONTROL1" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"id="edit-icon"></i></span> 
        <span class="CONTROL2" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
        <span class="CONTROL2" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"id="edit-icon"></i></span>
        <span class="IRS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="IRS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="CL2" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CL2" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="CL1" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CL1" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="CMR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CMR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        <span class="LMR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="LMR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span> 
        
        <h1>FOURTH FLOOR</h1>
        <div class="image-with-text">
    <img src="assets/img/fireIcon.png" alt="" class="fire-ext">
    <p class="text-next-to-image">= <span>25</span></p>
</div>

    </div>
</div>


<style>
    /* Your existing CSS styles */

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        padding-top: 60px; /* Location of the modal */
    }

    /* Modal content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Adjust the width as needed */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>


    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Fire Extinguisher Details  </p>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the image, open the modal
    var img = document.querySelector(".fire-ext");
    img.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>