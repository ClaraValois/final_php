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
                        <th scope="col">Hora da requisição</th>
                        <th scope="col">Data da requisição</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr">
                        <td data-label="Produto">Resma Papel A4</td>
                        <td data-label="Quantidade">3</td>
                        <td data-label="Hora">17:30</td>
                        <td data-label="Data">06/10/2022</td>
                        <td data-label="Status" class="status">
                            <div class="radius" id="statusGreen"></div>
                        </td>
                    </tr>

                    <tr class="tr">
                        <td data-label="Produto">Caneta Pilot</td>
                        <td data-label="Quantidade">3</td>
                        <td data-label="Hora">10:06</td>
                        <td data-label="Data">01/08/2022</td>
                        <td data-label="Status" class="status">
                            <div class="radius" id="statusRed"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="#">
                <button class="btn">Voltar</button>
            </a>
            </section>
        </div>
    </main>
</body>

</html>