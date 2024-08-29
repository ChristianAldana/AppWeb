<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4to secretariado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
        <h1 class="text-center">Gestión de Cursos - 4to Secretariado</h1>

        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <!-- Tabla para mostrar los cursos -->
        <div class="card">
            <div class="card-header">
                Lista de Cursos
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Carrera</th>
                            <th>Nombre del curso</th>
                            <th>Descripción</th>
                            <th>Nivel</th>
                            <th>Cupo Máximo</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->carrera }}</td>
                                <td>{{ $curso->nombre }}</td>
                                <td>{{ $curso->descripcion }}</td>
                                <td>{{ $curso->nivel }}</td>
                                <td>{{ $curso->cupo_maximo }}</td>
                                <td>{{ $curso->estado }}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
