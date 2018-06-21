<?php

require "conexao.php";

function retorna($infoContato, $conexao){
    $result_contato = "SELECT * FROM tblusers WHERE fname = '$infoContato' LIMIT 1";
    $result = mysqli_query($conexao,$result_contato);
    if(mysqli_num_rows($result)){
        $row_contato = mysqli_fetch_assoc($result);
        $valor['contato'] = $row_contato['phone'];

    }else{
        $valor['contato'] = 'Contato não Encontrado';
    }

    return json_encode($valor);

}

if (isset($_GET['infoContato'])){
    echo retorna($_GET['infoContato'], $conexao);
}

?>