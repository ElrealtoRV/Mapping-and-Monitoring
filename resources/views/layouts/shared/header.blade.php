<style>
    #back-to-top-button {
        position: fixed;
        bottom: 20px;
        /* Adjust the distance from the bottom as needed */
        right: 20px;
        /* Adjust the distance from the right as needed */
        /* display: none; */
        z-index: 999;
        /* Ensure it's above other elements */
        cursor: pointer;
    }

    .mobile-user-menu {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .toggle {
        margin-top: 25px;
    }

    .notification {
  position: relative;
}

.notification-details {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  background: white;
  border: 1px solid #ccc;
  width: 300px;
  max-width: 90vw; /* Add this line to make it responsive */
  z-index: 10;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.notification:hover .notification-details {
  display: block;
  animation: fadeIn 0.3s;
}

.expired-notification-details,
.installed-notification-details {
  padding: 10px;
  max-height: 300px;
  overflow-y: auto;
}
#expiredDetails{
    z-index: 20;
    margin-top:100px;
}

.notification-counter {
  font-weight: bold;
  margin-bottom: 10px;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Add media query for mobile devices */
@media (max-width: 280px) {
  .notification-details {
    position: fixed;
    top: auto;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    max-width: 100%;
    border-radius: 10px 10px 0 0;
  }
}
</style>

<div class="header">
    <div class="header-left">
        <a href="/" class="logo">
            <span style="display: flex;">
                <img id="fireExtinguisherIcon" src="{{ asset('assets/img/logoIcon/fire-extinguisher.png') }}" width="50" height="50" alt="Fire Extinguisher Icon" style=" display: none;">
                <span class="text1" style="font-size:15px font-weight:bold;">
                    <p style="font-size:15px; padding-top:-15px;">Norsu </p>
                    <h1 style="font-size:20px; margin-top:-20px; margin-bottom: 10px; ">BUILDING AND GROUNDS OFFICE</h1>
                </span>
            </span>
        </a>
    </div>
    <a id="toggle_btn" href="#"><img src="{{ asset('assets/img/icons/bar-icon.svg') }}" alt></a>

    <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="{{ asset('assets/img/icons/bar-icon.svg') }}" alt></a>

    <div class="top-nav-search mob-view">
        <form>
            <input type="text"id="searchForm" class="form-control" placeholder="Search here">
            <a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
        </form>
    </div>
    <a href="#top" id="back-to-top-button" alt>
        <i class="fa-solid fa-arrow-up"></i> <!-- Use the appropriate icon class here -->
    </a>

    <ul class="nav user-menu float-end">
    <a href="#" class="notification">
    <i class="bx bxs-bell" id="totalNotificationCount"></i>
    <div class="notification-count" id="totalNotificationCount"></div>

    <div class="notification-details" id="expiredDetails">
        <div class="expired-notification-details">
            <div class="notification-counter" id="expiredCount"></div>
            <ul id="expiredNotifications">
                <!-- Notification items will be dynamically added here -->
            </ul>
        </div>
    </div>

    <div class="notification-details" id="installedDetails">
        <div class="expired-notification-details">
            <div class="notification-counter" id="installedCount"></div>
            <ul id="installedNotifications">
            </ul>
        </div>
    </div>
</a>





        <li class="nav-item dropdown has-arrow user-profile-list" id="prolist">
            <a class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <div class="user-names">
                    {{-- <h5>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                    <span class="text-capitalize">{{ auth()->user()->roles[0]->name }}</span> --}}
                    <!-- Use the user's name instead of the image -->
                    <span style="color: black;">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} <i class="fa fa-chevron-down"></i></span>
                </div>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="settingView" style="color: black;">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}" style="color: black;">Logout</a>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('toggle_btn').addEventListener('click', function() {
        var icon = document.getElementById('fireExtinguisherIcon');
        icon.style.display = (icon.style.display === 'none' || icon.style.display === '') ? 'inline' : 'none';
    });

    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Get the search query and other parameters
        var searchQuery = document.getElementById('searchQuery').value;
        var position_id = document.getElementById('positionDropdown').value;
        // Get values for other search parameters

        // Send an AJAX request to the backend
        // Adjust the URL and data based on your backend implementation
        // Example using fetch API
        fetch('/search', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    searchQuery: searchQuery,
                    position_id: position_id,
                    // Include other search parameters in the body
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Update the UI with the search results
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

</script>