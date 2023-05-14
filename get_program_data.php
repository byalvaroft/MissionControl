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
echo "<p><h5>Level:</h5>" . $program["level"] . "</p>";
echo "<p><h5>EVA:</h5>" . $program["eva"] . "</p>";
echo "<p><h5>Travel Time:</h5>" . $program["travel_time"] . "</p>";
echo "<p><h5>Cargo:</h5>" . $program["cargo"] . "</p>";
echo "<p><h5>Ship:</h5>" . $program["ship_type"] . "</p>";
echo "<p><h5>Age Requirement:</h5>" . $program["age_requirement"] . "</p>";
echo "</div>";

// Mostrar descripción del programa
echo "<p class='program-description'>" . $program["description"] . "</p>";

// Formatear y mostrar highlights del programa
echo format_highlights($program['highlights']);

// Mostrar conclusión del programa
echo "<p class='program-conclusion'>" . $program["conclusion"] . "</p>";
