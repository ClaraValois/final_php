<?php
    include_once dirname(__DIR__, 3) . '/banco.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <link rel="stylesheet" href="/final_php/assets/global.css">
    <link rel="stylesheet" href="/final_php/assets/estoque.css">
    <title>Estoque</title>
</head>

<body>
    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>

    <main class="main">
        <div class="container">
            <table>
                <caption>
                    Estoque
                </caption>
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Status</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                        $sql_consulta = mysqli_query($conn, "SELECT * FROM produtoteste");
                        $total = mysqli_num_rows($sql_consulta);
                        while ($linhas = mysqli_fetch_array($sql_consulta)) { ?>

                        <tr class="tr">
                        <td data-label="Produto"><?= $linhas[0] ?></td>
                        <td data-label="Quantidade"><?= $linhas[1] ?></td>
                        <td data-label="Status" class="status">
                            <div class="radius" id="statusGreen"><?= $linhas[2] ?></div>
                        </td>
                        <td data-label="Categoria"><?php 
                                $linhas[3] 
                            ?>
                        </td>
                        <td data-label="Ação">
                            <img class="iconEdit" src="/final_php/assets/images/iconEdit.png" alt="icone de edit" id="myBtn">
                        </td>
                    </tr>
                
          <?php } ?>

        </tbody>
            </table>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Retornar aqui o nome do produto</h1>
                    <div class="content">
                        <div class="detailsProduct">
                            <p className="products">Caneta Bic (Caixa)
                            </p>

                            <div class="custom-checkbox">
                                <input type="radio" id="radio_1" name="avaliacao" id="avaliacao_checkbox" value="10">
                                <label for="radio_1"></label>
                            </div>
                        </div>
                    </div>

                    <div class="btnModal">
                        <button class="btn">Remover</button>
                        <button class="btn">Adicionar</button>
                    </div>
                </div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
                };

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                };

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };
            </script>
    </main>
</body>

</html>