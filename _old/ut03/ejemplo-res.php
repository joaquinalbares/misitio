<?php
// ============================================================================
// PROFESOR DWES: EXPLICACIÓN DEL PROCESAMIENTO MULTINODAL DE DATOS
// ============================================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ejemplo.html");
    exit();
}

// 1. Recepción del texto e input hidden
$cadena = htmlspecialchars($_POST['cadena'] ?? '', ENT_QUOTES, 'UTF-8');
$tokenHidden = htmlspecialchars($_POST['token_sesion'] ?? '', ENT_QUOTES, 'UTF-8');

// 2. Recepción del sexo (Radio Button)
$sexo = htmlspecialchars($_POST['sexo'] ?? 'No especificado', ENT_QUOTES, 'UTF-8');

// 3. Recepción de Checkboxes (Array 'extras')
// Si el usuario no marca ninguna opción, la clave no estará definida en $_POST.
$extras = $_POST['extras'] ?? [];
$extrasTexto = !empty($extras) ? implode(', ', array_map('htmlspecialchars', $extras)) : 'Ningún extra seleccionado';

// 4. Recepción de contraseña
$password = $_POST['password'] ?? '';
$passwordOculta = str_repeat('•', mb_strlen($password));

// 5. Recepción del Select Simple
$color = htmlspecialchars($_POST['color'] ?? 'No seleccionado', ENT_QUOTES, 'UTF-8');

// 6. Recepción del Select Múltiple (Array 'idiomas')
$idiomas = $_POST['idiomas'] ?? [];
$idiomasTexto = !empty($idiomas) ? implode(', ', array_map('htmlspecialchars', $idiomas)) : 'Ningún idioma seleccionado';

// 7. Recepción del Textarea
$comentario = htmlspecialchars($_POST['comentario'] ?? '', ENT_QUOTES, 'UTF-8');

// 8. Recepción del archivo mediante la superglobal $_FILES
$ficheroInfo = "No se ha subido ningún archivo";
if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] === UPLOAD_ERR_OK) {
    $nombreOriginal = htmlspecialchars($_FILES['fichero']['name'], ENT_QUOTES, 'UTF-8');
    $tamanoBytes = $_FILES['fichero']['size'];
    $tipoMime = htmlspecialchars($_FILES['fichero']['type'], ENT_QUOTES, 'UTF-8');

    $ficheroInfo = "Archivo: <strong>$nombreOriginal</strong> ($tamanoBytes bytes, Tipo: $tipoMime)";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Resultados</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="section">
        <div class="container" style="max-width: 800px;">
            <div class="card">
                <header class="card-header has-background-success">
                    <p class="card-header-title has-text-white">
                        <i class="fa fa-database mr-2"></i> Datos Recibidos del Formulario
                    </p>
                </header>
                <div class="card-content">

                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr class="has-background-link-light">
                                <th>Elemento</th>
                                <th>Valor Recibido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Campo Oculto (HIDDEN)</strong></td>
                                <td><code><?= $tokenHidden ?></code></td>
                            </tr>
                            <tr>
                                <td><strong>Cadena a buscar (TEXT)</strong></td>
                                <td><?= $cadena ?></td>
                            </tr>
                            <tr>
                                <td><strong>Sexo (RADIO)</strong></td>
                                <td><?= $sexo ?></td>
                            </tr>
                            <tr>
                                <td><strong>Extras (CHECKBOX)</strong></td>
                                <td><?= $extrasTexto ?></td>
                            </tr>
                            <tr>
                                <td><strong>Fichero (FILE)</strong></td>
                                <td><?= $ficheroInfo ?></td>
                            </tr>
                            <tr>
                                <td><strong>Contraseña (PASSWORD)</strong></td>
                                <td><?= $passwordOculta ?> <em>(Enmascarada por seguridad)</em></td>
                            </tr>
                            <tr>
                                <td><strong>Color (SELECT SIMPLE)</strong></td>
                                <td><span class="tag is-info"><?= $color ?></span></td>
                            </tr>
                            <tr>
                                <td><strong>Idiomas (SELECT MÚLTIPLE)</strong></td>
                                <td><?= $idiomasTexto ?></td>
                            </tr>
                            <tr>
                                <td><strong>Comentario (TEXTAREA)</strong></td>
                                <td><blockquote class="p-2"><?= nl2br($comentario) ?></blockquote></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="field mt-5">
                        <a href="ejemplo.php" class="button is-link is-outlined is-fullwidth">
                            <i class="fa fa-arrow-left mr-2"></i> Volver al formulario
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>
</html>
