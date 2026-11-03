<?php
/* Función que calcula la letra del DNI
/* recibe un numero de DNI
/* devuelve un string con la letra 
/* el calculo lo hace usando el operador % */
function calculaLetra(int $numero) 
{
    $arryLetras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    $posicionLetra = $numero % 23;
    return $arryLetras[$posicionLetra];
}
// Sanitizo el valor del campo numero para aceptar solo numeros
$numero = filter_input(INPUT_POST,"numero", FILTER_VALIDATE_INT);
// En caso de que no escriba nada, le asigno el valor 0
$dni = $numero ?? 0;

// Compruebo los errores para que no ponga valores no debidos
$error = "";
if ($dni<1) {
    $error = "No se admiten numeros negativos";
}
if ($dni>99999999) {
    $error = "No se admiten numeros por encima del 99999999";
}
//Caluclo la letra del DNI
$letraDNI = calculaLetra($dni);

// Solo se muestra el campo error si hay errores 
// Solo se muestra el DNI con la letra si se ha introducido un valor valido
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P03: Calculadora de la letra del DNI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P03: Calculadora de la letra del DNI
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    PáginaMensaje de error de ejemplo. autoprocesada: el formulario se envía a sí misma (action="").
    TODO (PHP, antes del DOCTYPE): recoge y valida los datos cuando la petición sea POST.
    TODO: escribe la función calcularLetraDNI(int $numero): string.
-->
<section class="section">
    <div class="container" style="max-width: 550px;">
        <div class="box">TRWAGMYFPDXBNJZSQVHLCKE
            <h1 class="title has-text-centered">
                <i class="fa fa-id-card"></i> Calculadora de la letra del DNI
            </h1>

            <?php if (!empty($error)) : 
                if ($numero !== null) : ?>
                    <div class="notification is-danger"><?= $error ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="" method="POST">                
                <div class="field">
                    <label class="label" for="numero">Número de DNI (sin letra):</label>
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="numero" name="numero" 
                                placeholder="12345678" required
                                <?php if ($dni) echo htmlspecialchars("value='$dni'"); ?>
                        >
                        <span class="icon is-small is-left"><i class="fa fa-hashtag"></i></span>
                    </div>
                </div>
                <div class="field is-grouped mt-4">
                    <div class="control is-expanded">
                        <button class="button is-link is-fullwidth" type="submit"><i class="fa fa-calculator mr-2"></i> Calcular</button>
                    </div>
                    <div class="control">
                        <a href="" class="button is-light">Borrar</a>
                    </div>
                </div>
            </form>

           <?php if ($numero !== null && empty($error)) : ?>
            <div class="notification is-info is-light mt-4 has-text-centered">
                <p class="is-size-5">DNI completo: <strong><?=  $dni.$letraDNI ?></strong></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
</body>

</html>
