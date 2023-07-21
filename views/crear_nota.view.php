<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nota</title>
</head>

<body>
    <h1>Crear Nota</h1>
    <form action="../utilities/handleRequest.php" method="POST">
        <input type="text" name="titulo" placeholder="titulo">
        <input type="text" name="descripcion" placeholder="descripcion">
        <input type="text" name="type" value="note" hidden>
        <input type="submit" value="Crear">
    </form>

</body>

</html>