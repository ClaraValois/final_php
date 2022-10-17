<?php
//* Gera relatório pdf para impressão*//

include_once 'banco.php';



$html ='<table>'; //* Dentro, será reconhecido código html dentro do documento php*//


$html.='<thead>';
$html.='<tr>'; //* cria linha para os dados*//
$html.='<th> Usuário </th>';
$html.='<th> Senha </th>';
$html.='<th> CPF </th>';
$html.='<th> Email </th>';
$html.='<th>Telefone</th>';
$html.='<th> Nivel</th>';

$html.='</tr>';
$html.='</thead>';


$lista=mysqli_query($conn,"SELECT * FROM usuarios");
//* Faz consulta no banco de dados*//
$total=mysqli_num_rows($lista);

//* Processo de repetição de consulta de todas as informações do banco e as exibe*//
while ($dados=mysqli_fetch_array($lista)){ 

    $html.='<tbody>';
    $html.='<tr>';
    $html.='<td>' .$dados['1']. '</td>'; //* Apresentação de dados, $dados trás a informação de acordo o array correspondente a posição de listaUser*//
    $html.='<td>' .$dados['2']. '</td>';
    $html.='<td>' .$dados['3']. '</td>';
    $html.='<td>' .$dados['4']. '</td>';
    $html.='<td>' .$dados['5']. '</td>';
    $html.='<td>' .$dados['6']. '</td>';
    $html.='</tr>';
   

    $html.='</tbody>';
}

$html.='</table>';

use Dompdf\Dompdf; //* pasta com os recursos necessários*//

include_once 'dompdf/autoload.inc.php';

$dompdf = new DOMPDF();

//* loadhtml responsável por mostrar os dados em html*//
$dompdf -> loadHtml('

<h1> Relatório </h1>'.$html.'

');

//Renderiza o html
$dompdf->render();

//exibe os dados renderizados
$dompdf-> stream(
    
    "LISTA DE USUÁRIOS",
    array(
        "attachment"=> FALSE //false para baixar o pdf, caso seja true o download é automático
    )
);

?>