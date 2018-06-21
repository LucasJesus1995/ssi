<?php
session_start();
require "secury.php";;
require "conexao.php";?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="_imagens/loading.gif">


    <title>SSI Infraestrutura - Home</title>

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
                <h1 class="h2"><?php echo $_SESSION['depart']?></h1>
            </div>

            <div class="card">

                <div class="card-header text-justify">

                <?php echo $_SESSION['login']."<br>".$_SESSION['tel']."<br>". $_SESSION['email'];?>
                </div>
            </div>
            <br><br><br>


                            <?php
                            $id1 = $_SESSION['id'];
                            $chamado = "SELECT * FROM problems WHERE users_id='$id1'";
                            $r = mysqli_query($conexao, $chamado) or die ("errorr");
                            $conta = mysqli_num_rows($r);

                            ?>

                            <?php
                            $aberto = "SELECT id FROM problems WHERE users_id='$id1' AND problem_status_id ='1'"; // Alterar condições para filtrar registros

                            $query = mysqli_query($conexao,$aberto);

                            $qtde = mysqli_num_rows($query);

                            ?>

                            <?php
                            $fechado = "SELECT id FROM problems WHERE users_id='$id1' AND problem_status_id ='2'"; // Alterar condições para filtrar registros

                            $query = mysqli_query($conexao,$fechado);

                            $qtde2 = mysqli_num_rows($query);

                            ?>

                            <?php
                            $andamento = "SELECT id FROM problems WHERE users_id='$id1' AND problem_status_id ='3'"; // Alterar condições para filtrar registros

                            $query = mysqli_query($conexao,$andamento);

                            $qtde3 = mysqli_num_rows($query);

                            ?>

            <div class="col-sm-6">
            <div class="card border border-secondary">
            <table class="table table-borderless">
                <thead class="bg-primary">
                <tr>
                    <th scope="col" class="text-center" style="color: white">Estatisticas</th>
                    <th scope="col" class="text-center" style="color: white">Total</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="text-center">Chamados</th>
                    <td class="text-center"><?php echo $conta; ?></td>

                </tr>
                <tr>
                    <th scope="row" class="text-center">Abertos</th>
                    <td class="text-center"><?php echo $qtde; ?></td>

                </tr>
                <tr>
                    <th scope="row" class="text-center">Em Andamento</th>
                    <td class="text-center"><?php echo $qtde3; ?></td>

                </tr>
                <tr>
                    <th scope="row" class="text-center">Fechado</th>
                    <td class="text-center"><?php echo $qtde2; ?></td>

                </tr>
                </tbody>
            </table>
            </div>
            </div>

            <br><br><br>




            <div class="card border border-light">


                <label><b>Chamados em Aberto</b></label>

            <table class="table table-striped">
                <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-center" style="color: white">ID</th>
                    <th scope="col" class="text-center" style="color: white;">CATEGORIA</th>
                    <th scope="col" class="text-center" style="color: white">DESCRIÇÃO</th>
                    <th scope="col" class="text-center" style="color: white">STATUS</th>
                </tr>
                </thead>
                <tbody>

                <?php

                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

                $id1 = $_SESSION['id'];
                $sql = "SELECT * FROM problems WHERE users_id='$id1' ";
                $res = mysqli_query($conexao,$sql);

                $total = mysqli_num_rows($res);

                $quantidade = 5;

                $num = ceil($total/$quantidade);

                $inicio = ($quantidade*$pagina) - $quantidade;



                $sql2 = "SELECT * FROM problems WHERE users_id='$id1' ORDER BY problem_status_id ASC LIMIT $inicio, $quantidade";
                $res2 = mysqli_query($conexao, $sql2) or die ("errorr");

                ?>

                <?php    while ($rows = mysqli_fetch_array($res2)){ ?>

                   <?php if ($rows['problem_status_id'] == 1) { ?>
                     <tr>
                            <td class="text-center"><?php echo $rows['id']; ?></td>
                         <?php
                         if ($rows['categories_id'] == 1) {
                             echo "<td class='text-center'>Hidráulica</td>";
                         }elseif ($rows['categories_id'] == 2){
                             echo "<td class='text-center'>Alvenaria</td>";
                         }elseif ($rows['categories_id'] == 3){
                             echo "<td class='text-center'>Pintura</td>";
                         }elseif ($rows['categories_id'] == 4) {
                             echo "<td class='text-center'>Elétrica</td>";
                         }elseif ($rows['categories_id'] == 5) {
                             echo "<td class='text-center'>Serralheria</td>";
                         }elseif ($rows['categories_id'] == 6) {
                             echo "<td class='text-center'>Carpintaria</td>";
                         }elseif ($rows['categories_id'] == 7) {
                             echo "<td class='text-center'>Marcenaria</td>";
                         }elseif ($rows['categories_id'] == 8) {
                             echo "<td class='text-center'>Manutenção</td>";
                         }elseif ($rows['categories_id'] == 9) {
                             echo "<td class='text-center'>Telhado</td>";
                         }elseif ($rows['categories_id'] == 10) {
                             echo "<td class='text-center'>Jardinagem</td>";
                         }elseif ($rows['categories_id'] == 11) {
                             echo "<td class='text-center'>Geral</td>";
                         }else{
                             echo "Nenhuma Categoria";
                         }
                         ?>

                         <td class="position-relative" style="left: 100px">
                        <?php

                        $max = 50;
                        $str = $rows['description'];

                        echo substr_replace($str, (strlen($str) > $max ? '...' : ''), $max); ?>
                    </td>

                    <?php
                    if ($rows['problem_status_id'] == 1) {
                        echo "<td class='text-center'>" . "<button type='button' class='btn btn-success'>Aberto</button>" . "</td>";
                    }
                    }}
                    ?>

                    </tr>

                </tbody>
            </table>

                <?php
                $pagina_anterior = $pagina - 1;
                $pagina_posterior = $pagina + 1;
                ?>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                        <?php if ($pagina_anterior != 0){ ?>
                            <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $pagina_anterior; ?>">  <<  </a></li>
                        <?php  }else{ ?>
                            <li class="page-item"><a class="page-link" href="#">  <<  </a></li>
                        <?php  } ?>

                        <?php for ($i = 1; $i < $num + 1; $i++){ ?>
                            <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <?php if ($pagina_posterior <= $num){ ?>
                            <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $pagina_posterior; ?>"> >> </a></li>
                        <?php  }else{ ?>
                            <li class="page-item"><a class="page-link" href="#">  >>  </a></li>
                        <?php  } ?>

                    </ul>
                </nav>
            </div><br>

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