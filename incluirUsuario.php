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
    <h1>Cadastrar Usuário</h1>
<?php 

    if (!isset($_GET ["bt_sub"])) {    // Se for a primeira vez, irá exibir o formulário de cadastro

?>
    <div class="box">
      <form method="GET" action="">
        <label>Nome:</label>
            <input type="text" name="ds_nome" id="nome" placeholder="Digite seu nome completo" required><br><br>
             <br> 

        <label>Sexo:</label>
            <br> 
                <input type="radio" name="cd_sexo" id="masc" value ="M" required>Masculino<br>
                 <input type="radio" name="cd_sexo" id="fem" value ="F" required>Feminino<br> 
                  <input type="radio" name="cd_sexo" id="nao_inf" value ="N" required>Prefiro não informar<br>
                    <br> 
                      <br>

         <label>Data de Nascimento:</label><br>
            <input type="date" name="dt_nasc" id="dtnasc" placeholder="Digite a sua data de nascimento" required><br>
              <br>

        <label>E-mail:</label><br>
            <input type="text" name="ds_email" id="email"  placeholder="Digite o seu E-mail" required><br>
              <br>   
        
        <label>Telefone:</label><br> 
            <input type="text" name="nr_telefone" id="telefone" placeholder="Digite o seu telefone" required>
              <br>
                <br>

        <input type="submit" name="bt_sub" id="submit" value="Inserir"><br>
          <br>
      </form>
    </div>
    <?php

    } else {  
      $ds_nome = $_GET ["ds_nome"];
      $cd_sexo = $_GET ["cd_sexo"];
      $dt_nasc = $_GET ["dt_nasc"]; 
      $nr_telefone = $_GET ["nr_telefone"];
      $ds_email = $_GET ["ds_email"];

   try {
          $sql = "INSERT INTO 'tb_pessoa' (`ds_nome`, `cd_sexo`, `dt_nasc`, `nr_telefone`, `ds_email`, `ds_senha`) VALUES (:ds_nome,:cd_sexo,:dt_nasc,: nr_telefone,:ds_email, :ds_senha');"
            //echo "sql".$sql."FIM";
         
          $res = $pdo->prepare($sql);

          $res -> bindParam (":ds_nome", $ds_nome);
          $res -> bindParam (":cd_sexo", $cd_sexo);
          $res -> bindParam (":dt_nasc", $dt_nasc);
          $res -> bindParam (":nr_telefone", $nr_telefone);
          $res -> bindParam (":ds_email", $ds_email );
          $res -> execute ();
        
          if ($res -> rowCount ()>0) {
             echo "<p>Usuário inserido com sucesso!</p>";
          }
        } catch (PDOException  $e) {
             echo  'Erro: ' .$e -> getMessage ();
        }
    }

    ?><p><a href ="index.php">Página principal</a></p>
</body>
</html>
