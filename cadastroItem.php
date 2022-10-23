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
    <link rel="stylesheet" href="assets/cadastroItem.css" />
    <link rel="stylesheet" href="assets/global.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edição</title>
  </head>

  <body>
    <h1 class="title">Cadastro de Item</h1>
    <form action="">
      <div class="box">
        <input type="text" name="nome">
        <span class="tag">Nome</span>
      </div>

      <div class="box">
        <span class="tag">Categoria:</span>
        <select name="categoria" id="categoria">
        <?php
          if ($categorias->num_rows > 0) {
            while ($item = $categorias->fetch_assoc()) {
            echo "<option name='" . $item['descricao'] . "' id='" . $item['descricao'] . "'>" . $item['descricao'] . "</option>";
            }
          }
          ?>
        </select>
      </div>
    </form>
    </div>
  </body>
</html>