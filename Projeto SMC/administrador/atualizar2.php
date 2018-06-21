<?php
session_start();
require "conexao.php";

$depart = $_POST['depart'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "UPDATE administrators SET local='$depart', phone='$telefone', email='$email', password='$senha'";
$res = mysqli_query($conexao, $sql);



    echo"<script> alert('Usuário Atualizado com Sucesso!'); window.location.href='informacao.php';</script>";


mysqli_close($conexao);


?>