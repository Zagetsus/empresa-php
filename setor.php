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
    $query = "SELECT * FROM setores ORDER BY nome_setor ASC";
    $exe = mysqli_query($conexao, $query);
  ?>
  <div class="container">
    <div class="section">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Setor</h1>
        <div class="row center">
          <h5 class="header col s12 light">Cadastro de Setor</h5>
        </div>
        <div class="row">
            <div class="col s6 m5">
            <?php if(mysqli_num_rows($exe) > 0){ ?>
              <table>
                <thead>
                  <tr>
                      <th></th>
                      <th>Nome do Setor</th>
                      <th>editar</th>
                      <th>excluir</th>
                  </tr>
                </thead>

                <tbody>
                <?php 
                while($listagem = mysqli_fetch_array($exe)){
                  echo "<form method='POST' action=''><tbody>
                    <tr>
                        <td><input name='id' value='$listagem[id_setores]' style='border:0;' type='hidden'></td>
                        <td><input name='nome' value='$listagem[nome_setor]' style='border:0;'></td>
                        <td><button class='btn-floating waves-effect waves-light' type='submit' name='editar'>
                          <i class='material-icons right'>edit</i>
                        </button></td>
                        <td><button class='btn-floating waves-effect waves-light' type='submit' name='excluir'>
                          <i class='material-icons right'>delete</i>
                        </button></td>
                    </tr>
                    </form>";
                }
                ?>
                </tbody>
              </table>
            
            <?php
            if(isset($_POST['editar'])){
              $id = $_POST['id'];
              $nome = $_POST['nome'];

              $queryUpdate = "UPDATE setores SET nome_setor = '$nome' WHERE id_setores = $id";
              $exeUpdate = mysqli_query($conexao, $queryUpdate);
                if($exeUpdate == 1){
                  echo "<script>alert('Dados editados com sucesso');location.href = 'setor.php';</script>";
                }else{
                  echo "<script>alert('Erro ao editar');</script>";
                }
              }else if(isset($_POST['excluir'])){
                $id = $_POST['id'];

                $sql = "SELECT id_setor FROM funcionarios Where id_setor = $id";
                $exeSelecao = mysqli_query($conexao, $sql);

                if(mysqli_num_rows($exeSelecao) == 0){
                  $queryDelete = "DELETE FROM setores WHERE id_setores = $id";
                  $exeDelete = mysqli_query($conexao, $queryDelete);
                  if($exeDelete == 1){
                    echo "<script>alert('Dados excluidos com sucesso');location.href = 'setor.php';</script>";
                  }else{
                    echo "<script>alert('Erro ao excluir');</script>";
                  }
                }else{
                  echo "<script>alert('Não é possivel exluir, funcionários nesse setor');location.href = 'setor.php';</script>";
                }
                
              }
            }else{
            ?>
                <h3 class="header center teal-text text-lighten-2">Nenhum setor cadastrado</h1>
            <?php }?>
            </div>
            <div class="col s6 m7">
              <form class="col s12 center" method="POST" action="php/processa-setor.php">
                  <div class="row">
                      <div class="input-field col s12 ">
                          <input  name="setor" id="first_name" type="text" class="validate">
                          <label for="first_name">Nome do setor</label>
                      </div>
                  </div>
                  
                  <div class="row center">
                      <button class="btn waves-effect waves-light" type="submit" >Enviar
                          <i class="material-icons right">send</i>
                      </button>
                  </div>
              </form>
            </div>
        </div>
    </div>
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

  </body>
</html>
