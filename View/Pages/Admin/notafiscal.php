
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>
</head>
<body>
<?php
if (isset($_POST['upload'])){
   $arquivo = $_FILES['file'];
    $arquivoNovo = explode('.',$arquivo['name']);

    if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg'){
            die("você não pode fzer upload deste tipo de arquivo");
    }else{
        echo 'Upload foi feito com sucesso';
        move_uploaded_file($arquivo['tmp_name'],'arquivos/'.$arquivo['name']);
    }

}
?>
    <form method= "POST" enctype="multipart/form-data" action="">
        <p><label for=""> Selecione o arquivo</label>
        <input name="file" type="file"></p>
        <input type="submit" name="upload" value=" Enviar arquivo">
    </form>
    
</body>
</html>