<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- morris css -->
    <link rel="stylesheet"  defer data-turbolinks-track="true" href="{{ asset('admin/plugins/morris/morris.css') }}">
    <!-- toastr css  -->
    <link rel="stylesheet"  defer data-turbolinks-track="true" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css')}}"  defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css')}}"  defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
    <!-- <script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="reload"></script> -->
    @livewireStyles
    <!-- Scripts -->
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        @livewire('admin.inc.sidebar')
        <!--  sidebar  -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content mt-5">
                @livewire('admin.inc.nav')
                <div class="page-content-wrapper">
                    <div class="container-fluid px-0">
                        @livewire('admin.inc.breadcrumb')
                        {{ $slot }}
                    </div>
                </div>
            </div>
            @livewire('admin.inc.footer')
        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/modernizr.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/detect.js')}}"></script>
    <script src="{{ asset('admin/assets/js/fastclick.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.blockUI.js')}}"></script>
    <script src="{{ asset('admin/assets/js/waves.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/raphael/raphael.min.js')}}"></script>
    <!-- toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- dashboard js -->
    <script src="{{ asset('admin/assets/pages/dashboard.int.js')}}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js')}}"  defer data-turbolinks-track="true"></script>
    <script>
        window.addEventListener('closeModal', event => {
            $('#modalForm').modal('hide');
        })
        //  tostermessage  
        window.addEventListener('successalert', event => {
            toastr.success(event.detail.success);
        });
        // open modal for edit 
        window.addEventListener('openmodal', event => {
            $('#modalForm').modal('show');
        })

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>