
<?php
include_once 'banco.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/global.css">
    <link rel="stylesheet" href="./assets/listarUser.css">
    <title>Lista de Usuários</title>
</head>
<body>
<h1 class="title"> Lista de Usuários cadastrados</h1>

<table rules="all">

<thead>
 <tr>
 <th> Código</th>
 <th> Usuário</th>
 <th> Senha</th>
 <th> CPF</th>
 <th> Email</th>
 <th> Telefone</th>
 <th> Nível</th>
 <th colspan="2"> Opções</th>
 
</tr>
</thead>

<tbody>
<?php

$sql_consulta=mysqli_query($conn ,"SELECT * FROM usuarios");
$total =mysqli_num_rows($sql_consulta);
while ($linhas=mysqli_fetch_array($sql_consulta))

{?>

<tr>
    <td> <?= $linhas[0] ?> </td>
    <td> <?= $linhas[1] ?> </td>
    <td> <?= $linhas[2] ?></td>
    <td> <?= $linhas[3] ?></td>
    <td> <?= $linhas[4] ?></td>
    <td> <?= $linhas[5] ?></td>
    <td> <?= $linhas[6] ?></td>

    <td class="excluir"> 
        <form method="post" action="excluir_user.php?codigo=<?= $linhas[0]?>">
            <input type="submit" style="background: inherit; font-family: inherit; font-size: inherit; color: white; cursor: pointer;" name="excluirBtn" value="Excluir" onclick="return confirm('Deseja deletar este usuário?')">            
        </form>
    </td>
    <td class="editar"><a href="editar_user.php?codigo=<?= $linhas[0]?>"> Editar</a></td>

</tr>
    
    <?php } ?>

<tr class="total">
    <td>Total de Registros: <?=$total?></td>
</tr>

</tbody>

</table>

    <div class="opcoes" style="text-align: center; margin: 40px auto; border: none;">
        <a style="border: 1px solid black; border-radius: 10px; background-color: dodgerblue; padding: 10px;" href="index.html">Voltar</a>
        <a style="border: 1px solid black; border-radius: 10px; background-color: dodgerblue; padding: 10px;" href="relat_user.php">Fazer o download em PDF</a>
    </div>
</body>
</html>