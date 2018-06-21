<?php
session_start();
require "conexao.php";

$depart = $_POST['depart'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$contato = $_POST['contato'];
$endereco = $_POST['end'];
$regiao = $_POST['reg'];
$horario = $_POST['hr'];
$predio = $_POST['predio'];
$senha = $_POST['senha'];
$botao = $_POST['editLocal'];


$sql = "UPDATE users SET ulocal='$depart', phone='$telefone', email='$email', contact='$contato', address='$endereco', idRegion='$regiao', operatingHours='$horario', historicalBuilding='$predio',password='$senha' WHERE id ='$botao'";
$res = mysqli_query($conexao, $sql);



echo"<script> alert('Usuário Atualizado com Sucesso!'); window.location.href='local.php';</script>";


mysqli_close($conexao);


?>