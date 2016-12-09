<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Email</title>
</head>
<body>
    <h1>¡Gracias por su registro en el sistema de Alive Tech!</h1>
    <p>Por favor, <a href='{{ url("register/confirm/{$user->token}") }}'>confirme su email dando clic aquí</a></p>
</body>
</html>
