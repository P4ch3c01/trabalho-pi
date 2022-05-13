<?php
    if(!empty($_GET['id']))
    {

        include_once("conexao.php");
        
        $id_cliente = $_GET['id'];

        $sqlSelect = "SELECT * FROM cadastro_cliente WHERE id_cliente=$id_cliente";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {

                $nome = $user_data['nome'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data_nasc = $user_data['data_nasc'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
                $endereco = $user_data['endereco'];
            }    
        }
        else 
        {
            header('location: lista_registros.php');
        }
        
    }    
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    
    <div class="box">
        <form action="infos_adc_edit.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário</b></legend>
                <br> 
                <input type="hidden" name="id_cliente" value="<?=$id_cliente?>">
                <div class="inputbox">
                    <input value="<?=$nome?>" type="text" name="nome"  id="nome"  class="inputuser" required>
                    <label for="name" class="labelinpt">Nome*</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input value="<?=$telefone?>" type="tel" name="telefone"  id="telefone"  class="inputuser" required>
                    <label for="telefone" class="labelinpt">Telefone*</label>
                    <p>Sexo:</p>
                    <input value="<?=$sexo?>" type="radio" id="feminino" name="sexo"  value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" id="masculino" name="sexo"  value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <br><br>
                   
                        <label for="data_nasc"><b>Data Nascimento: </b></label>
                        <input  value="<?=$data_nasc?>" type="date" name="data_nasc"  id="data_nasc" required>
                        
                  
                    <br><br><br>
                    <div class="inputbox">
                        <input  value="<?=$cidade?>" type="text" name="cidade"  id="cidade"  class="inputuser" required>
                        <label for="cidade" class="labelinpt">Cidade*</label>
                    </div>
                    <br><br>
                    <div class="inputbox">
                        <input value="<?=$estado?>" type="text" name="estado"  id="estado"  class="inputuser" required>
                        <label for="estado" class="labelinpt">Estado*</label>
                    </div>
                    <br><br>
                    <div class="inputbox">
                        <input value="<?=$endereco?>" type="text" name="endereco"  id="endereco"  class="inputuser" required>
                        <label for="endereco" class="labelinpt">Endereço*</label>
                    </div>

                    <br><br>
                    <input type="submit" name="submit" id="submit"> 
            </fieldset>
        </form>
    </div>
</body>
</html>