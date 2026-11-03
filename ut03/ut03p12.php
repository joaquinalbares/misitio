<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT03 · P12: Calculadora de esperanza de vida</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--
    PLANTILLA · UT03 · P12: Calculadora de esperanza de vida
    Solo contiene la estructura HTML y los estilos. Busca los comentarios TODO
    para saber dónde tienes que añadir el código PHP.
    Un único fichero: formulario, validación, cálculo y resultado.
    TODO (PHP): guarda preguntas, opciones y ajustes en un array multidimensional y genera el formulario a partir de él.
-->
<section class="section">
    <div class="container" style="max-width: 960px;">
    <main>
        <header class="block mb-6">
            <span class="tag is-primary is-light is-uppercase has-text-weight-semibold mb-2">
                <i class="fa fa-info-circle mr-1"></i>Estimación orientativa
            </span>
            <h1 class="title is-2">¿Cuántos años voy a vivir?</h1>
            <p class="subtitle is-6 has-text-grey mt-2">
                Cinco preguntas sobre hábitos con efecto medido en estudios de gran tamaño. El resultado es una media
                para personas con tu perfil, no un pronóstico individual. <strong>Es un ejercicio de programación,
                no un consejo médico.</strong>
            </p>
        </header>

        <!-- TODO: muestra TODOS los errores de validación juntos (SOLO si hay alguno) -->
        <div class="notification is-danger is-light" role="alert">
            <div class="content">
                <ul>
                    <li>Elige una opción en «Tabaco». Se ha usado la opción de ejemplo.</li>
                </ul>
            </div>
        </div>

        <form method="post" action="#resultado">
            <fieldset class="box mb-5">
                <legend class="label is-medium mb-2">
                    <span class="tag is-info is-light mr-2">Punto de partida</span>¿Cuál es tu sexo?
                </legend>
                <p class="help mb-3">Se usa solo para el punto de partida: la esperanza de vida al nacer en España (INE, 2024).</p>
                <!-- TODO: genera estas opciones recorriendo el array de esperanza de vida base -->
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <label class="radio box p-3 is-flex is-align-items-center mb-0" for="sexo-hombre">
                            <input type="radio" id="sexo-hombre" name="sexo" value="hombre" class="mr-2" checked>
                            <span><strong>Hombre</strong> <span class="has-text-grey">(81,4 años)</span></span>
                        </label>
                    </div>
                    <div class="column is-6">
                        <label class="radio box p-3 is-flex is-align-items-center mb-0" for="sexo-mujer">
                            <input type="radio" id="sexo-mujer" name="sexo" value="mujer" class="mr-2">
                            <span><strong>Mujer</strong> <span class="has-text-grey">(86,5 años)</span></span>
                        </label>
                    </div>
                </div>
            </fieldset>

            <!-- TODO: genera UN fieldset como este por cada pregunta, recorriendo tu array $preguntas con foreach.
                 Dentro, genera una opción por cada respuesta. Usa una función marcado() para que
                 el formulario recuerde lo elegido. Este es el modelo de la pregunta del tabaco: -->
            <fieldset class="box mb-5">
                <legend class="label is-medium mb-2">
                    <span class="tag is-info is-light mr-2">Pregunta 1 de 5</span>¿Fumas o has fumado?
                </legend>
                <p class="help mb-3">Cuenta cigarrillos, puros y pipa.</p>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <label class="radio box p-3 is-flex is-align-items-center mb-0" for="tabaco-nunca">
                            <input type="radio" id="tabaco-nunca" name="tabaco" value="nunca" class="mr-2" checked>
                            <span>Nunca he fumado</span>
                        </label>
                    </div>
                    <div class="column is-6">
                        <label class="radio box p-3 is-flex is-align-items-center mb-0" for="tabaco-ex_antes">
                            <input type="radio" id="tabaco-ex_antes" name="tabaco" value="ex_antes" class="mr-2">
                            <span>Lo dejé antes de los 40</span>
                        </label>
                    </div>
                    <div class="column is-6">
                        <label class="radio box p-3 is-flex is-align-items-center mb-0" for="tabaco-ex_despues">
                            <input type="radio" id="tabaco-ex_despues" name="tabaco" value="ex_despues" class="mr-2">
                            <span>Lo dejé a los 40 o después</span>
                        </label>
                    </div>
                    <div class="column is-6">
                        <label class="radio box p-3 is-flex is-align-items-center mb-0" for="tabaco-actual">
                            <input type="radio" id="tabaco-actual" name="tabaco" value="actual" class="mr-2">
                            <span>Fumo actualmente</span>
                        </label>
                    </div>
                </div>
            </fieldset>

            <fieldset class="box mb-5">
                <legend class="label is-medium mb-2">
                    <span class="tag is-info is-light mr-2">Pregunta 5 de 5</span>¿Cuánto mides y cuánto pesas?
                </legend>
                <p class="help mb-3">Se calcula el índice de masa corporal (IMC): el peso en kilos dividido por la altura en metros al cuadrado.</p>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label" for="altura">Altura (cm)</label>
                            <div class="control has-icons-left">
                                <input class="input" id="altura" name="altura" type="text" inputmode="numeric" value="172">
                                <span class="icon is-small is-left"><i class="fa fa-arrows-v"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label" for="peso">Peso (kg)</label>
                            <div class="control has-icons-left">
                                <input class="input" id="peso" name="peso" type="text" inputmode="decimal" value="70">
                                <span class="icon is-small is-left"><i class="fa fa-balance-scale"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <button type="submit" class="button is-primary is-medium">
                <i class="fa fa-calculator mr-2"></i>Ver mi resultado
            </button>
        </form>

        <!-- TODO: esta sección se muestra SOLO después de enviar el formulario -->
        <section class="box mt-6" id="resultado">
            <div class="block">
                <span class="tag is-primary is-medium mb-2">Tu estimación</span>
                <div class="is-flex is-align-items-baseline">
                    <strong class="is-size-1 has-text-primary">80,6</strong>
                    <span class="is-size-4 has-text-grey ml-2">años</span>
                </div>
                <p class="has-text-grey is-size-7 mt-1">Punto de partida (mujer, España) 86,5 −5,9 por tus hábitos</p>
            </div>

            <div class="block">
                <h2 class="title is-4">Qué suma y qué resta cada hábito</h2>
                <!-- TODO: un bloque como estos por cada factor (foreach). Clase is-success si suma,
                     is-danger si resta e is-light si no cambia nada. -->
                <div class="mb-3">
                    <div class="is-flex is-justify-content-space-between is-align-items-center mb-1">
                        <span class="has-text-weight-semibold"><i class="fa fa-minus mr-2"></i>Tabaco
                            <span class="has-text-grey has-text-weight-normal is-size-7 ml-2">Fumo actualmente</span></span>
                        <span class="tag is-danger">−10,0 años</span>
                    </div>
                    <progress class="progress is-danger is-small" value="100" max="100"></progress>
                </div>
                <div class="mb-3">
                    <div class="is-flex is-justify-content-space-between is-align-items-center mb-1">
                        <span class="has-text-weight-semibold"><i class="fa fa-plus mr-2"></i>Alimentación
                            <span class="has-text-grey has-text-weight-normal is-size-7 ml-2">Mediterránea</span></span>
                        <span class="tag is-success">+2,5 años</span>
                    </div>
                    <progress class="progress is-success is-small" value="25" max="100"></progress>
                </div>
            </div>

            <div class="notification is-info is-light mt-4">
                <i class="fa fa-exclamation-triangle mr-2"></i>
                <strong>Lo que más te resta es el tabaco (−10,0 años).</strong> <!-- TODO: factor con el ajuste más negativo -->
            </div>
        </section>

        <section class="box mt-6">
            <h2 class="title is-5">Fuentes</h2>
            <div class="content is-small">
                <ol>
                    <li>Instituto Nacional de Estadística (INE). Esperanza de vida al nacimiento por sexo, España, 2024.</li>
                    <li>Jha P, et al. 21st-century hazards of smoking and benefits of cessation in the United States. N Engl J Med. 2013.</li>
                    <li>Moore SC, et al. Leisure time physical activity of moderate to vigorous intensity and mortality. PLoS Med. 2012.</li>
                    <li>Wood AM, et al. Risk thresholds for alcohol consumption. Lancet. 2018.</li>
                    <li>Prospective Studies Collaboration. Body-mass index and cause-specific mortality in 900,000 adults. Lancet. 2009.</li>
                    <li>Fadnes LT, et al. Estimating impact of food choices on life expectancy. PLoS Med. 2022.</li>
                </ol>
            </div>
        </section>
    </main>
    </div>
</section>
</body>

</html>
