<?php
include_once 'banco.php';

$usuario =$_POST['username'];
$senha =$_POST['password'];

$sql_log=mysqli_query($conn, "SELECT * FROM usuarios WHERE cpf = '$usuario' and senha = '$senha'");


if (mysqli_num_rows($sql_log)!=0){

    header ('location:home.php');
}else{
    echo "<script>
    
    alert ('Usuário não está registrado!');
    window.location.href='index.html';
            </script>";
}



?>