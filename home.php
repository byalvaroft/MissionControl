<?php
include "connection.php";

if(!isset($_SESSION['user'])){
    header('Location: index.php');
}

if(isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
}
?>

<html style="background-color: black">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Pagina Principal</h1>
<form method='post' action="">
    <input class="login_button" type="submit" value="Logout" name="logout">
</form>
</body>
</html>