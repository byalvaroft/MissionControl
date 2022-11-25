<html>

<style>

    #login_div{
        border: 1px solid gray;
        border-radius: 3px;
        width: fit-content;
        height: fit-content;
        padding: 5%;
        margin: 0 auto;
        text-align: center;
    }

    #login_div h1{
        margin-top: 0;
        font-weight: normal;
        padding: 10px;
        background-color: #808083;
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
    }

    #login_div input[type=submit]{
        padding: 7px;
        width: 100px;
        background-color: black;
        border: 1px;
        color: white;
    }


</style>


<body>

<div class="container">
    <form method="post" action="">
        <div id="login_div">
            <h1>Entrar</h1>
            <div>
                <input type="text"  id="user" name="user" placeholder="Usuario" />
            </div>
            <div>
                <input type="password" id="pass" name="pass" placeholder="Contraseña"/>
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

include "connection.php";

if(isset($_POST['login'])){

    $usuario_introducido = mysqli_real_escape_string($con,$_POST['user']);
    $pass_introducida = mysqli_real_escape_string($con,$_POST['pass']);

    if ($usuario_introducido != "" && $pass_introducida != ""){


        $sql = "select * from users where username='".$usuario_introducido."' and password='".$pass_introducida."'";


        $result = mysqli_query($con,$sql);

        if($result->num_rows){
            $_SESSION['user'] = $usuario_introducido;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}