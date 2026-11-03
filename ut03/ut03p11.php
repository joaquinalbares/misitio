<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P11: Buscador de productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P11: Buscador de productos
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Formulario del buscador. Envía los filtros por GET a ut03p11-res.php.
-->
<section class="section">
    <div class="container" style="max-width: 600px;">
        <!-- TODO (PHP, antes del DOCTYPE): incluye datos.php con require_once -->
        <div class="box">
            <h1 class="title has-text-centered">
                <i class="fa fa-search"></i> Filtro de productos
            </h1>

            <form action="ut03p11-res.php" method="GET">
                <div class="field">
                    <label class="label" for="categoria">Categoría</label>
                    <div class="control has-icons-left">
                        <div class="select is-fullwidth">
                            <select name="categoria" id="categoria">
                                <option value="">Todas las categorías</option>
                                <!-- TODO: genera una <option> por cada categoría recorriendo $categorias. Ejemplo: -->
                                <option value="Informática">Informática</option>
                            </select>
                        </div>
                        <span class="icon is-small is-left"><i class="fa fa-list"></i></span>
                    </div>
                </div>

                <label class="label">Precio</label>
                <div class="field is-grouped">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="number" step="0.01" min="0" name="precio_min" placeholder="Precio mínimo">
                        <span class="icon is-small is-left"><i class="fa fa-eur"></i></span>
                    </p>
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="number" step="0.01" min="0" name="precio_max" placeholder="Precio máximo">
                        <span class="icon is-small is-left"><i class="fa fa-eur"></i></span>
                    </p>
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="solo_stock" value="1"> Solo productos con stock disponible
                    </label>
                </div>

                <div class="field mt-4">
                    <button class="button is-link is-fullwidth" type="submit"><i class="fa fa-filter mr-2"></i> Buscar productos</button>
                </div>
            </form>
        </div>
    </div>
</section>
</body>

</html>
