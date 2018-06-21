<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="loading.gif">

    <title>SSI Infraestrutura - Envio de Chamados</title>

    <!-- Bootstrap core CSS -->
    <link href="_css/index.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="_css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/form-validation.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/dashboard.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



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
    <img src="loading.gif" class="align-self-center mr-3" style="width:150px;height:150px;" />
</div>

<div id="conteudo" style="display: none">


<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">SSI Infraestrutura</a>
    <ul class="navbar-nav px-3" style="color:rgba(255,255,255,.5);">
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
                <h1 class="h2">Envio de Chamados</h1>
            </div>

            <div class="container">

                <div class="col-md-8 order-md-1">

                    <form action="salvar.php" method="post" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control"  placeholder="" value="<?php echo $_SESSION['depart'];?>" required>
                                <div class="invalid-feedback">
                                    O nome válido é obrigatório.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control" placeholder="9999-9999" value="<?php echo $_SESSION['tel'];?>" required>
                                <div class="invalid-feedback">
                                    O telefone válido é obrigatório.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted"></span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="usuário@exemplo.com" value="<?php echo $_SESSION['email'];?>">
                            <div class="invalid-feedback">
                                Por favor, insira um endereço de e-mail válido.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Contato</label>
                            <input type="tel" name="contato" class="form-control" id="address" placeholder="" required value="<?php echo $_SESSION['contato'];?>">
                            <div class="invalid-feedback">
                                Favor inserir seu contato.
                            </div>
                        </div>


                        <div class="mb-3">

                            <label>Categoria </label>&nbsp;<a  href=""  data-toggle="modal" data-target="#myModal" title="Definições de Categorias"><img data-feather="info" ></a>
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

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Definições de Categorias</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <h5>Alvenaria</h5>
                                            <p>- Reboco em paredes, muros, etc.</p>
                                            <p>- Assentamento de tijplos e blocos.</p>
                                            <p>- Impermeabilzação em geral.</p>

                                            <br>

                                            <h5>Carpintaria</h5>
                                            <p>- Madeiramento.</p>

                                            <br>

                                            <h5>Elétrica</h5>
                                            <p>- Troca de lâmpadas.</p>
                                            <p>- Instalação de interruptores.</p>
                                            <p>- Iluminação de emergência.</p>

                                            <br>

                                            <h5>Geral</h5>
                                            <p>- Pesquisa de materiais como preço, qualidade, tipo, quantidade e descrição.</p>
                                            <p>- Compra dos materiais.</p>
                                            <p>- Limpeza.</p>
                                            <p>- Organização / Conservação.</p>
                                            <p>- Itens que não entram em classificações anteriores.</p>

                                            <br>

                                            <h5>Hidráulica</h5>
                                            <p>- Conserto de vazamentos em tubulações.</p>
                                            <p>- Troca de reparo em válvulas de descarga.</p>
                                            <p>- Troca de válvulas de descargas, torneiras, registro, etc.</p>
                                            <p>- Calhas e rufos.</p>

                                            <br>

                                            <h5>Jardinagem</h5>
                                            <p>- Corte de grama.</p>

                                            <br>

                                            <h5>Manutenção de equipamentos</h5>
                                            <p>- Microondas.</p>
                                            <p>- Geladeiras.</p>

                                            <br>

                                            <h5>Marcenaria</h5>
                                            <p>- Troca de fechaduras e puxadores.</p>
                                            <p>- Troca de folha de porta.</p>
                                            <p>- Confecção de molduras.</p>
                                            <p>- Colagem de folha de revestimento como fórmica, post formic e lâmina de madeira.</p>
                                            <p>- Polimento com cera / verniz.</p>
                                            <p>- Cordões de acabamento.</p>

                                            <br>

                                            <h5>Pintura</h5>
                                            <p>- Aplicação de verniz.</p>
                                            <p>- Aplicação de latex acrílico e a base d'agua.</p>
                                            <p>- Esmalte e tinta à óleo em madeiras, portas, janelas, grades, etc.</p>
                                            <p>- Criação a base de cal.</p>

                                            <br>

                                            <h5>Serralheria</h5>
                                            <p>- Consertos gerais.</p>

                                            <br>

                                            <h5>Telhado</h5>
                                            <p>- Vazamentos.</p>


                                        </div>
                                    </div>


                                </div>
                            </div>

                        <!-- Fim Modal -->

                        <div class="mb-3">
                            <label>Descrição</label>
                            <textarea style="width:590px; height: 400px;" name="descricao" class="form-control" placeholder="Digite sua Descrição aqui..." maxlength="200"></textarea>
                        </div>

                            <div class="form-group">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>


                        <hr class="mb-4">

                        <button value="1" name="botao"  class="btn btn-primary btn-lg btn-block" type="submit"><font style="vertical-align:center; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"><font style="vertical-align: inherit;">Enviar Chamado</font></font></button>
                    </form>


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
