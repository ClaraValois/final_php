<?php
include_once 'banco.php';

$usuario =$_POST['username'];
$senha =$_POST['password'];

//$sql_log=mysqli_query($conn, "SELECT * FROM usuarios WHERE cpf = '$usuario' and senha = '$senha'");

$sql = "SELECT * FROM usuarios WHERE cpf = '$usuario' and senha = '$senha'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $nivel= $row["nivel"];
      if($nivel === 'Admin') {
        header('location:homeAdmin.php');

      }else if ($nivel === 'Servidor'){
        header('location:homeUser.php');

      }//acrescentar perfil de usuário qualquer
  }
}

/*if (mysqli_num_rows($sql_log)!=0){
 
    var_dump($sql_log);

    //header('location:homeAdmin.php');
 
}else{
    echo "<script>
    
    alert ('Usuário não está registrado!');
    window.location.href='index.html';
            </script>";
}
*/



?>