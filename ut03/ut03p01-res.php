<?php
/* TODO Crea una aplicación en PHP en la que se debe mostrar lo que ha introducido el usuario en 
el formulario y un botón que permita volver a la página de búsqueda. */

// Comprobamos si la petición ha llegado por el método POST. Si el usuario
// intenta acceder directamente introduciendo la URL en el navegador,
// debemos redirigirlo al formulario o tratar el error.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ut03p01.html");
    exit(); // Detenemos la ejecución del script tras la redirección.
}

// 1. Recogida y sanitización del campo 'texto'
$texto = htmlspecialchars($_POST['texto'] ?? '', ENT_QUOTES, 'UTF-8');

// 2. Recogida del campo 'buscar_en' (Radio Button)
$buscar_en = htmlspecialchars($_POST['buscar_en'] ?? '', ENT_QUOTES, 'UTF-8');
$mensaje_buscar = match ($buscar_en) {
    'cancion'  => "Nombre de canción.",
    'album' => "Nombre de álbum.",
    'ambos'  => "Todos los campos",
    default  => "Sin criterios",
};

// 3. Recogida del campo 'genero' (Desplegable Select)
$genero = htmlspecialchars($_POST['genero'] ?? '', ENT_QUOTES, 'UTF-8');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Resultados</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="section">
        <div class="container" style="max-width: 600px;">
            <div class="card">
                <header class="card-header has-background-success">
                    <p class="card-header-title has-text-white">
                        <i class="fa fa-check-circle mr-2"></i> Formulario simple. Resultados del formulario
                    </p>
                </header>
                <div class="card-content">
                    <p class="subtitle is-5">Estos son los datos introducidos:</p>

                    <div class="content">
                        <ul>
                            <li><strong>Texto de búsqueda:</strong> <?= $texto ?></li>
                            <li><strong>Buscar en:</strong> <?= $mensaje_buscar ?></li>
                            <li><strong>Género:</strong> <?= $genero ?></li>
                        </ul>
                    </div>

                    <!-- Botón para regresar al formulario inicial -->
                    <div class="field mt-5">
                        <a href="p02.html" class="button is-link is-outlined is-fullwidth">
                            <i class="fa fa-arrow-left mr-2"></i> Nueva búsqueda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>