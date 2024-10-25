<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles2.css">
</head>
<body>
    <div class="container">
    <h1>Iniciar Sesion</h1>
        <form action="proceso.php" method="POST">
        <label for="Usuario">
            Usuario:
            <br>
            <input type="text" name="usuario">
        </label>
        <br>
        <label for="Contraseña">
            Contraseña:
            <br>
            <input type="password" name="contrasena">
        </label>
        <br>
        <input type="submit" value="Ingresar">
    </div>
    </form>
</body>
</html>
