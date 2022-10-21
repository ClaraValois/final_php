<?php
session_start();
 if(isset($_SESSION['normal'])){
echo '';
} else{
  header('location:index.html');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/homeUser.css" />
  <link rel="stylesheet" href="/assets/template.css">

</head>

<body>
  <main class="main">
    <h1>SEJA BEM-VINDO <?php echo $_SESSION['normal']. '' ?>!</h1>

    <div class="containerInput">
      <span id="msg"></span>
      <form action="" id="form-pesquisar">
        <div class="searchbox">
          <input name="texto_pesquisar" id="btn-pesquisar" type="text" class="searchinput" placeholder="Buscar produto desejado..." />
      </form>
      <span id="listar-usuarios"></span>

          <button class="searchbutton">
            <img class="iconSearch"
              src="/Resources/Assets/Imagens/iconSearch.png" alt="">
          </button>
        </div>
      </div>
      <!-- <a href="/requisicoes"> -->
      <button type="submit" class="btn">Requisições</button>
      <!-- </a> -->
      <a href='index.html'>Sair</a>
    </main>

    <script>

   // Receber o seletor form-pesquisar
const formPesquisar = document.getElementById("form-pesquisar");

    // Verificar se existe o form-pesquisar
    if (formPesquisar) {
      // Aguardar o submit, quando o usuário clicar no botão executa a função
      formPesquisar.addEventListener("submit", async (e) => {

        // Bloquear para não recarregar a página
        e.preventDefault();

        // Substituir o texto do botão para pesquisando
        document.getElementById("btn-pesquisar").value = "Pesquisando...";

        // Receber os dados do formulário
        const dadosForm = new FormData(formPesquisar);

        // Imprimir o valor que vem do formulário
        /*for( var dadosFormPesq of dadosForm.entries()){
            console.log(dadosFormPesq[0] + " - " + dadosFormPesq[1]);
        }*/

        // Fazer a requisição para o arquivo pesquisar.php
        const dados = await fetch("pesquisar.php", {
          method: "POST",
          body: dadosForm
        });

        // Ler os dados retornado do arquivo pesquisar.php
        const resposta = await dados.json();
        //console.log(resposta);

        // Acessa o IF quando não retornar nenhum usuário do banco de dados
        if (!resposta['status']) {
          // Enviar a mensagem de erro do JavaScript para o HTML
          document.getElementById("msg").innerHTML = resposta['msg'];
        } else {
          // Substituir a mensagem de erro
          document.getElementById("msg").innerHTML = "";
          // Enviar a lista de usuário do JavaScript para o HTML
          document.getElementById("listar-usuarios").innerHTML = resposta['dados'];
        }

        // Substituir o texto do botão para pesquisar
        document.getElementById("btn-pesquisar").value = "Pesquisar";
      });
    }
  </script>
</body>

</html>