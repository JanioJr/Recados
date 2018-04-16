<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
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
                <?php if(empty($_SESSION['a'])){ ?>
                <h1>Login</h1>
                <form class="login" method="post" action="Login.php">
                    <label>Email</label>
                    <input name="Email" type="email" placeholder="Exemplo@dominio.com">
                    
                    <label>Senha</label>
                    <input name="Senha" type="password" placeholder="Password">
                    
                    <button type="submit">Fazer Login</button>
                </form>
                
                <h1>Cadastro</h1>
                <form class="login" enctype="multipart/form-data" method="POST" action="Cadastro.php" style="height: 520px;">
                    
                    <label>Nome</label>
                    <input name="Nome" type="text" placeholder="Nome Completo...">
                    
                    <label>Email</label>
                    <input name="Email" type="email" placeholder="Exemplo@dominio.com">
                    
                    <label>Data de nascimento:</label>
                    <input name="DataDeNascimento" type="date" >
                    
                    <label>Foto de perfil</label>
                    <input name="Perfil" type="file" >
                    
                    <label>Senha</label>
                    <input name="Senha" type="password" placeholder="Password">
                    
                    <label>Comfirmar Senha</label>
                    <input name="ComfirmarSenha" type="password" placeholder="Password">
                    
                    <button type="submit">Cadastrar no sistema</button>
                </form>
                <?php }else{ ?>
                
                <h1>Timeline</h1>
                <form class="login" method="post" action="EnviarRecado.php">
                    <label>Digite seu recado logo abaixo:</label>
                    <textarea name="recadinho"></textarea>
                    <button type="submit">Enviar para timeline</button>
                </form>
                
                <?php 
                include_once 'conexao.php';
                $queryrecado = "SELECT * FROM `recados` ORDER BY `ID` DESC";
                $result = mysqli_query($link, $queryrecado);
                while($recadosvetor = mysqli_fetch_row($result)){
                    $ID = $recadosvetor[2];
                    $queryuser = "SELECT * FROM `usuarios` where `ID` = $ID";
                    $resultz = mysqli_query($link, $queryuser);
                    $user = mysqli_fetch_row($resultz);
                ?>
                <section class="recado">
                    <p style="position: initial;">Data: <?php echo $recadosvetor[3]; if($_SESSION['a'] == $recadosvetor[2]){?> <a href="EditarRecado.php?ed=<?php echo $recadosvetor[0]; ?>">Editar Recado</a><?php } ?></p>
                    <article class="mensagem">
                        <?php echo $recadosvetor[1]; ?>
                    </article>
                    <img src="imagem/<?php echo $user[4];?>" alt=""/>
                    <p><?php echo $user[1];?></p>
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
