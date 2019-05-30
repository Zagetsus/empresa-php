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
            $sexo = $_POST['sexo'];
            $data = $_POST['data'];
            $obs = $_POST['obs'];
            $id_setor = $_POST['setor'];

            $query = "INSERT INTO funcionarios(nome_funcionario, sexo, data_nasc, observacoes, id_setor) VALUES 
            ('$nome', '$sexo', '$data', '$obs', '$id_setor')";

            $insere = mysqli_query($conexao,$query);
            if($insere == 1){
                echo "<script>location.href = '../funcionario.php';</script>";
            }else{
                echo "<script>location.href = '../funcionario.php';alert('Erro ao cadastrar');</script>";
            }
            
        ?>
    </body>
</html>