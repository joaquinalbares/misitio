<?php
require "datos.php";
$categoria = $_GET["categoria"] ?? "Todas";
$categoria_texto = $categoria;
if (!$categoria) {
    $categoria = 0;
    $categoria_texto = "Todas";
} 
$precio_min = $_GET["precio_min"] ?? 0; 
if (!$precio_min) {
    $precio_min = 0;
}
$precio_max = $_GET["precio_max"] ?? 0; 
$precio_max_texto = $precio_max . " €";
if (!$precio_max) {
    $precio_max = 0;
    $precio_max_texto = "Máximo";
}
$solo_stock = $_GET["solo_stock"] ?? 0;
$solo_stock_texto = "En Stock";
if (!$solo_stock) {
    $solo_stock_texto = "Todos";
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Productos</title>
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
                    <a href="https://misitio.test/formulario.php" class="button is-light">
                        <i class="fa fa-arrow-left mr-2"></i> Nueva Búsqueda
                    </a>
                </div>
            </div>

            <!-- Resumen de Filtros Aplicados -->
            <div class="notification is-info is-light">
                <p><strong>Filtros aplicados:</strong></p>
                <ul>
                    <li>Categoría: <strong><?= $categoria_texto ?></strong></li>
                    <li>Rango de precio: 
                        <strong>
                            <?= $precio_min ?> € - <?= $precio_max_texto ?>
                        </strong>
                    </li>
                    <li>Disponibilidad: <strong><?= $solo_stock_texto ?></strong></li>
                </ul>
            </div>

            <!-- Tabla de Resultados -->
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
                                <?php foreach ($productos as $producto): ?>                              
                                <tr>
                                    <td><strong><?= $producto['nombre'] ?></strong></td>
                                    <td><span class="tag is-link is-light">Electrónica</span></td>
                                    <td class="has-text-right">850,00 €</td>
                                    <td class="has-text-centered">
                                        <span class="tag is-success">15 uds.</span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>                            
                                
                                <tr>
                                    <td><strong>Monitor LG 27 pulgadas</strong></td>
                                    <td><span class="tag is-link is-light">Electrónica</span></td>
                                    <td class="has-text-right">220,50 €</td>
                                    <td class="has-text-centered">
                                                                                    <span class="tag is-success">30 uds.</span>
                                                                            </td>
                                </tr>
                                                    </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total encontrados: 2</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            
        </div>
    </section>

</body></html>