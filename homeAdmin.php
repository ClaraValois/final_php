<?php
session_start();
if (isset($_SESSION['adm'])){

  echo 'Bem-vindo '.$_SESSION['adm']. ' - Administrador';
} else{
  header('location:index.html');
}
  ?>
<link rel="stylesheet" href="assets/homeAdmin.css" />
<link rel="stylesheet" href="assets/global.css" />


<main class="main">
  <h1 class="title">Seja bem vindo(a), o que você deseja?</h1>
  <div class="actions">
    <a href="/cadastrarProduto">
      <button class="btn">Cadastrar novos produtos</button>
    </a>
    <a href="/requisicoesAdmin">
      <button class="btn">Requisições</button>
    </a>

    <a href="/estoque">
      <button class="btn">Estoque</button>
    </a>
    <a href="listas.php">
      <button class="btn">Listas</button>
    </a>
    
  </div>
</main>
