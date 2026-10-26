<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejemplo Servidor</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <!-- Bloque o sentencia de guión embebido en PHP -->
    <?php
    $color = $_GET["color"] ?? 'red'; // En la URL se define el valor de la variable. Ej.: https://misitio.test/index.php?color=cornflowerblue
    $nombre = $_POST["nombre"] ?? 'invitado';
    ?>
    <h1 style="color: <?php echo $color; ?>;">
        <?php

        echo "Bienvenido a la web, " . $nombre; // Para 2 variables, se usa el operador AND (&&). Ej.: https://misitio.test/index.php?color=cornflowerblue&&nombre=Marco
        ?>
    </h1>

    <div x-data="{ open: false }">
        <button class="button is-warning" @click="open = true">Expand</button>

        <span x-show="open">
            Content...
        </span>
    </div>

    <div class="buttons">
        <a href="index.php?color=blue" class="button is-info">Azul</a>
        <a href="index.php?color=green" class="button is-success">Verde</a>
        <a href="index.php?color=yellow" class="button is-warning">Amarillo</a>
        <a href="index.php?color=red" class="button is-danger">Rojo</a>
    </div>

    <form name="myform" method="post" action="index.php">
        <input name="nombre" class="input is-link" type="text" placeholder="Introduce tu nombre...">
        <input class="button is-link" type="submit" value="Enviar">
    </form>
</body>

</html>