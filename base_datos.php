<?php
#$enlace = mysqli_connect("127.0.0.1", "mi_usuario", "mi_contraseña", "mi_bd");
session_destroy();
$usu=$_POST["usuario"];
$psw=$_POST["psw"];
#echo $usu;
#echo $psw;
if(empty($usu) || is_null($usu) || empty($psw) || is_null($psw)){
    
    echo 'Ingresar Usuario y Contraseña';
    
}
else{
    
    $enlace = mysqli_connect("localhost", "root", "usbw", "pruebas");
    
    if ($enlace->connect_error) {
    die("Error de conexion: " . $enlace->connect_error);
}
  $sql = "SELECT id, usuario,password FROM usuario where usuario='$usu' and password='$psw'";
$result = $enlace->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
        session_start() ;

        #echo $row["usuario"]. "<br>";
        $_SESSION["usuario"]=$usu;
        $_SESSION["pasword"]=$psw;
        
        header("Location: nueva_pagina.php");
    
} else {
    header("Location: index.php?error=Contraseña o usuario invalido");
    
}  


}


    
    