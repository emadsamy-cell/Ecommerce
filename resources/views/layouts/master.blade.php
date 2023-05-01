<!doctype html>
<html class="no-js" lang="zxx">

@include('layouts.sources')

<!-- index28:48-->

    <body>

        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            @include('layouts.header')

            @yield('content')

            @include('layouts.footer')

        </div>



        @include('layouts.scripts')

    </body>

<!-- index30:23-->
</html>
