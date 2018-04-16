<?php 
session_start();
if(empty($_SESSION['a'])){ header("location: index.php"); }else{ 
        $re = $_REQUEST['ex'];
        $Recado = $_REQUEST['recadinho'];
        $queryz = "DELETE FROM `recados_privados` WHERE `recados_privados`.`ID` = $re";
        include_once './conexao.php';
        $resultz = mysqli_query($link, $queryz);
        $edmsz = mysqli_fetch_row($resultz);
        header("location: Recados_Privados.php");
}
                