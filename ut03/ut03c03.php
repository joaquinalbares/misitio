<?php
$directorioSubida = __DIR__ . '/../uploads/';
$tamanoMaximo     = 1024 * 1024; // 1 Megabyte
$tiposPermitidos  = ['image/jpeg', 'image/png', 'image/webp'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    echo "<pre>";
    var_dump($_FILES);
    var_dump($_POST);
    echo ini_get('upload_max_filesize');
    echo "</pre>";
    $archivo = $_FILES['foto'];

    // 1. Verificar si ocurrió un error en la subida
    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        die("Error en la subida del archivo. Código: " . $archivo['error']);
    }

    // 2. Validar tamaño
    if ($archivo['size'] > $tamanoMaximo) {
        die("El archivo excede el tamaño máximo permitido (1 MB).");
    }

    // 3. Validar tipo MIME real utilizando finfo
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeTipoReal = finfo_file($finfo, $archivo['tmp_name']);


    if (!in_array($mimeTipoReal, $tiposPermitidos, true)) {
        die("Formato de archivo no permitido: $mimeTipoReal");
    }

    // 4. Generar un nombre único e impredecible para evitar sobrescrituras y ataques
    $alias = filter_input(INPUT_POST, 'alias', FILTER_SANITIZE_SPECIAL_CHARS);
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $nombreNuevo = $alias . "-" . bin2hex(random_bytes(8)) . '.' . $extension;
    $rutaDestino = $directorioSubida . $nombreNuevo;
    var_dump ($rutaDestino);

   
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · C03: Subida de imagenes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="section">
        <div class="container" style="max-width: 700px;">
            <form method="post" enctype="multipart/form-data">
                <label for="alias">Alias</label>
                <input type="text" name="alias">
                <br>
                <label for="foto">Foto</label>
                <input type="file" name="foto"><br>
                <button type="submit" class="button">Subir</button>
            </form>
        </div>
    </section>
</body>
