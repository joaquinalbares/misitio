<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P08: La quiniela</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P08: La quiniela
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Formulario de la quiniela. Envía un array partido[1..10] a ut03p08-res.php.
-->
<section class="section">
    <div class="container" style="max-width: 600px;">
        <div class="card">
            <header class="card-header has-background-danger">
                <p class="card-header-title has-text-white">
                    <i class="fa fa-futbol-o mr-2"></i> La quiniela
                </p>
            </header>
            <div class="card-content">
                <form action="ut03p08-res.php" method="POST">
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth has-text-centered">
                        <thead>
                            <tr class="has-background-dark">
                                <th class="has-text-white">PARTIDO</th>
                                <th class="has-text-white">1</th>
                                <th class="has-text-white">X</th>
                                <th class="has-text-white">2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- TODO: genera las 10 filas con un bucle for (de 1 a 10).
                                 Cambia el 1 de "Partido 1" y de name="partido[1]" por el número de cada vuelta.
                                 Esta es la fila modelo: -->
                            <tr>
                                <td><strong>Partido 1</strong></td>
                                <td><input type="radio" name="partido[1]" value="1"></td>
                                <td><input type="radio" name="partido[1]" value="X"></td>
                                <td><input type="radio" name="partido[1]" value="2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="button is-danger is-fullwidth">
                        <i class="fa fa-paper-plane mr-2"></i> Enviar apuesta
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>

</html>
