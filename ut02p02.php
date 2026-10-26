<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - P02</title>
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
    $sueldo = $_POST['sueldo'] ?? 1000;
    $puesto = $_POST['puesto'];
    $complemento = 0;
    ?>
    <p>El sueldo base es de <?php echo $sueldo; ?>€</p>
    <br>
    <p>El complemento es del <?php
                                switch ($puesto) {
                                    case 'base':
                                        $complemento = 10;
                                        echo $complemento, '%';
                                        break;
                                    case 'directivo':
                                        $complemento = 15;
                                        echo $complemento, '%';
                                        break;
                                    case 'alto-cargo':
                                        $complemento = 20;
                                        echo $complemento, '%';
                                }
                                ?></p>
    <br>
    <p>El sueldo final es de <?php echo $sueldo + ($sueldo * ($complemento / 100)); ?>€</p>
</body>

</html>