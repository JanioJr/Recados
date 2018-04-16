<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section class="Pagina">
            <h1>Recados</h1>
            <main>
                <?php if(empty($_SESSION['a'])){ header("location: index.php"); }else{ 
                    $re = $_REQUEST['ed'];
                    $query = "SELECT * FROM `recados` WHERE `ID` = $re";
                    include_once './conexao.php';
                    $result = mysqli_query($link, $query);
                    $edms = mysqli_fetch_row($result);
                    
                    if(isset($_REQUEST['fff'])){
                        $Recado = $_REQUEST['recadinho'];
                        $queryz = "UPDATE `recados` SET `Recado` = '$Recado' WHERE `recados`.`ID` = $re";
                        include_once './conexao.php';
                        $resultz = mysqli_query($link, $queryz);
                        $edmsz = mysqli_fetch_row($resultz);
                        header("location: index.php");
                    }
                    ?>
                
                <h1>Editar Recado</h1>
                <form class="login" method="post" action="EnviarRecado.php">
                    <label>Edite seu recado logo abaixo:</label>
                    <textarea name="recadinho"><?php echo $edms[1]?></textarea>
                    <button name="fff" type="submit">Editar</button>
                </form>
            </main>
            <footer>
                TRABALHO DE INTEGRAÇÃO INTERDICIPLINAR COM AS DICIPLINAS DE DESENVOLVIMENTO DE SISTEMAS,
                BANCO DE DADOS E APLICATIVOS WEB & WEB DESIGN. ALUNOS: JANIO JUNIOR, SÉRGIO MIGUEL E THALES.
            </footer>
        </section>
    </body>
</html>
                <?php }