<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    @vite('resources/scss/app.scss')
</head>
<!--end::Head-->
<!--begin::Body-->

<body class=" @yield('body-class') bg-body-secondary">
    @yield('content')
    @vite('resources/js/app.js')
</body>
<!--end::Body-->

</html>
