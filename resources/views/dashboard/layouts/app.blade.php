<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>


<head>

    <meta charset="utf-8" />
    <title>East Home Dashboard</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/images/favicon.ico">

    <!-- CSS Libraries -->
    <link href="{{ asset('dashboard') }}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">

    <!-- Custom Font -->
    <style>
        body {
            font-family: "El Messiri", serif !important;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('dashboard.layouts.navbar')

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        @include('dashboard.layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>

            @include('dashboard.layouts.footer')
        </div>

    </div>

    <!-- Back-to-top Button -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- JS Libraries -->
    <script src="{{ asset('dashboard') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('dashboard') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('dashboard') }}/libs/feather-icons/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom DataTables Initialization -->
    <script>
        $(document).ready(function () {
            $('#contactsTable').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json"
                },
                "responsive": true,
                "processing": true
            });
        });
    </script>

    <!-- App JS -->
    <script src="{{ asset('dashboard') }}/js/app.js"></script>

</body>
</html>
