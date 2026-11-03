<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P11: Resultados de la búsqueda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P11: Resultados de la búsqueda
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Muestra los productos que cumplen los filtros recibidos por GET.
-->
<section class="section">
    <div class="container" style="max-width: 900px;">
        <!-- TODO (PHP, antes del DOCTYPE):
             1. Incluye datos.php con require_once.
             2. Recoge los filtros de $_GET (la categoría debe existir en $categorias).
             3. Filtra $productos con array_filter() y una función anónima (use). -->
        <div class="level">
            <div class="level-left">
                <h1 class="title"><i class="fa fa-cubes"></i> Resultados de productos</h1>
            </div>
            <div class="level-right">
                <a href="ut03p11.php" class="button is-light"><i class="fa fa-arrow-left mr-2"></i> Nueva búsqueda</a>
            </div>
        </div>

        <div class="notification is-info is-light">
            <p><strong>Filtros aplicados:</strong></p>
            <ul>
                <li>Categoría: <strong><!-- TODO --> Todas</strong></li>
                <li>Rango de precio: <strong><!-- TODO --> Mínimo - 50,00 €</strong></li>
                <li>Disponibilidad: <strong><!-- TODO --> Solo en stock</strong></li>
            </ul>
        </div>

        <!-- TODO: si hay productos, muestra la tabla... -->
        <div class="box">
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th class="has-text-right">Precio</th>
                        <th class="has-text-centered">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- TODO: una fila por producto con foreach. Ejemplo con y sin stock: -->
                    <tr>
                        <td><strong>Altavoz portátil</strong></td>
                        <td><span class="tag is-link is-light">Audio</span></td>
                        <td class="has-text-right">45,50 €</td>
                        <td class="has-text-centered"><span class="tag is-success">12 uds.</span></td>
                    </tr>
                    <tr>
                        <td><strong>Auriculares Bluetooth</strong></td>
                        <td><span class="tag is-link is-light">Audio</span></td>
                        <td class="has-text-right">59,00 €</td>
                        <td class="has-text-centered"><span class="tag is-danger">Sin stock</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- TODO: ...y si no hay ninguno, este aviso en su lugar -->
        <div class="notification is-warning is-light">
            <i class="fa fa-info-circle mr-2"></i> No hay productos que cumplan los filtros.
        </div>
    </div>
</section>
</body>

</html>
