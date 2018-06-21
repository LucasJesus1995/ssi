<?php
session_start();
require "conexao.php";



$login = $_POST['login'];
$local = $_POST['local'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$contato = $_POST['contato'];
$endereco = $_POST['endereco'];
$regiao = $_POST['regiao'];

$predio = $_POST['predio'];
$senha = $_POST['senha'];
$botao = $_POST['botao'];


    $salvar_local = "INSERT INTO users (id, login,password, ulocal, phone, email, contact, dateCreated, user_status_id) VALUES ('','$login', '$senha', '$local', '$telefone', '$email', '$contato', NOW(), '$botao')";
    mysqli_query($conexao,$salvar_local);


echo "<script> alert('Chamado Enviado com Sucesso!'); window.location.href='local.php';</script>";





mysqli_close($conexao);
?>

<?php
$id= $_SESSION['id'];
$sql_user="SELECT * FROM users WHERE login ='$login'";
$result = mysqli_query($conexao, $sql_user);

if ($u = mysqli_fetch_assoc($result)) {

    $a = $u['id'];
    $admin_user = "INSERT INTO administrators_users (users_id, admininstrators_id) VALUES ('$a' ,'$id')";
    mysqli_query($conexao, $admin_user);

}
?>
