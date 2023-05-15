<!DOCTYPE html>
<html>

<head>
    <title>Apollo Airways</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400&display=swap" rel="stylesheet">

    <style>
    * {
        font-family: 'Josefin Sans', sans-serif;
        font-weight: 300;
        font-size: 15px;
    }

    .highlights {
        padding-left: 15%;
        padding-right: 15%;
    }

    h3 {
        font-weight: 400;
    }

    .trip-info {
        color: white;
        font-size: 1.2em;
        margin-bottom: 5px;
        font-weight: bold
    }

    .trip-data {
        color: white;
        font-size: 1.2em;
        padding-left: 10%;
        padding-right: 10%;
    }

    .program-details {
        display: flex;
        flex-direction: column;
        top: 1%;
        right: 1px;
        position: absolute;
        width: 20%;
        font-weight: bold;
    }

    .program-details {
        display: flex;
        flex-direction: column;
        top: 1%;
        right: 1px;
        position: absolute;
        width: 20%;
        font-weight: bold;
    }

    .program-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
    }

    .program-level {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
    }

    .program-level-image {
        width: 50%;
    }


    .program-conclusion {
        margin-top: 4%;
        text-align: justify;
        font-size: 1.2em;
        margin-left: 20%;
        margin-right: 20%;
        padding: 4%;
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 5%;
    }

    .highlights-title {
        text-align: center;
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 5%;
        padding-top: 2%;
        padding-bottom: 2%;
        font-weight: 600;
    }

    .program-description {
        display: flex;
        width: 70%;
        font-size: 1.3em;
        text-align: justify;
    }

    .program-banner {
        width: 50% !important;
    }

    .program-icon {
        width: 20% !important;
    }

    .modal {
        display: none;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-dialog {
        width: 80%;
        max-width: none;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    nav {
        background-color: #eee;
        display: flex;
        justify-content: center;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    li {
        margin: 0 10px;
    }

    a {
        color: #333;
        text-decoration: none;
    }

    main {
        padding: 20px;
    }

    .trip {
        border: 1px solid #ccc;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding-top: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
    }

    .trip:hover {
        cursor: pointer;
        background-color: #f5f5f5;
    }

    .modal-gradient {
        transition: background-image 0.3s ease;
    }

    .book-form {
        padding-left: 30%;
        padding-right: 30%;
        padding-top: 10%;
        padding-bottom: 10%;
    }

    .num-travelers-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
    }

    .num-travelers-container input[type="number"] {
        text-align: center;
        width: 120px;
        height: 100px;
        font-size: 100px;
    }

    .book-form .btn-success {
        background-color: white;
        color: black;
        border: 1px solid gray;
        font-size: 1.2rem;
        width: 100px;
        height: 100px;
    }
    </style>
</head>

<body>
    <!-- Logo de la página -->
    <img src="src/capas/capa6.gif" style="height: 20%;" class="img-fluid mx-auto d-block" alt="Your logo">
    <header>
        <h1>Apollo Airways</h1>
    </header>

    <!-- Ventana modal para reservar un viaje -->
    <div id="bookTrip" class="modal">
        <div class="modal-dialog">
            <div class="modal-content modal-gradient">
                <div class="modal-body">
                    <div class="trip-data">
                    </div>
                    <form action="panel_admin_proc.php" method="post">

                        <input type="hidden" name="operacion" value="addBooking">
                        <input type="hidden" value="<?php echo  $_SESSION['id'] ?>" name="user_id">
                        <input type="hidden" value="" class="form-control" id="trip_id" name="trip_id">

                        <div class="book-form">
                            <div class="form-group">
                                <label>Número de viajeros</label>
                                <div class="num-travelers-container">
                                    <input type="number" class="form-control" name="num_travelers" required>
                                    <input type="submit" class="btn btn-success" value="Reservar">
                                </div>
                            </div>
                         
                                
                            
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <main>
        <ul>
            <?php
            // Selecciona todos los viajes programados
            $trips = _cSpaceTrips::selectScheduled();

            // Itera sobre los viajes y muestra su información
            while ($trip = $trips->fetch_assoc()) {

                $program = _cPrograms::selectByProgramId($trip['program_id']);

                // Establece el estilo de fondo para cada programa
                $backgroundStyle = "";
                if ($trip['program_id'] == 1) {
                    $backgroundStyle = "background-image: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(0,0,0,1) 31%, rgba(148,141,140,1) 100%);";
                } else if ($trip['program_id'] == 2) {
                    $backgroundStyle = "background-image: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(0,0,0,1) 31%, rgba(255,135,0,1) 100%);";
                } else if ($trip['program_id'] == 3) {
                    $backgroundStyle = "background-image: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(0,0,0,1) 31%, rgba(208,207,140,1) 100%);";
                } else if ($trip['program_id'] == 4) {
                    $backgroundStyle = "background-image: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(0,0,0,1) 31%, rgba(0,255,241,1) 100%);";
                } else {
                    $backgroundStyle = "background-image: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(0,0,0,1) 31%, rgba(0,177,255,1) 100%);";
                }

                // Muestra la información del viaje en la lista
                echo "<li style='" . $backgroundStyle . "' onclick='selectTrip(" . $trip['id'] . ", \"" . $backgroundStyle . "\", " . $program['program_id'] . ")' class='trip' data-program-id='" . $program['program_id'] . "'>";

                // Muestra la imagen del programa
                $imageName = str_replace(" ", "", $program["name"]) . ".png";
                $imagePath = "src/programas/" . $imageName;

                echo "<img style='width: 100%; position: relative; top: -20px;' src='" . $imagePath . "' alt='" . $program["name"] . "'>";

                // Muestra las fechas de salida y regreso
                echo "<p class='trip-info'>Fecha de salida: " . $trip['departure_date'] . "</p>";
                echo "<p class='trip-info'>Fecha de regreso: " . $trip['return_date'] . "</p>";

                // Muestra la duración del viaje
                echo "<br><p class='trip-info' style='font-size: 1.7em;'>Duración: " . $trip['duration'] . " días</p>";

                echo "</li>";
            }
            ?>
        </ul>
    </main>
    <script>
    // Función para seleccionar un viaje y mostrar la ventana modal con información del programa
    function selectTrip(idTrip, backgroundStyle, programId) {
        document.getElementById("trip_id").value = idTrip;
        $(".modal-gradient").attr("style", backgroundStyle);
        $("#bookTrip").modal();

        // Realiza una solicitud AJAX para obtener datos del programa
        $.ajax({
            url: "get_program_data.php",
            type: "POST",
            data: {
                program_id: programId
            },
            success: function(data) {
                // Muestra los datos del programa en el cuerpo de la ventana modal
                $(".trip-data").html(data);
                $("#bookTrip").modal();
            }
        });
    }
    </script>
</body>

</html>