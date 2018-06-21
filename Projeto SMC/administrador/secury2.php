<?php
ob_start();

if(($_SESSION['depart'] == "") ||
    ($_SESSION['name'] == "")
){

    $_SESSION['secury'] = "Error faça login";
    header("Location: login2.php");
}

?>