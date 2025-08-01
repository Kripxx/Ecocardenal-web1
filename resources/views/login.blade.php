<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
</head>
<body>
    <div class="login-container">
        @if(session('exito'))
            <script>
                Swal.fire({
                    title: "¡Sesión iniciada!",
                    text: "{{ session('exito') }}",
                    imageUrl: "{{ asset('images/like.png') }}", <!-- Imagen personalizada -->
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: "Éxito",
                    confirmButtonColor: "#00796b"
                });
            </script>
        @endif

        <h2>Iniciar Sesión</h2>
        
        <div class="login-image" id="loginImage">
            <img src="{{ asset('images/default-user.png') }}" alt="Imagen inicial">
        </div>

        <form method="POST" action="{{ route('iniciar') }}">
            @csrf
            <input type="text" name="username" placeholder="Nombre de usuario" id="usernameInput">
            <small class="fst-italic text-danger">{{ $errors->first('username') }}</small>

            <input type="password" name="password" placeholder="Contraseña" id="passwordInput">
            <small class="fst-italic text-danger">{{ $errors->first('password') }}</small>

            <button type="submit">Iniciar Sesión</button>

            @if($errors->has('login'))
                <p class="fst-italic text-danger">{{ $errors->first('login') }}</p>
            @endif
        </form>
        
        <a href="{{ route('registrar') }}">Crear una cuenta</a>
    </div>

    <script>
        const usernameInput = document.getElementById('usernameInput');
        const passwordInput = document.getElementById('passwordInput');
        const loginImage = document.getElementById('loginImage').querySelector('img');

        // Cambiar imagen cuando se escribe en los campos
        usernameInput.addEventListener('focus', () => {
            loginImage.src = "{{ asset('images/user-focus.png') }}";
        });

        passwordInput.addEventListener('focus', () => {
            loginImage.src = "{{ asset('images/password-focus.png') }}";
        });

        // Imagen predeterminada al perder el enfoque
        usernameInput.addEventListener('blur', () => {
            loginImage.src = "{{ asset('images/default-user.png') }}";
        });

        passwordInput.addEventListener('blur', () => {
            loginImage.src = "{{ asset('images/default-user.png') }}";
        });
    </script>
</body>
</html>
