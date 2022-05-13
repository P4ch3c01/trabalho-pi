<?php
session_start();
include_once("conexao.php");

$tp_aparelho = $_POST['tp_aparelho'];
$marca = $_POST['marca'];
$sistema = $_POST['sistema'];


$id_usuario=$_SESSION['id_usuario'];
$sql = mysqli_query($conexao, "INSERT INTO aparelhos (tp_aparelho,marca,sistema,id_cliente) VALUES ('$tp_aparelho','$marca','$sistema',(select id_cliente from cadastro_cliente where id_usuario = $id_usuario))");

$conexao->close();

header('location: aparelho.html');
exit;
?>