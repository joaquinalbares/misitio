<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P02: Catálogo de controles de formulario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P02: Catálogo de controles de formulario
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Este formulario ya está completo: no necesita PHP. Envía los datos a ut03p02-res.php.
-->
<section class="section">
    <div class="container" style="max-width: 700px;">
        <div class="card">
            <header class="card-header has-background-info">
                <p class="card-header-title has-text-white">
                    <i class="fa fa-list-alt mr-2"></i> Elementos de entrada
                </p>
            </header>
            <div class="card-content">
                <!-- enctype es obligatorio para poder enviar ficheros -->
                <form action="ut03p02-res.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="token_sesion" value="XYZ987654321">

                    <h2 class="title is-5 has-text-info">Elementos de tipo INPUT</h2>

                    <div class="field">
                        <label class="label" for="cadena">TEXT · Cadena a buscar</label>
                        <div class="control has-icons-left">
                            <input class="input" type="text" id="cadena" name="cadena" value="valor por defecto">
                            <span class="icon is-small is-left"><i class="fa fa-font"></i></span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">RADIO · Sexo</label>
                        <div class="control">
                            <label class="radio"><input type="radio" name="sexo" value="Mujer" checked> Mujer</label>
                            <label class="radio"><input type="radio" name="sexo" value="Hombre"> Hombre</label>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">CHECKBOX · Extras</label>
                        <div class="control">
                            <label class="checkbox mr-2"><input type="checkbox" name="extras[]" value="Garaje"> Garaje</label>
                            <label class="checkbox mr-2"><input type="checkbox" name="extras[]" value="Piscina"> Piscina</label>
                            <label class="checkbox"><input type="checkbox" name="extras[]" value="Jardín"> Jardín</label>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">FILE · Fichero</label>
                        <div class="file has-name is-fullwidth">
                            <label class="file-label">
                                <input class="file-input" type="file" name="fichero">
                                <span class="file-cta">
                                    <span class="file-icon"><i class="fa fa-upload"></i></span>
                                    <span class="file-label">Examinar…</span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="password">PASSWORD · Contraseña</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" id="password" name="password" placeholder="••••••••">
                            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <hr>
                    <h2 class="title is-5 has-text-info">Elementos SELECT y TEXTAREA</h2>

                    <div class="field">
                        <label class="label" for="color">SELECT simple · Color</label>
                        <div class="select">
                            <select name="color" id="color">
                                <option value="Rojo" selected>Rojo</option>
                                <option value="Verde">Verde</option>
                                <option value="Azul">Azul</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="idiomas">SELECT múltiple · Idiomas</label>
                        <div class="select is-multiple">
                            <select name="idiomas[]" id="idiomas" multiple size="3">
                                <option value="Español" selected>Español</option>
                                <option value="Inglés">Inglés</option>
                                <option value="Francés">Francés</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="comentario">TEXTAREA · Comentario</label>
                        <textarea class="textarea" id="comentario" name="comentario" rows="3">Este artículo me parece...</textarea>
                    </div>

                    <div class="field is-grouped mt-5">
                        <div class="control"><button type="submit" class="button is-info">Enviar</button></div>
                        <div class="control"><button type="reset" class="button is-light">Borrar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>

</html>
