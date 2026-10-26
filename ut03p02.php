<?php
declare(strict_types=1);

/**
 * Calculadora de longevidad (versión PHP).
 * Un único archivo: formulario, validación, cálculo y justificación.
 * Estimación orientativa basada en estudios publicados; no es consejo médico.
 */

/** Esperanza de vida al nacer en España por sexo (INE, datos de 2024): [etiqueta, años]. */
const ESPERANZA_BASE = [
        'hombre' => ['Hombre', 81.4],
        'mujer'  => ['Mujer', 86.5],
];
const SEXO_POR_DEFECTO = 'hombre';

/* ---------- Utilidades ---------- */

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function fmt(float $n, int $dec = 1): string
{
    return number_format($n, $dec, ',', '.');
}

function sgn(float $n): string
{
    $signo = $n > 0 ? '+' : ($n < 0 ? '−' : '');
    return $signo . fmt(abs($n));
}

/* ---------- Datos: preguntas, opciones, ajustes en años y justificación ---------- */

$preguntas = [
        'tabaco' => [
                'nombre' => 'Tabaco',
                'texto'  => '¿Fumas o has fumado?',
                'ayuda'  => 'Cuenta cigarrillos, puros y pipa.',
                'fuente' => 'Jha et al., N Engl J Med 2013.',
                'defecto' => 'ex_antes',
                'opciones' => [
                        'nunca' => ['Nunca he fumado', 0.0,
                                'Sin consumo de tabaco no se aplica ningún ajuste. Es la referencia.', ''],
                        'ex_antes' => ['Lo dejé antes de los 40', -1.0,
                                'Quien deja de fumar entre los 25 y los 34 años gana en torno a 10 años frente a seguir fumando, y queda cerca de la esperanza de vida de quien nunca fumó. Se descuenta 1 año por el riesgo que queda.', ''],
                        'ex_despues' => ['Lo dejé a los 40 o después', -3.0,
                                'Dejarlo entre los 45 y los 64 años recupera entre 4 y 6 años frente a seguir fumando, pero queda parte del exceso de riesgo. Se estima una pérdida residual de unos 3 años.',
                                'Ya has hecho lo más importante. Mantener la abstinencia y revisar el pulmón con tu médico si tienes más de 50 años es lo que más aporta ahora.'],
                        'actual' => ['Fumo actualmente', -10.0,
                                'Los fumadores actuales pierden de media unos 10 años de vida respecto a quienes nunca han fumado. Dejarlo recupera parte de ellos a cualquier edad.',
                                'Dejar de fumar es la palanca más grande que existe: a los 35-44 años recupera unos 9 años, y a los 55-64 todavía unos 4.'],
                ],
        ],
        'actividad' => [
                'nombre' => 'Actividad física',
                'texto'  => '¿Cuánta actividad física haces a la semana?',
                'ayuda'  => 'Suma caminar a paso ligero, bici, deporte o trabajo físico. 150 minutos semanales es la recomendación de la OMS.',
                'fuente' => 'Moore et al., PLoS Med 2012.',
                'defecto' => 'oms',
                'opciones' => [
                        'nada' => ['Casi nada (menos de 15 minutos)', -1.8,
                                'En el análisis de Moore et al., las personas inactivas viven unos 1,8 años menos que las que hacen algo de ejercicio por debajo de la recomendación.',
                                'Con solo 15 minutos diarios de paseo a buen paso se pasa a un nivel con mejor esperanza de vida.'],
                        'poco' => ['Algo (de 15 a 149 minutos)', 0.0,
                                'Es el nivel de referencia: algo de actividad, por debajo de la recomendación.', ''],
                        'oms' => ['Entre 150 y 449 minutos', 1.6,
                                'Con 150 minutos semanales de actividad moderada se ganan unos 3,4 años frente a la inactividad. Son unos 1,6 más que quien hace poco.', ''],
                        'mucho' => ['450 minutos o más', 2.7,
                                'Con unos 450 minutos semanales la ganancia llega a unos 4,5 años frente a la inactividad, 2,7 más que quien hace poco. Por encima de ese nivel el beneficio crece muy despacio.', ''],
                ],
        ],
        'alcohol' => [
                'nombre' => 'Alcohol',
                'texto'  => '¿Cuántas bebidas alcohólicas tomas a la semana?',
                'ayuda'  => 'Una bebida estándar equivale a unos 10 g de alcohol: una caña, una copa de vino o un vermut pequeño.',
                'fuente' => 'Wood et al., Lancet 2018.',
                'defecto' => 'b2',
                'opciones' => [
                        'b1' => ['Ninguna o hasta 10', 0.0,
                                'Hasta unos 100 g de alcohol puro a la semana es el tramo de referencia de Wood et al., sin pérdida apreciable de esperanza de vida.', ''],
                        'b2' => ['De 11 a 20', -0.5,
                                'Entre 100 y 200 g de alcohol a la semana se asocia, a los 40 años, con unos 6 meses menos de vida respecto al tramo de referencia.', ''],
                        'b3' => ['De 21 a 35', -1.5,
                                'Entre 200 y 350 g semanales se asocian con entre 1 y 2 años menos de esperanza de vida.',
                                'Bajar al tramo de hasta 10 bebidas semanales elimina este descuento.'],
                        'b4' => ['Más de 35', -4.5,
                                'Más de 350 g semanales se asocian con entre 4 y 5 años menos de esperanza de vida.',
                                'Reducir el consumo es el cambio con más efecto en tu perfil. Si te cuesta, el médico de cabecera puede ayudarte.'],
                ],
        ],
        'dieta' => [
                'nombre' => 'Alimentación',
                'texto'  => '¿Cómo describirías tu alimentación habitual?',
                'ayuda'  => 'Piensa en lo que comes la mayoría de los días, no en las comidas especiales.',
                'fuente' => 'Fadnes et al., PLoS Med 2022; PREDIMED, N Engl J Med 2018.',
                'defecto' => 'mixta',
                'opciones' => [
                        'mala' => ['Mucha carne roja o procesada, bollería, refrescos y comida precocinada', -2.0,
                                'El patrón occidental típico, con mucha carne procesada y pocos alimentos vegetales, es el extremo que modelan Fadnes et al. Se aplica una fracción prudente de su estimación.',
                                'Cambiar carne procesada por legumbres y frutos secos es el cambio que más pesa en los modelos de Fadnes et al.'],
                        'mixta' => ['Mezclada: algo de verdura y fruta, algo de procesados', 0.0,
                                'Término medio de la población. No se aplica ajuste.', ''],
                        'med' => ['Mediterránea: legumbres, verdura, fruta, pescado, aceite de oliva y frutos secos', 2.5,
                                'Se acerca al patrón óptimo de Fadnes et al., que estimaron hasta unos 10 años de ganancia si se adopta a los 20 años, y menos a edades mayores. El ensayo PREDIMED apoya el beneficio cardiovascular. Se aplica una fracción conservadora.', ''],
                ],
        ],
];

/** Tramos de IMC: [límite superior exclusivo, etiqueta, ajuste en años, justificación, consejo] */
$tramosImc = [
        [18.5, 'bajo peso', -2.0,
                'El bajo peso también se asocia con más mortalidad en la Prospective Studies Collaboration. El ajuste de unos 2 años es una aproximación.', ''],
        [25.0, 'peso normal', 0.0,
                'Es el tramo con menor mortalidad en los grandes metaanálisis, con el mínimo entre 22,5 y 25. No se aplica ajuste.', ''],
        [30.0, 'sobrepeso', -0.5,
                'El sobrepeso se asocia con un aumento pequeño de la mortalidad, y la diferencia depende de otros factores de riesgo. Se resta medio año.', ''],
        [35.0, 'obesidad grado I', -3.0,
                'Con un IMC de 30 a 35, la Prospective Studies Collaboration estimó entre 2 y 4 años menos de vida.',
                'Perder peso de forma sostenida y mantener la actividad física es lo que más puede cambiar tu estimación.'],
        [40.0, 'obesidad grado II', -6.0,
                'Tramo intermedio entre las estimaciones publicadas para IMC de 30 a 35 (de 2 a 4 años) y de 40 a 45 (de 8 a 10 años). Es una interpolación.',
                'Perder peso de forma sostenida es lo que más puede cambiar tu estimación. Tu médico puede orientarte.'],
        [INF, 'obesidad grado III', -9.0,
                'Con un IMC de 40 a 45 se estimó una pérdida de entre 8 y 10 años.',
                'Perder peso con seguimiento médico es lo que más puede cambiar tu estimación.'],
];

$referencias = [
        'Instituto Nacional de Estadística (INE). Esperanza de vida al nacimiento por sexo, España, 2024: 81,38 años en hombres y 86,53 en mujeres (se redondean a una cifra decimal).',
        'Jha P, et al. 21st-century hazards of smoking and benefits of cessation in the United States. N Engl J Med. 2013;368:341-350.',
        'Moore SC, et al. Leisure time physical activity of moderate to vigorous intensity and mortality. PLoS Med. 2012;9(11):e1001335.',
        'Wood AM, et al. Risk thresholds for alcohol consumption: combined analysis of individual-participant data for 599,912 current drinkers. Lancet. 2018;391:1513-1523.',
        'Prospective Studies Collaboration. Body-mass index and cause-specific mortality in 900,000 adults. Lancet. 2009;373:1083-1096.',
        'Fadnes LT, et al. Estimating impact of food choices on life expectancy: a modeling study. PLoS Med. 2022;19(2):e1003889.',
        'Estruch R, et al. Primary prevention of cardiovascular disease with a Mediterranean diet supplemented with extra-virgin olive oil or nuts (PREDIMED, versión revisada). N Engl J Med. 2018;378:e34.',
];

/* ---------- Lectura y validación de la entrada ---------- */

$esEnvio = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
$errores = [];

// Valores del formulario: los enviados o, si es la primera visita, un ejemplo.
$valores = ['sexo' => SEXO_POR_DEFECTO, 'altura' => '172', 'peso' => '70'];
foreach ($preguntas as $id => $p) {
    $valores[$id] = $p['defecto'];
}

if ($esEnvio) {
    foreach (['altura', 'peso'] as $campo) {
        $valores[$campo] = trim((string)($_POST[$campo] ?? ''));
    }
    // Sexo: lista blanca, solo se aceptan las claves definidas en ESPERANZA_BASE.
    $sexoEnviado = (string)($_POST['sexo'] ?? '');
    if (array_key_exists($sexoEnviado, ESPERANZA_BASE)) {
        $valores['sexo'] = $sexoEnviado;
    } else {
        $errores[] = 'Elige tu sexo para asignar el punto de partida. Se ha usado la opción de ejemplo.';
    }
    foreach ($preguntas as $id => $p) {
        $enviado = (string)($_POST[$id] ?? '');
        // Lista blanca: solo se acepta una clave de opción que exista.
        if (array_key_exists($enviado, $p['opciones'])) {
            $valores[$id] = $enviado;
        } else {
            $errores[] = 'Elige una opción en «' . $p['nombre'] . '». Se ha usado la opción de ejemplo.';
        }
    }
}

function numero(string $s): ?float
{
    $s = str_replace(',', '.', $s);
    $v = filter_var($s, FILTER_VALIDATE_FLOAT);
    return $v === false ? null : (float)$v;
}

/* ---------- Cálculo ---------- */

$filas = [];
// El punto de partida lo fija el sexo elegido (siempre es una clave válida).
[$etiquetaSexo, $base] = ESPERANZA_BASE[$valores['sexo']];
$total = null;
$imcTexto = '';

if ($esEnvio) {
    foreach ($preguntas as $id => $p) {
        [$etiqueta, $delta, $porque, $consejo] = $p['opciones'][$valores[$id]];
        $filas[] = [
                'nombre' => $p['nombre'], 'delta' => $delta, 'eleccion' => $etiqueta,
                'porque' => $porque, 'consejo' => $consejo, 'fuente' => $p['fuente'],
        ];
    }

    // Peso corporal: se calcula el IMC a partir de altura y peso.
    $altura = numero($valores['altura']);
    $peso = numero($valores['peso']);
    $datosValidos = $altura !== null && $peso !== null
            && $altura >= 120 && $altura <= 220 && $peso >= 30 && $peso <= 250;

    if ($datosValidos) {
        $imc = $peso / (($altura / 100) ** 2);
        foreach ($tramosImc as [$limite, $nombreTramo, $delta, $porque, $consejo]) {
            if ($imc < $limite) {
                $imcTexto = 'IMC ' . fmt($imc) . ' (' . $nombreTramo . ')';
                $filas[] = [
                        'nombre' => 'Peso corporal', 'delta' => $delta, 'eleccion' => $imcTexto,
                        'porque' => $porque, 'consejo' => $consejo,
                        'fuente' => 'Prospective Studies Collaboration, Lancet 2009.',
                ];
                break;
            }
        }
    } else {
        $errores[] = 'Introduce una altura entre 120 y 220 cm y un peso entre 30 y 250 kg. Este factor no se ha tenido en cuenta.';
        $filas[] = [
                'nombre' => 'Peso corporal', 'delta' => 0.0, 'eleccion' => 'Sin datos válidos',
                'porque' => 'Faltan datos válidos de altura y peso, así que este factor no se tiene en cuenta.',
                'consejo' => '', 'fuente' => 'Prospective Studies Collaboration, Lancet 2009.',
        ];
    }

    $suma = array_sum(array_column($filas, 'delta'));
    $total = $base + $suma;

    // Factor que más resta (para el mensaje de "palanca").
    $peor = $filas[0];
    foreach ($filas as $f) {
        if ($f['delta'] < $peor['delta']) {
            $peor = $f;
        }
    }
}

function marcado(array $valores, string $id, string $clave): string
{
    return $valores[$id] === $clave ? ' checked' : '';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de longevidad</title>
    <style>
        @import "https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css";
    </style>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
<main class="container is-max-desktop section">
    <header class="block mb-6">
    <span class="tag is-primary is-light is-uppercase has-text-weight-semibold mb-2">
      <i class="fa fa-info-circle mr-1"></i>Estimación orientativa
    </span>
        <h1 class="title is-2">¿Cuántos años voy a vivir?</h1>
    </header>

    <?php if ($errores): ?>
        <div class="notification is-danger is-light" role="alert">
            <div class="content">
                <ul>
                    <?php foreach ($errores as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($esEnvio && $total !== null): ?>
        <section class="box mt-6" id="resultado">
            <div class="block">
                <span class="tag is-primary is-medium mb-2">Tu estimación</span>
                <div class="is-flex is-align-items-baseline">
                    <strong class="is-size-1 has-text-primary"><?= h(fmt($total)) ?></strong>
                    <span class="is-size-4 has-text-grey ml-2">años</span>
                </div>
                <p class="has-text-grey is-size-7 mt-1">
                    Punto de partida (<?= h(mb_strtolower($etiquetaSexo)) ?>, España) <?= h(fmt($base)) ?> <?= h(sgn($suma)) ?> por tus hábitos
                </p>
            </div>

            <div class="block">
                <h2 class="title is-4">Qué suma y qué resta cada hábito</h2>
                <div class="content">
                    <?php foreach ($filas as $f):
                        $esGanancia = $f['delta'] > 0;
                        $esPerdida = $f['delta'] < 0;
                        $claseTag = $esGanancia ? 'is-success' : ($esPerdida ? 'is-danger' : 'is-light');
                        $icono = $esGanancia ? 'fa-plus' : ($esPerdida ? 'fa-minus' : 'fa-circle-o');
                        ?>
                        <div class="mb-3">
                            <div class="is-flex is-justify-content-space-between is-align-items-center mb-1">
                <span class="has-text-weight-semibold">
                  <i class="fa <?= $icono ?> mr-2"></i><?= h($f['nombre']) ?>
                </span>
                                <span class="tag <?= $claseTag ?>"><?= h(sgn($f['delta'])) ?> años</span>
                            </div>
                            <progress class="progress <?= $claseTag ?> is-small" value="<?= min(abs($f['delta']) * 10, 100) ?>" max="100"><?= h(sgn($f['delta'])) ?></progress>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="notification is-info is-light mt-4">
                <?php if ($peor['delta'] <= -1): ?>
                    <p>
                        <i class="fa fa-exclamation-triangle mr-2"></i>
                        <strong>Lo que más te resta es <?= h(mb_strtolower($peor['nombre'])) ?> (<?= h(sgn($peor['delta'])) ?> años).</strong>
                        <?= h($peor['consejo'] !== '' ? $peor['consejo'] : 'Es el factor con más margen de mejora en tu perfil.') ?>
                    </p>
                <?php else: ?>
                    <p>
                        <i class="fa fa-check-circle mr-2"></i>
                        <strong>Ninguno de tus hábitos resta más de un año.</strong> Con este perfil, mantenerlo en el tiempo es lo que más cuenta.
                    </p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
</main>
</body>
</html>