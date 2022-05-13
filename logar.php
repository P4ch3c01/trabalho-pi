<?php
session_start();
include("conexao.php");


$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$senha = filter_var(trim($_POST['senha']), FILTER_SANITIZE_STRING);

$sql = "select count(*) as total, max(senha) as senha, max(id_usuario) as id_usuario from usuarios where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$senha = md5($senha);
if($row['total'] !=1 ){
    $_SESSION['login_invalido'] = true;
    header('location: login.php');
    exit;
}

if($row['senha'] != $senha){
    $_SESSION['login_invalido'] = true;
    header('location: login.php');
    exit;
}

$_SESSION['id_usuario'] = $row['id_usuario'];
header('location: interna.php');
exit;
?>