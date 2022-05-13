<?php 

session_start();
include_once('config.php');

$sql = "SELECT * FROM cadastro_cliente ORDER BY id DESC";

$result = $conexao->query($sql);

print_r($result);








?>