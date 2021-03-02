<div class="row pt-4">
    <div class="col-12">
        <div class="page-title-box p-2">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">@yield('title')</h4>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i>Dashboard</i></a></li>
                        <li class="breadcrumb-item active"><i>@yield('title')</i></li>
                    </ol>
                </div><!-- /.col -->
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end page-title-box -->
    </div>
</div>