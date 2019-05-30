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
            $setor = $_POST['setor'];
            
            $query = "INSERT INTO setores(nome) VALUES ('$setor')";
            $insere = mysqli_query($conexao,$query);
            if($insere == 1){
                echo "<script>location.href = '../setor.php';</script>";
            }else{
                echo "<script>location.href = '../setor.php';alert('Erro ao cadastrar');</script>";
            }
            
        ?>
    </body>
</html>