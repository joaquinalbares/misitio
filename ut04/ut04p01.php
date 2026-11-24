<?php
$contador = 0;
$laURL = "?";
$preguntas = ['¿Eres mayor de edad?',
    '¿Tienes carnet de conducir?' , 
    '¿Tienes estudios o algún título?'
    ];

$variables = ['mayor' , 'carnet' , 'titulo'];

// 1. Recogida y sanitización del campo 'mayor'
$mayor = htmlspecialchars($_GET['mayor'] ?? '', ENT_QUOTES, 'UTF-8');
$carnet = htmlspecialchars($_GET['carnet'] ?? '', ENT_QUOTES, 'UTF-8');
$titulo = htmlspecialchars($_GET['titulo'] ?? '', ENT_QUOTES, 'UTF-8');

if (!empty($mayor)) {
    $contador=1;
    $laURL = $laURL . "mayor=" . $mayor . "&";
    if (!empty($carnet)) {
        $contador=2;
        $laURL = $laURL . "carnet=" . $carnet . "&";
        if (!empty($titulo)) {
            $lapregunta = ('el trabajo es tuyo');
        }
    }
}

$lapregunta = $preguntas[$contador];
$laVariable = $variables[$contador];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT04 · P01: Preguntas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<section class="section">
    <div class="container" style="max-width: 600px;">
        <?= $lapregunta; ?><br>
        <a href="<?= $laURL.$laVariable; ?>=si" class="button is-primary">SI</a>
        <a href="<?= $laURL.$laVariable; ?>=no" class="button is-danger">NO</a>
    </div> 
</section>
</body>
</html>
