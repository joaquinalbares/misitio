<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P06: Tabla numerada dinámica</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P06: Tabla numerada dinámica
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Página autoprocesada: el formulario se envía a sí misma (action="").
    TODO (PHP, antes del DOCTYPE): recoge y valida los datos cuando la petición sea POST.
-->
<section class="section">
    <div class="container" style="max-width: 650px;">
        <div class="box">
            <h1 class="title has-text-centered">
                <i class="fa fa-table"></i> Tabla numerada dinámica
            </h1>

            <!-- TODO: muestra este aviso SOLO si hay un error -->
            <div class="notification is-danger">Mensaje de error de ejemplo.</div>

            <form action="" method="POST">
                <!-- TODO: formulario persistente, el value debe mostrar lo que envió el usuario (escapado) -->
                <div class="columns">
                    <div class="column">
                <div class="field">
                    <label class="label" for="num_casillas">Número de casillas:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="num_casillas" name="num_casillas" value="12" min="1" required>
                        <span class="icon is-small is-left"><i class="fa fa-th"></i></span>
                    </div>
                </div>
                    </div>
                    <div class="column">
                <div class="field">
                    <label class="label" for="casillas_por_fila">Casillas por fila:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="casillas_por_fila" name="casillas_por_fila" value="5" min="1" required>
                        <span class="icon is-small is-left"><i class="fa fa-arrows-h"></i></span>
                    </div>
                </div>
                    </div>
                </div>
                <div class="field">
                    <button class="button is-info is-fullwidth" type="submit"><i class="fa fa-pencil mr-2"></i> Dibujar</button>
                </div>
            </form>

            <hr>
            <h2 class="subtitle is-5 has-text-centered">Tabla numerada</h2>
            <!-- TODO: genera la tabla con un bucle. Abre y cierra cada <tr> usando el operador %.
                 La última fila se completa con celdas vacías (clase has-background-light).
                 Ejemplo estático: 12 casillas, 5 por fila. -->
            <div class="table-container">
                <table class="table is-bordered is-striped is-fullwidth has-text-centered">
                    <tbody>
                        <tr><td><strong>1</strong></td><td><strong>2</strong></td><td><strong>3</strong></td><td><strong>4</strong></td><td><strong>5</strong></td></tr>
                        <tr><td><strong>6</strong></td><td><strong>7</strong></td><td><strong>8</strong></td><td><strong>9</strong></td><td><strong>10</strong></td></tr>
                        <tr><td><strong>11</strong></td><td><strong>12</strong></td><td class="has-background-light"></td><td class="has-background-light"></td><td class="has-background-light"></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</body>

</html>
