<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fire Extinguisher</title>
    <link rel="website icon" type="png" href="{{ asset('assets/img/fireICon.png') }}">

    <!-- Fonts -->
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous">

    <style>
        .bt-sty:hover {
            color: white;
        }

        .custom-pagination {
            max-width: 300px;
            /* Adjust the max-width as needed */
            overflow: hidden;
            white-space: nowrap;
        }
    </style>
    @livewireStyles
    @yield('upper_script')
    @stack('styles')
    <!-- Scripts -->
    @vite([])
</head>

<>
    <div class="main-wrapper">
        @include('layouts.shared.header')

        @include('layouts.shared.sidebar')


        <!-- Page Content -->
        <div class="page-wrapper">
                {{ $slot }}
        </div>
        @yield('delete_modal')
    </div>

    <div class="sidebar-overlay" data-reff></div>




    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/css/bootstrap.min.js') }}"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/select2.init.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- <script src="{{ asset('vendor/livewire/livewire.js') }}"></script> -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script>
$(document).ready(function() {
  function fetchNotifications() {
    $.ajax({
      url: '/fireExtinguisherNotif',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        console.log('Notification response:', response);

        // Calculate total notification count
        var totalNotificationCount = response.expiredCount + response.installedCount;

        // Update bell icon and total count
        $('#notificationIcon').removeClass('notification-icon-empty').addClass('notification-icon');
        $('#totalNotificationCount').text(totalNotificationCount);

        // Handle expired notifications
        if (response.expiredCount > 0) {
          $('#expiredCount').text(response.expiredCount);
          $('#expiredNotifications').empty();
          $.each(response.expired, function(index, expired) {
            console.log('Expired item:', expired);
            $('#expiredNotifications').append('<li>Expired Fire Extinguisher in Room ' + expired.room + '</li>');
          });
        } else {
          $('#expiredCount').text('0');
          $('#expiredNotifications').empty().append('<li>No expired notifications</li>');
          console.warn('No expired notifications to display');
        }

        // Handle installed notifications
        if (response.installedCount > 0) {
          $('#installedCount').text(response.installedCount);
          $('#installedNotifications').empty();
          $.each(response.installed, function(index, installed) {
            console.log('Installed item:', installed);
            $('#installedNotifications').append('<li>Installed Fire Extinguisher in Room ' + installed.room + '</li>');
          });
        } else {
          $('#installedCount').text('0');
          $('#installedNotifications').empty().append('<li>No installed notifications</li>');
          console.warn('No installed notifications to display');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error fetching notifications:', xhr.responseText);
      }
    });
  }

  fetchNotifications();
  setInterval(function() {
    fetchNotifications();
  }, 5000);
});

</script>

    @livewireScripts
    @yield('custom_script')
   
    @stack('script')
    
</body>

</html>
