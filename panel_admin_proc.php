<?php
include_once "inc.php";

//_cFuncionesPHP::pred($_POST,"variable");

if (isset($_POST['operacion']) && $_POST['operacion'] != "") {

    switch ($_POST['operacion']) {


        case "addTrip":

        //    _cFuncionesPHP::pre($_POST,"variable");

            $result = _cSpaceTrips::insertNewTrip($_POST['program'],$_POST['duration'],$_POST['departureDate'],$_POST['returnDate'],$_POST['status']);

            if ($result) {
                header("Location:home.php?res=ok&trp=1");
            } else {
                header("Location:home.php?err=1&trp=1");
            }


            break;

        case "delTrip":

            $result = _cSpaceTrips::deleteTrip($_POST['tripid']);

            if ($result) {
                header("Location:home.php?res=ok&trp=1");
            } else {
                header("Location:home.php?err=1&trp=1");
            }

            break;

        case "editTrip":

            $result = _cSpaceTrips::editTrip($_POST['idTrip'],$_POST['program'],$_POST['duration'],$_POST['departureDate'],$_POST['returnDate'],$_POST['status']);

            if ($result) {
                header("Location:home.php?res=ok&trp=1");
            } else {
                header("Location:home.php?err=1&trp=1");
            }

            break;

        case "addBooking":

          //  _cFuncionesPHP::pred($_POST,"variable");

            $result = _cBookings::insertNewBooking($_POST['trip_id'],$_POST['user_id'],$_POST['num_travelers']);

            if ($result) {
                header("Location:home.php?res=ok&bk=1");
            } else {
                header("Location:home.php?err=1&bk=1");
            }

            break;

     

        case "delBooking":

            $result = _cBookings::deleteBooking($_POST['bookingid']);
    
            if ($result) {
                header("Location:home.php?res=ok&bk=1");
            } else {
                header("Location:home.php?err=1&bk=1");
            }
    
            break;

        case "editUser":

            $result = _cUsers::editUser($_POST['id_user'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['username'], $_POST['rol']);
                   
            if ($result) {
                header("Location:home.php?res=ok&usr=1");
            } else {
                header("Location:home.php?err=1&usr=1");
            }
   
            break;

        case "delUser":

            $result = _cUsers::deleteUser($_POST['userid']);

            if ($result) {
                header("Location:home.php?res=ok&usr=1");
            } else {
                header("Location:home.php?err=1&usr=1");
            }
            break;
    

    }







}