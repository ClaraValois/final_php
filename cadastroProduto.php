<<?php
session_start();

include_once("banco.php");

//declaração das variaveis;
$nomeproduto = filter_input(INPUT_POST, 'nomeproduto', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_NUMBER_FLOAT);

//povoamento da tabela;
//$cadProd = "INSERT INTO produtos (nome_prod, descricao, cor, tamanho) VALUES ('$nomeproduto', '$descricao', '$cor', '$tamanho')";
$cadProd = "INSERT INTO produto (nome_prod) VALUES ('$nomeproduto)";
$resultCadProd = mysqli_query($conn, $cadProd);

//checagem do cadastro;
if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'> Produto Cadastrado</p>";
    header("Location: index.php");
} else {
    header("Location: index.php");
    $_SESSION['msg'] = "<p style='color:red;'> Erro ao Cadastrar Produto</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadProd</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form action="listar.php" method="POST" accept-charset="utf-8"> 
    Nome do Produto <input type="text" name ="nomeproduto"><br>
    Descrição do Produto <input type="text" name="descricao"><br>
    Cor do Produto <input type="text" name="cor"><br>
    Tamanho do Produto <input type="number" name="tamanho"><br>
    <input type="submit" name="enviar"><br> 
    </form>
</body>
</html>
