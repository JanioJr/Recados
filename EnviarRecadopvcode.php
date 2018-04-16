<?php
session_start();
$id = $_SESSION['a'];
$recebedor = $_REQUEST['recebedor'];
$Recado = $_POST['recadinho'];
$Data = date("Y-m-d");
$query = "INSERT INTO `recados_privados` (`ID`, `Recados`, `Data`, `ID_Enviador`, `ID_Recebedor`) VALUES (NULL, '$Recado', '$Data', '$id','$recebedor')";
include_once './conexao.php';
mysqli_query($link, $query);
header("location: EnviarRecadoPrivado.php");
