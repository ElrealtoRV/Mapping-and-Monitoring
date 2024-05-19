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

<body>
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
    <script src="{{ asset('assets/css/bootstrap.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/select2.init.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script>
        $(document).ready(function() {
    // Function to fetch notifications
    function fetchExpiredNotification() {
        $.ajax({
            url: '/expiredNotif',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update UI with notification count and requests
                $('#expiredCount').text(response.expiredCount);
                
                // You can handle requests array as you need, for example, display them in a list
                $('#expired').empty();
                $.each(response.expired, function(index, expired) {
                    $('#expired').append('<li>' + expired.serial_number + '</li>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error
            }
        });
    }

    // Fetch notifications initially when the page loads
    fetchExpiredNotification();

    // Set interval to fetch notifications periodically (e.g., every 5 seconds)
    setInterval(fetchExpiredNotification, 10000); // Adjust the interval as needed
});
    </script>
    @livewireScripts
    @yield('custom_script')
   
    @stack('script')
    
</body>

</html>
