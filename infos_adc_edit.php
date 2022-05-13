<?php
session_start();
include_once("conexao.php");

$id_cliente = $_POST['id_cliente'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$data_nasc = $_POST['data_nasc'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

$id_usuario=$_SESSION['id_usuario']; 
$sql = mysqli_query($conexao, "
    UPDATE cadastro_cliente SET 
    nome='$nome'
    ,telefone='$telefone'
    ,sexo='$sexo'
    ,data_nasc='$data_nasc'
    ,cidade='$cidade'
    ,estado='$estado'
    ,endereco='$endereco'
    ,id_usuario='$id_usuario'
     WHERE id_cliente=$id_cliente");

$conexao->close();

header('location: lista_registros.php');
exit;
?>