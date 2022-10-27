<?php
    session_start();

    include_once dirname(__DIR__, 3) . '/banco.php';

    //declaração das variaveis;
    $nomeproduto = $_POST['nomeproduto'];
    $categoriaProduto = $_POST['categoria'];

    //povoamento da tabela;
    $sql_cadastro = mysqli_query($conn, "INSERT INTO produtoteste (nome_prod, id_categoria) VALUES ('$nomeproduto', '$categoriaProduto')");

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
