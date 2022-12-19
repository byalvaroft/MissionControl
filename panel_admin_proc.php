<?php
include_once "inc.php";

//_cFuncionesPHP::pred($_POST,"variable");

if (isset($_POST['operacion']) && $_POST['operacion'] != "") {

    switch ($_POST['operacion']) {


        case "addTrip":

        //    _cFuncionesPHP::pre($_POST,"variable");

            $result = _cSpaceTrips::insertNewTrip($_POST['destination'],$_POST['duration'],$_POST['departureDate'],$_POST['returnDate'],$_POST['status']);

            if ($result) {
                header("Location:home.php?res=ok");
            } else {
                header("Location:home.php?err=1");
            }


            break;

        case "delTrip":

            $result = _cSpaceTrips::deleteTrip($_POST['tripid']);

            if ($result) {
                header("Location:home.php?res=ok");
            } else {
                header("Location:home.php?err=1");
            }

            break;

        case "editTrip":

            $result = _cSpaceTrips::editTrip($_POST['idTrip'],$_POST['destination'],$_POST['duration'],$_POST['departureDate'],$_POST['returnDate'],$_POST['status']);

            if ($result) {
                header("Location:home.php?res=ok");
            } else {
                header("Location:home.php?err=1");
            }

            break;

        case "addBooking":

            $result = _cBookings::insertNewBooking($_POST['trip_id'],$_POST['user_id'],$_POST['num_travelers']);

            if ($result) {
                header("Location:home.php?res=ok");
            } else {
                header("Location:home.php?err=1");
            }

            break;


            break;

    }







}