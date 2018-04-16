<?php
session_start();
$id = $_SESSION['a'];
$Recado = $_POST['recadinho'];
$Data = date("Y-m-d");
$query = "INSERT INTO `recados` (`ID`, `Recado`, `UserID`, `Data`) VALUES (NULL, '$Recado', '$id', '$Data')";
include_once './conexao.php';
mysqli_query($link, $query);
header("location: index.php");