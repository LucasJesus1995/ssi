<?php
session_start();
require "conexao.php";

$not = $_POST['nota'];
$notaId = $_POST['notaId'];

$id= $_SESSION['id'];

$admin = "SELECT * FROM administrators_users WHERE users_id ='$id'";
$res_admin = mysqli_query($conexao, $admin);

if ($registro = mysqli_fetch_array($res_admin)) {

    $a = $registro['admininstrators_id'];


    $sql = "INSERT INTO notes (problems_id, administrator_id, users_id, note, note_date) VALUES ('$notaId','$a', '$id', '$not', NOW())";
    $res = mysqli_query($conexao, $sql) or die ("errorr");
}
mysqli_close($conexao);




    $_SESSION['nota1'] = $not;
    header("Location: lista.php");

?>