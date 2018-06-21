<?php
session_start();
require "conexao.php";

$funcionario = $_POST['funcionario'];
$funcao = $_POST['funcao'];
$edit_func = $_POST['botao'];

$sql = "UPDATE employees SET name ='$funcionario', role= '$funcao' WHERE id='$edit_func'";
$res = mysqli_query($conexao, $sql);



echo"<script> alert('Funcionário Atualizado com Sucesso!'); window.location.href='funcionario.php';</script>";


mysqli_close($conexao);


?>