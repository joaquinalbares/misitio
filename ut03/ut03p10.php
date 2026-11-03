<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P10: Gestión de calificaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P10: Gestión de calificaciones
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Página autoprocesada: el formulario se envía a sí misma (action="").
    TODO (PHP, antes del DOCTYPE): recoge y valida los datos cuando la petición sea POST.
-->
<section class="section">
    <div class="container" style="max-width: 650px;">
        <div class="box">
            <h1 class="title has-text-centered">
                <i class="fa fa-graduation-cap"></i> Gestión de calificaciones
            </h1>

            <!-- TODO: muestra este aviso SOLO si hay un error -->
            <div class="notification is-danger">Mensaje de error de ejemplo.</div>

            <form action="" method="POST">
                <!-- TODO: formulario persistente, el value debe mostrar lo que envió el usuario (escapado) -->
                <!-- Puedes dejar las 4 filas así o generarlas con un bucle for -->
                <div class="columns is-mobile mb-0">
                    <div class="column">
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="nombres[]" placeholder="Nombre alumno 1" value="Ana" required>
                            <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="control has-icons-left">
                            <input class="input" type="number" step="0.1" min="0" max="10" name="notas[]" placeholder="Nota" value="8.5" required>
                            <span class="icon is-small is-left"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
                <div class="columns is-mobile mb-0">
                    <div class="column">
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="nombres[]" placeholder="Nombre alumno 2" value="Pedro" required>
                            <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="control has-icons-left">
                            <input class="input" type="number" step="0.1" min="0" max="10" name="notas[]" placeholder="Nota" value="4" required>
                            <span class="icon is-small is-left"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
                <div class="columns is-mobile mb-0">
                    <div class="column">
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="nombres[]" placeholder="Nombre alumno 3" value="María" required>
                            <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="control has-icons-left">
                            <input class="input" type="number" step="0.1" min="0" max="10" name="notas[]" placeholder="Nota" value="9" required>
                            <span class="icon is-small is-left"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
                <div class="columns is-mobile mb-0">
                    <div class="column">
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="nombres[]" placeholder="Nombre alumno 4" value="Carlos" required>
                            <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="control has-icons-left">
                            <input class="input" type="number" step="0.1" min="0" max="10" name="notas[]" placeholder="Nota" value="6.5" required>
                            <span class="icon is-small is-left"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
                <div class="field mt-4">
                    <button class="button is-link is-fullwidth" type="submit"><i class="fa fa-cogs mr-2"></i> Procesar calificaciones</button>
                </div>
            </form>

            <!-- TODO: todo lo que sigue se muestra SOLO si los 4 alumnos son válidos.
                 Usa tus funciones calcular_media(), obtener_maximo() y obtener_minimo(). -->
            <hr>
            <h2 class="title is-5">Resumen de calificaciones</h2>
            <div class="columns has-text-centered">
                <div class="column">
                    <div class="notification is-info is-light py-2">
                        <p class="heading">Nota media</p>
                        <p class="title is-4">7,00</p>
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-success is-light py-2">
                        <p class="heading">Nota más alta</p>
                        <p class="subtitle is-6 mb-1"><strong>María</strong></p>
                        <p class="title is-5">9,0</p>
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-danger is-light py-2">
                        <p class="heading">Nota más baja</p>
                        <p class="subtitle is-6 mb-1"><strong>Pedro</strong></p>
                        <p class="title is-5">4,0</p>
                    </div>
                </div>
            </div>

            <table class="table is-bordered is-fullwidth">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th class="has-text-centered">Nota</th>
                        <th class="has-text-centered">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- TODO: una fila por alumno con foreach. Ejemplo de aprobado y de suspenso: -->
                    <tr class="has-background-success-light">
                        <td><strong>Ana</strong></td>
                        <td class="has-text-centered">8,5</td>
                        <td class="has-text-centered"><span class="tag is-success">Aprobado</span></td>
                    </tr>
                    <tr class="has-background-danger-light">
                        <td><strong>Pedro</strong></td>
                        <td class="has-text-centered">4,0</td>
                        <td class="has-text-centered"><span class="tag is-danger">Suspenso</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>

</html>
