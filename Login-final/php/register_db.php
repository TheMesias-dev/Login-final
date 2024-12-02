<?php
    include "conexion.php";

    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    //Sin encriptacion 

    $query = "INSERT INTO usuarios(nombre_usuario,email_usuario,password_usuario)
              VALUE ('$userName','$userEmail','$userPassword')";

    $checkEmail = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email_usuario='$userEmail'");
    $checkUserName = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$userName'");

    //Con encriptacion

    /* $query = "INSERT INTO usuarios(nombre_usuario,email_usuario,password_usuario)
              VALUE ('$userName','$userEmail',md5('$userPassword'))";

    $checkEmail = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email_usuario='$userEmail'");
    $checkUserName = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$userName'"); */

    if (mysqli_num_rows($checkEmail) > 0) {
        echo '
            <script>
                alert("Este Correo ya existe");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    if (mysqli_num_rows($checkUserName) > 0) {
        echo '
            <script>
                alert("Este Usuario ya existe");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    $run = mysqli_query($conexion,$query);

    if($run) {
        echo '
            <script>
                alert("Te registraste correctamente");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion)
?>