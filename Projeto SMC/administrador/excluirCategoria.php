<?php
session_start();
require "conexao.php";


$c = $_POST['botao2'];

$sql = "DELETE FROM categories WHERE category='$c'";
$res = mysqli_query($conexao, $sql);



echo"<script> alert('Categoria Excluida com Sucesso!'); window.location.href='categoria.php';</script>";


mysqli_close($conexao);


?>