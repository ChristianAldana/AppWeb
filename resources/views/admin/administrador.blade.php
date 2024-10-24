<!DOCTYPE html>
<html lang="es">
<head>
    @vite('resources/js/app.js') <!-- Asegúrate que Vue se está cargando correctamente -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye el archivo CSS separado -->
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
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

             
                 <!-- Botón para ir al Welcome -->
                 <a href="{{ route('welcome') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    Página Principal
                </a>
                        <a href="{{ route('dashboard.admin') }}" class="nav-link">
                <i class="fas fa-user-shield"></i> <!-- Icono de usuario con escudo -->
                Administrador
            </a>

            <a href="{{ route('dashboard.student') }}" class="nav-link">
                <i class="fas fa-user-graduate"></i>
                    Estudiantes
                </a>

            <a href="{{ route('dashboard.teacher') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Maestros 
                    </a>
            </nav>

        <!-- Contenedor principal -->
        <div class="content-wrapper">
            <!-- Contenedor para montar el componente de estudiantes -->
            <div id="estudiantes-content">
                <crear-estudiante></crear-estudiante>
                <editar-estudiante></editar-estudiante>
                <mostrar-estudiante></mostrar-estudiante>
            </div>

            <!-- Contenedor para montar el componente de profesores -->
            <div id="profesores-content">
                <crear-profesor></crear-profesor>
                <editar-profesor></editar-profesor>
                <mostrar-profesor></mostrar-profesor>
            </div>

            <!-- Contenedor para montar el componente de notas -->
            <div id="notas-content">
                <crear-nota></crear-nota>
                <editar-nota></editar-nota>
                <mostrar-nota></mostrar-nota>
            </div>
        </div>
    </div>
</body>
</html>
