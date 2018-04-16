<?php

$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$DataDeNascimento = $_POST['DataDeNascimento'];
$Senha = sha1($_POST['Senha']);
$ComfirmarSenha = sha1($_POST['ComfirmarSenha']);
$Perfil = $_FILES['Perfil'];

include_once './conexao.php';

if($Senha == $ComfirmarSenha){
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $Perfil["name"], $ext);
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    $caminho_imagem = "imagem/". $nome_imagem;
    move_uploaded_file($Perfil["tmp_name"], $caminho_imagem);
    $query = "INSERT INTO `usuarios` (`ID`, `Nome`, `Data_Nascimento`, `Email`, `Foto`, `Senha`) VALUES (NULL, '$Nome', '$DataDeNascimento', '$Email', '$nome_imagem', '$Senha')";
    mysqli_query($link, $query);
    header("location: index.php");
}else{
    echo 'Senhas Incompativeis';
}
