<?php
include_once "inc.php";

// Verificar si se ha enviado una operación
if (isset($_POST['operacion']) && $_POST['operacion'] != "") {

    // Evaluar la operación enviada
    switch ($_POST['operacion']) {

            // Añadir un nuevo viaje
        case "addTrip":
            // Insertar el viaje en la base de datos
            $result = _cSpaceTrips::insertNewTrip($_POST['program'], $_POST['duration'], $_POST['departureDate'], $_POST['returnDate'], $_POST['status']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?res=ok&trp=1");
            } else {
                header("Location:home.php?err=1&trp=1");
            }
            break;

            // Eliminar un viaje
        case "delTrip":
            // Eliminar el viaje de la base de datos
            $result = _cSpaceTrips::deleteTrip($_POST['tripid']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?res=ok&trp=1");
            } else {
                header("Location:home.php?err=1&trp=1");
            }
            break;

            // Editar un viaje
        case "editTrip":
            // Actualizar el viaje en la base de datos
            $result = _cSpaceTrips::editTrip($_POST['idTrip'], $_POST['program'], $_POST['duration'], $_POST['departureDate'], $_POST['returnDate'], $_POST['status']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?res=ok&trp=1");
            } else {
                header("Location:home.php?err=1&trp=1");
            }
            break;

            // Añadir una reserva
        case "addBooking":
            // Insertar la reserva en la base de datos
            $result = _cBookings::insertNewBooking($_POST['trip_id'], $_POST['user_id'], $_POST['num_travelers']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?res=ok&bk=1");
            } else {
                header("Location:home.php?err=1&bk=1");
            }
            break;

            // Eliminar una reserva
        case "delBooking":
            // Eliminar la reserva de la base de datos
            $result = _cBookings::deleteBooking($_POST['bookingid']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?res=ok&bk=1");
            } else {
                header("Location:home.php?err=1&bk=1");
            }
            break;

            // Editar un usuario
        case "editUser":
            // Actualizar el usuario en la base de datos
            $result = _cUsers::editUser($_POST['id_user'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['username'], $_POST['rol']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?err=1&usr=1");
            }
            break;

            // Eliminar un usuario
        case "delUser":
            // Eliminar el usuario de la base de datos
            $result = _cUsers::deleteUser($_POST['userid']);

            // Redirigir al usuario dependiendo del resultado
            if ($result) {
                header("Location:home.php?res=ok&usr=1");
            } else {
                header("Location:home.php?err=1&usr=1");
            }
            break;
    }
}
