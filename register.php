<?php
// Incluir archivo con funciones y configuraciones comunes
include_once "inc.php";
?>

<html>

<head>
    <!-- Estilos para la página de registro -->
    <style>
        body {
            background-image: url("src/fondologin.jpg");
            background-size: cover;
        }

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

        #login_div h1 {
            margin-top: 0;
            font-weight: normal;
            padding: 10px;
            color: white;
            font-family: sans-serif;
        }

        #login_div div {
            clear: both;
            margin-top: 10px;
            padding: 5px;
        }

        input[type=text],
        input[type=password] {
            padding: 7px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.6);
            border-radius: 7px;
            color: white;
        }

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
</head>
<body>
    <div class="container">
        <!-- Crear formulario de registro -->
        <form method="post" action="" id="form">
            <div id="login_div">
                <h1>Registro</h1>
                <div>
                    <input type="text" id="name" name="name" placeholder="Nombre" required />
                </div>
                <div>
                    <input type="text" id="surnames" name="surnames" placeholder="Apellidos" required />
                </div>
                <div>
                    <input type="text" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                </div>
                <div>
                    <input type="text" id="user" name="user" placeholder="Usuario" required />
                </div>
                <div>
                    <input type="password" id="pass" name="pass" placeholder="Contraseña" required />
                </div>
                <div>
                    <input type="submit" value="Enviar" name="register" />
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    // Validación del correo electrónico antes de enviar el formulario
    document.getElementById('form').addEventListener('submit', function(event) {
        if (!event.target.elements.email.checkValidity()) {
            alert('Por favor, introduce una dirección de correo electrónico válida');
            event.preventDefault();
        }
    });
</script>

</html>

<?php
// Incluir archivos con funciones y configuraciones comunes y conexión a la base de datos
include_once "inc.php";
include_once "connection.php";

// Verificar si se envió el formulario de registro
if (isset($_POST['register'])) {

    // Registrar al usuario y guardar el resultado
    $result = _cUsers::registerUser($_POST["name"], $_POST["email"], $_POST["surnames"], $_POST["user"], $_POST["pass"], _cUsers::CLIENTE);

    // Verificar si el registro fue exitoso y redirigir según el resultado
    if ($result) {
        header("Location:login.php?res=ok");
    } else {
        header("Location:login.php?err=1");
    }
}
?>