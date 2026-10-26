<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - P01</title>
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
    $contador = $_POST['contador'] ?? 5;
    $contador = $_GET['contador'] ?? $contador;
    ?>
    <p>Contador: <?php echo $contador; ?></p>
    <br>
    <form name="myform" method="get">
        <input name="contador" class="input is-link" type="hidden" value="<?php echo $contador + 1; ?>">
        <input class="button is-link" type="submit" value="Incrementar">
    </form>
    <br>
    <form name="myform" method="get">
        <input name="contador" class="input is-link" type="hidden" value="<?php echo $contador - 1; ?>">
        <input class="button is-link" type="submit" value="Decrementar">
    </form>
    <br>
    <p>
        <?php
        echo "Tabla del $contador <br>";
        for ($i = 1; $i <= 10; $i++) {
            $multiplicacion = $contador * $i;
            echo "$contador * $i = $multiplicacion <br>";
        }
        ?>
    </p>
</body>

</html>