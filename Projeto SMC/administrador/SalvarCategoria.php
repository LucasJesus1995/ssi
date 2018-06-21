<?php
session_start();
require "conexao.php";

$categoria = $_POST['categoria'];
$public = $_POST['public'];

$sql = "INSERT INTO categories (category, published) VALUES ('$categoria', '$public')";
mysqli_query($conexao, $sql);

echo "<script> alert('Categoria cadastrado com Sucesso!'); window.location.href='categoria.php';</script>";


?>