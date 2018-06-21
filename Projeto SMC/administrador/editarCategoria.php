<?php
session_start();
require "conexao.php";

$categoria = $_POST['cat'];
$c = $_POST['botao'];

$sql = "UPDATE categories SET category ='$categoria' WHERE id='$c'";
$res = mysqli_query($conexao, $sql);



echo"<script> alert('Categoria Atualizado com Sucesso!'); window.location.href='categoria.php';</script>";


mysqli_close($conexao);


?>