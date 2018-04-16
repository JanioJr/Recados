<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enviar Recado Privado</title>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section class="Pagina">
            <h1>Recados</h1>
            <nav id="menu">
                <a href="index.php">Inicio</a>
                <a href="EnviarRecadoPrivado.php">Enviar Recados Privados</a>
                <a href="Recados_Privados.php">Recados Privados</a>
                <a href="Loggout.php">Sair</a>
            </nav>
            <main>
                <?php if(empty($_SESSION['a'])){ header("location: index.php"); }else{ ?>
                
                <h1 style="font-size: 40px">Enviar Recado Privado</h1>
                <form class="login" method="post" style="height: 300px;" action="EnviarRecadopvcode.php">
                    <label>A quem deve ser enviado?</label>
                    <select name="recebedor">
                        <?php 
                             include_once './conexao.php';
                            $IDU = $_SESSION['a'];
                            $query = "SELECT * FROM `usuarios` WHERE `ID` != $IDU";
                            $resultUser = mysqli_query($link, $query);
                            while($usersexibir = mysqli_fetch_row($resultUser)){
                                echo "<option value=\"$usersexibir[0]\">$usersexibir[1]</option>";
                            }
                        ?>
                    </select>
                    <label>Digite seu recado logo abaixo:</label>
                    <textarea name="recadinho"></textarea>
                    <button type="submit">Enviar para timeline</button>
                </form>
                
                <?php 
                include_once 'conexao.php';
                $IDD = $_SESSION['a'];
                $queryrecado = "SELECT * FROM `recados_privados` where `ID_Enviador` =  $IDD ORDER BY `ID` DESC";
                $result = mysqli_query($link, $queryrecado);
                while($recadosvetor = mysqli_fetch_row($result)){
                    $ID = $recadosvetor[3];
                    $queryuser = "SELECT * FROM `usuarios` where `ID` = $ID";
                    $resultz = mysqli_query($link, $queryuser);
                    $user = mysqli_fetch_row($resultz);
                    
                    $IDz = $recadosvetor[4];
                    $queryuserz = "SELECT * FROM `usuarios` where `ID` = $IDz";
                    $resultzz = mysqli_query($link, $queryuserz);
                    $userz = mysqli_fetch_row($resultzz);
                ?>
                <section class="recado">
                    <p style="position: initial;">Data: <?php echo $recadosvetor[2];?></p>
                    <article class="mensagem">
                        <?php echo $recadosvetor[1]; ?>
                    </article>
                    <div class="oii">
                    <img src="imagem/<?php echo $user[4];?>" alt=""/>
                    <p><?php echo $user[1];?></p>
                    </div>
                    <img src="imagem/<?php echo $userz[4];?>" alt=""/>
                    <p><?php echo $userz[1];?></p>
                </section>
                
                <?php }} ?>
            </main>
            <footer>
                TRABALHO DE INTEGRAÇÃO INTERDICIPLINAR COM AS DICIPLINAS DE DESENVOLVIMENTO DE SISTEMAS,
                BANCO DE DADOS E APLICATIVOS WEB & WEB DESIGN. ALUNOS: JANIO JUNIOR, SÉRGIO MIGUEL E THALES.
            </footer>
        </section>
    </body>
</html>
