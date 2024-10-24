<!DOCTYPE html>
<html lang="es">
<head>
    @vite('resources/js/app.js') <!-- Asegúrate que Vue se está cargando correctamente -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESTUDIANTES</title>
    <style>
        .sidebar {
            position: fixed; /* Fija el sidebar */
            height: 100vh; /* Altura completa */
            background-color: #4e73df;
            overflow-y: auto; /* Agrega scroll si es necesario */
            width: 250px; /* Ajusta el ancho según sea necesario */
        }
        .sidebar .nav-link {
            color: white;
            margin: 10px 0;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .sidebar .nav-link:hover {
            background-color: #2e59d9;
            border-radius: 5px;
        }
        .content-wrapper {
            margin-left: 250px; /* Da espacio al sidebar */
            padding: 20px;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar d-flex flex-column p-3">
            <!-- Brand -->
            <a href="#" class="sidebar-brand d-flex align-items-center justify-content-center text-white mb-4" style="text-decoration: none;">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('LOGO.jpeg') }}" alt="Logo" style="width: 40px; height: 40px;">
                </div>
                <div class="sidebar-brand-text mx-3">COLEGIO CRISTO REY <sup></sup></div>
            </a>

            <a href="{{ route('welcome') }}" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Pagina Principal
            </a>

            <a href="{{ route('dashboard.student') }}" class="nav-link">
            <i class="fas fa-user-graduate"></i>
                    Estudiantes
                </a>


        </nav>

        <!-- Contenedor principal -->
        <div class="content-wrapper">
            <!-- Aquí está tu componente Vue -->
            <div id="computacion">
                <cuarto-computacion></cuarto-computacion>
                <quinto-computacion></quinto-computacion>
            </div>
        </div>
    </div>
</body>
</html>
