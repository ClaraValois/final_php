<?php
include_once dirname(__DIR__, 3) . '/banco.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/requisicoes.css">
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <link rel="stylesheet" href="/final_php/assets/global.css">
    <title>Requisições</title>
</head>

<body>
    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>

    <main class="main">
        <div class="container">
            <table>
                <caption>
                    Requisicoes
                </caption>
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Data da requisição</th>
                        <th scope="col">Hora da requisição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
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
                            <td data-label="Data"><?= $linhas[4] ?></td>
                            <td data-label="Hora"><?= $linhas[5] ?></td>
                            <td data-label="Status" class="status">
                                <div class="radius" id="statusGreen"></div>
                            </td>
                            <td data-label="Ações">
                                <button class="btnRequi">Negar</button>
                                <button class="btnRequi">Aceitar</button>
                            </td>                               
                       </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>

<style>
 .btnRequi {
  background: #fff;
  color: rgb(79, 0, 106);
  padding: 0.4rem;
  border: 0.2rem solid rgb(79, 0, 106);
  border-radius: 0.5rem;
  transition: 0.5s;
}

.btnRequi:hover {
  background-color: rgb(79, 0, 106);
color: #fff;}
  
</style>