<!-- Inicio de HTML -->
<html>

<!-- Estilos CSS -->
<style>
    /* Establecer imagen de fondo */
    body {
        background-image: url("src/fondologin.jpg");
        background-size: cover;
    }

    /* Estilos para el div de login */
    #login_div {
        border: 8px solid rgba(10, 10, 10, 0.3);
        border-radius: 10px;
        width: fit-content;
        height: fit-content;
        padding: 5%;
        margin: 0 auto;
        text-align: center;
        backdrop-filter: blur(7px)brightness(110%);
    }

    /* Estilos para el título del formulario de login */
    #login_div h1 {
        margin-top: 0;
        font-weight: normal;
        padding: 10px;
        color: white;
        font-family: sans-serif;
    }

    /* Estilos para los divs dentro del div de login */
    #login_div div {
        clear: both;
        margin-top: 10px;
        padding: 5px;
    }

    /* Estilos para los campos de texto y contraseñas */
    input[type=text],
    input[type=password] {
        padding: 7px;
        background-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-radius: 7px;
        color: white;
    }

    /* Estilos para el botón de enviar */
    #login_div input[type=submit] {
        padding: 7px;
        width: 100px;
        background-color: black;
        border-radius: 5px;
        font-size: larger;
        border: 1px;
        color: white;
    }
</style>

<!-- Cuerpo del documento -->

<body>
    <div class="container">
        <form method="post" action="">
            <div id="login_div">
                <h1>Login</h1>
                <div>
                    <input type="text" id="user" name="user" placeholder="User" />
                </div>
                <div>
                    <input type="password" id="pass" name="pass" placeholder="Password" />
                </div>
                <div>
                    <input type="submit" value="Submit" name="login" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php
// Incluir archivos
include_once "inc.php";
include_once "connection.php";

// Verificar si se hizo clic en el botón de login
if (isset($_POST['login'])) {
    // Obtener datos de usuario y contraseña
    $usuario_introducido = mysqli_real_escape_string($con, $_POST['user']);
    $pass_introducida = mysqli_real_escape_string($con, $_POST['pass']);

    // Verificar si se ingresaron datos
    if ($usuario_introducido != "" && $pass_introducida != "") {
        // Intentar iniciar sesión
        $user = _cUsers::login($usuario_introducido, $pass_introducida);

        // Verificar si se inició sesión correctamente
        if ($user) {
            // Establecer variables de sesión
            $_SESSION['user'] = $usuario_introducido;
            $_SESSION['authtipo'] = $user['authtipo'];
            $_SESSION['id'] = $user['id'];
            // Redirigir al inicio
            header('Location: home.php');
        } else {
            // Mostrar mensaje de error si las credenciales son incorrectas
            echo "Usuario y contraseña inválidos";
        }
    }
}
?>