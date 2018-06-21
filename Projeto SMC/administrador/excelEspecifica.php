<?php
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Relatório</title>
    <head>
<body>
<?php
if(isset($_POST['msg_contato'])){
    // Definimos o nome do arquivo que será exportado
    $arquivo = 'Relatorio_Especifico.xls';

    // Criamos uma tabela HTML com o formato da planilha
    $html = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="5">Planilha Relatório de Chamados</tr>';
    $html .= '</tr>';


    $html .= '<tr>';
    $html .= '<td><b>ID</b></td>';
    $html .= '<td><b>ID USUÁRIO</b></td>';
    $html .= '<td><b>LOCAL</b></td>';
    $html .= '<td><b>TELEFONE</b></td>';
    $html .= '<td><b>EMAIL</b></td>';
    $html .= '<td><b>CONTATO</b></td>';
    $html .= '<td><b>ID PROPRIEDADE</b></td>';
    $html .= '<td><b>ID CATEGORIA</b></td>';
    $html .= '<td><b>DESCRIÇÃO</b></td>';
    $html .= '<td><b>SOLUÇÃO</b></td>';
    $html .= '<td><b>ID STATUS</b></td>';
    $html .= '<td><b>ID ADNINISTRADOR</b></td>';
    $html .= '<td><b>DATA DE ENVIO</b></td>';

    $html .= '</tr>';

    foreach($_POST['msg_contato'] as $id => $msg_contato){
        //echo "ID do item: $id <br>";
        //Selecionar todos os itens da tabela
        $result = "SELECT * FROM problems WHERE id = $id LIMIT 1";
        $resultado = mysqli_query($conexao , $result);

        while($row = mysqli_fetch_assoc($resultado)){
             $html .= '<tr>';
    $html .= '<td>'.$row["id"].'</td>';
    $html .= '<td>'.$row["users_id"].'</td>';
    $html .= '<td>'.$row["ulocal"].'</td>';
    $html .= '<td>'.$row["phone"].'</td>';
    $html .= '<td>'.$row["email"].'</td>';
    $html .= '<td>'.$row["contact"].'</td>';
    $html .= '<td>'.$row["priorities_id"].'</td>';
    $html .= '<td>'.$row["categories_id"].'</td>';
    $html .= '<td>'.$row["description"].'</td>';
    $html .= '<td>'.$row["solution"].'</td>';
    $html .= '<td>'.$row["problem_status_id"].'</td>';
    $html .= '<td>'.$row["administrators_id"].'</td>';
    $data = date('d/m/Y H:i:s',strtotime($row["startDate"]));
    $html .= '<td>'.$data.'</td>';
    $html .= '</tr>';
    ;
    }}
    // Configurações header para forçar o download
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
    // Envia o conteúdo do arquivo
    echo $html;
    exit;
}else{
    echo "Nenhum item selecionado";
}

?>
</body>
</html>