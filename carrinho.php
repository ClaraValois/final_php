<?php

  include_once 'banco.php';

  session_start();
  if (!isset($_SESSION['itens']))
  {
    $_SESSION['itens'] = array();
  }

  if (isset($_GET['add']) && $_GET['add'] == "carrinho") 
  {

    // Adiciona ao carrinho

    $idProduto = $_GET['id'];
    if (!isset($_SESSION['itens'] [$idProduto])) {
      $_SESSION['itens'] [$idProduto] = 1;
    } else {
      $_SESSION['itens'] [$idProduto] += 1;
    }
  }

  // Exibe

  if(count($_SESSION['itens']) == 0) {
    echo "Carrinho Vazio <br><a href='index.php'>Adicionar Itens</a>";
  } else {
    foreach($_SESSION['itens'] as $idProduto => $quantidade) {
      $query = "SELECT * FROM produtoteste WHERE id_prod = '$idProduto'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0){?>

        <table class='resultadoPesquisa'>
        <thead>
          <th scope="col">Produto</th>
          <th scope="col">Modelo</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Categoria</th>
          <th scope="col">Ação</th>
        </thead>
      
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)) {
              $produto = $row['nome_prod'];
              $modelo = $row['modeloProduto'];
              $categoria = $row['id_categoria'];
              ?>

          <tr>
            <td data-label="Produto"><?php echo $produto;?></td>
            <td data-label="Modelo"><?php echo $modelo;?></td>
            <td data-label="Quantidade"><?php echo $quantidade;?></td>
            <td data-label="Categoria">                        
              <?php 
                $consulta_categoria = mysqli_query($conn, "SELECT * FROM categorias WHERE id_categoria = '$categoria'");

                while ($categorias = mysqli_fetch_array($consulta_categoria)) {
                    echo $categorias['descricao'];
                }
              ?>
            </td>
            <td data-label="Ação">
              <button class="btnActions" id="myBtn">Remover</button>
            </td>
          </tr>

            <?php
          }
            
          ?>

          <?php
            }
          ?>
        </tbody>
      </table>

      <?php
      }
    }

?>