<?php
include_once "inc.php";


class _cBookings {

private $booking_id;
private $trip_id;
private $user_id;
private $booking_date;
private $num_travelers;
private $selected_seats;

public function getBookingId() {
return $this->booking_id;
}
public function setBookingId($booking_id) {
$this->booking_id = $booking_id;
}
public function getTripId() {
return $this->trip_id;
}
public function setTripId($trip_id) {
$this->trip_id = $trip_id;
}
public function getUserId() {
return $this->user_id;
}
public function setUserId($user_id) {
$this->user_id = $user_id;
}
public function getBookingDate() {
return $this->booking_date;
}
public function setBookingDate($booking_date) {
$this->booking_date = $booking_date;
}
public function getNumTravelers() {
return $this->num_travelers;
}
public function setNumTravelers($num_travelers) {
$this->num_travelers = $num_travelers;
}


public static function selectAll() {

$con = _cAccesoBD::obtener();

$sql = "SELECT * FROM bookings";


$result = $con->_EjecutarQuery($sql);

return $result;

}


public function update() {
$con = _cAccesoBD::obtener();

$sql = "UPDATE bookings
SET trip_id = '$this->trip_id', user_id = '$this->user_id', booking_date = '$this->booking_date', num_travelers = '$this->num_travelers',
WHERE booking_id = $this->booking_id";
$result = $con->_EjecutarQuery($sql);

return $result;
}

public static function deleteBooking($booking_id): bool {
$booking = new Booking();

$booking->setBookingId($booking_id);

$result = $booking->delete();

return $result;
}

public function delete() {
$con = _cAccesoBD::obtener();

$sql = "DELETE FROM bookings WHERE booking_id = $this->booking_id";

$result = $con->_EjecutarQuery($sql);

return $result;

}

    public static function insertNewBooking($trip_id, $user_id, $num_travelers): bool {
        $booking = new _cBookings();

        $booking->setTripId($trip_id);
        $booking->setUserId($user_id);
        $booking->setNumTravelers($num_travelers);

        $result = $booking->insert();

        return $result;
    }

    public function insert() {
        $con = _cAccesoBD::obtener();

        $sql = "INSERT INTO bookings (trip_id, user_id, num_travelers)
          VALUES ('$this->trip_id', '$this->user_id', '$this->num_travelers')";
        $result = $con->_EjecutarQuery($sql);

        return $result;
    }

}