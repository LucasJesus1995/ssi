<?php
include_once ("conexao.php");
@session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="_imagens/loading.gif">

    <title>SSI Infraestrutura</title>

    <!-- Bootstrap core CSS -->
    <link href="_css/login.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/signin.css" rel="stylesheet">
</head>

<?php
    unset($_SESSION['depart'],
    $_SESSION['name'],
    $_SESSION['email'],
    $_SESSION['tel'],
    $_SESSION['id']);
?>

<body class="text-center">
<form class="form-signin" method="post" action="validar.php">
    <span><b>SSI Infraestrutura</b></span>
    <img class="mb-4" src="_imagens/loading.gif" alt="" width="72" height="72">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        <input name="login" type="text" class="form-control" placeholder="Login">
    </div>
    </div>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">

    </div>
    <button name="btnLogin" value="login" class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
    <p class="mt-5 mb-3 text-muted"></p>

    <p class="text-center text-danger">
        <?php
        if (isset($_SESSION['errorlogin'])){
            echo $_SESSION['errorlogin'];
            unset($_SESSION['errorlogin']);
        }
        ?>
    </p>

    <p class="text-center text-danger">
        <?php
        if (isset($_SESSION['secury'])){
            echo $_SESSION['secury'];
            unset($_SESSION['secury']);
        }
        ?>
    </p>

    <div class="popover-header position-relative">
        <a href="administrador/index2.php">
            <button type="button" class="btn btn-link">
                <label data-feather="user" style="color: dimgray"></label>
                Área do Administrador</button><br>
        </a>
    </div>

</form>
</body>
</html>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>