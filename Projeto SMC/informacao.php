<?php
    session_start();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="_imagens/loading.gif">

    <title>SSI Infraestrutura - Minhas Informações</title>

    <!-- Bootstrap core CSS -->
    <link href="_css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/dashboard.css" rel="stylesheet">

    <script>
        var i = setInterval(function () {

            clearInterval(i);

            // O código desejado é apenas isto:
            document.getElementById("loading").style.display = "none";
            document.getElementById("conteudo").style.display = "inline";

        }, 3000);
    </script>

</head>

<body>

<div id="loading" class="text-center position-relative" style="top: 250px;display: block">
    <img src="_imagens/loading.gif" class="align-self-center mr-3" style="width:150px;height:150px;" />
</div>

<div id="conteudo" style="display: none">


<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">SSI Infraestrutura</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php">Sair</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <span data-feather="home"></span>
                            Home <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="envioChamado.php">
                            <span data-feather="file"></span>
                            Envio de Chamados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista.php">
                            <span data-feather="list"></span>
                            Lista de Chamados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="busca.php">
                            <span data-feather="search"></span>
                            Busca
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informacao.php">
                            <span data-feather="users"></span>
                            Minhas Informações
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Manual de Utilização do Sistema SSI</span>&nbsp;
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Minhas Informações</h1>
            </div>



            <form action="atualizar.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Departamento</label>
                        <input name="depart" type="text" class="form-control" placeholder="" value="<?php echo $_SESSION['depart'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefone</label>
                        <input name="tel" type="tel" class="form-control" placeholder="" value="<?php echo $_SESSION['tel'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="" value="<?php echo $_SESSION['email'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Principal Contato</label>
                        <input type="tel" class="form-control" placeholder="" value="<?php echo $_SESSION['contato'];?>">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Endereço</label>
                        <input name="end" type="text" class="form-control" placeholder="" value="<?php echo $_SESSION['endereco'];?>">
                    </div>
                    <div class="form-group col-md-6">

                        <label>Região </label>
                        <select class="form-control" name="reg">
                            <option value=""> Selecione... </option>
                            <option value="1"> Norte </option>
                            <option value="2"> Sul </option>
                            <option value="3"> Leste</option>
                            <option value="4"> Oeste</option>
                            <option value="5"> Centro</option>
                            <br><br>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Horário de Funcionamento</label>
                        <input name="hr" type="text" class="form-control" placeholder="" value="<?php echo $_SESSION['horario']; ?>">
                    </div>
                <div class="form-group col-md-6 position-relative" style="top: 7px">
                    <label">Prédio Tombado</label>
                    <select class="form-control" name="predio">
                        <option value="0"> Selecione... </option>
                        <option value="1"> Sim </option>
                        <option value="2"> Não </option>
                    </select>
                </div>
    </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputCity">Senha Atual</label>
                        <input name="" type="password" class="form-control" id="inputCity" value="<?php echo $_SESSION['senha'];?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Nova Senha</label>
                        <input name="senha" type="password" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Confirmar Senha</label>
                        <input name="senha" type="password" class="form-control" id="inputZip">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>


            </form>
</div>
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false,
            }
        }
    });
</script>
</body>
</html>
