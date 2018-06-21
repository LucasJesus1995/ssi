<?php
include_once "conexao.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Registre-se</h2>
    </div>


<div class="col-md-8 order-md-1">

    <form action="registrado.php" method="post" class="needs-validation" novalidate>
        <div class="row">
        <div class="col-md-6 mb-3">
            <label>Login</label>
            <input type="text" name="login" class="form-control"  placeholder=""  >
            <div class="invalid-feedback">
                O Login válido é obrigatório.
            </div>
        </div>
        </div>
            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">Senha</label>
                <input name="senha" type="password" class="form-control" id="inputCity">
            </div>

        <div class="form-group col-md-4">
            <label for="inputCity">Confirmar Senha</label>
            <input name="senha" type="password" class="form-control" id="inputCity">
        </div>
</div>

        <div class="mb-3">
            <label>Local</label>
            <input type="text" name="local" class="form-control"  placeholder=""  >
            <div class="invalid-feedback">
                O nome válido é obrigatório.
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Telefone</label>
                <input type="tel" name="telefone" class="form-control" placeholder="9999-9999" >
                <div class="invalid-feedback">
                    O telefone válido é obrigatório.
                </div>
            </div>

        <div class="col-md-6 mb-3">
            <label for="email">Email <span class="text-muted"></span></label>
            <input type="email" name="email" class="form-control" placeholder="usuário@exemplo.com">
            <div class="invalid-feedback">
                Por favor, insira um endereço de e-mail válido.
            </div>
        </div>
</div>
        <hr class="mb-4">

        <button name="botao" class="btn btn-primary btn-lg btn-block" type="submit" value="1"><font style="vertical-align:center; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"><font style="vertical-align: inherit;">Enviar Chamado</font></font></button>
    </form>

</div>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<!-- Adicionando Javascript -->
<script type="text/javascript" >

    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");

    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);

        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>

</body>
</html>
