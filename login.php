<?php

$con    = mysqli_connect('bpu2hwudgpu27kbbsmkm-mysql.services.clever-cloud.com', 'uq0ngmetmbnzod55', 'cWh2LmR6Bdc9475FWW8p', 'bpu2hwudgpu27kbbsmkm');


if(mysqli_connect_errno())
{
    echo "1: Connection Failed"; // error code #1 = connection failed
    exit();
}

$cedula = $_POST["Cedula"];
$nombre = $_POST["Nombre"];
$ciudad = $_POST["Ciudad"];
$email = $_POST["Email"];

//  Verificar si la cedula existe
$verificarcedula = "SELECT Cedula FROM usuarios WHERE Cedula = '". $cedula ."';";
$cedulacheck = mysqli_query($con, $verificarcedula) or die ("2: Name check query failed"); // error code #endregion #2 = cedula check query failed

if(mysqli_num_rows($cedulacheck) > 0)
{
    echo "3: La cedula ya existe" ;  // error code #endregion #3 = la cedula exist
    
}
else
{
// Adicionar el usuario 
$insertuserquery = "INSERT INTO usuarios SET Cedula = '$cedula' , Nombre = '$nombre' , Ciudad = '$ciudad' , Email = '$email'  ";
mysqli_query($con, $insertuserquery) or die ("4: Insert player failed");    // error code #endregion #4 = insert query failed

echo("0");
}

?>