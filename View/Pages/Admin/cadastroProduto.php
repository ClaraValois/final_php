<?php
    session_start();

    include_once dirname(__DIR__, 3) . '/banco.php';

    //declaração das variaveis;
    $nomeProduto = $_POST['nomeproduto'];
    $categoriaProduto = $_POST['categoria'];
    $quantidadeProduto = $_POST['quantidade'];

    //povoamento da tabela;
    $sql_cadastro = mysqli_query($conn, "INSERT INTO produtoteste (nome_prod, id_categoria, quantDisp) VALUES ('$nomeProduto', '$categoriaProduto', '$quantidadeProduto')");

    //checagem do cadastro;
    if ($sql_cadastro==true){

        echo "<script>        
                alert ('Produto cadastrado com sucesso!');
                window.location.href='homeAdmin.php';
            </script>";
    
    }else{
        echo "<script>                    
                    alert ('Falha ao cadastrar Produto!');
                    window.location.href='cadastroProduto.html';
                </script>";
    }
