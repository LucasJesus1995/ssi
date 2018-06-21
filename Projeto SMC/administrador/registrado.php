<?php
require "conexao.php";

$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$local = $_POST['local'];
$telefone = $_POST['telefone'];



$sql = "INSERT INTO administrators (login, password, alocal , phone, email, dateCreated) VALUES ('$login', '$senha' ,'$local', '$telefone', '$email', NOW())";
mysqli_query($conexao, $sql);
mysqli_close($conexao);

echo"<script> alert('Usuário Cadastrado com Sucesso!'); window.location.href='login2.php';</script>";

?>

