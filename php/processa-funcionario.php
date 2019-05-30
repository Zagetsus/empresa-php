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
        <?php
            require_once 'conexao.php';
            $nome = $_POST['nome'];
            print_r($_POST);exit;
            $query = "INSERT INTO funcionarios(nome, sexo, datanascimento, observacoes, id_setor) VALUES 
            ('$nome')";
            $insere = mysqli_query($conexao,$query);
            if($insere == 1){
                echo "<script>location.href = '../funcionario.php';</script>";
            }else{
                echo "<script>location.href = '../funcionario.php';alert('Erro ao cadastrar');</script>";
            }
            
        ?>
    </body>
</html>