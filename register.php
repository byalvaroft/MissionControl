<?php
include_once "inc.php";
?>

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
    <form method="post" action="" id="form">
        <div id="login_div">
            <h1>Register</h1>
            <div>
                <input type="text"  id="name" name="name" placeholder="Name" required />
            </div>
            <div>
                <input type="text"  id="surnames" name="surnames" placeholder="Surnames" required/>
            </div>
            <div>
                <input type="text"  id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
            </div>
            <div>
                <input type="text"  id="user" name="user" placeholder="User" required/>
            </div>
            <div>
                <input type="password" id="pass" name="pass" placeholder="Password" required/>
            </div>
            <div>
                <input type="submit" value="Submit" name="register" />
            </div>
        </div>
    </form>
</div>



</body>
<script>
    document.getElementById('form').addEventListener('submit', function(event) {
        if (!event.target.elements.email.checkValidity()) {
            alert('Please enter a valid email address');
            event.preventDefault();
        }
    });
</script>

</html>


<?php
include_once "inc.php";
include_once "connection.php";


if(isset($_POST['register'])){

    $result = _cUsers::registerUser($_POST["name"],$_POST["email"],$_POST["surnames"],$_POST["user"],$_POST["pass"],_cUsers::CLIENTE);

    if ($result) {
        header("Location:login.php?res=ok");
    } else {
        header("Location:login.php?err=1");
    }

}