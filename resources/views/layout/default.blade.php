<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    @vite('resources/scss/app.scss')
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('dashboard.header')

        @include('dashboard.sidebar')

        <!--begin::App Main-->
        <main class="app-main">
            @include('dashboard.content-header')
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        @include('dashboard.footer')

    </div>

    @vite('resources/js/app.js')
</body>

</html>
