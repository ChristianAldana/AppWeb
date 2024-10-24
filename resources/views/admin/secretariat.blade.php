<!DOCTYPE html>
<html lang="es">
<head>
    @vite('resources/js/app.js') <!-- Asegúrate que Vue se está cargando correctamente -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SECRETARIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

     <!-- Contenedor para montar el componente de notas -->
                        <div id="notas-content">
                        <mostrar-nota></mostrar-nota>
                        </div>
</body>
</html>
