<?php
  
  include_once 'banco.php';
  $lista = "SELECT descricao FROM categorias";
  $categorias = $conn->query($lista);
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
    <h1>Cadastro de Categoria</h1>
    <form action="">
      <select name="categoria" id="categoria">
      <?php
        if ($categorias->num_rows > 0) {
          while ($item = $categorias->fetch_assoc()) {
           echo "<option name='" . $item['descricao'] . "' id='" . $item['descricao'] . "'>" . $item['descricao'] . "</option>";
          }
        }
        ?>
      </select>
    </form>
    </div>
  </body>
</html>