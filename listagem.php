<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Empresa</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php require_once 'php/conexao.php';?>
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
    $query = "SELECT id_funcionarios, nome_funcionario, data_nasc  FROM funcionarios";
    $exe = mysqli_query($conexao, $query);
    if(mysqli_num_rows($exe) > 0){
  ?>
  <div class="container">
    <div class="section">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">listagem</h1>
        <div class="row center">
          <h5 class="header col s12 light">Listagem de funcionários</h5>
        </div>
        <table class="highlight">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th></th>
            </tr>
            </thead>
            <?php 
              while($listagem = mysqli_fetch_array($exe)){
                echo "<tbody>
                  <tr>
                      <td>$listagem[nome_funcionario]</td>
                      <td>$listagem[data_nasc]</td>
                      <td><a href='detalhes.php?id=$listagem[id_funcionarios]'>Detalhes</a></td>
                  </tr>
                </tbody>";
              }
            ?>
            
        </table>
    </div>
    <br/><br/>
  </div>
  <?php 
    }else{
    ?>
  <div class="section no-pad-bot">
      <div class="container">
        <br><br><br>
        <h1 class="header center teal-text text-lighten-2">Nenhum funcionário cadastrado</h1>
        <div class="row center">
          <h5 class="header col s12 light">Para fazer a listagem é preciso que haja funcionários cadastrados</h5>
        </div>
        <div class="row center">
          <a href="funcionario.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Cadastrar funcionário</a>
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

  </body>
</html>
