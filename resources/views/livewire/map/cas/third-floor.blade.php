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
.LS,
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
        <span class="CFR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CFR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS306" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS306" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS305" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS305" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS304" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS304" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS303" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS303" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS302" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS302" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS301" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS301" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS309" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS309" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS310" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS310" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CAS311" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CAS311" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <span class="CEFR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
        <span class="CEFR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
        <h1>THIRD FLOOR</h1>
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