<?php
session_start();
require "conexao.php";

$depart = $_POST['depart'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$endereco = $_POST['end'];
$regiao = $_POST['reg'];
$hora = $_POST['hr'];
$senha = $_POST['senha'];
$predio = $_POST['predio'];

$id1 = $_SESSION['id'];

$sql = "UPDATE users SET ulocal='$depart', phone='$telefone', email='$email', address='$endereco', idRegion='$regiao',  operatingHours='$hora', historicalBuilding='$predio', password='$senha' WHERE id='$id1'";
$res = mysqli_query($conexao, $sql);



    echo"<script> alert('Usuário Atualizado com Sucesso!'); window.location.href='informacao.php';</script>";


mysqli_close($conexao);


?>