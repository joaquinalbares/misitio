<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRÁCTICA 02 - La Quiniela</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="section">
        <div class="container" style="max-width: 600px;">
            <div class="card">
                <header class="card-header has-background-danger">
                    <p class="card-header-title has-text-white">
                        <i class="fa fa-futbol-o mr-2"></i> LA QUINIELA
                    </p>
                </header>
                <div class="card-content">

                    <!-- Formulario con envío POST hacia el procesador de quinielas -->
                    <form action="p03-res.php" method="POST">

                        <table class="table is-bordered is-striped is-hoverable is-fullwidth has-text-centered">
                            <thead>
                                <tr class="has-background-dark">
                                    <th class="has-text-white">PARTIDO</th>
                                    <th class="has-text-white">1</th>
                                    <th class="has-text-white">X</th>
                                    <th class="has-text-white">2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // TODO
                                // Generamos 10 filas de forma iterativa.
                                // Cada grupo de radio buttons utiliza la nomenclatura 'partido[$i]'.
                                for ($i = 1; $i < 11; $i++) : 
                                ?>
                                    <tr>
                                        <td><strong>Partido <?= $i ?></strong></td>
                                        <td>
                                            <input type="radio" name="partido[<?= $i ?>]" value="1">
                                        </td>
                                        <td>
                                            <input type="radio" name="partido[<?= $i ?>]" value="X">
                                        </td>
                                        <td>
                                            <input type="radio" name="partido[<?= $i ?>]" value="2">
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>

                        <div class="field mt-4">
                            <button type="submit" class="button is-danger is-fullwidth">
                                <i class="fa fa-paper-plane mr-2"></i> Enviar Apuesta
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
