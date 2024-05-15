<style>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding-top:10px;

}

.floor-selection {
  position: flex;
  text-align: center;
  padding-top: 25px;
  background-color: #eee;
  width: auto;
  height: 7.5vh;
  border-radius: 10px;
  box-shadow: 0 10px 18px rgba(0, 0, 0, 0.5);
}
#tooltipText{

  margin-bottom:300px;
  margin-right:200px;
}
.popup{
  margin-left:200px;
}

.floor-button {
    position: flex;
  text-align: center;
  padding: 10px 20px;
  margin-top: 80px;
  width: auto;
  font-size: 16px;
  background: linear-gradient(to right, #3498db, #2e37a4);
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.floor-button:hover {
  background-color: #eee;
}

.card {
  display: inline-block;
  cursor: pointer;
  width: auto;
  height: auto;
  padding-top: 20px;
  border-radius: 8px;
  position: relative;
  margin: 0 auto;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  overflow: hidden;
}

.card:hover::after {
  opacity: 1;
  inset: 20px;
}

.card .content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  width: 80%;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}

.card:hover .content {
  opacity: 1;
}

.scroll-container {
  width: 100%;
  overflow-x: auto;
  white-space: nowrap;
  scrollbar-width: thin;
  scrollbar-color: #888 #f1f1f1;
}

.scroll-container::-webkit-scrollbar {
  height: 8px;
}

.scroll-container::-webkit-scrollbar-track {
  background-color: #f1f1f1;
}

.scroll-container::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 4px;
}

.horizontal-scroll-container {
  width: 100%;
  overflow-x: auto;
  white-space: nowrap;
  position: relative; /* Added to make it a positioning context */
}

.floor-content {
  display: inline-block;
  padding: 20px;
  position: relative;
}

/* Media queries for mobile responsiveness */
@media screen and (max-width: 900px) {
  .container {
    padding:0;
  }

  .floor-selection {
    width:450px !important;
    padding-top: 15px;
  }

  .card {
    width: auto;
    margin: 0 auto;
  }

  .scroll-container {
    width: auto;
    margin: 0 auto;
  }

  .horizontal-scroll-container {
    width: 100%;
    margin: 0 auto;
  }

  .floor-content {
    width:1500px; /* Adjust as needed */
  }

  .floor-button {
    width:90px;
    font-size: 14px;
    margin-top: 10px;
    margin-right: 15px !important;
    padding: 5px;
  }
}
</style>
</style>
<div class="container">
    <div class="card">
        <div class="horizontal-scroll-container">

            <div class="floor-selection">
                <a href="#" class="floor-button" value="ground-floor" data-floor="Ground" onclick="showFloor(event, 'ground-floor')">Ground Floor</a>
                <a href="#" class="floor-button" value="second-floor" data-floor="2nd" onclick="showFloor(event, 'second-floor')">2nd Floor</a>
                <a href="#" class="floor-button" value="third-floor" data-floor="3rd" onclick="showFloor(event, 'third-floor')">3rd Floor</a>
                <a href="#" class="floor-button" value="fourth-floor" data-floor="4th" onclick="showFloor(event, 'fourth-floor')">4th Floor</a>
            </div>
            <br>
            <br>
            @livewire('map.cas.ground-floor')
            @livewire('map.cas.second-floor')
            @livewire('map.cas.third-floor')
            @livewire('map.cas.fourth-floor')
           
        </div>

</div>
</div>


<script>
    function showFloor(event, floorId) {
        event.preventDefault(); // Prevent default anchor tag behavior
        const floorContents = document.getElementsByClassName('floor-content');
        for (let i = 0; i < floorContents.length; i++) {
            floorContents[i].style.display = 'none';
        }
        document.getElementById(floorId).style.display = 'block';
        window.livewire.emit('floorSelected', floorId); // Emit Livewire event
    }
    // Function to reload the page and stay on the current floor
    function reloadPage() {
        const currentFloorId = sessionStorage.getItem('currentFloor');
        saveCurrentFloor(currentFloorId); // Save current floor before reloading
        location.reload(); // Reload the page
    }

    // Function to restore the current floor after the page reloads
    function restoreCurrentFloor() {
        const currentFloorId = sessionStorage.getItem('currentFloor');
        if (currentFloorId !== null) {
            showFloor(event, currentFloorId); // Show the current floor after reloading
        }
    }

    // Call restoreCurrentFloor on page load to show the correct floor
    window.addEventListener('load', restoreCurrentFloor);

    function updateIconColor(status) {
        const icon = document.getElementById('statusIcon');
        if (status === 'active') {
            icon.style.color = 'green'; // Set color to green for active status
        } else if (status === 'inactive') {
            icon.style.color = 'orange'; // Set color to orange for inactive status
        } else if (status === 'refill') {
            icon.style.color = 'blue'; // Set color to blue for refill status
        }
    }
</script>
