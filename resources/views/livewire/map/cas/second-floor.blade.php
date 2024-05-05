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

    .floor-content {
        display: inline-block;
        padding: 20px;
        position: relative;
    }



/* Other styles... */

.FCRH,
.RA,
.LRA,
.LBS,
.IAO,
.ITO,
.ITO-DS,
.LSR,
.OOTL,
.RPS,
.LS,
.GSS {
    position: absolute;
    cursor: pointer;
    display: flex;
    gap: 10px;
}

.FCRH {
    top: 35px;
    left: 120px;
}

.RA {
    top: 35px;
    left: 445px;
}

.LRA {
    top: 35px;
    left: 830px;
}

.LBS {
    top: 35px;
    left: 965px;
}

.IAO {
    top: 215px;
    left: 120px;
    justify-content: space-between;
    gap: 5px;
}

.ITO {
    top: 205px;
    left: 180px;
    justify-content: space-between;
    gap: 5px;
}

.ITO-DS {
    top: 205px;
    left: 250px;
    justify-content: space-between;
    gap: 5px;
}

.LSR {
    top: 205px;
    left: 290px;
    justify-content: space-between;
    gap: 5px;
}

.OOTL {
    top: 205px;
    left: 375px;
    justify-content: space-between;
    gap: 5px;
}

.RPS {
    top: 205px;;
    left: 680px;
    justify-content: space-between;
    gap: 5px;
}

.LS {
    top: 205px;
    left: 810px;
    justify-content: space-between;
    gap: 5px;
}

.GSS {
    top: 205px;
    left: 945px;
    justify-content: space-between;
    gap: 5px;
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
    <div id="second-floor" class="floor-content">
        <img src="{{ asset('assets/img/CasSecondFloor.png') }}" alt="SecondFloor" width="1000px" height="300px">
          <span class="FCRH" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="FCRH" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
          <span class="RA" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="RA" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
          <span class="LRA" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="LRA" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
          <span class="LBS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="LBS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon"></i></span>
          <span class="IAO" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
          <span class="IAO" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" id="edit-icon"></i></span>
          <span class="ITO" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
          <span class="ITO" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" id="edit-icon"></i></span>
          <span class="ITO-DS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
          <span class="ITO-DS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" id="edit-icon"></i></span>
          <span class="LSR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"id="eye-icon"></i></span>
          <span class="LSR" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" id="edit-icon"></i></span>
          <span class="OOTL" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="OOTL" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" ></i></span>
          <span class="RPS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="RPS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" ></i></span>
          <span class="LS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="LS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" ></i></span>
          <span class="GSS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-eye eye-icon"></i></span>
          <span class="GSS" onclick="openModal('FACULTY COMPUTING AND RESEATCH CENTER')"><i class="fas fa-edit edit-icon" ></i></span>
          <h1>SECOND FLOOR</h1>
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

