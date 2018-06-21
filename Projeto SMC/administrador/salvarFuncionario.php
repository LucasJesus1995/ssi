<?php
session_start();
require "conexao.php";

$nome_func = $_POST['nome'];
$funcao = $_POST['funcao'];


$sql = "INSERT INTO employees  (name, role) VALUES ('$nome_func','$funcao')";
$res = mysqli_query($conexao, $sql) or die ("errorr");

mysqli_close($conexao);




echo"<script> alert('Funcionário Cadastrado com Sucesso!'); window.location.href='funcionario.php';</script>";


?>