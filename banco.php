<?php
$host="localhost";
$usuario="root";
$senha="";
$bd="almox3";
  $conn = mysqli_connect($host, $usuario,$senha,$bd);

  if(!$conn){
    die("Conexão com Banco de dados falhou");
  }
?>