<?php
    
    include 'conexion_be.php';

    $nombre = $_POST['nombre'];
    $coreeo = $_POST['coreeo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $query ="INSERT INTO clientes (nombre, coreeo, usuario, contrasena) 
             VALUES ('$nombre', '$coreeo', '$usuario', '$contrasena')";

    $verificar_correo =mysqli_query($conexion, "SELECT * FROM clientes WHERE coreeo='$coreeo'");
    
    if(mysqli_num_rows($verificar_correo) > 0 ){
        echo '
            <script>
                alert("Ya existe un usuario con este correo");
                window.location ="../login.php";
            </script>
        ';
        exit();
    }

    $verificar_usuario =mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario='$usuario'");
    if(mysqli_num_rows($verificar_usuario) > 0 ){
        echo '
            <script>
                alert("Ya existe un usuario con este nombre de usuario");
                window.location ="../login.php";
            </script>
        ';
        exit();
    }

    $ejecutar =mysqli_query($conexion, $query);
   
    if ($ejecutar){
        echo '
            <script>
                alert("Registro exitoso");
                window.location ="../login.php";
            </script>
        ';
    }else{
        echo '
        <script>
            alert("Fallo de conexión");
            window.location ="../login.php";
        </script>
    '; 
    }

    mysqli_close($conexion);
?>