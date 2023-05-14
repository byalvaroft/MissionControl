<?php
include_once "inc.php";

// Clase _cPrograms para representar programas
class _cPrograms {
    // Propiedades de la clase
    private $program_id;
    private $name;
    private $description;
    private $highlights;
    private $conclusion;
    private $level;
    private $eva;
    private $travel_time;
    private $cargo;
    private $ship_type;
    private $age_requirement;

    // Método para obtener el ID del programa
    public function getProgramId() {
        return $this->program_id;
    }

    // Método para establecer el ID del programa
    public function setProgramId($program_id) {
        $this->program_id = $program_id;
    }

    // Método para obtener el nombre del programa
    public function getName() {
        return $this->name;
    }

    // Método para establecer el nombre del programa
    public function setName($name) {
        $this->name = $name;
    }

    // Método para obtener la descripción del programa
    public function getDescription() {
        return $this->description;
    }

    // Método para establecer la descripción del programa
    public function setDescription($description) {
        $this->description = $description;
    }

    // Método para obtener los puntos destacados del programa
    public function getHighlights() {
        return $this->highlights;
    }

    // Método para establecer los puntos destacados del programa
    public function setHighlights($highlights) {
        $this->highlights = $highlights;
    }

    // Método para obtener la conclusión del programa
    public function getConclusion() {
        return $this->conclusion;
    }

    // Método para establecer la conclusión del programa
    public function setConclusion($conclusion) {
        $this->conclusion = $conclusion;
    }

    // Método para obtener el nivel del programa
    public function getLevel() {
        return $this->level;
    }

    // Método para establecer el nivel del programa
    public function setLevel($level) {
        $this->level = $level;
    }

    // Método para obtener la EVA del programa
    public function getEva() {
        return $this->eva;
    }

    // Método para establecer la EVA del programa
    public function setEva($eva) {
        $this->eva = $eva;
    }

    // Método para obtener el tiempo de viaje del programa
    public function getTravelTime() {
        return $this->travel_time;
    }

    // Método para establecer el tiempo de viaje del programa
    public function setTravelTime($travel_time) {
        $this->travel_time = $travel_time;
    }

    // Método para obtener el cargamento del programa
    public function getCargo() {
        return $this->cargo;
    }

    // Método para establecer el cargamento del programa
    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    // Método para obtener el tipo de nave del programa
    public function getShipType() {
        return $this->ship_type;
    }

    // Método para establecer el tipo de nave del programa
    public function setShipType($ship_type) {
        $this->ship_type = $ship_type;
    }

    // Método para obtener el requisito de edad del programa
    public function getAgeRequirement() {
        return $this->age_requirement;
    }

            // Método para establecer el requisito de edad del programa
    public function setAgeRequirement($age_requirement) {
        $this->age_requirement = $age_requirement;
    }

    // Método para formatear el ID del programa
    public static function formatProgramID($programID) {
        return 'PR-' . str_pad($programID, 3, '0', STR_PAD_LEFT);
    }

    // Método para seleccionar todos los programas de la base de datos
    public static function selectAll() {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT * FROM programs";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    // Método para seleccionar un programa específico por ID en la base de datos
    public static function selectByProgramId($program_id) {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT * FROM programs WHERE program_id =" . $program_id;
        $result = $con->_EjecutarQuery($sql);
        return $result->fetch_assoc();
    }

}
