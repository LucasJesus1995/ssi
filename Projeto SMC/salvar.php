<?php
session_start();
require "conexao.php";

$id= $_SESSION['id'];

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$contato = $_POST['contato'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$prioridade = $_POST['prioridade'];
$status = $_POST['botao'];


$admin = "SELECT * FROM administrators_users WHERE users_id ='$id'";
$res_admin = mysqli_query($conexao, $admin);

if ($registro = mysqli_fetch_array($res_admin)) {

    $a = $registro['admininstrators_id'];



$sql = "INSERT INTO problems (users_id, ulocal, phone, email, contact,categories_id, priorities_id, description, startDate, problem_status_id, administrators_id) VALUES ('$id', '$nome', '$telefone', '$email', '$contato', '$categoria', '1', '$descricao', NOW(), '$status', '$a')";

mysqli_query($conexao, $sql) or die('falha ao conectar');
    echo "<script> alert('Chamado Enviado com Sucesso!'); window.location.href='envioChamado.php';</script>";

}



mysqli_close($conexao);
?>