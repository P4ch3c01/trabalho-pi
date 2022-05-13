<?php
session_start();
include_once("conexao.php");

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$data_nasc = $_POST['data_nasc'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

$id_usuario=$_SESSION['id_usuario']; 
$sql = mysqli_query($conexao, "INSERT INTO cadastro_cliente (nome,telefone,sexo,data_nasc,cidade,estado,endereco,id_usuario) VALUES ('$nome','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco','$id_usuario')");

$conexao->close();

header('location: formulario.html');
exit;
?>