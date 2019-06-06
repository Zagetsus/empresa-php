<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Empresa</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
  <?php require_once 'php/conexao.php'; ?>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="setor.php">Setor</a></li>
        <li><a href="funcionario.php">Funcionário</a></li>
        <li><a href="listagem.php">Listagem</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="setor.php">Setor</a></li>
        <li><a href="funcionario.php">Funcionário</a></li>
        <li><a href="listagem.php">Listagem</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <?php
  $query = "SELECT * FROM setores";
  $exe = mysqli_query($conexao, $query);
  if (mysqli_num_rows($exe) > 0) {
    ?>
    <div class="container">
      <div class="section">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Funcionários</h1>
        <div class="row center">
          <h5 class="header col s12 light">Cadastro de funcionário</h5>
        </div>
        <div class="row">
          <form method="POST" action="php/processa-funcionario.php" class="col s12 center">
            <div class="row">
              <div class="input-field col s12 ">
                <input name="nome" id="first_name" type="text">
                <label for="first_name">Nome do funcionário</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <select name="sexo">
                  <option value="" disabled selected>Escolha seu sexo</option>
                  <option value="m">Masculino</option>
                  <option value="f">Feminino</option>
                  <label>Sexo</label>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input name="data" type="text" class="datepicker" placeholder="Data de aniversário"/>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <select name="setor">
                  <option value="" disabled selected>Escolha o setor</option>
                  <?php
                  while ($listagem = mysqli_fetch_array($exe)) {
                    echo "<option value='$listagem[id_setores]'>$listagem[nome_setor]</option>";
                  }
                  ?>
                  <label>Setor</label>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <textarea name="obs" class="materialize-textarea"></textarea>
                <label for="textarea1">Observações</label>
              </div>
            </div>

            <div class="row center">
              <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php
} else {
  ?>
    <div class="section no-pad-bot">
      <div class="container">
        <br><br><br>
        <h1 class="header center teal-text text-lighten-2">Nenhum setor cadastrado</h1>
        <div class="row center">
          <h5 class="header col s12 light">Por favor, cadastre um setor para inserir um funcionário</h5>
        </div>
        <div class="row center">
          <a href="setor.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Cadastrar setor</a>
        </div>
        <br><br><br>

      </div>
    </div>
  <?php } ?>
  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sobre nós</h5>
          <p class="grey-text text-lighten-4">Somos uma equipe de estudantes de curso técnico trabalhando neste projeto como se fosse nosso trabalho em tempo integral. Qualquer quantia ajudaria a apoiar e continuar o desenvolvimento deste projeto e é muito apreciada.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <p>Luan Verdelho</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.datepicker');
      var instances = M.Datepicker.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function() {
      $('.datepicker').datepicker();
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function() {
      $('select').formSelect();
    });
  </script>
</body>

</html>