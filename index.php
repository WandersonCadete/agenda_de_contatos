<?php
include ("conexao/conexao_bd.php");   
?>

<!DOCTYPE html>
<html lang ="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <título>Agenda de Contatos</título>
</head>
<body>
<body>
    <h1>Agenda de Contatos</h1>
    <?php 

    $sql = "SELECT 'id_pessoa', 'ds_nome', 'ds_email' FROM tb_pessoa";

    $statement = $pdo -> prepare ($sql);
    $statement -> execute ();
    $linha = $statement -> fetchAll (PDO :: FETCH_ASSOC);  

    echo  '<table border="1">';
    echo  '<tr><th>Id</th><th>Nome</th><th>Email</th><th colspan="2">Ações</th></tr>' ;
    foreach ($linha as $pessoa){
        echo "<tr>".
            "<td>".$pessoa["id_pessoa"]."</td>".
            "<td>".$pessoa["ds_nome"]."</td>".
            "<td>".$pessoa["ds_email"]."</td>".
            "<td><a href= ".'"excluirUsuario.php?id='.$pessoa ["id_pessoa"]. '">Excluir</a></td>' .
            "<td><a href= ".'"alterarUsuario.php?id='.$pessoa ["id_pessoa"]. '">Alterar</a></td>';
            "</tr> ";
    }
    echo '</table>';
    ?>
    <p><a href ="incluirUsuario.php">Incluir um novo usuário</a></p>
</body>
</html>