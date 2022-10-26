<?php

include_once dirname(__DIR__, 3) . '/banco.php';

$id_user=$_POST['codigo'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];


$atualizar= mysqli_query( $conn, " UPDATE usuarios SET nome_user='$nome', senha='$senha', email_user='$email', cpf='$cpf',
telefone='$telefone', nivel='$nivel' WHERE id_user='$id_user'" );




    if ($atualizar==true){

        echo "<script>     
                alert ('Dados atualizados com sucesso!');
                window.location.href='./listarUser.php';
            </script>";

    }else{
        echo "<script>
        
        alert ('Falha em editar registro!');
        window.location.href='editar_user.php';
                </script>";
    }
?>