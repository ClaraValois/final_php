<?php
include_once 'banco.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];

$sql_cadastro=mysqli_query( $conn, "INSERT INTO usuarios (nome_user, email_user, cpf, telefone, nivel,senha) values ('$nome','$email','$cpf','$telefone','$nivel','$senha')" );

if ($sql_cadastro==true){

    echo "<script>
    
alert ('usuário cadastrado com sucesso!');
window.location.href='index.html';
        </script>";

}else{
    echo "<script>
    
    alert ('Falha ao cadastrar!');
    window.location.href='cadastroUser.html';
            </script>";
}
?>