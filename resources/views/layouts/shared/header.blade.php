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

 /* Notification Container */
.notification {
  position: relative;
  display: inline-flex;
  align-items: center;
}

/* Notification Bell Icon */
.notification i {
  font-size: 24px;
  color: #333;
  cursor: pointer;
  margin-right: 8px; /* Adjusted spacing */
}

/* Notification Count */
.notification-count {
  background-color: #ff4d4f;
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  border-radius: 50%;
  padding: 4px;
  min-width: 18px;
  text-align: center;
}

/* Notification Dropdown */
.notification-dropdown {
  position: absolute;
  top: calc(100% + 10px);
  right: 0;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 300px;
  z-index: 1;
  display: none;
  animation: fadeIn 0.3s;
}

.notification:hover .notification-dropdown,
.notification-dropdown:hover {
  display: block;
}

.notification-header {
  background-color: #f5f5f5;
  padding: 10px 15px;
  border-bottom: 1px solid #ddd;
  font-weight: bold;
}

.notification-tabs {
  display: flex;
}

.tab-button {
  background-color: transparent;
  border: none;
  cursor: pointer;
  flex: 1;
  padding: 10px 15px;
  transition: background-color 0.3s ease;
}

.tab-button.active {
  background-color: #f5f5f5;
}

.notification-tab-content {
  padding: 15px;
  max-height: 300px;
  overflow-y: auto;
}

/* Notification Counter */
.notification-counter {
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 10px;
}

/* Notification List */
.notification-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.notification-list li {
  padding: 10px 0;
  border-bottom: 1px solid #eee;
  display: flex;
  align-items: center;
}

.notification-list li:last-child {
  border-bottom: none;
}

.notification-list li i {
  margin-right: 10px;
  font-size: 16px;
  color: #777;
}

/* Responsive Styles */
@media (max-width: 720px) {
  .notification-dropdown {
    width: 90vw;
    max-width: none;
    right: 5vw;
    left: 5vw;
    background-color: red;
  }
  .nav{
    background-color: red;
  }
}
@media (min-width: 1080px) {
  .notification-dropdown {
    max-width: 500px; /* Increase the maximum width */
    width: 400px; /* Adjust the width */
  }

  .notification-tab-content {
    max-height: 400px; /* Increase the maximum height for better visibility */
  }

  /* Adjust other styles as needed */
}

/* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
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
    <a href="#top" id="back-to-top-button" alt>
        <i class="fa-solid fa-arrow-up"></i> <!-- Use the appropriate icon class here -->
    </a>

    <ul class="nav user-menu float-end">
    <a href="#" class="notification">
  <i class="bx bxs-bell" id="notificationIcon"></i>
  <div class="notification-count" id="totalNotificationCount"></div>
  <div class="notification-dropdown">
    <div class="notification-details" id="expiredDetails">
      <div class="expired-notification-details">
        <div class="notification-counter" id="expiredCount"></div>
        <ul id="expiredNotifications">
          <!-- Notification items will be dynamically added here -->
        </ul>
      </div>
    </div>
    <div class="notification-details" id="installedDetails">
      <div class="installed-notification-details">
        <div class="notification-counter" id="installedCount"></div>
        <ul id="installedNotifications">
          <!-- Notification items will be dynamically added here -->
        </ul>
      </div>
    </div>
  </div>
</a>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown has-arrow user-profile-menu" id="prolist">
                <a class="dropdown-toggle nav-link user-link" href="#" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-names">
                        <span style="color: black;">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} <i class="fa fa-chevron-down"></i></span>
                    </div>
                </a>
                <div class="dropdown-menu" style="background-color:#fff; margin-top:-100px;"aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/setting" style="color: black;">Settings</a>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: black;">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('toggle_btn').addEventListener('click', function() {
        var icon = document.getElementById('fireExtinguisherIcon');
        icon.style.display = (icon.style.display === 'none' || icon.style.display === '') ? 'inline' : 'none';
    });

</script>