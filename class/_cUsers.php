<?php
include_once "inc.php";


class _cUsers {

    const ADMIN = 20;
    const CLIENTE = 10;


private $id;
private $nombre;
private $email;
private $apellidos;
private $username;
private $password;
private $authtipo;

public function getId() {
return $this->id;
}
public function setId($id) {
$this->id = $id;
}
public function getNombre() {
return $this->nombre;
}
public function setNombre($nombre) {
$this->nombre = $nombre;
}
public function getEmail() {
return $this->email;
}
public function setEmail($email) {
$this->email = $email;
}
public function getApellidos() {
return $this->apellidos;
}
public function setApellidos($apellidos) {
$this->apellidos = $apellidos;
}
public function getUsername() {
return $this->username;
}
public function setUsername($username) {
$this->username = $username;
}
public function getPassword() {
return $this->password;
}
public function setPassword($password) {
$this->password = $password;
}
public function getAuthtipo() {
return $this->authtipo;
}
public function setAuthtipo($authtipo) {
$this->authtipo = $authtipo;
}

public function register() {

$con = _cAccesoBD::obtener();


$hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nombre, email, apellidos, username, password, authtipo) VALUES ('$this->nombre', '$this->email', '$this->apellidos', '$this->username', '$hashedPassword', '$this->authtipo')";
$result = $con->_EjecutarQuery($sql);

return $result;
}

public static function registerUser($nombre, $email, $apellidos, $username, $password, $authtipo) {

$user = new _cUsers();
$user->setNombre($nombre);
$user->setEmail($email);
$user->setApellidos($apellidos);
$user->setUsername($username);
$user->setPassword($password);
$user->setAuthtipo($authtipo);

$result = $user->register();

return $result;
}

    public static function login($username, $password) {

        $con = _cAccesoBD::obtener();

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $con->_EjecutarQuery($sql);


        if (mysqli_num_rows($result) == 0) {

            return false;
        } else {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {



                return $user;
            } else {
                return false;
            }
        }
    }




}