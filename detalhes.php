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
  $id = $_GET['id'];
  $query = "SELECT f.nome_funcionario AS nome_funcionario, f.sexo AS sexo, f.data_nasc As data_nasc, f.observacoes As observacoes, s.nome_setor As nome_setor FROM funcionarios f
     INNER JOIN setores s ON f.id_setor = s.id_setores WHERE id_funcionarios = $id";
  $exe = mysqli_query($conexao, $query);
  $listagem = mysqli_fetch_array($exe);
  ?>
  <div class="container">
    <div class="section">
      <br><br>
      <h1 class="header center teal-text text-lighten-2">Detalhes</h1>
      <div class="row center">
        <h5 class="header col s12 light">Detalhes do funcionário <?php echo $listagem['nome_funcionario']; ?></h5>
      </div>
      <form method="POST" action="">
      <table class="highlight responsive-table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Data de nascimento</th>
            <th>obs</th>
            <th>Setor</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
        <?php
        echo "<td><input name='nome' value='$listagem[nome_funcionario]' style='border:0;' type='text'></td>
              <td style='width:100px'>
                <select name='sexo'>
                  <option value='$listagem[sexo]' selected>$listagem[sexo]</option>
                  <option value='m'>Masculino</option>
                  <option value='f'>Feminino</option>
                  <label>Sexo</label>
                </select>
              </td>

              <td style='width:120px'><input name='data' type='text' class='datepicker' value='$listagem[data_nasc]' style='border:0;'/></td>
              <td><textarea name='obs' class='materialize-textarea' style='border:0;'>$listagem[observacoes]</textarea></td>

              <td style='width:240px'>
                <select name='setor'>";
        $sql = "SELECT * FROM setores";
        $exec = mysqli_query($conexao, $sql);
        while ($ler = mysqli_fetch_array($exec)) {
          if ($ler["nome_setor"] ==  $listagem["nome_setor"]){
            echo "<option value='$ler[id_setores]' selected>$ler[nome_setor]</ option>";
          }else{
            echo "<option value='$ler[id_setores]'>$ler[nome_setor]</option>";
          }          
        }
        echo "  </select>
              </td>
              <td>
                <button class='btn-floating waves-effect waves-light' type='submit' name='editar'>
                  <i class='material-icons right'>edit</i>
                </button>
                <button class='btn-floating waves-effect waves-light' type='submit' name='excluir'>
                  <i class='material-icons right'>delete</i>
                </button>
              </td>";
        ?>
          </tr>
        </tbody>
      </table>
      </form>
      <?php
        if(isset($_POST['editar'])){
          $nome = $_POST['nome'];
          $sexo = $_POST['sexo'];
          $data = $_POST['data'];
          $obs = $_POST['obs'];
          $id_setor = $_POST['setor'];

          $queryUpdate = "UPDATE funcionarios SET nome_funcionario = '$nome', sexo = '$sexo', data_nasc = '$data', observacoes = '$obs', id_setor = $id_setor WHERE id_funcionarios = $id";
          $exeUpdate = mysqli_query($conexao, $queryUpdate);
          if($exeUpdate == 1){
            echo "<script>alert('Dados editados com sucesso');location.href = 'detalhes.php?id=$id';</script>";
          }else{
            echo "<script>alert('Erro ao editar');</script>";
          }
        }else if(isset($_POST['excluir'])){
          $queryDelete = "DELETE FROM funcionarios WHERE id_funcionarios = $id";
          $exeDelete = mysqli_query($conexao, $queryDelete);
          if($exeDelete == 1){
            echo "<script>alert('Dados excluidos com sucesso');location.href = 'listagem.php';</script>";
          }else{
            echo "<script>alert('Erro ao excluir');</script>";
          }
        }
      ?>
    </div>
    <br /><br />
  </div>

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