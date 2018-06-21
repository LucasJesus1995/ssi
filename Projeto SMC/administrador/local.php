<?php
session_start();
require "conexao.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="index2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index2.php">SSI Infraestrutura</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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
                        <a class="nav-link" href=lista2.php>
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
                    <span>Saved reports</span>
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
                <h1 class="h2">Locais</h1>
            </div>

            <div class="row justify-content-end">
                <div class="pull-right">
                    <div class="btn-group mr-2">
                        <a href="cadastrarLocal.php"><button type="button" class="btn btn-primary btn-sm position-relative"> <span data-feather="file-text" style="height: 20px"></span>  Cadastrar Local</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table class="table table-striped position-relative" style="width: 1010px">
                <thead>
                <tr class="bg-primary">

                    <th></th>
                    <th scope="col" class="text-center" style="color: white">LOCAL</th>
                    <th scope="col" class="text-center" style="color: white">TELEFONE</th>
                    <th scope="col" class="text-center" style="color: white">EMAIL</th>
                    <th scope="col" class="text-center" style="color: white">PRINCIPAL CONTATO</th>
                    <th scope="col" class="text-center" style="color: white">HORÁRIO DE FUNCIONAMENTO</th>

                </tr>
                </thead>
                <tbody>

                <?php

                $sql2 = "SELECT * FROM users";
                $res2 = mysqli_query($conexao, $sql2) or die ("errorr");

                ?>

                <?php    while ($rows = mysqli_fetch_assoc($res2)){ ?>


                <tr>
                    <td><button type="button" class="btn btn-xs btn-link" data-toggle="modal" data-target="#modalEditar<?php echo $rows['id']; ?>" title="Editar Local"><span data-feather="edit" ></span></button></td>
                    <td class="text-center"><?php echo $rows['ulocal'];  ?></td>
                    <td class="text-center"><?php echo $rows['phone'];  ?></td>
                    <td class="text-center"><?php echo $rows['email'];  ?></td>
                    <td class="text-center"><?php echo $rows['contact'];  ?></td>
                    <td class="text-center"><?php echo $rows['operatingHours'];  ?></td>

                    <!-- The Modal EDITAR -->
                    <div class="modal fade" id="modalEditar<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <!-- Modal Header EDITAR -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Local</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div id="print" class="conteudo">
                                    <img src="">
                                    <!-- Modal body EDITAR -->
                                    <div class="modal-body">
                                        <form action="editarLocal.php" method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Departamento</label>
                                                    <input name="depart" type="text" class="form-control"  placeholder="" value="<?php echo $rows['ulocal'];  ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Telefone</label>
                                                    <input name="tel" type="tel" class="form-control"  placeholder="<?php echo $rows['phone'];  ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input name="email" type="email" class="form-control" placeholder="" value="<?php echo $rows['email'];  ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Principal Contato</label>
                                                    <input name="contato" type="tel" class="form-control" placeholder="" value="<?php echo $rows['contact'];  ?>">
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Endereço</label>
                                                    <input name="end" type="text" class="form-control" id="inputAddress" placeholder="" value="<?php echo $rows['address'];  ?>">
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
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Horário de Funcionamento</label>
                                                    <input name="hr" type="text" class="form-control" id="inputPassword4" placeholder="" value="<?php echo $rows['operatingHours'];  ?>">
                                                </div>

                                                <div class="form-group col-md-6">

                                                    <label>Prédio Tombado </label>
                                                    <select name="predio" class="form-control" name="predio">
                                                        <option value=""> Selecione... </option>
                                                        <option value="1"> Sim </option>
                                                        <option value="2"> Não </option>
                                                        <br><br>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Senha Atual</label>
                                                    <input name="senha" type="password" class="form-control" id="inputCity" value="<?php echo $rows['password'];  ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputZip">Trocar Senha</label>
                                                    <input name="senha" type="text" class="form-control" id="inputZip" value="ssi2018">
                                                </div>
                                            </div>
                                            <button name="editLocal" type="submit" class="btn btn-primary" value="<?php echo $rows['id']; ?>">Atualizar</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal EDITAR -->

                    <?php
                    }
                    ?>

                </tr>

                </tbody>
            </table>

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
<script src="bootstrap.min.js"></script>

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
