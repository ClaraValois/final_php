<?php
  include_once 'banco.php';

  $lista = "SELECT * FROM area_depar";
  $depars = $conn->query($lista);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/cadastro.css" />
    <link rel="stylesheet" href="assets/global.css" />
    <script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script> 
    <script type="text/javascript" src="./node_modules/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de usuário</title>
  </head>
  <body>
    <div class="tudo">
      <div class="bloco1">
        <form method="POST" action="cadastroUser.php" class="form" id="form">
          <ul class="title">
            <a href="index.html">
              <li>Login</li>
            </a>

          </ul>

          <div class="box">
            <input type="text" name="nome" id="nome" placeholder="João Silva" required />
            <span>Nome completo</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name="cpf" id="cpf" placeholder="123.456.789-00" pattern="[0-9]+" required />
            <span>CPF</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name="tel" id="telefone" placeholder="(XX)(9)1234-5678" required />
            <span>Telefone</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name="email" id="email" placeholder="exemplo@exemplo.com" required />
            <span>E-mail</span>
            <i></i>
          </div>

          <div class="box">
            <input type="password" name="senha" id="senha" required />
            <span>Senha</span>
            <i></i>
          </div>
          <!-- <input type="submit" value="Cadastrar" class="btn"> -->
          <div class="box">
        <span class="tag">Departamento:</span>
        <br>
        <br>
        <select name="depar" id="depar">
         <?php
         if ($depars->num_rows > 0) {
          while ($depar = $depars->fetch_assoc()) {
          echo "<option name='" . $depar['depar'] . "' id='" . $depar['depar'] . "' value='" . $depar['id_area'] . "'>" . $depar['depar'] . "</option>";
          }
        }
          ?>
        </select>
      </div>
   
        </form>
        <button class="btn" onClick="validar()">Cadastrar</button>

      </div>
    </div>
    <script>
      // https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html

        var options =  {
          onKeyPress: function(tel, e, field, options) {
          var masks = ['(00) 0000-00009', '(00) 0 0000-0009'];
          var mask = (tel.length > 14) ? masks[1] : masks[0];
          $('#telefone').mask(mask, options);
        }};

        jQuery(document).ready(function($){ 
          $("#cpf").mask("000.000.000-00");
        });
       
        jQuery(document).ready(function($){ 
          $("#telefone").mask("(00) 0000-00009", options);
        });
      
        function validar() {
        var nome = document.getElementById('nome').value;
        var email = document.getElementById('email').value;
        var telefone = document.getElementById('telefone').value;
        var cpf = document.getElementById('cpf').value;
        var senha = document.getElementById('senha').value;
        var form = document.getElementById('form');

        telefone = telefone.replace(/\s+/g, "");

        let regexNome = (/^.{3,40}$/).test(nome);
        let regexEmail = (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/).test(email);
        let regexTelefone = (/^(?:\()[0-9]{2}(?:\))\s?[0-9]{4,5}(?:-)[0-9]{4}$/).test(telefone);
        let regexCpf = (/^([0-9]{2}[\.][0-9]{3}[\.]?[0-9]{3}[\/][0-9]{4}[-][0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.][0-9]{3}[-][0-9]{2})$/).test(cpf);
        let regexSenha = (/^.{6,15}$/).test(senha);

        // Validação de Email

        if(!regexNome) {
          alert("Nome inválido. Por favor, insira seu nome e sobrenome (máximo de 40 caracteres).");
        }

        if(!regexEmail) {
          alert("Valor inválido de email.");
        }

        // Validação de telefone

        if(!regexTelefone) {
          alert("Valor inválido de telefone. A formatação deve incluir traços e parênteses do DDD.");
        }

        // Validação CPF

        if(!regexCpf) {
          alert("Valor inválido de CPF. A formatação deve incluir pontos e traços.");
        }

        // Validação de Senha

        if(!regexSenha) {
          alert("Valor inválido para senha. Sua senha deve conter entre 6 e 15 caracteres.");
        }

        // Envio do formulário

        if(regexNome && regexEmail && regexTelefone && regexCpf && regexSenha) {
          form.submit();
        }
      }
    </script>
  </body>
</html>