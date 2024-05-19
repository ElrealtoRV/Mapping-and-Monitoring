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
        display: inline-block;
    }

    .notification .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 5px 10px;
        border-radius: 50%;
        background-color: red;
        color: white;
    }

    .notification .dropdown-menu {
        display: none;
        position: absolute;
        top: 30px;
        right: 0;
        background-color: white;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        width: 300px;
        max-height: 400px;
        overflow-y: auto;
    }

    .notification.show .dropdown-menu {
        display: block;
    }

    .notification .dropdown-menu li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .notification .dropdown-menu li:last-child {
        border-bottom: none;
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
            <input type="text" class="form-control" placeholder="Search here">
            <a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
        </form>
    </div>
    <a href="#top" id="back-to-top-button" alt>
        <i class="fa-solid fa-arrow-up"></i> <!-- Use the appropriate icon class here -->
    </a>

    <ul class="nav user-menu float-end">
        <a href="#" class="notification">
            <i class='bx bxs-bell' id="expiredCount"></i>
            <div></div>
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

    $('#notificationToggle').on('click', function(e) {
        e.preventDefault();
        $('.notification').toggleClass('show');
    });

    // Hide the dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.notification').length) {
            $('.notification').removeClass('show');
        }
    });
</script>