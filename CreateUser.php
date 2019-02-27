<?php

include "dbConection.php";

$cedula = $_POST['Cedula'];
$nombre = $_POST['Nombre'];
$ciudad= $_POST['Ciudad'];
$email = $_POST['Email'];

$sql = "SELECT Cedula from usuarios WHERE Cedula =  '$cedula' ";
$resultado = $pdo ->query($sql);

if($resultado -> rowCount() > 0)
{
    $data = array('done' => false , 'message' => "ID user exist");
    Header('Content-Type: applicationq/json');
    echo json_encode($dataArray);
    exit();
}
else
{
    $sql = "INSERT INTO usuarios SET Cedula = '$cedula' , Nombre = '$nombre' , Ciudad = '$ciudad' , Email = '$email'  ";
    $pdo ->query($sql);

    $data = array('done' => true , 'message' => "User create succesful");
    Header('Content-Type: application/json');
    echo json_encode($dataArray);
    exit();
}
?>