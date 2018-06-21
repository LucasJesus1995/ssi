<?php
session_start();
require "conexao.php";

$id= $_SESSION['id'];

$nome = $_POST['infoContato'];
$horario = $_POST['hr'];
$status = $_POST['status'];
$contato = $_POST['contato'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$prioridade = $_POST['prioridade'];
$responsavel = $_POST['resp'];
$material = $_POST['material'];
$solucao = $_POST['solucao'];


$admin = "SELECT * FROM administrators_users WHERE admininstrators_id ='$id'";
$res_admin = mysqli_query($conexao, $admin);

if($registro = mysqli_fetch_assoc($res_admin)) {

    $u = $registro['users_id'];


$sql1 = "INSERT INTO problems (users_id, ulocal, contact,categories_id, priorities_id, description, startDate, problem_status_id, administrators_id) VALUES ('$u', '$nome', '$contato', '$categoria', '$prioridade', '$descricao', NOW(), '$status', '$responsavel')";

mysqli_query($conexao, $sql1) or die('falha ao conectar');

}

echo "<script> alert('Chamado Enviado com Sucesso!'); window.location.href='Chamado.php';</script>";



mysqli_close($conexao);
?>