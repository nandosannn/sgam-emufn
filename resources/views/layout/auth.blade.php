<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
