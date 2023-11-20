<?php
    session_start();
    include 'conexion_be.php';

    $coreeo = $_POST['coreeo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM clientes WHERE coreeo='$coreeo' AND contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0 ){
        $_SESSION['usuario'] = $coreeo;
        header("location: ../pagina.php");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no encontrado");
                window.location = "../login.php";
            </script>
        ';
        exit;
    }
?>