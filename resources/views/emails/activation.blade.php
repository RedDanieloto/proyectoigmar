<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activación de Cuenta</title>
</head>
<body>
    <h1>Hola {{ $name }},</h1>
    <p>Gracias por registrarte. Por favor, haz clic en el enlace de abajo para activar tu cuenta:</p>
    <a href="{{ $activationUrl }}">Activa tu cuenta</a>
    <p>Si no solicitaste esta cuenta, puedes ignorar este mensaje.</p>
</body>
</html>
