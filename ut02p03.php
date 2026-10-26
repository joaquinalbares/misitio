<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P03</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <?php
    # var_dump($_POST); Muestra todas las variables por pantalla
    # foreach ($_POST as $elemento) { // Recorre todos los valores simples que recibe
    #    var_dump($elemento);
    #}
    # $nombre = $_POST["nombre"];
    # $edad = $_POST["edad"];
    # $lenguajes = $_POST["lenguajes"];
    // Declaración/Recogida de variables
    foreach ($_POST as $clave => $valor) {
        $$clave = $valor;
    }
    $nombre_arreglado = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_SPECIAL_CHARS);

    // Lógica de la aplicación
    if (!filter_input(INPUT_POST, "correo", FILTER_VALIDATE_EMAIL)) {
        echo "Correo no válido. Pruebe de nuevo más tarde.";
    } else {
        echo "<div class='box'>";
        echo "Hola, " . $nombre_arreglado . ", veo que tienes " . $edad . " años y";
        if (empty($lenguajes)) {
            echo " que no conoces ningún lenguaje, una pena.";
        } else {
            echo " que tienes conocimientos en: <ul>";
            foreach ($lenguajes as $ele) {
                echo "<li> • " . $ele . "</li>";
            }
            echo "</ul>";
        }
        echo "</div>";
    }
    ?>
</body>

</html>