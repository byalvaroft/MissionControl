<html>

<style>

    body {
        background-image: url("src/fondologin.jpg");
        background-size: cover;
    }

    #login_div{
        border: 8px solid rgba(10,10,10,0.3);
        border-radius: 10px;
        width: fit-content;
        height: fit-content;
        padding: 5%;
        margin: 0 auto;
        text-align: center;
        backdrop-filter: blur(7px)brightness(110%);
    }

    #login_div h1{
        margin-top: 0;
        font-weight: normal;
        padding: 10px;
        color: white;
        font-family: sans-serif;
    }

    #login_div div{
        clear: both;
        margin-top: 10px;
        padding: 5px;
    }

    input[type=text], input[type=password]{
        padding: 7px;
        background-color: transparent;
        border: 2px solid rgba(255, 255, 255,0.6);
        border-radius: 7px;
        color: white;
    }

    #login_div input[type=submit]{
        padding: 7px;
        width: 100px;
        background-color: black;
        border-radius: 5px;
        font-size: larger;
        border: 1px;
        color: white;
    }


</style>


<body>

<div class="container">
    <form method="post" action="">
        <div id="login_div">
            <h1>Login</h1>
            <div>
                <input type="text"  id="user" name="user" placeholder="User" />
            </div>
            <div>
                <input type="password" id="pass" name="pass" placeholder="Password"/>
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
include_once "inc.php";
include_once "connection.php";


if(isset($_POST['login'])){

    $usuario_introducido = mysqli_real_escape_string($con,$_POST['user']);
    $pass_introducida = mysqli_real_escape_string($con,$_POST['pass']);

    if ($usuario_introducido != "" && $pass_introducida != ""){

        $user = _cUsers::login($usuario_introducido,$pass_introducida);

        if($user){

            $_SESSION['user'] = $usuario_introducido;
            $_SESSION['authtipo'] = $user['authtipo'];
            $_SESSION['id'] = $user['id'];
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}