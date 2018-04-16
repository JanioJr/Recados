<?php
$Email = $_POST['Email'];
$Senha = sha1($_POST['Senha']);
$query = "SELECT * FROM `usuarios` WHERE `Email` LIKE '$Email' AND `Senha` LIKE '$Senha'";
include_once './conexao.php';
$a = mysqli_query($link, $query);
$b = mysqli_fetch_row($a);
$c = mysqli_num_rows($a);
if($c > 0){
    session_start();
    $_SESSION['a'] = $b[0];
    header("location: index.php");
} else {
    header("location: index.php");
}