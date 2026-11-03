<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P09: Alta validada con expresiones regulares</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P09: Alta validada con expresiones regulares
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Página autoprocesada: el formulario se envía a sí misma (action="").
    TODO (PHP, antes del DOCTYPE): recoge y valida los datos cuando la petición sea POST.
    TODO: valida cada campo con preg_match() y normaliza con preg_replace().
-->
<section class="section">
    <div class="container" style="max-width: 650px;">
        <div class="box">
            <h1 class="title has-text-centered">
                <i class="fa fa-check-square-o"></i> Formulario de alta
            </h1>

            <!-- TODO: muestra este aviso SOLO si hay errores, con el número de campos que fallan -->
            <div class="notification is-danger is-light">Hay 1 campo(s) con errores. Revísalos abajo.</div>

            <!-- novalidate desactiva la validación del navegador: así se ve la que haces tú en PHP -->
            <form action="" method="POST" novalidate>
                <!-- TODO en cada campo:
                     · formulario persistente (value con lo enviado, escapado), salvo la contraseña;
                     · si el campo tiene error, añade la clase is-danger al input y el <p class="help is-danger">.
                     El campo "Teléfono" muestra cómo se ve un error. -->
                <div class="field">
                    <label class="label" for="nombre">Nombre y apellidos</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" id="nombre" name="nombre" placeholder="Ana María Pérez-Ruiz">
                        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="documento">DNI o NIE</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" id="documento" name="documento" placeholder="12345678Z">
                        <span class="icon is-small is-left"><i class="fa fa-id-card"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="telefono">Teléfono</label>
                    <div class="control has-icons-left">
                        <input class="input is-danger" type="tel" id="telefono" name="telefono" placeholder="+34 612 345 678">
                        <span class="icon is-small is-left"><i class="fa fa-phone"></i></span>
                    </div>
                    <p class="help is-danger">Introduce un teléfono español de 9 cifras (puede llevar +34 delante).</p>
                </div>
                <div class="field">
                    <label class="label" for="cp">Código postal</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" id="cp" name="cp" placeholder="30530">
                        <span class="icon is-small is-left"><i class="fa fa-map-marker"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="email">Correo electrónico</label>
                    <div class="control has-icons-left">
                        <input class="input" type="email" id="email" name="email" placeholder="ana@ejemplo.es">
                        <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="clave">Contraseña</label>
                    <div class="control has-icons-left">
                        <input class="input" type="password" id="clave" name="clave" placeholder="">
                        <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="matricula">Matrícula del coche (opcional)</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" id="matricula" name="matricula" placeholder="1234 BCD">
                        <span class="icon is-small is-left"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <div class="field mt-5">
                    <button class="button is-link is-fullwidth" type="submit"><i class="fa fa-paper-plane mr-2"></i> Dar de alta</button>
                </div>
            </form>

            <!-- TODO: si todo es correcto, muestra ESTO en lugar del formulario, con los datos normalizados -->
            <div class="notification is-success is-light mt-5">
                <p class="mb-3"><strong><i class="fa fa-check-circle mr-1"></i> Datos válidos.</strong> Así se guardarían ya normalizados:</p>
                <table class="table is-fullwidth is-striped">
                    <tbody>
                        <tr><th>Nombre y apellidos</th><td>Ana María Pérez-Ruiz</td></tr>
                        <tr><th>DNI o NIE</th><td>X1234567L</td></tr>
                        <tr><th>Teléfono</th><td>612 345 678</td></tr>
                        <tr><th>Código postal</th><td>30530</td></tr>
                        <tr><th>Correo electrónico</th><td>ana@ejemplo.es</td></tr>
                        <tr><th>Contraseña</th><td>•••••••••••</td></tr>
                        <tr><th>Matrícula del coche (opcional)</th><td>1234 BCD</td></tr>
                    </tbody>
                </table>
                <a href="" class="button is-success is-outlined">Nueva alta</a>
            </div>
        </div>
    </div>
</section>
</body>

</html>
