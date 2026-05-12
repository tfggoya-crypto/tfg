<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body style="
    margin:0;
    padding:0;
    background:#f3f4f6;
    font-family:Arial,sans-serif;
">

<div style="
    max-width:600px;
    margin:40px auto;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
">

    <!-- HEADER -->
    <div style="
        background:#1e3a8a;
        color:white;
        padding:30px;
        text-align:center;
    ">
        <h1 style="margin:0;">
            Bienvenido a FincasApp
        </h1>

        <p style="margin-top:10px;">
            Tu cuenta ha sido creada correctamente
        </p>
    </div>

    <!-- BODY -->
    <div style="padding:35px; color:#374151;">

        <p>
            Hola <strong>{{ $user->nombre }}</strong>,
        </p>

        <p>
            Un administrador ha creado una cuenta para ti en la plataforma.
        </p>

        <div style="
            background:#f9fafb;
            border:1px solid #e5e7eb;
            border-radius:10px;
            padding:20px;
            margin:25px 0;
        ">

            <p>
                <strong>Usuario:</strong><br>
                {{ $user->username }}
            </p>

            <p>
                <strong>Contraseña temporal:</strong><br>
                {{ $passwordTemporal }}
            </p>

        </div>

        <p style="
            color:#dc2626;
            font-weight:bold;
        ">
            Por seguridad, cambia tu contraseña después de iniciar sesión.
        </p>

        <div style="text-align:center; margin-top:35px;">

            <a href="{{ url('/login') }}"
               style="
                background:#2563eb;
                color:white;
                padding:14px 28px;
                text-decoration:none;
                border-radius:8px;
                display:inline-block;
                font-weight:bold;
               ">
                Iniciar sesión
            </a>

        </div>

    </div>

    <!-- FOOTER -->
    <div style="
        background:#f3f4f6;
        padding:20px;
        text-align:center;
        color:#6b7280;
        font-size:14px;
    ">
        © {{ date('Y') }} FincasApp
    </div>

</div>

</body>
</html>