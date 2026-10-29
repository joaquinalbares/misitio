
<?php
/* TODO: Escribe una página en PHP con un formulario que solicite una cantidad numérica y permita elegir la divisa de
origen y de destino mediante desplegables (<select>). Las conversiones disponibles deben ser entre Euros (€),
Dólares ($) y Yenes (¥). */
// Tasas de cambio con respecto a 1 EUR
$tasas = [
    'EUR' => 1.0,
    'USD' => 1.1,
    'JPY' => 160.0
];
// Filtro el campo cantidad para que solo acepte enteros
$cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);
if ($cantidad === false) {
    // Creo el mensaje de error: no es un entero válido
    $mensajeError = '<h1>Valor no válido</h1>';
}
//inicializo resultado
$resultado = null;
//recupero el valor "de"
$de = $_POST['de'] ?? 'EUR';
//recupero el valor "a"
$cantidadEuros = $cantidad / $tasas[$de];
$a = $_POST['a'] ?? 'EUR';
// cambio a la moneda destino y le aplico el formato español
$resultado = number_format($cantidadEuros * $tasas[$a], 3 ,"," , ".");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 - PRACTICA 01: Conversor de Divisas</title>
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
        <div class="container" style="max-width: 500px;">
            <div class="box">
                <h1 class="title has-text-centered">
                    <i class="fa fa-money text-primary"></i> Conversor de Divisas
                </h1>

                <form action="" method="POST">
                    <div class="field">
                        <label class="label" for="cantidad">Convertir:</label>
                        <div class="control has-icons-left">
                            <input class="input" type="text" id="cantidad" name="cantidad" value="<?= htmlspecialchars($cantidad) ?>" placeholder="100.00" required>
                            <span class="icon is-small is-left"><i class="fa fa-calculator"></i></span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="de">De:</label>
                        <div class="control has-icons-left">
                            <div class="select is-fullwidth">
                                <select name="de" id="de">
                                    <option value="EUR" <?php if ($de==='EUR') echo "selected" ?>>Euro (€)</option>
                                    <option value="USD" <?php if ($de==='USD') echo "selected" ?>>Dólar Americano ($)</option>
                                    <option value="JPY" <?php if ($de==='JPY') echo "selected" ?>>Yen Japonés (¥)</option>
                                </select>
                            </div>
           filer var                  <span class="icon is-small is-left"><i class="fa fa-globe"></i></span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="a">A:</label>
                        <div class="control has-icons-left">
                            <div class="select is-fullwidth">
                                <select name="a" id="a">
                                    <option value="EUR" <?php if ($a==='EUR') echo "selected" ?>>Euro (€)</option>
                                    <option value="USD" <?php if ($a==='USD') echo "selected" ?>>Dólar Americano ($)</option>
                                    <option value="JPY" <?php if ($a==='JPY') echo "selected" ?>>Yen Japonés (¥)</option>
                                </select>
                            </div>
                            <span class="icon is-small is-left"><i class="fa fa-exchange"></i></span>
                        </div>
                    </div>

                    <div class="field mt-4">
                        <button class="button is-link is-fullwidth" type="submit">
                            <i class="fa fa-refresh mr-2"></i> Convertir
                        </button>
                    </div>
                </form>

                <?php if ($resultado !== null): 
                    if (!empty($mensajeError)) : ?>
                        <div class="notification is-danger is-light mt-4 has-text-centered">
                            VALOR NO VÁLIDO
                        </div>
                    <?php else : ?>
                    <div class="notification is-success is-light mt-4 has-text-centered">
                        <p class="is-size-5">
                            <strong><?= "$cantidad $de"?> = <?= "$resultado $a"?></strong>
                        </p>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>

</html>