<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P05: Dibuja un triángulo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P05: Dibuja un triángulo
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Página autoprocesada: el formulario se envía a sí misma (action="").
    TODO (PHP, antes del DOCTYPE): recoge y valida los datos cuando la petición sea POST.
-->
<section class="section">
    <div class="container" style="max-width: 550px;">
        <div class="box">
            <h1 class="title has-text-centered">
                <i class="fa fa-caret-up"></i> Dibuja un triángulo
            </h1>

            <!-- TODO: muestra este aviso SOLO si hay un error -->
            <div class="notification is-danger">Mensaje de error de ejemplo.</div>

            <form action="" method="POST">
                <!-- TODO: formulario persistente, el value debe mostrar lo que envió el usuario (escapado) -->
                <div class="field">
                    <label class="label" for="altura">Altura:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="altura" name="altura" value="5" min="1" max="30" required>
                        <span class="icon is-small is-left"><i class="fa fa-arrows-v"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="caracter">Carácter:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" id="caracter" name="caracter" value="*" maxlength="1" required>
                        <span class="icon is-small is-left"><i class="fa fa-font"></i></span>
                    </div>
                </div>
                <div class="field mt-4">
                    <button class="button is-primary is-fullwidth" type="submit"><i class="fa fa-paint-brush mr-2"></i> Dibujar</button>
                </div>
            </form>

            <!-- TODO: genera las filas con DOS bucles anidados y muéstralas aquí -->
            <div class="box mt-4 has-background-dark">
                <p class="subtitle is-6 has-text-light"><strong>Resultado (altura: 4, carácter: *):</strong></p>
                <pre class="has-background-dark has-text-warning" style="font-size: 1.2rem;">*
* *
* * *
* * * *</pre>
            </div>
        </div>
    </div>
</section>
</body>

</html>
