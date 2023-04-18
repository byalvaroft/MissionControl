<?php
include_once "inc.php";

class _cPrograms {
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

    public function getProgramId() {
        return $this->program_id;
    }

    public function setProgramId($program_id) {
        $this->program_id = $program_id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getHighlights() {
        return $this->highlights;
    }

    public function setHighlights($highlights) {
        $this->highlights = $highlights;
    }

    public function getConclusion() {
        return $this->conclusion;
    }

    public function setConclusion($conclusion) {
        $this->conclusion = $conclusion;
    }

    public function getLevel() {
        return $this->level;
    }

    public function setLevel($level) {
        $this->level = $level;
    }

    public function getEva() {
        return $this->eva;
    }

    public function setEva($eva) {
        $this->eva = $eva;
    }

    public function getTravelTime() {
        return $this->travel_time;
    }

    public function setTravelTime($travel_time) {
        $this->travel_time = $travel_time;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getShipType() {
        return $this->ship_type;
    }

    public function setShipType($ship_type) {
        $this->ship_type = $ship_type;
    }

    public function getAgeRequirement() {
        return $this->age_requirement;
    }

    public function setAgeRequirement($age_requirement) {
        $this->age_requirement = $age_requirement;
    }

    public static function formatProgramID($programID) {
        return 'PR-' . str_pad($programID, 3, '0', STR_PAD_LEFT);
    }

    public static function selectAll() {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT * FROM programs";
        $result = $con->_EjecutarQuery($sql);
        return $result;
    }

    public static function selectByProgramId($program_id) {
        $con = _cAccesoBD::obtener();
        $sql = "SELECT * FROM programs WHERE program_id =" . $program_id;
        $result = $con->_EjecutarQuery($sql);
        return $result->fetch_assoc();
    }

}
