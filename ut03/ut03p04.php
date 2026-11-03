<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P04: Ecuación de segundo grado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P04: Ecuación de segundo grado
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Página autoprocesada: el formulario se envía a sí misma (action="").
    TODO (PHP, antes del DOCTYPE): recoge y valida los datos cuando la petición sea POST.
-->
<section class="section">
    <div class="container" style="max-width: 550px;">
        <div class="box">
            <h1 class="title has-text-centered">
                <i class="fa fa-superscript"></i> Ecuación de segundo grado
            </h1>
            <p class="subtitle is-6 has-text-centered">a·x² + b·x + c = 0</p>

            <!-- TODO: muestra este aviso SOLO si hay un error -->
            <div class="notification is-danger">Mensaje de error de ejemplo.</div>

            <form action="" method="POST">
                <!-- TODO: formulario persistente, el value debe mostrar lo que envió el usuario (escapado) -->
                <div class="field">
                    <label class="label" for="a">Coeficiente a:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="a" name="a" value="1" step="any" required>
                        <span class="icon is-small is-left"><i class="fa fa-hashtag"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="b">Coeficiente b:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="b" name="b" value="-5" step="any" required>
                        <span class="icon is-small is-left"><i class="fa fa-hashtag"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="c">Coeficiente c:</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="c" name="c" value="6" step="any" required>
                        <span class="icon is-small is-left"><i class="fa fa-hashtag"></i></span>
                    </div>
                </div>
                <div class="field is-grouped mt-4">
                    <div class="control is-expanded">
                        <button class="button is-link is-fullwidth" type="submit"><i class="fa fa-check mr-2"></i> Resolver</button>
                    </div>
                    <div class="control">
                        <a href="" class="button is-light">Borrar</a>
                    </div>
                </div>
            </form>

            <!-- TODO: si el discriminante es negativo, muestra este aviso... -->
            <div class="notification is-warning mt-4">
                <i class="fa fa-exclamation-triangle mr-2"></i> No existen soluciones reales.
            </div>
            <!-- TODO: ...y si no, las dos soluciones con dos decimales -->
            <div class="notification is-success is-light mt-4">
                <p class="title is-5">Soluciones reales:</p>
                <p><strong>x₁ =</strong> 3,00</p>
                <p><strong>x₂ =</strong> 2,00</p>
            </div>
        </div>
    </div>
</section>
</body>

</html>
