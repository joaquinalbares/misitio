<?php
// 0. Definición de variables

$contador = 0;
$laURL = "?";
$preguntas = ['¿Eres mayor de edad?',
    '¿Tienes carnet de conducir?' , 
    '¿Tienes estudios o algún título?'
    ];
$lapregunta = "";
$variables = ['mayor' , 'carnet' , 'titulo'];
$laVariable = "";

// 1. Recogida y sanitización de los campos por GET
$mayor = htmlspecialchars($_GET['mayor'] ?? '', ENT_QUOTES, 'UTF-8');
$carnet = htmlspecialchars($_GET['carnet'] ?? '', ENT_QUOTES, 'UTF-8');
$titulo = htmlspecialchars($_GET['titulo'] ?? '', ENT_QUOTES, 'UTF-8');
$reiniciar = htmlspecialchars($_GET['reiniciar'] ?? '', ENT_QUOTES, 'UTF-8');


if (!empty($reiniciar)) {
    foreach ($variables as $laVar) {
        setcookie($laVar, "", [
            'expires'  => time() -3600,  // marca de tiempo: ahora + 30 días
            'path'     => '/',                          // válida en todo el sitio
            'httponly' => true,                         // JavaScript no puede leerla
            'samesite' => 'Lax',                        // protege frente a CSRF (apartado 7)
        ]);
        unset($_COOKIE[$laVar]);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit(); 
}

if (!empty($mayor)) {
    $contador=1;
    setcookie('mayor', $mayor, [
        'expires'  => time() + 60 * 60 * 24 * 30,  // marca de tiempo: ahora + 30 días
        'path'     => '/',                          // válida en todo el sitio
        'httponly' => true,                         // JavaScript no puede leerla
        'samesite' => 'Lax',                        // protege frente a CSRF (apartado 7)
    ]);
}
if (!empty($carnet)) {
    $contador=2;
    setcookie('carnet', $carnet, [
        'expires'  => time() + 60 * 60 * 24 * 30,  // marca de tiempo: ahora + 30 días
        'path'     => '/',                          // válida en todo el sitio
        'httponly' => true,                         // JavaScript no puede leerla
        'samesite' => 'Lax',                        // protege frente a CSRF (apartado 7)
    ]);

}
if (!empty($titulo)) {
    $contador=3;
    setcookie('titulo', $titulo, [
        'expires'  => time() + 60 * 60 * 24 * 30,  // marca de tiempo: ahora + 30 días
        'path'     => '/',                          // válida en todo el sitio
        'httponly' => true,                         // JavaScript no puede leerla
        'samesite' => 'Lax',                        // protege frente a CSRF (apartado 7)
    ]);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();   
}

$cookieCarnet = $_COOKIE['carnet'] ?? "";
$cookieMayor = $_COOKIE['mayor'] ?? "";
$cookieTitulo = $_COOKIE['titulo'] ?? "";
$terminado = false;
if (!empty($cookieMayor) && !empty($cookieCarnet) && !empty($cookieTitulo)) {
    $terminado = true;
} else {
    $lapregunta = $preguntas[$contador];
    $laVariable = $variables[$contador];
}

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
    <?php if (!$terminado) : ?>
        <?= $lapregunta; ?><br>
        <a href="<?= $laURL.$laVariable; ?>=si" class="button is-primary">SI</a>
        <a href="<?= $laURL.$laVariable; ?>=no" class="button is-danger">NO</a>
    <?php else : ?>
        Tus respuestas son:
        <ul>
            <li><?= $preguntas[0]." ".$cookieMayor; ?></li>
            <li><?= $preguntas[1]." ".$cookieCarnet; ?></li>
            <li><?= $preguntas[2]." ".$cookieTitulo; ?></li>            
        </ul>
        <a href="?reiniciar=si" class="button is-primary">REINICIAR</a>
    <?php endif; ?>
    </div> 
</section>
</body>
</html>
