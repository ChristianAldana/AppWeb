<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .login-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.75rem;
            color: #333;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
            height: auto;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Login Page -->
<div class="container">
    <div class="login-container mx-auto">
        <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo de la página" class="logo" aria-label="Logotipo de la página">
        <h2 class="login-title">Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}" aria-label="Formulario de inicio de sesión">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu correo" required aria-required="true">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Introduce tu contraseña" required aria-required="true">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Recuérdame</label>
                </div>
                <a href="#" class="text-secondary">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3" aria-label="Iniciar sesión">Iniciar Sesión</button>
            <p class="text-center mt-3">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
