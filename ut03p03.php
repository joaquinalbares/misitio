<?php
require_once 'datos.php';
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
        <div class="container" style="max-width: 600px;">
            <div class="box">
                <h1 class="title has-text-centered">
                    <i class="fa fa-search text-primary"></i> Filtro de Productos
                </h1>

                <form action="ut03p03res.php" method="GET">
                    
                    <!-- Categoría -->
                    <div class="field">
                        <label class="label" for="categoria">Categoría</label>
                        <div class="control has-icons-left">
                            <div class="select is-fullwidth">
                                <select name="categoria" id="categoria">
                                    <option value="">Todas las categorías</option>
                                    <?php foreach ($categorias as $cat): ?>
                                        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <span class="icon is-small is-left">
                                <i class="fa fa-list"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Intervalo de precios -->
                    <div class="label">Intervalo de Precio (€)</div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input" type="number" step="0.01" min="0" name="precio_min" placeholder="Precio mínimo">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-eur"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input" type="number" step="0.01" min="0" name="precio_max" placeholder="Precio máximo">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-eur"></i>
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Stock -->
                    <div class="field mt-4">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="solo_stock" value="1">
                                Solo productos con stock disponible
                            </label>
                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="field mt-5">
                        <button class="button is-link is-fullwidth" type="submit">
                            <i class="fa fa-filter mr-2"></i> Buscar Productos
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>