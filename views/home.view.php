<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../controllers/crear_nota.php">Crear nota</a>
    <a href="../utilities/logout.php">Cerrar sesión</a>

    <h2>Notas </h2>

    <?php
    if (count($notas) == 0) { ?>
        <span>Ups! Parece que aún no tienes notas</span>
    <?php } ?>
    
    <?php
    foreach ($notas as $nota) { ?>
        <div>
            <div>
                <span>Titulo: </span>
                <span><?= $nota->getTitulo() ?></span>
            </div>
            <div>
                <span>Descripcion: </span>
                <span><?= $nota->getDescripcion() ?></span>
            </div>
        </div>
        <br />
    <?php } ?>


    <h3>Información de usuario: </h3>
    <ul>
        <li>
            User:
            <?= $_SESSION["username"] ?>
        </li>
        <li>
            email:
            <?= $_SESSION["email"] ?>
        </li>
        <li>
            user-id:
            <?= $_SESSION["user-id"] ?>
        </li>
    </ul>


</body>

</html>