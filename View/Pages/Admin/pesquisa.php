<?php 
include_once dirname(__DIR__, 3) . '/banco.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSCA</title>
</head>
<body>
    <h1>Pesquisar</h1>
    <form action="">
    <input name="busca" placeholder="pesquise..." type = "text">
    <button type="submit">Enviar </button> 

    </form>
<?php 
if (isset($_GET['busca'])){
?>

<tr>
    <td> Digite algo para pesquisar</td>
</tr>
<?php
}else{
    $pesquisa = $conn->real_escape_string($_GET['busca']);
    $sql_code = "SELECT * FROM usuarios WHERE nome_user LIKE '%$pesquisa%'";
    
    $sql_query =$conn->query($sql_code) or die ("errorsfd" .$conn->error);

    if($sql_query->num_rows == 0){
        ?>
        <td> Nenhum resultado encontrado</td>
    
    <?php 
    }else{
        while ($dados=$sql_query->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $dados['nome_user'];?></td>
        </tr>
        <?php   
        }

    }
    ?>
    <?php
}
   ?>




</body>
</html>