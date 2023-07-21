<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>

    <form action="../utilities/handleRequest.php" method="POST" novalidate>
        <input type="email" name="email" placeholder="Correo electrónico">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="password" name="password" placeholder="Contraseña">

        <input type="text" name="type" hidden value="signup">
        <input type="submit" value="Entrar">
    </form>

</body>

</html>