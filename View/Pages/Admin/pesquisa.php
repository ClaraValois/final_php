<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar com PHP e JavaScript</title>
</head>

<body>
    <h1>Pesquisar Usuário</h1>

    <span id="msg"></span>

    <!-- Início do formulário -->
    <form id="form-pesquisar">
        <label>Pesquisar: </label>
        <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo termo?">

        <input type="submit" id="btn-pesquisar" value="Pesquisar" name="PesquisarUsuario">
    </form>

    <!-- Fim do formulário -->

    <span id="listar-usuarios"></span>

    <script src="/final_php/assets/js/custom.js"></script>
</body>

</html>