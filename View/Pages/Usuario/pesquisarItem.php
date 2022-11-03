<?php
  include_once dirname(__DIR__, 3) . '/banco.php';

  if (isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM produtoteste WHERE nome_prod LIKE '{$input}%' OR modeloProduto LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0){?>
      
      <table class='resultadoPesquisa'>
        <thead>
          <th scope="col">Produto</th>
          <th scope="col">Modelo</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Categoria</th>
          <th scope="col">Status</th>
          <th scope="col">Ação</th>
        </thead>

        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)) {
              $id_prod = $row['id_prod'];
              $produto = $row['nome_prod'];
              $modelo = $row['modeloProduto'];
              $quantidade = $row['quantDisp'];
              $categoria = $row['id_categoria'];
              $status = $row['id_disponibilidade'];
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
            <td data-label="Status">
              <?php
                switch($status) {
                  case 1:
                      echo "<div class='radius statusGreen'></div>";
                      break;
                  case 2:
                      echo "<div class='radius statusRed'></div>";
                      break;
                  case 3:
                      echo "<div class='radius statusYellow'></div>";
                      break;
                  default:
                      echo "<div class='radius statusGray'></div>";
                }
              ?>
            </td>
            <td data-label="Ação">
              <button class="btnActions" id="myBtn">
                <?php
                  echo "<a style='text-decoration: none; color: inherit;' href='/final_php/carrinho.php?add=carrinho&id=" . $id_prod . "'>
                          Adicionar ao Carrinho
                      </a>"?>
              </button>
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
    } else {
      echo "<span class='wrong'>Nenhuma correspondência encontrada.</span>";
    }
?>