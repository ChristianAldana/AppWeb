<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard CCR</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Incluye el archivo CSS separado -->
        <link href="{{ asset('styles.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/js/app.js')
    <style>
            .sidebar {
                height: 100vh;
                background-color: #4e73df;
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
                margin-left: 250px;
                padding: 20px;
            }
            .card {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

        <!-- Sidebar -->
        <div class="d-flex">
            <nav class="sidebar d-flex flex-column p-3">
                <!-- Brand -->
                <a href="#" class="sidebar-brand d-flex align-items-center justify-content-center text-white mb-4" style="text-decoration: none;">
                    <div class="sidebar-brand-icon">
                        <!-- Imagen personalizada en lugar del icono -->
                        <img src="{{ asset('LOGO.jpeg') }}" alt="Logo" style="width: 40px; height: 40px;">
                    </div>
                    <div class="sidebar-brand-text mx-3">COLEGIO CRISTO REY <sup></sup></div>
                </a>

                </a>

                <!-- Botón para ir al Welcome -->
                <a href="{{ route('welcome') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    Página Principal
                </a>
                                <!-- Botón para ir al Dashboard -->
                    
                    <a href="{{ route('dashboard.teacher') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Maestros 
             

            </nav>
        

            <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <section id="bienvenida">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h3><i class="fas fa-school"></i> Bienvenido al Colegio Cristo Rey</h3>
                        </div>
                        <div class="card-body text-center">
                        <img src="{{ asset('LOGO.jpeg') }}" alt="Logo" style="width: 40px; height: 40px;">
                            <p class="lead">Nos alegra tenerte aquí. Juntos, creamos un ambiente educativo de excelencia.</p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-6">
                <section id="bienestar">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h3><i class="fas fa-heart"></i> Recursos de Bienestar Estudiantil</h3>
                        </div>
                        <div class="card-body">
                            <p>En el Colegio Cristo Rey, nos preocupamos por el bienestar de nuestros estudiantes. Aquí tienes algunos recursos:</p>
                            <ul>
                                <li><strong>Consejería Escolar:</strong> Servicios de apoyo emocional disponibles para todos los estudiantes.</li>
                                <li><strong>Programas de Tutoría:</strong> Ayuda adicional para estudiantes que lo necesiten.</li>
                                <li><strong>Talleres de Manejo del Estrés:</strong> Sesiones regulares para aprender técnicas de relajación.</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <section id="actividadesExtracurriculares">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h3><i class="fas fa-users"></i> Actividades Extracurriculares</h3>
                        </div>
                        <div class="card-body">
                            <p>Participa en nuestras diversas actividades extracurriculares para enriquecer tu experiencia educativa:</p>
                            <ul>
                                <li><strong>Club de Ciencias:</strong> Proyectos y experimentos científicos.</li>
                                <li><strong>Equipo de Fútbol:</strong> Entrenamientos y competencias regulares.</li>
                                <li><strong>Teatro Escolar:</strong> Producciones y obras de teatro durante el año.</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-6">
                <section id="contacto">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <h3><i class="fas fa-envelope"></i> Contacto</h3>
                        </div>
                        <div class="card-body">
                            <p>Si tienes preguntas o necesitas más información, no dudes en contactarnos:</p>
                            <ul>
                                <li><strong>Teléfono:</strong> (123) 456-7890</li>
                                <li><strong>Email:</strong> info@colegiocristorey.edu</li>
                                <li><strong>Horario de Atención:</strong> Lunes a Viernes, 8:00 AM - 4:00 PM</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


        <!-- Bootstrap & JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
