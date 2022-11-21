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
    <h1>Excluir Usuário</h1>

    <?php

    if (!isset($_GET ["id"])) {
        echo  '<p>Por favor informe o identificador para exclusão</p>';  // se é primeira vez, o formulário de cdastro será exibibo

    } else {
      $id_pessoa = $_GET ["id"];
  
      try {
          $sql = "DELETE FROM `agenda`.`tb_pessoa` WHERE 'id_pessoa'=',':id_pessoa;";
          $stmt = $pdo -> prepare ($sql);
          $stmt -> bindParam ( ':id_pessoa', $id_pessoa);

          $stmt -> execute ();
        
          if ($stmt -> rowCount ()>0) {
            echo "<p>Usuário excluído com sucesso</p>";
          }
        } catch (PDOException $e) {
          echo 'Erro: ' . $e -> getMessage ();
        }
    }

    ?>
    <p><a href ="index.php">Página principal</a></p>
</body>
</html>