<?php
/* GUIA DE RESOLUCION
OK - Saber si el formulario se ha enviado.
OK - Recoger los datos.
Validarlos y apuntar los errores.
OK - Si no hay errores, calcular el resultado.
OK - Mostrar el formulario (con lo que escribió el usuario), los errores y el resultado.
*/
$hayFilasExtra = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num_casillas = $_POST['num_casillas'];
    $casillas_por_fila = $_POST['casillas_por_fila'];
    $num_casillas = filter_var($num_casillas, FILTER_VALIDATE_INT);
    $casillas_por_fila = filter_var($casillas_por_fila, FILTER_VALIDATE_INT);
    if ($casillas_por_fila === false || $num_casillas === false) {
        $error = "Solo se pueden escribir numeros";
    }
    elseif ($num_casillas <=0 || $casillas_por_fila <=0) {
        $error = 'numero de casillas o casillas por fila no valida';
    }
    if ($num_casillas % $casillas_por_fila != 0) {
        $hayFilasExtra = true;
    }

}
else {
    $num_casillas = "";
    $casillas_por_fila = "";
}
?>
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

            <?php if (isset($error)) : ?>
            <div class="notification is-danger"><?= $error ?></div>
            <?php endif; ?>
            <form action="" method="POST">
                <!-- TODO: formulario persistente, el value 23 mostrar lo que envió el usuario (escapado) -->
                <div class="columns">
                    <div class="column">
                <div class="field">
                    <label class="label" for="num_casillas">Número de casillas:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="num_casillas" name="num_casillas" value="<?= $num_casillas ?>" required>
                        <span class="icon is-small is-left"><i class="fa fa-th"></i></span>
                    </div>
                </div>
                    </div>
                    <div class="column">
                <div class="field">
                    <label class="label" for="casillas_por_fila">Casillas por fila:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="casillas_por_fila" name="casillas_por_fila" value="<?= $casillas_por_fila ?>" required>
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
                        <tr>
                        <?php for ($i=1; $i<=$num_casillas; $i++) : ?>
                                <td><?= $i ?></td>
                            <?php if ($i%$casillas_por_fila === 0) : ?>
                                </tr><tr>
                            <?php endif; ?> 
                        <?php endfor; ?>
                        <?php if ($hayFilasExtra) for ($j=($num_casillas%$casillas_por_fila); $j<$casillas_por_fila; $j++) : ?>
                            <td>&nbsp;</td>
                        <?php endfor; ?>                    
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</body>

</html>
