

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye el archivo CSS separado -->
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="LOGO.JPEG" alt="Logo" class="navbar-logo">
            <span class="navbar-title">COLEGIO CRISTO REY</span>
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">INICIO</a>
                    </li>
                        <li class="nav-item">
                    <a class="nav-link" href="#mission-vision-container">NOSOTROS</a>
                     </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#main-content-container">CARRERAS DISPONIBLES</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#faq-section">PREGUNTAS</a>
                    </li>
                    <!-- Opciones de Inicio de Sesión y Registro -->
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                
                @endif
                </ul>
            </div>
        </div>
    </nav>


    <!-- Imagen Principal -->
    <div class="hero-image">
    <div class="hero-text">
        <h1>¡Bienvenidos a nuestro colegio!</h1>
        <p>Descubre nuestras instalaciones y programas educativos.</p>
    </div>
    <div class="hero-buttons">
    <a href="#get-started" id="scroll-btn" class="btn">Empezar</a>
    </div>
</div>


  <!-- Contenedor de Misión y Visión -->
<div id="mission-vision-container">
    <div id="mission-vision" class="mission-vision">
        <div class="mission-vision-box">
            <div class="mission-vision-header">
                <i class="fas fa-user-graduate mission-vision-icon"></i>
                <h2>Misión</h2>
            </div>
            <p>Somos una institución educativa católica integra al sistema educativo nacional,organizada gradualmente que nos permite desarrollar en forma democrática,
                dinámica y participativa el proceso de enseñanza aprendizaje bajo los nuevos paradigmas de un curriculum  del ser humano desarrollando su potencial en todas sus dimensiones,
                 de tal manera que le permita comprender y transformar tanto su propia persona como su entorno sociocultural y físico, desarrollando contenido significativo bajo una metodología
                 activa a fin de fortalecer valores que lo conduzca de manera competitiva a la convivencia pacifica, tolerante, respetuosa alcanzado el progreso desiado..</p>
        </div>

        <!-- Logo en el medio -->
        <div class="mission-vision-logo">
                    <img src="LOGO.JPEG" alt="Logo" class="logo-img">
                </div>

        <div class="mission-vision-box">
            <div class="mission-vision-header">
                <i class="fas fa-chalkboard-teacher mission-vision-icon"></i>
                <h2>Visión</h2>
            </div>
            <p>Ser una institución educativa con capacidad para formar niños, niñas y jóvenes sobre senderos firmes de bondad, 
                solidaridad y servicios, preparándolos para ser ciudadanos del cielo y profesionales de éxito que coadyuven a su propio desarrollo , al sostenimiento de su familia, 
                a la solución de manera justa y equitativa de los problemas comunitarios y nacionales por medio de técnicas de enseñanza-aprendizaje dirigidas hacia  la competitividad.</p>
        </div>
    </div>
</div>


<!-- Resto del contenido de la página aquí -->
<div class="container">
    <!-- Otros contenidos -->
</div>

<!-- Contenido del botón para ir al dashboard -->
@if (Auth::check())
        <div class="container mt-4 text-center">
            <h2>Acceso Rápido</h2>
            <a href="{{ Auth::user()->role_id == 1 ? route('dashboard.admin') : (Auth::user()->role_id == 2 ? route('dashboard.teacher') : route('dashboard.student')) }}" class="btn btn-success">
                Ir a mi Dashboard
            </a>
        </div>
    @endif
    
   <!-- Contenedor Principal para el Menú Lateral y las Tarjetas -->
<div id="main-content-container" class="container mt-4 bg-light p-4">
    <div class="row">
        <!-- Menú Lateral -->
        <div class="col-md-3">
        <h3 class="mb-4">Carreras Disponibles</h3>
        <input type="text" id="search-input" class="form-control mb-3" placeholder="Buscar carrera o año" onkeyup="filterCards()">
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action menu-item" data-target="bachiller-content">BACHILLERATOS</a>
                <a href="#" class="list-group-item list-group-item-action menu-item" data-target="perito-content">PERITO EN ADMINISTRACION</a>
                <a href="#" class="list-group-item list-group-item-action menu-item" data-target="magisterio-content">MAGISTERIO INFANTIL INTERCULTURAL</a>
                <a href="#" class="list-group-item list-group-item-action menu-item" data-target="secretariado-content">SECRETARIADO BILINGUE</a>

                <!-- Botón Mostrar Todas -->
                <button id="showAll" class="btn btn-primary mt-2">Mostrar Todas</button>
                
            </div>
        </div>
      <!-- Columna para las Tarjetas -->
      <div class="col-md-9">
            <div id="computacion">
                <div id="bachiller-content" class="card-container">
                    <div class="card mb-4">
                        <img src="CCR8.jpeg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Bachillerato en ciencias y letras con orientación en computación</h5>
                            <p class="card-text">Encontrarás las materias asignadas correspondientes a cada año.</p>
                           <div class="d-flex">
    <button class="btn btn-secondary me-2" @click="mostrarPensum = true" style="width: 100px;">Ver Pensum</button>
    <button class="btn btn-danger" @click="mostrarPensum = false" style="width: 100px;">Ocultar Pensum</button>
</div>

                            <!-- Condicional para mostrar los componentes de pensum -->
                            <div v-if="mostrarPensum">
                                <cuarto-computacion></cuarto-computacion>
                                <quinto-computacion></quinto-computacion>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="perito-content" class="card-container" style="display:none;">
                <div class="card mb-4">
                    <img src="CCR4.jpeg" class="card-img-top" alt="Imagen 2">
                    <div class="card-body">
                        <h5 class="card-title">Perito en administración de empresas</h5>
                        <p class="card-text">Encontrarás las materias asignadas correspondientes a cada año.</p>
                        <div class="d-flex">
    <button class="btn btn-secondary me-2" @click="mostrarPensum1 = true" style="width: 100px;">Ver Pensum</button>
    <button class="btn btn-danger" @click="mostrarPensum1 = false" style="width: 100px;">Ocultar Pensum</button>
</div>
                        <!-- Condicional para mostrar los componentes de pensum -->
                        <div v-if="mostrarPensum1">
                            <cuarto-perito></cuarto-perito>
                            <quinto-perito></quinto-perito>
                            <sexto-perito></sexto-perito>
                        </div>
                    </div>
                </div>
            </div>

            <div id="magisterio-content" class="card-container" style="display:none;">
                <div class="card mb-4">
                    <img src="MEII.jpeg" class="card-img-top" alt="Imagen 3">
                    <div class="card-body">
                        <h5 class="card-title">Magisterio Infantil Intercultural</h5>
                        <p class="card-text">Encontrarás las materias asignadas correspondientes a cada año.</p>
                        <div class="d-flex">
    <button class="btn btn-secondary me-2" @click="mostrarPensum2 = true" style="width: 100px;">Ver Pensum</button>
    <button class="btn btn-danger" @click="mostrarPensum2 = false" style="width: 100px;">Ocultar Pensum</button>
</div>
                        <!-- Condicional para mostrar los componentes de pensum -->
                        <div v-if="mostrarPensum2">
                            <cuarto-magisterio></cuarto-magisterio>
                            <quinto-magisterio></quinto-magisterio>
                            <sexto-magisterio></sexto-magisterio>
                        </div>
                    </div>
                </div>
            </div>

            <div id="secretariado-content" class="card-container" style="display:none;">
                <div class="card mb-4">
                    <img src="https://colegioitaliano.edu.gt/sites/default/files/secre1.jpg" class="card-img-top" alt="Imagen 4">
                    <div class="card-body">
                        <h5 class="card-title">Secretariado Bilingüe Español-Inglés</h5>
                        <p class="card-text">Encontrarás las materias asignadas correspondientes a cada año.</p>
                        <div class="d-flex">
    <button class="btn btn-secondary me-2" @click="mostrarPensum3 = true" style="width: 100px;">Ver Pensum</button>
    <button class="btn btn-danger" @click="mostrarPensum3 = false" style="width: 100px;">Ocultar Pensum</button>
</div>
                        <!-- Condicional para mostrar los componentes de pensum -->
                        <div v-if="mostrarPensum3">
                            <cuarto-secretariado></cuarto-secretariado>
                            <quinto-secretariado></quinto-secretariado>
                            <sexto-secretariado></sexto-secretariado>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div> 
</div>

                    

                    <!-- Mando a llamar componente de imagen -->
                    <div id="imagenes-content">
                        <imagenes></imagenes> 
                    </div>



                    <!-- Mando a llamar componente de imagen -->
                    <div id="preguntas-component">
                        <preguntas></preguntas>
                    </div>




       <!-- Sección de Redes Sociales -->
<!-- Sección de Redes Sociales -->
<div class="container mt-4 text-center">
    <h2>Síguenos en Redes Sociales</h2>
    <div class="social-icons mt-3">
        <a href="https://www.facebook.com/profile.php?id=100091315550849&mibextid=ZbWKwL" target="_blank" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com" target="_blank" class="social-icon">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.instagram.com/colegiocristoreyoficial?igsh=MXZlZXZudTF5Z2pibQ==" target="_blank" class="social-icon">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
</div>



<!-- Botón para Volver Arriba -->
<button id="scrollTopBtn" class="btn btn-primary" style="position:fixed;bottom:20px;right:20px;display:none;">↑</button>


    <!-- Incluye Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Incluye el archivo JavaScript separado -->
    <script src="{{ asset('scripts.js') }}"></script>
</body>
</html>
