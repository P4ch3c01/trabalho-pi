<?php
session_start();
include("conexao.php");


$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$senha = filter_var(trim($_POST['senha']), FILTER_SANITIZE_STRING);
$senha1 = filter_var(trim($_POST['senha1']), FILTER_SANITIZE_STRING);
if($senha != $senha1){
    $_SESSION['senha_confere'] = false;
    header('location: cadastro.php');
    exit;
}

$sql = "select count(*) as total from usuarios where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] >0 ){
    $_SESSION['usuario_existe'] = true;
    header('location: cadastro.php');
    exit;
}
$senha = md5($senha);
$sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";

if($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;

}

$conexao->close();

header('location: inicio.html');
exit;
?>