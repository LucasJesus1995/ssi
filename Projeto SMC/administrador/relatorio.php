<?php
session_start();
require "conexao.php";?>

<!DOCTYPE html>
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
                    <h1 class="h2">Relatórios</h1>
                </div>

<br><br><br>

                <?php
                $id1 = $_SESSION['id'];
                $chamado = "SELECT * FROM problems WHERE administrators_id='$id1'";
                $r = mysqli_query($conexao, $chamado) or die ("errorr");
                $conta = mysqli_num_rows($r);

                ?>

                <?php
                $aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1'"; // Alterar condições para filtrar registros

                $query = mysqli_query($conexao,$aberto);

                $qtde = mysqli_num_rows($query);

                ?>

                <?php
                $fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2'"; // Alterar condições para filtrar registros

                $query = mysqli_query($conexao,$fechado);

                $qtde2 = mysqli_num_rows($query);

                ?>

                <?php
                $andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='101'"; // Alterar condições para filtrar registros

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

                <br><br>

                <?php
                if(isset($_POST['per'])){
                    $pesquisar = $_POST['per'];
                    //Selecionar  os itens da página
                    $sqlBusca = "SELECT * FROM problems WHERE startDate LIKE '%$pesquisar%' LIMIT 30";
                    $result = mysqli_query($conexao , $sqlBusca);
                }else{
                    //Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
                    $pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

                    //Selecionar todos os itens da tabela
                    $result_busca = "SELECT * FROM problems";
                    $resultado_busca = mysqli_query($conexao , $result_busca);

                    //Contar o total de itens
                    $total = mysqli_num_rows($resultado_busca);

                    //Seta a quantidade de itens por página
                    $quantidade_pg = 20;

                    //calcular o número de páginas
                    $num = ceil($total/$quantidade_pg);

                    //calcular o inicio da visualizao
                    $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

                    //Selecionar  os itens da página
                    $sql = "SELECT * FROM problems limit $inicio, $quantidade_pg";
                    $result = mysqli_query($conexao , $sql);
                    $total = mysqli_num_rows($result);
                }
                ?>
                <div class="container theme-showcase" role="main">
                    <hr><br>
                    <form class="form-horizontal" method="POST" action="">
                        <div class="form-row">
                            <label>Período: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="form-group col-md-2">
                                <label>De</label>
                                <input name="per" type="text" class="form-control" placeholder="YYYY-mm-dd">
                            </div>
                            <div class="form-group col-md-2">
                                <label> Até </label>
                                <input name="" type="text" class="form-control" placeholder="YYYY-mm-dd">
                            </div>
                            <div class="col-sm-2 position-relative" style="top: 28px">
                                <button name="busca" type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                            </div>
                        </div>
                    </form>


                    <br>

                    <hr>

                    <br>

                    <form method="POST" action="excelEspecifica.php">
                        <div class="row justify-content-end">
                            <div class="pull-right">
                                <div class="btn-group mr-2">
                                    <a href="gerarPlanilha.php"><button type="button" class="btn btn-success btn-sm position-relative" data-dismiss="modal">Gerar Planilha  <img src="excel.png" style="height: 20px"/></button></a>
                                </div>
                                <div class="btn-group mr-2">
                                    <button type="submit" class="btn btn-success btn-sm position-relative" data-dismiss="modal">Planilha Especifica  <img src="excel.png" style="height: 20px"/></button>
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center" style="color: white"><span data-feather="check-square"></span></th>
                                        <th class="text-center" style="color: white">ID</th>
                                        <th class="text-center" style="color: white">USUÁRIO</th>
                                        <th class="text-center" style="color: white">CATEGORIA</th>
                                        <th class="text-center" style="color: white">PRIORIDADE</th>
                                        <th class="text-center" style="color: white">STATUS</th>
                                        <th class="text-center" style="color: white">AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <?php $id = $row["id"]; ?>
                                            <td class="text-center">
                                                <?php echo "<input type='checkbox' name='msg_contato[$id]' value='1'" ?>
                                            </td>
                                            <td class="text-center"><?php echo $row["id"]; ?></td>
                                            <td class="text-center"><?php echo $row["ulocal"]; ?></td>
                                            <?php
                                            if ($row['categories_id'] == 1) {
                                                echo "<td class='text-center'>Hidráulica</td>";
                                            }elseif ($row['categories_id'] == 2){
                                                echo "<td class='text-center'>Alvenaria</td>";
                                            }elseif ($row['categories_id'] == 3){
                                                echo "<td class='text-center'>Pintura</td>";
                                            }elseif ($row['categories_id'] == 4) {
                                                echo "<td class='text-center'>Elétrica</td>";
                                            }elseif ($row['categories_id'] == 5) {
                                                echo "<td class='text-center'>Serralheria</td>";
                                            }elseif ($row['categories_id'] == 6) {
                                                echo "<td class='text-center'>Carpintaria</td>";
                                            }elseif ($row['categories_id'] == 7) {
                                                echo "<td class='text-center'>Marcenaria</td>";
                                            }elseif ($row['categories_id'] == 8) {
                                                echo "<td class='text-center'>Manutenção</td>";
                                            }elseif ($row['categories_id'] == 9) {
                                                echo "<td class='text-center'>Telhado</td>";
                                            }elseif ($row['categories_id'] == 10) {
                                                echo "<td class='text-center'>Jardinagem</td>";
                                            }elseif ($row['categories_id'] == 11) {
                                                echo "<td class='text-center'>Geral</td>";
                                            }else{
                                                echo "Nenhuma Categoria";
                                            }
                                            ?>
                                            <?php
                                            if ($row['problem_status_id'] == 1) {
                                                echo "<td class='text-center'>" . "<button type='button' class='btn btn-success'>Aberto</button>" . "</td>";
                                            }elseif ($row['problem_status_id'] == 2){
                                                echo "<td class='text-center'>" . "<button type='button' class='btn btn-danger'>Fechado</button>" . "</td>";
                                            }elseif ($row['problem_status_id'] == 3){
                                                echo "<td class='text-center'>" . "<button type='button' class='btn btn-warning'>Em Andamento</button>" . "</td>";
                                            }else {
                                                echo "<td class='text-center'>" . "<button type='button' class='btn btn-dark'>Status</button>" . "</td>";
                                            }
                                            ?>
                                            <td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row["startDate"])); ?></td>
                                            <td class="text-center">
                                                <a href="" data-toggle="modal" data-target="#modalEye<?php echo $row["id"]; ?>" title=" Visualizar Detalhes ">
                                                    <img data-feather="eye">
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- The Modal VISUALIZAR -->
                                        <div class="modal fade" id="modalEye<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <!-- Modal Header VISUALIZAR -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detalhes</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body VISUALIZAR -->
                                                    <div class="modal-body">
                                                        <?php echo "<b>Id do Chamado:  </b>".$row['id']."<br><br>"; ?>
                                                        <?php echo "<b>Nome do Usuário:  </b>".$row['ulocal']."<br><br>"; ?>
                                                        <?php echo "<b>Email:  </b>".$row['email']."<br><br>"; ?>
                                                        <?php echo "<b>Telefone:  </b>".$row['phone']."<br><br>"; ?>
                                                        <?php echo "<b>Contato:  </b>".$row['contact']."<br><br>"; ?>
                                                        <?php echo "<b>Data de Abertura:  </b>".$row['startDate']."<br><br>"; ?>
                                                        <?php echo "<b>Data de Fechamento:  </b>".$row['closedate']."<br><br>"; ?>
                                                        <?php
                                                        if ($row['categories_id'] == 1) {
                                                            echo "<b>Categoria:  </b>Hidráulica";
                                                        }elseif ($row['categories_id'] == 2){
                                                            echo "<b>Categoria:  </b>Alvenaria";
                                                        }elseif ($row['categories_id'] == 3){
                                                            echo "<b>Categoria:  </b>Pintura";
                                                        }elseif ($row['categories_id'] == 4) {
                                                            echo "<b>Categoria:  </b>Elétrica";
                                                        }elseif ($row['categories_id'] == 5) {
                                                            echo "<b>Categoria:  </b>Serralheria";
                                                        }elseif ($row['categories_id'] == 6) {
                                                            echo "<b>Categoria:  </b>Carpintaria";
                                                        }elseif ($row['categories_id'] == 7) {
                                                            echo "<b>Categoria:  </b>Marcenaria";
                                                        }elseif ($row['categories_id'] == 8) {
                                                            echo "<b>Categoria:  </b>Manutenção";
                                                        }elseif ($row['categories_id'] == 9) {
                                                            echo "<b>Categoria:  </b>Telhado";
                                                        }elseif ($row['categories_id'] == 10) {
                                                            echo "<b>Categoria:  </b>Jardinagem";
                                                        }elseif ($row['categories_id'] == 11) {
                                                            echo "<b>Categoria:  </b>Geral";
                                                        }else{
                                                            echo "<b>Categoria:  </b>";
                                                        }
                                                        ?><br><br>
                                                        <?php echo "<b>Id do Responsável:  </b>".$row['administrators_id']."<br><br>"; ?>
                                                        <?php
                                                        if ($row['problem_status_id'] == 1) {
                                                            echo "<b>Status:  </b>Aberto";
                                                        }elseif ($row['problem_status_id'] == 2){
                                                            echo "<b>Status:  </b>Fechado";
                                                        }elseif ($row['problem_status_id'] == 3){
                                                            echo "<b>Status:  </b>Em Andamento";
                                                        }else {
                                                            echo "<b>Status:  </b>";
                                                        }
                                                        ?><br><br>
                                                        <?php echo "<b>Descrição:  </b>".$row['description']."<br><br>"; ?>
                                                        <hr>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <!-- Fim Modal VISUALIZAR -->

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <?php
                    if(!isset($_POST['busca'])){
                        //Verificar pagina anterior e posterior
                        $pagina_anterior = $pagina - 1;
                        $pagina_posterior = $pagina + 1;
                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <?php if ($pagina_anterior != 0){ ?>
                                    <li class="page-item"><a class="page-link" href="busca2.php?pagina=<?php echo $pagina_anterior; ?>">  <<  </a></li>
                                <?php  }else{ ?>
                                    <li class="page-item"><a class="page-link" href="#">  <<  </a></li>
                                <?php  } ?>

                                <?php for ($i = 1; $i < $num + 1; $i++){ ?>
                                    <li class="page-item"><a class="page-link" href="busca2.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>

                                <?php if ($pagina_posterior <= $num){ ?>
                                    <li class="page-item"><a class="page-link" href="busca2.php?pagina=<?php echo $pagina_posterior; ?>"> >> </a></li>
                                <?php  }else{ ?>
                                    <li class="page-item"><a class="page-link" href="#">  >>  </a></li>
                                <?php  } ?>

                            </ul>
                        </nav>
                    <?php } ?>
                </div>






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