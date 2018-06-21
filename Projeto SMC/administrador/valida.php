<?php
session_start();
require "conexao.php";


$login= $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM administrators WHERE login='$login' AND password='$senha'";
$res = mysqli_query($conexao, $sql) or die ("errorr");

if ($registro = mysqli_fetch_assoc($res)) {

    $_SESSION['id'] = $registro['id'];
    $_SESSION['login'] = $registro['login'];
    $_SESSION['senha'] = $registro['password'];
    $_SESSION['local'] = $registro['alocal'];
    $_SESSION['tel'] = $registro['phone'];
    $_SESSION['email'] = $registro['email'];



    $_SESSION['senha'] = $registro['password'];

    header("Location: index2.php");

}else{
    $_SESSION['errorlogin'] = "Error Usuário ou Senha inválidos";
    header("Location: login2.php");
}mysqli_close($conexao);
?>

