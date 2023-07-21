<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>

    <form action="../utilities/handleRequest.php" method="POST" novalidate>
        <input type="text" name="email" placeholder="Correo">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="text" name="type" hidden value="login">
        <input type="submit" value="Entrar">
    </form>

</body>

</html>