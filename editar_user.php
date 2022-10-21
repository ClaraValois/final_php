<?php
include_once 'banco.php';

$id_user =$_GET['codigo'];

$sql_consulta=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_user = '$id_user'");

$dados=mysqli_fetch_array($sql_consulta);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/cadastro.css" />
    <link rel="stylesheet" href="assets/global.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edição</title>
  </head>

  <body>
    <h1 class="title">Editar usuários</h1>
    <div class="tudo">
      <div class="bloco1">
        <form method = "POST" action="atualizar.php" class="form">
        
        <input type = "hidden" name = "codigo" value='<?= $dados[0]?>'>
          <div class="box">
            <input type="text" name="nome" required value='<?= $dados[1]?>'/>
            <span>Nome completo</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name=" cpf"required value='<?= $dados[3]?>'/>
            <span>CPF</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name = "tel" required  value='<?= $dados[5]?>' />
            <span>Telefone</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name ="email" required value='<?= $dados[4]?>'/>
            <span>E-mail</span>
            <i></i>
          </div>

          <div class="box">
            <input type="password" name = "senha" required value='<?= $dados[2]?>' />
            <span>Senha</span>
            <i></i>
          </div>

      <br> <!-- O nome nível está contido na página, mas não aparece por conta da falta de CSS, 
        para ver que existe, basta selecionar com o cursor-->
        <select name = "nivel" id = "nivel" >
            <option value='Admin'> Administrador</option>
            <option value = "Servidor"> Servidor</option>
        </select>
        
       <input type ="submit" value="Atualizar">
        </form>
        
      </div>
    </div>
  </body>
</html>