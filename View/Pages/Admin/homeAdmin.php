<?php
session_start();

if (isset($_SESSION['adm'])) {
  echo '';
} else {
  header('location: index.html');
}
?>

<link rel="stylesheet" href="/final_php/assets/homeAdmin.css" />
<link rel="stylesheet" href="/final_php/assets/global.css" />
<link rel="stylesheet" href="/final_php/assets/template.css">

<?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
<?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>
<?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>

<main class="main">
  <!-- <h1 class="title">Seja bem-vindo <?php echo $_SESSION['adm'] . '' ?>, o que você deseja?</h1> -->
  <div class="actions">
    <a href="/cadastrarProduto">
      <button class="btn">Cadastrar novos produtos</button>
    </a>
    <a href="/final_php/View/Pages/Admin/cadastroAdm.html">
      <button class="btn">Cadastrar outros Administradores</button>
    </a>
    <a href="/final_php/View/Pages/Admin/requisicoes.php">
      <button class="btn">Requisições</button>
    </a>

    <a href="/final_php/View/Pages/Admin/estoque.php">
      <button class="btn">Estoque</button>
    </a>
    <a href="/final_php/View/Pages/Admin/listas.php">
      <button class="btn">Listas</button>
    </a>
  </div>
</main>
