<?php
include_once "inc.php";

// Clase para gestionar los viajes espaciales
class _cSpaceTrips
{

    private $id;
    private $program;
    private $duration;
    private $departure_date;
    private $return_date;
    private $status;

    // Getters y setters para las propiedades de la clase
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getProgram()
    {
        return $this->program;
    }
    public function setProgram($program)
    {
        $this->program = $program;
    }
    public function getDuration()
    {
        return $this->duration;
    }
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    public function getDepartureDate()
    {
        return $this->departure_date;
    }
    public function setDepartureDate($departure_date)
    {
        $this->departure_date = $departure_date;
    }
    public function getReturnDate()
    {
        return $this->return_date;
    }
    public function setReturnDate($return_date)
    {
        $this->return_date = $return_date;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Método para obtener todos los viajes espaciales
    public static function selectAll()
    {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT * FROM space_trips";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    // Método para obtener todos los viajes espaciales con información de programas
    public static function selectAllXPrograms()
    {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT space_trips.*, programs.program_id, programs.name FROM space_trips JOIN programs ON space_trips.program_id = programs.program_id";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    // Método para obtener todos los viajes espaciales programados
    public static function selectScheduled()
    {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT * FROM space_trips where status = 'scheduled'";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    // Método para actualizar un viaje espacial
    public function update()
    {
        $con = _cAccesoBD::obtener();
        $sql = "UPDATE space_trips
                SET program_id = '$this->program', duration = '$this->duration', departure_date = '$this->departure_date', return_date = '$this->return_date', status = '$this->status'
                WHERE id = $this->id";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    // Método para editar un viaje espacial
    public static function editTrip($id, $program, $duration, $departure_date, $return_date, $status)
    {
        $trip = new _cSpaceTrips();
        $trip->setId($id);
        $trip->setProgram($program);
        $trip->setDuration($duration);
        $trip->setDepartureDate($departure_date);
        $trip->setReturnDate($return_date);
        $trip->setStatus($status);
        $result = $trip->update();
        return $result;
    }

    // Método para eliminar un viaje espacial
    public static function deleteTrip($id): bool
    {
        $trip = new _cSpaceTrips();
        $trip->setId($id);
        $result = $trip->delete();
        return $result;
    }

    // Método para eliminar un viaje espacial desde la instancia
    public function delete()
    {
        $con = _cAccesoBD::obtener();
        $sql = "DELETE FROM space_trips WHERE id = $this->id";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    // Método para formatear el ID de un viaje espacial
    public static function formatTripID($tripID)
    {
        return 'TRP-' . str_pad($tripID, 6, '0', STR_PAD_LEFT);
    }

    // Método para insertar un nuevo viaje espacial
    public static function insertNewTrip($program, $duration, $departure_date, $return_date, $status): bool
    {
        $trip = new _cSpaceTrips();
        $trip->setProgram($program);
        $trip->setDuration($duration);
        $trip->setDepartureDate($departure_date);
        $trip->setReturnDate($return_date);
        $trip->setStatus($status);
        $result = $trip->insert();
        return $result;
    }

    // Método para insertar un viaje espacial desde la instancia
    public function insert()
    {
        $con = _cAccesoBD::obtener();
        $sql = "INSERT INTO space_trips (program_id, duration, departure_date, return_date, status)
      VALUES ('$this->program', '$this->duration', '$this->departure_date', '$this->return_date', '$this->status')";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }
}
