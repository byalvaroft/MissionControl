<?php
include_once "inc.php";

$conexion = _cAccesoBD::obtener();

//Function to format highlights

function format_highlights($text) {
    $formattedText = preg_replace_callback('/(?<!#)#([^#]+)#/', function ($matches) {
        return "<h2 class='highlights-title'>" . $matches[1] . '</h2>';
    }, $text);

    $formattedText = preg_replace_callback('/##([^#]+)##/', function ($matches) {
        return '<h3>' . $matches[1] . '</h3>';
    }, $formattedText);

    return $formattedText;
}


// Get program ID from AJAX request
$programId = $_POST["program_id"];

// Fetch program data
$sql ="SELECT * FROM `programs` WHERE `program_id` = $programId";
$result = $conexion->_EjecutarQuery($sql);
$program = mysqli_fetch_assoc($result); 

// Display program data in modal body

$imageName = str_replace(" ", "", $program["name"]) . ".png";
$imagePath = "src/programas/" . $imageName;

echo "<img class='program-banner' style='width: 100%; position: relative; top: -15px;' src='" . $imagePath . "' alt='" . $program["name"] . "'>";

echo "<div class='program-details'>";
echo "<p><h5>Level:</h5>" . $program["level"] . "</p>";
echo "<p><h5>EVA:</h5>" . $program["eva"] . "</p>";
echo "<p><h5>Travel Time:</h5>" . $program["travel_time"] . "</p>";
echo "<p><h5>Cargo:</h5>" . $program["cargo"] . "</p>";
echo "<p><h5>Ship:</h5>" . $program["ship_type"] . "</p>";
echo "<p><h5>Age Requirement:</h5>" . $program["age_requirement"] . "</p>";
echo "</div>";


echo "<p class='program-description'>" . $program["description"] . "</p>";

echo format_highlights($program['highlights']);

echo "<p class='program-conclusion'>" . $program["conclusion"] . "</p>";
