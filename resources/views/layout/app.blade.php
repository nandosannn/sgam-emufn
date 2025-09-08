<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-dark text-white p-3 min-vh-100">
                <h4 class="mb-4">Menu</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link text-white">📊 Visão Geral</a></li>
                    <li class="nav-item"><a href="{{ url('/usuarios') }}" class="nav-link text-white">👥 Usuários</a></li>
                    <li class="nav-item"><a href="{{ url('/config') }}" class="nav-link text-white">⚙️ Configurações</a></li>
                </ul>
            </div>

            <!-- Conteúdo principal -->
            <div class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
