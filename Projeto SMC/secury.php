<?php
ob_start();

if(($_SESSION['depart'] == "") ||
    ($_SESSION['login'] == "")
    ){

    $_SESSION['secury'] = "Error faça login";
    header("Location: login.php");
    }

    ?>