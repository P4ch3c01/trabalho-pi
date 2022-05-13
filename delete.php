<?php

    if(!empty($_GET['id']))
    {
        include_once("conexao.php");
        
        $id_cliente = $_GET['id'];

        $sqlSelect = "SELECT * FROM cadastro_cliente WHERE id_cliente=$id_cliente";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM cadastro_cliente WHERE id_cliente=$id_cliente"; 
            $resultDelete = $conexao->query($sqlDelete);  
        }
    }
    header('location: lista_registros.php')
?>