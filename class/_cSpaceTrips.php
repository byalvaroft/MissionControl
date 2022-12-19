<?php
include_once "inc.php";

class _cSpaceTrips {

  private $id;
  private $destination;
  private $duration;
  private $departure_date;
  private $return_date;
  private $status;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getDestination() {
        return $this->destination;
    }
    public function setDestination($destination) {
        $this->destination = $destination;
    }
    public function getDuration() {
        return $this->duration;
    }
    public function setDuration($duration) {
        $this->duration = $duration;
    }
    public function getDepartureDate() {
        return $this->departure_date;
    }
    public function setDepartureDate($departure_date) {
        $this->departure_date = $departure_date;
    }
    public function getReturnDate() {
        return $this->return_date;
    }
    public function setReturnDate($return_date) {
        $this->return_date = $return_date;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }


  public static function selectAll() {
    $con = _cAccesoBD::obtener();


    $sql = "SELECT * FROM space_trips";
    $result = $con->_EjecutarQuery($sql);


    return $result;
  }

public static function selectScheduled() {
        $con = _cAccesoBD::obtener();

        $sql = "SELECT * FROM space_trips where status = 'scheduled'";
        $result = $con->_EjecutarQuery($sql);

        return $result;
}


  public function update() {
    $con = _cAccesoBD::obtener();

    $sql = "UPDATE space_trips
            SET destination = '$this->destination', duration = '$this->duration', departure_date = '$this->departure_date', return_date = '$this->return_date', status = '$this->status'
            WHERE id = $this->id";


    $result = $con->_EjecutarQuery($sql);


    return $result;
  }

    public static function editTrip($id, $destination, $duration, $departure_date, $return_date, $status) {
        $trip = new _cSpaceTrips();

        $trip->setId($id);
        $trip->setDestination($destination);
        $trip->setDuration($duration);
        $trip->setDepartureDate($departure_date);
        $trip->setReturnDate($return_date);
        $trip->setStatus($status);

        $result = $trip->update();

        return $result;
    }

    public static function deleteTrip($id): bool {

        $trip = new _cSpaceTrips();

        $trip->setId($id);

        $result = $trip->delete();

        return $result;

    }

  public function delete() {
    $con = _cAccesoBD::obtener();

    $sql = "DELETE FROM space_trips WHERE id = $this->id";

    $result = $con->_EjecutarQuery($sql);

    return $result;
  }

    public static function insertNewTrip($destination, $duration, $departure_date, $return_date, $status): bool {

        $trip = new _cSpaceTrips();

        $trip->setDestination($destination);
        $trip->setDuration($duration);
        $trip->setDepartureDate($departure_date);
        $trip->setReturnDate($return_date);
        $trip->setStatus($status);

        $result = $trip->insert();

        return $result;

    }

    public function insert() {
        $con = _cAccesoBD::obtener();

        $sql = "INSERT INTO space_trips (destination, duration, departure_date, return_date, status)
          VALUES ('$this->destination', '$this->duration', '$this->departure_date', '$this->return_date', '$this->status')";

        // _cFuncionesPHP::pred($sql,"SQL");

        $result = $con->_EjecutarQuery($sql);

        return $result;
    }
}