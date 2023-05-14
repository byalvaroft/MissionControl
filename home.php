<?php
include_once "inc.php";

// Verificar si el usuario está autenticado, si no, redirigir a index.php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

// Si se presiona el botón de cerrar sesión, destruir la sesión y redirigir a index.php
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluir archivos CSS de Bootstrap y estilos personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body style="background-color: #eeeeee">
<!-- Formulario de cierre de sesión -->
<form method='post' action="">
    <input style="background-color: black;" class="login_button" type="submit" value="Logout" name="logout">
</form>
<?php
// Mostrar panel de administrador o panel de usuario según el tipo de usuario
if ($_SESSION['authtipo'] == _cUsers::ADMIN) {
    include('panel_admin.php');
} else {
    include('panel_usuario.php');
}
?>

<!-- Incluir archivos JS de jQuery, Popper y Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
