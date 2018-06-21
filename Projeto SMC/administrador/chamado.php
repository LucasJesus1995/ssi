<?php
session_start();
require "conexao.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="index2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index2.php">SSI Infraestrutura</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login2.php">Sair</a>
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
                        <a class="nav-link" href="chamado.php">
                            <span data-feather="file"></span>
                            Enviar Chamado
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
                <h1 class="h2">Enviar Chamado</h1>
            </div>


            <form action="save.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label >Informações de Contato</label>
                        <select name="infoContato" class="form-control">
                            <option >Selecione...</option>
                            <?php
                                $user = $_SESSION['id'];

                                $sql_adm= "SELECT * FROM administrators_users";
                                    $query = mysqli_query($conexao, $sql_adm);

                            while ($registro = mysqli_fetch_assoc($query)){


                                $sql_user = "SELECT * FROM users WHERE id = " . $registro['users_id'];
                                $query_user = mysqli_query($conexao, $sql_user);
                                $res_user = mysqli_fetch_assoc($query_user);
                                    $u = $res_user['ulocal'];
                                $a = $registro['users_id'];


                                    echo "<option value='$a'>".$u."</option>";
                                }

                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Contato</label>
                        <input name="contato" type="tel" class="form-control" id="tel" placeholder="" value="" >
                    </div>
                </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label >Horário de Funcionamento</label>
                        <input type="password" class="form-control" name="hr" placeholder="">
                    </div>

                        <div class="form-group col-md-6"">

                            <label>Categoria </label>&nbsp;<a  href=""  data-toggle="modal" data-target="#myModal"><img data-feather="info" ></a>
                            <select class="form-control" name="categoria">
                                <option value="0"> Selecione... </option>
                                <option value="2"> Alvenaria </option>
                                <option value="6"> Carpinaria </option>
                                <option value="4"> Elétrica (lâmpada, tomada, etc)</option>
                                <option value="11"> Geral </option>
                                <option value="1"> Hidraúlica </option>
                                <option value="10"> Jardinagem </option>
                                <option value="8"> Manutenção </option>
                                <option value="7"> Marcearia </option>
                                <option value="3"> Pintura </option>
                                <option value="5"> Serralheria </option>
                                <option value="9"> Telhado </option><br><br>
                            </select>

                        </div>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                        <label>Status </label>&nbsp
                        <select class="form-control" name="status">
                            <option value="0"> Selecione... </option>
                            <option value="1"> Aberto </option>
                            <option value="3"> Em Andamento </option>
                            <option value="2"> Fechado</option>
                            <br><br>
                        </select>

                    </div>



                        <div class="form-group col-md-6">

                            <label>Prioridade </label>&nbsp
                            <select class="form-control" name="prioridade">
                                <option value="0"> Selecione... </option>
                                <option value="1"> Normal </option>
                                <option value="2"> Alta </option>

                                <br><br>
                            </select>

                        </div>
    </div>
                    <div class="form-row">
                    <div class="form-group col-lg">
                        <label for="inputState">Responsável</label>
                        <select id="inputState" class="form-control" name="resp">
                            <option selected>Choose...</option>
                            <?php

                            $sql_responsalvel = "SELECT * FROM administrators";
                            $res_responsavel = mysqli_query($conexao, $sql_responsalvel) or die("Error");

                            while ($responsalvel = mysqli_fetch_array($res_responsavel)) {

                                $idresp = $responsalvel['id'];
                                $info_resp = $responsalvel['login'];

                                echo "<option value='$idresp'>" . $info_resp . "</option>";
                            }

                            ?>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Ferramentas / Materiais</label>
                        <input type="text" class="form-control" id="inputCity" name="material">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Solução</label>
                        <input type="text" class="form-control" id="inputCity" name="solucao">
                    </div>
                </div>

    <button value="" class="btn btn-primary btn-lg btn-block" type="submit" name="enviar"><font style="vertical-align:center; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"><font style="vertical-align: inherit;">Enviar Chamado</font></font></button>
<br><br><br>
    </form>



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
