<?php
// ESCRUTINIO DE LA QUINIELA

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ejercicio3.php");
    exit();
}

// 1. Recuperación del array asociativo 'partido' enviado desde el formulario
$partido = $_POST["partido"] ?? [];
#var_dump($partido);exit();

// 2. Definición del catálogo de posibles resultados de un partido
$opciones = ['1', 'X' , '2'];
$resultados = [];
for ($i=1; $i<11; $i++) {
    $indice = rand(0,2);
    $resultados[] = $opciones[$indice];
}
var_dump($resultados);exit();

// 3. Inicialización del contador de aciertos y la estructura del informe
$aciertosTotales = 0;
$informeEscrutinio = [];
for ($i= 1; $i< 11; $i++) {
    $marcado = $partido[$i] ?? "SIN MARCAR";
    if ($marcado == $resultado[$i]) {
        $aciertosTotales++;
    }
}

// 4. Bucle de evaluación de los 10 partidos

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Resultados Escrutinio</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="section">
        <div class="container" style="max-width: 700px;">
            <div class="card">
                <header class="card-header has-background-dark">
                    <p class="card-header-title has-text-white">
                        <i class="fa fa-trophy mr-2"></i> LA QUINIELA - RESULTADOS
                    </p>
                </header>
                <div class="card-content">

                    <table class="table is-bordered is-striped is-hoverable is-fullwidth has-text-centered">
                        <thead>
                            <tr class="has-background-grey-dark">
                                <th class="has-text-white">PARTIDO</th>
                                <th class="has-text-white">TU RESULTADO</th>
                                <th class="has-text-white">HA SALIDO</th>
                                <th class="has-text-white">¿HAS ACERTADO?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  ?>
                                <tr>
                                    <td><strong>Partido <?= $numPartido ?></strong></td>
                                    <td>
                                        <?php if ($datos['tu_resultado'] === 'SIN MARCAR'): ?>
                                            <span class="tag is-warning">SIN MARCAR</span>
                                        <?php else: ?>
                                            <span class="tag is-info"><?= $datos['tu_resultado'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="tag is-dark"><?= $datos['ha_salido'] ?></span>
                                    </td>
                                    <td>
                                        <?php if ($datos['acertado']): ?>
                                            <span class="tag is-success"><i class="fa fa-check mr-1"></i> SI</span>
                                        <?php else: ?>
                                            <span class="tag is-danger"><i class="fa fa-times mr-1"></i> NO</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php  ?>
                        </tbody>
                    </table>

                    <!-- Notificación del Total de Aciertos -->
                    <div class="notification is-primary has-text-centered mt-4">
                        <p class="is-size-4">
                            <strong><i class="fa fa-star mr-2"></i> HAS TENIDO <?= $aciertosTotales ?> ACIERTOS</strong>
                        </p>
                    </div>

                    <!-- Botón para volver a jugar -->
                    <div class="field mt-5">
                        <a href="ejercicio3.php" class="button is-danger is-outlined is-fullwidth">
                            <i class="fa fa-refresh mr-2"></i> Volver a Jugar
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>
</html>
