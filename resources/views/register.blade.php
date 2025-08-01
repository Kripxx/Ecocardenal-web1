<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
</head>
<body>
    <div class="register-container">
        <h2>Crear Cuenta</h2>
        
        <form method="POST" action="{{ route('enviar') }}">
            @csrf

            <div class="mb-3">
                <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
                <input type="text" name="nombreUsuario" class="form-control" id="nombreUsuario" placeholder="Nombre de Usuario" value="{{ old('nombreUsuario') }}">
                @if($errors->has('nombreUsuario'))
                    <small class="text-danger">{{ $errors->first('nombreUsuario') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="txtnombre" class="form-label">Nombre</label>
                <input type="text" name="txtnombre" class="form-control" id="txtnombre" placeholder="Nombre" value="{{ old('txtnombre') }}">
                @if($errors->has('txtnombre'))
                    <small class="text-danger">{{ $errors->first('txtnombre') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="txtapellido" class="form-label">Apellidos</label>
                <input type="text" name="txtapellido" class="form-control" id="txtapellido" placeholder="Apellidos" value="{{ old('txtapellido') }}">
                @if($errors->has('txtapellido'))
                    <small class="text-danger">{{ $errors->first('txtapellido') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" name="correo" class="form-control" id="correo" placeholder="Correo Electrónico" value="{{ old('correo') }}">
                @if($errors->has('correo'))
                    <small class="text-danger">{{ $errors->first('correo') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                @if($errors->has('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                @endif
            </div>

            <button type="submit">Registrar</button>
        </form>

        <a href="{{ route('login') }}">Ya tengo una cuenta</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
