<?php
require_once 'datos.php';

// Captura de datos del formulario GET
$categoriaSel = filter_input(INPUT_GET, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
$precioMin    = filter_input(INPUT_GET, 'precio_min', FILTER_VALIDATE_FLOAT);
$precioMax    = filter_input(INPUT_GET, 'precio_max', FILTER_VALIDATE_FLOAT);
$soloStock    = isset($_GET['solo_stock']) && $_GET['solo_stock'] === '1';

// Filtrado de productos
$productosFiltrados = array_filter($productos, function ($p) use ($categoriaSel, $precioMin, $precioMax, $soloStock) {
    // Filtro por categoría
    if ($categoriaSel !== '' && $p['categoria'] !== $categoriaSel) {
        return false;
    }
    // Filtro por precio mínimo
    if ($precioMin !== false && $precioMin !== null && $p['precio'] < $precioMin) {
        return false;
    }
    // Filtro por precio máximo
    if ($precioMax !== false && $precioMax !== null && $p['precio'] > $precioMax) {
        return false;
    }
    // Filtro por stock
    if ($soloStock && $p['stock'] <= 0) {
        return false;
    }

    return true;
});
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <section class="section">
        <div class="container" style="max-width: 900px;">
            <div class="level">
                <div class="level-left">
                    <h1 class="title">
                        <i class="fa fa-boxes"></i> Resultados de Productos
                    </h1>
                </div>
                <div class="level-right">
                    <a href="formulario.php" class="button is-light">
                        <i class="fa fa-arrow-left mr-2"></i> Nueva Búsqueda
                    </a>
                </div>
            </div>

            <!-- Resumen de Filtros Aplicados -->
            <div class="notification is-info is-light">
                <p><strong>Filtros aplicados:</strong></p>
                <ul>
                    <li>Categoría: <strong><?= $categoriaSel !== '' ? htmlspecialchars($categoriaSel) : 'Todas' ?></strong></li>
                    <li>Rango de precio: 
                        <strong>
                            <?= ($precioMin !== false && $precioMin !== null) ? number_format($precioMin, 2, ',', '.') . ' €' : 'Mínimo' ?>
                            -
                            <?= ($precioMax !== false && $precioMax !== null) ? number_format($precioMax, 2, ',', '.') . ' €' : 'Máximo' ?>
                        </strong>
                    </li>
                    <li>Disponibilidad: <strong><?= $soloStock ? 'Solo en stock' : 'Todos' ?></strong></li>
                </ul>
            </div>

            <!-- Tabla de Resultados -->
            <?php if (count($productosFiltrados) > 0): ?>
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
                            <?php foreach ($productosFiltrados as $prod): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($prod['nombre']) ?></strong></td>
                                    <td><span class="tag is-link is-light"><?= htmlspecialchars($prod['categoria']) ?></span></td>
                                    <td class="has-text-right"><?= number_format($prod['precio'], 2, ',', '.') ?> €</td>
                                    <td class="has-text-centered">
                                        <?php if ($prod['stock'] > 0): ?>
                                            <span class="tag is-success"><?= $prod['stock'] ?> uds.</span>
                                        <?php else: ?>
                                            <span class="tag is-danger">Sin stock</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total encontrados: <?= count($productosFiltrados) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php else: ?>
                <div class="notification is-warning">
                    <i class="fa fa-exclamation-triangle"></i> No se encontraron productos que cumplan con los criterios seleccionados.
                </div>
            <?php endif; ?>

        </div>
    </section>
</body>

</html>