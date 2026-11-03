<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P08: Resultados de la quiniela</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P08: Resultados de la quiniela
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Escrutinio de la quiniela enviada desde ut03p08.php.
-->
<section class="section">
    <div class="container" style="max-width: 700px;">
        <!-- TODO (PHP, antes del DOCTYPE):
             1. Si no se ha llegado por POST, redirige a ut03p08.php.
             2. Recorre los 10 partidos: tu resultado (o 'SIN MARCAR'), el resultado simulado con rand()
                y si has acertado. Acepta solo '1', 'X' o '2' (in_array).
             3. Cuenta los aciertos. -->
        <div class="card">
            <header class="card-header has-background-dark">
                <p class="card-header-title has-text-white">
                    <i class="fa fa-trophy mr-2"></i> La quiniela · Resultados
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
                        <!-- TODO: una fila por partido con foreach. Filas de ejemplo: -->
                        <tr>
                            <td><strong>Partido 1</strong></td>
                            <td><span class="tag is-info">1</span></td>
                            <td><span class="tag is-dark">1</span></td>
                            <td><span class="tag is-success"><i class="fa fa-check mr-1"></i> SÍ</span></td>
                        </tr>
                        <tr>
                            <td><strong>Partido 2</strong></td>
                            <td><span class="tag is-warning">SIN MARCAR</span></td>
                            <td><span class="tag is-dark">X</span></td>
                            <td><span class="tag is-danger"><i class="fa fa-times mr-1"></i> NO</span></td>
                        </tr>
                    </tbody>
                </table>

                <div class="notification is-primary has-text-centered mt-4">
                    <p class="is-size-4"><strong><i class="fa fa-star mr-2"></i> HAS TENIDO <!-- TODO --> 1 ACIERTOS</strong></p>
                </div>

                <a href="ut03p08.php" class="button is-danger is-outlined is-fullwidth">
                    <i class="fa fa-refresh mr-2"></i> Volver a jugar
                </a>
            </div>
        </div>
    </div>
</section>
</body>

</html>
