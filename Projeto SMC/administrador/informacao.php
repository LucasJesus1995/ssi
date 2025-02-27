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
    <link rel="icon" href="loading.gif">

    <title>SSI Infraestrutura - Minhas Informações</title>

    <!-- Bootstrap core CSS -->
    <link href="index2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

</head>

<body>


    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index2.php">SSI Infraestrutura</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
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
                            <a class="nav-link active" href="index2.php">
                                <span data-feather="home"></span>
                                Home <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Chamado.php">
                                <span data-feather="file"></span>
                                Envio de Chamados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lista2.php">
                                <span data-feather="list"></span>
                                Lista de Chamados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="busca2.php">
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
                        <li class="nav-item">
                            <a class="nav-link" href="relatorio.php">
                                <span data-feather="bar-chart-2"></span>
                                Relatórios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administrador.php">
                                <span data-feather="clipboard"></span>
                                Área Administrativa
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
                    <h1 class="h2">Atualizar Perfil</h1>
                </div>



                <form action="atualizar2.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Departamento</label>
                            <input name="depart" type="text" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $_SESSION['local']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telefone</label>
                            <input name="tel" type="tel" class="form-control" id="inputPassword4" placeholder="" value="<?php echo $_SESSION['tel']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $_SESSION['email']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputCity">Senha Atual</label>
                            <input name="" type="password" class="form-control" id="inputCity" value="<?php echo $_SESSION['senha']; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Nova Senha</label>
                            <input name="senha" type="password" class="form-control" id="inputZip">
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
