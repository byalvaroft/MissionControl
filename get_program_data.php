<?php
include_once "inc.php";

// Establecer conexión con la base de datos
$conexion = _cAccesoBD::obtener();

// Función para dar formato h1 o h3 a los highlights del programa separandolos segun los #
function format_highlights($text)
{
    // Reemplazar #texto# con etiqueta h2
    $formattedText = preg_replace_callback('/(?<!#)#([^#]+)#/', function ($matches) {
        return "<h2 class='highlights-title'>" . $matches[1] . '</h2>';
    }, $text);

    // Reemplazar ##texto## con etiqueta h3
    $formattedText = preg_replace_callback('/##([^#]+)##/', function ($matches) {
        return '<h3>' . $matches[1] . '</h3>';
    }, $formattedText);

    return $formattedText;
}

// Obtener el ID del programa enviado por POST
$programId = $_POST["program_id"];

// Consulta SQL para obtener datos del programa
$sql = "SELECT * FROM `programs` WHERE `program_id` = $programId";
$result = $conexion->_EjecutarQuery($sql);
$program = mysqli_fetch_assoc($result);

// Generar nombre e ruta de la imagen del programa
$imageName = str_replace(" ", "", $program["name"]) . ".png";
$imagePath = "src/programas/" . $imageName;

// Mostrar imagen del programa
echo "<img class='program-banner' style='width: 100%; position: relative; top: -15px;' src='" . $imagePath . "' alt='" . $program["name"] . "'>";

// Mostrar detalles del programa
echo "<div class='program-details'>";
echo "<h5>Level:</h5>";

echo "<div class='program-level'>";
if ($program["level"] == 3) {
    echo "<img class='program-level-image' src='src/logos/hard.png'>";
} else if ($program["level"] == 2) {
    echo "<img class='program-level-image' src='src/logos/medium.png'>";
} else {
    echo "<img class='program-level-image' src='src/logos/easy.png'>";
}
echo "</div>";

echo "<div class='program-icons'>";

if ($program["eva"] == 1) {
    echo "<img class='program-icon' src='src/logos/eva1.png'>";
} else {
    echo "<img class='program-icon' src='src/logos/eva0.png'>";
}

if ($program["travel_time"] == 1) {
    echo "<img class='program-icon' src='src/logos/time-1.png'>";
} else if ($program["travel_time"] == 2) {
    echo "<img class='program-icon' src='src/logos/time-2.png'>";
} else if ($program["travel_time"] == 30) {
    echo "<img class='program-icon' src='src/logos/time-30.png'>";
} else {
    echo "<img class='program-icon' src='src/logos/time-60.png'>";
}

if ($program["age_requirement"] == 13) {
    echo "<img class='program-icon' src='src/logos/13.png'>";
} else if ($program["age_requirement"] == 16) {
    echo "<img class='program-icon' src='src/logos/16.png'>";
} else {
    echo "<img class='program-icon' src='src/logos/18.png'>";
}

echo "</div>";

echo "<p><h5>Cargo:</h5>" . $program["cargo"] . "</p>";
echo "<p><h5>Ship:</h5>" . $program["ship_type"] . "</p>";
echo "</div>";

// Mostrar descripción del programa
echo "<p class='program-description'>" . $program["description"] . "</p>";

// Formatear y mostrar highlights del programa
echo "<div class='highlights'>";
echo format_highlights($program['highlights']);
echo "</div>";

// Mostrar conclusión del programa
echo "<p class='program-conclusion'>" . $program["conclusion"] . "</p>";