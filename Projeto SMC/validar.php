<?php
require "conexao.php";
session_start();

$login= $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM users WHERE login='$login' AND password='$senha'";
$res = mysqli_query($conexao, $sql) or die ("errorr");

if ($registro = mysqli_fetch_assoc($res)) {

    $_SESSION['id'] = $registro['id'];
    $_SESSION['login'] = $registro['login'];
    $_SESSION['senha'] = $registro['password'];
    $_SESSION['depart'] = $registro['ulocal'];
    $_SESSION['tel'] = $registro['phone'];
    $_SESSION['email'] = $registro['email'];
    $_SESSION['contato'] = $registro['contact'];
    $_SESSION['endereco'] = $registro['address'];
    $_SESSION['regiao'] = $registro['idRegion'];
    $_SESSION['horario'] = $registro['operatingHours'];
    $_SESSION['predio'] = $registro['historicalBuilding'];

    header("Location: index.php");

}else{
    $_SESSION['errorlogin'] = "Error Usuário ou Senha inválidos";
    header("Location: login.php");
}mysqli_close($conexao);
?>

