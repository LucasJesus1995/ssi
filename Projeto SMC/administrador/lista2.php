<?php
session_start();
require "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">


    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="index2.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

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
                <h1 class="h2">Lista de Chamados</h1>
            </div>




                <div class="table-responsive">
                    <table class="table table-striped" id="table1" aria-valuemax="50" >
                        <thead class="bg-primary">
                        <tr>
                            <th class="text-center" style="color: white">ID</th>
                            <th class="text-center" style="color: white">CATEGORIA</th>
                            <th class="text-center" style="color: white">USUÁRIO</th>
                            <th class="text-center" style="color: white">DATA DE ENVIO</th>
                            <th class="text-center" style="color: white">PRORIDADE</th>
                            <th class="text-center" style="color: white">STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

                        $user= $_SESSION['id'];
                        $sql = "SELECT * FROM problems WHERE administrators_id ='$user'";
                        $res = mysqli_query($conexao,$sql);

                        $total = mysqli_num_rows($res);

                        $quantidade = 20;

                        $num = ceil($total/$quantidade);

                        $inicio = ($quantidade*$pagina) - $quantidade;



                        $sql2 = "SELECT * FROM problems WHERE administrators_id ='$user' ORDER BY priorities_id ASC LIMIT $inicio, $quantidade";
                        $res2 = mysqli_query($conexao, $sql2) or die ("errorr");

                        ?>

                        <?php while($rows = mysqli_fetch_assoc($res2)){ ?>
                            <tr>
                                <td class="text-center"><button type="button" class="btn btn-xs btn-link" data-toggle="modal" data-target="#myModal<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></button>
                                </td>
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

                                <td class="text-center"><?php echo $rows['ulocal'] ?></td>
                                <td class="text-center"><?php echo $rows['startDate'] ?></td>
                               <?php
                                if ($rows['priorities_id'] == 1) {
                                echo "<td class='text-center'>Normal</td>";
                                }elseif ($rows['priorities_id'] == 2){
                                echo "<td class='text-center'>Alta</td>";
                                }elseif ($rows['priorities_id'] == 3){
                                echo "<td class='text-center'>Baixa</td>";
                                }else{
                                    echo "Nenhuma Prioridade";
                                }
                                ?>
                                <?php
                                if ($rows['problem_status_id'] == 1) {
                                    echo "<td class='text-center'>" . "<button type='button' class='btn btn-success'>Aberto</button>" . "</td>";
                                }elseif ($rows['problem_status_id'] == 2){
                                    echo "<td class='text-center'>" . "<button type='button' class='btn btn-danger'>Fechado</button>" . "</td>";
                                }elseif ($rows['problem_status_id'] == 3){
                                    echo "<td class='text-center'>" . "<button type='button' class='btn btn-warning'>Em Andamento</button>" . "</td>";
                                }else {
                                    echo "<td class='text-center'>" . "<button type='button' class='btn btn-dark'>Status</button>" . "</td>";
                                }
                                ?>

                            </tr>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Detalhes</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div id="print" class="conteudo">
                                            <img src="">
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <?php echo "<b>Id do Chamado:  </b>".$rows['id']."<br><br>"; ?>
                                                <?php echo "<b>Nome do Usuário:  </b>".$rows['ulocal']."<br><br>"; ?>
                                                <?php echo "<b>Email:  </b>".$rows['email']."<br><br>"; ?>
                                                <?php echo "<b>Telefone:  </b>".$rows['phone']."<br><br>"; ?>
                                                <?php echo "<b>Contato:  </b>".$rows['contact']."<br><br>"; ?>
                                                <?php echo "<b>Data de Abertura:  </b>".$rows['startDate']."<br><br>"; ?>
                                                <?php echo "<b>Data de Fechamento:  </b>".$rows['closedate']."<br><br>"; ?>
                                                <?php
                                                if ($rows['categories_id'] == 1) {
                                                    echo "<b>Categoria:  </b>Hidráulica";
                                                }elseif ($rows['categories_id'] == 2){
                                                    echo "<b>Categoria:  </b>Alvenaria";
                                                }elseif ($rows['categories_id'] == 3){
                                                    echo "<b>Categoria:  </b>Pintura";
                                                }elseif ($rows['categories_id'] == 4) {
                                                    echo "<b>Categoria:  </b>Elétrica";
                                                }elseif ($rows['categories_id'] == 5) {
                                                    echo "<b>Categoria:  </b>Serralheria";
                                                }elseif ($rows['categories_id'] == 6) {
                                                    echo "<b>Categoria:  </b>Carpintaria";
                                                }elseif ($rows['categories_id'] == 7) {
                                                    echo "<b>Categoria:  </b>Marcenaria";
                                                }elseif ($rows['categories_id'] == 8) {
                                                    echo "<b>Categoria:  </b>Manutenção";
                                                }elseif ($rows['categories_id'] == 9) {
                                                    echo "<b>Categoria:  </b>Telhado";
                                                }elseif ($rows['categories_id'] == 10) {
                                                    echo "<b>Categoria:  </b>Jardinagem";
                                                }elseif ($rows['categories_id'] == 11) {
                                                    echo "<b>Categoria:  </b>Geral";
                                                }else{
                                                    echo "<b>Categoria:  </b>";
                                                }
                                                ?><br><br>
                                                <?php echo "<b>Id do Responsável:  </b>".$rows['administrators_id']."<br><br>"; ?>
                                                <?php
                                                if ($rows['problem_status_id'] == 1) {
                                                    echo "<b>Status:  </b>Aberto";
                                                }elseif ($rows['problem_status_id'] == 2){
                                                    echo "<b>Status:  </b>Fechado";
                                                }elseif ($rows['problem_status_id'] == 3){
                                                    echo "<b>Status:  </b>Em Andamento";
                                                }else {
                                                    echo "<b>Status:  </b>";
                                                }
                                                ?><br><br>
                                                <?php echo "<b>Descrição:  </b>".$rows['description']."<br><br>"; ?>
                                                <hr>

                                                <label><b>Nota: </b></label>
                                                <button type="button" class="btn btn-link position-relative" style="left: 380px" title="Clique aqui para adicionar nota"  data-toggle="modal" data-target="#nota<?php echo $rows['id']; ?>"><span data-feather="file-plus"></span></button>
                                                <br>
                                                <a href="nota2.php"><button type="button" class="btn btn-link position-relative" style="left: 420px" title="Clique aqui para acompanhar nota" ><span data-feather="layers"></span></button></a>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6-secondary"> <?php if ($rows['problem_status_id'] == 1){if (isset($_SESSION['nota1'])){
                                                                echo "<label><b>Ultima nota enviada:  </b></label>". $_SESSION['nota1'];
                                                                unset($_SESSION['nota1']);
                                                            }} ?></div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <?php echo "<b>Materiais:  </b>".$rows['']."<br><br>"; ?>
                                                <button name="botao" value="<?php echo $rows['id']; ?>" type="submit" class="btn btn-secondary mb-2" data-dismiss="modal" data-toggle="modal" data-target="#func<?php echo $rows['id']; ?>"><span data-feather="user-plus"></span>  Cadastrar Funcionário</button><br><br>
                                                <?php echo "<b>Solução:  </b>".$rows['solution']."<br><br>"; ?>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <a href="gerarOS.php"> <button type="submit" class="btn btn-primary" >Ordem de Serviço</button> </a>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->


                            <!-- The Modal NOTA -->
                            <div class="modal fade" id="nota<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <!-- Modal Header NOTA -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Adicionar Nota</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                            <!-- Modal body NOTA -->
                                            <div class="modal-body">

                                                <form action="salvarNota2.php" method="post">
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Nota:</label>
                                                        <textarea name='nota' class="form-control" id="message-text"></textarea><br>
                                                        <button name="notaId" type="submit" class="btn btn-secondary" value="<?php echo $rows['id']; ?>">Enviar</button>
                                                    </div>

                                                </form>
                                                <hr>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal NOTA -->

                            <!-- The Modal CADASTRO DE FUNCIONÁRIOS -->
                            <div class="modal fade" id="func<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <!-- Modal Header CADASTRO DE FUNCIONÁRIOS -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cadastrar Funcionário</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                            <!-- Modal body CADASTRO DE FUNCIONÁRIOS -->
                                            <div class="modal-body">

                                                <form action="salvarFuncionario.php" method="post">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nome</label>
                                                            <input name="nome" type="text" class="form-control" id="inputEmail4" placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword4">Função</label>
                                                            <input name="funcao" type="text" class="form-control" id="inputPassword4" placeholder="">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" value="<?php echo $rows['id']; ?>" >Salvar</button>
                                                </form>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal CADASTRO DE FUNCIONÁRIOS -->



                        <?php } $total = mysqli_num_rows($res2); ?>




                        </tbody>
                    </table>

                <hr>

                    <?php
                    $pagina_anterior = $pagina - 1;
                    $pagina_posterior = $pagina + 1;
                    ?>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">

                            <?php if ($pagina_anterior != 0){ ?>
                                <li class="page-item"><a class="page-link" href="lista2.php?pagina=<?php echo $pagina_anterior; ?>">  <<  </a></li>
                            <?php  }else{ ?>
                                <li class="page-item"><a class="page-link" href="#">  <<  </a></li>
                            <?php  } ?>

                            <?php for ($i = 1; $i < $num + 1; $i++){ ?>
                                <li class="page-item"><a class="page-link" href="lista2.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>

                            <?php if ($pagina_posterior <= $num){ ?>
                                <li class="page-item"><a class="page-link" href="lista2.php?pagina=<?php echo $pagina_posterior; ?>"> >> </a></li>
                            <?php  }else{ ?>
                                <li class="page-item"><a class="page-link" href="#">  >>  </a></li>
                            <?php  } ?>

                        </ul>
                    </nav>
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
