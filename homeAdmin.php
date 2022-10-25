<?php
session_start();
if (isset($_SESSION['adm'])) {

  echo '';
} else {
  header('location:index.html');
}
?>
<link rel="stylesheet" href="assets/homeAdmin.css" />
<link rel="stylesheet" href="assets/global.css" />
<link rel="stylesheet" href="assets/template.css">

<aside>
  <div class="container">
    <div class="navigation">
      <div class="menu-toggle"></div>
      <ul class="list">
        <li class="list-item active" style="--color:#f44336">
          <a href="/homeAdmin.php">
            <span class="icon">
              <img src="assets/images/iconHome.png" alt="">
              <!-- <ion-icon name="home-outline"></ion-icon> -->
            </span>
            <span class="text">Home</span>
          </a>
        </li>
        <li class="list-item" style="--color:#ffa117">
          <a href="#">
            <span class="icon">
              <img src="assets/images/iconList.png" alt="">

              <!-- <ion-icon name="alert-outline"></ion-icon> -->
            </span>
            <span class="text">Estoque</span>
          </a>
        </li>
        <li class="list-item" style="--color:#0fc70f">
          <a href="#">
            <span class="icon">
              <ion-icon name="call-outline"></ion-icon>
            </span>
            <span class="text">Requisições</span>
          </a>
        </li>
        <li class="list-item" style="--color:#2196f3">
          <a href="#">
            <span class="icon">
              <ion-icon name="grid-outline"></ion-icon>
            </span>
            <span class="text">Cadastros</span>
          </a>
        </li>
        <li class="list-item" style="--color:#b145e9">
          <a href="listas.php">
            <span class="icon">
              <img src="assets/images/iconList.png" alt="">
              <!-- <ion-icon name="pencil-outline"></ion-icon> -->
            </span>
            <span class="text">Listas</span>
          </a>
        </li>
        <li class="list-item" style="--color:#b145e9"><a href="#">
            <span class="icon">
              <ion-icon name="pencil-outline"></ion-icon>
            </span>
            <span class="text">Relatórios</span>
          </a></li>
      </ul>
    </div>
  </div>
</aside>

<script>
  const menuToggle = document.querySelector('.menu-toggle');
  const navigation = document.querySelector('.navigation');
  menuToggle.onclick = () => {
    navigation.classList.toggle('open');
  }

  const listItems = document.querySelectorAll('.list-item');
  listItems.forEach(item => {
    item.onclick = () => {
      listItems.forEach(item => item.classList.remove('active'));
      item.classList.add('active');
    }
  })
</script>

<header>

  <div>
    <a href="/home">
      <img class="imgHeader" src="assets/images/LogoHeader.png" alt="" />
    </a>
  </div>
  <div class="details">
    <img class="iconUser" src="assets/images/iconUser.png" alt="">
    <p>Olá,</p>
    <p><?php echo $_SESSION['adm'] . '' ?></p>

    <a href="/carrinho">
      <img class="iconCar" src="assets/images/carrinhovector.png" alt="">
    </a>
  </div>

</header>

<main class="main">
  <!-- <h1 class="title">Seja bem-vindo <?php echo $_SESSION['adm'] . '' ?>, o que você deseja?</h1> -->
  <div class="actions">
    <a href="/cadastrarProduto">
      <button class="btn">Cadastrar novos produtos</button>
    </a>
    <a href="cadastroAdm.html">
      <button class="btn">Cadastrar outros Administradores</button>
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

<div class="footer">
  <div class="column">
    <p>Sistema Almoxarifado</p>
    <p>2022</p>
  </div>
</div>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  .container {
    width: 100%;
    min-height: 100vh;
    /* display: flex;
  justify-content: flex-start;
  align-items: center; */
    background: #3d4152;
  }

  .navigation {
    /* position: fixed; */
    /* inset: 20px 0 20px 20px; */
    width: 75px;
    min-height: 500px;
    background: #fff;
    transition: 0.5s;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .navigation.open {
    width: 200px;
  }

  .navigation .menu-toggle {
    position: absolute;
    /* position: fixed; */
    top: 0;
    left: 0;
    width: 5rem;
    height: 60px;
    /* border-bottom: 1px solid rgba(0, 0, 0, 0.25); */
    cursor: pointer;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 0 20px;
  }

  .navigation .menu-toggle::before {
    content: '';
    position: absolute;
    width: 30px;
    height: 2px;
    background: #333;
    transform: translateY(-8px);
    transition: 0.5s;
  }

  .navigation.open .menu-toggle::before {
    transform: translateY(0) rotate(45deg);
  }

  .navigation .menu-toggle::after {
    content: '';
    position: absolute;
    width: 30px;
    height: 2px;
    background: #333;
    transform: translateY(8px);
    transition: 0.5s;
    box-shadow: 0 -8px 0 #333;
  }

  .navigation.open .menu-toggle::after {
    transform: translateY(0) rotate(-45deg);
    box-shadow: none;
  }

  .navigation ul {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
  }


  .navigation ul li {
    list-style: none;
    position: relative;
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 0 10px;
    cursor: pointer;
    transition: 0.5s;
  }

  .navigation ul li.active {
    transform: translateX(30px);
  }

  .navigation.open ul li.active {
    transform: translateX(10px);
  }

  .navigation ul li a {
    text-decoration: none;
    position: relative;
    display: flex;
    justify-content: flex-start;
    text-align: center;
    align-items: center;
  }

  .navigation ul li a .icon {
    position: relative;
    display: block;
    min-width: 55px;
    height: 55px;
    line-height: 60px;
    color: #222;
    border-radius: 10px;
    font-size: 1.75em;
    transition: 0.5s;
  }

  .navigation ul li.active a .icon {
    color: #fff;
    background: var(--color);
  }

  .navigation ul li a .icon::before {
    content: '';
    position: absolute;
    top: 10px;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    background: var(--color);
    filter: blur(8px);
    opacity: 0;
    transition: 0.5s;
  }

  .navigation ul li.active a .icon::before {
    opacity: 0.5;
  }

  .navigation ul li a .text {
    position: relative;
    padding: 0 15px;
    height: 60px;
    display: flex;
    align-items: center;
    color: #333;
    opacity: 0;
    visibility: hidden;
    transition: 0.5s;
  }

  .navigation.open ul li a .text {
    opacity: 1;
    visibility: visible;
  }

  .navigation ul li.active a .text {
    color: var(--color);
  }
</style>