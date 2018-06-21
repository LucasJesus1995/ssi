<?php
session_start();
require "conexao.php";


$func = $_POST['botao2'];

$sql = "DELETE FROM employees WHERE id='$func'";
$res = mysqli_query($conexao, $sql);



echo"<script> alert('Funcionário Excluida com Sucesso!'); window.location.href='funcionario.php';</script>";


mysqli_close($conexao);


?>