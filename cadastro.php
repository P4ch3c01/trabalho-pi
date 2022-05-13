<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="cadastro.css">


</head>
<body>
    <a href="inicio.html">Voltar</a>
    <?php
    if(isset($_SESSION['senha_confere'])):
    ?>
    <div class="notification is-success">
        <p>As senhas não conferem</p>
    </div>
    <?php 
    unset($_SESSION['senha_confere']);    
    endif;
    ?>
    <?php
    if(isset($_SESSION['usuario_existe'])):
    ?>
    <div class="notification is-info">
        <p>O email escolhido já existe. Informe outro e tente novamente.</p>
    </div>
    <?php
    unset($_SESSION['usuario_existe']);
    endif;
    ?>
    <form class="formulario" action="cadastrar.php" method="POST">
        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="login.png" alt="">
                <h2 class="titulo">Cadastre-se aqui</h2>
            </div>
            
            <div class="card-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu email" required >
            </div>
            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div> 
            <div class="card-group">
                <label>Confirmação de senha</label>
                <input type="password" name="senha1" placeholder="confirme sua senha" required>
            </div>
            <br>
            <div class="card-group">
                <label> <input type="checkbox"> Lembrar Senha</label>
            </div>
            <br> 
            
            <input type="submit"  name="submit" id="submit" value="CADASTRAR"  >
                   
      
        </div>
       

    </form>
    
</body>
</html>