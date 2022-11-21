<?php
include ("conexao/conexao_bd.php"); 
include ("conexao/funcoes.php"); 
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
    <h1>Alterar Usuário</h1>

    <?php
    if (!isset($_GET ["bt_sub"])) {      // Se primeira vez, o formulário será exibido
      
        $id_pessoa = $_GET ["id"];   
        $pessoa = lerPessoa ($pdo, $id_pessoa);
    ?>

      <form method="GET" action="">
        <input type ="hidden" name="id_pessoa" value = "<?php echo $id_pessoa ?>">
          <label>Nome:</label>
            <input type="text" name="ds_pessoa" id ="nome" value = "<?php echo $pessoa ["ds_nome"]; ?>" placeholder="Digite seu nome completo" required><br><br>
             <br>

        <label>Sexo:</label>
          <input type ="radio" name ="cd_sexo" id ="masc" value ="M" <?php echo  $pessoa ["cd_sexo"]=="M"?" verificado ":"" ?> >Masculino<br>
            <input type ="radio" name ="cd_sexo" id ="fem"  value ="F" <?php echo  $pessoa ["cd_sexo"]=="F"?" marcado ":"" ?> >Feminino<br>
             <input  type ="radio" name ="cd_sexo" id="nao_inf" value="N" <?php echo $pessoa ["cd_sexo"]=="N"?" marcado ":"" ?> >Prefiro não informar<br>
              <br> 
                <br>
    
        <label>Data Nascimento:</label>   
          <input type ="date" name ="dt_nasc" id ="dtnasc" value =" <?php  echo $pessoa ["dt_nasc"] ?>" placeholder="Digite a sua data de nascimento" required><br> 
            <br>

         <label>E-mail:</label>
          <input type ="text" name ="ds_email" id ="email" value ="<?php  echo $pessoa ["ds_email"] ?>" placeholder="Digite o seu E-mail" required><br>
           <br>

        <label>Telefone:</label>
          <input type =" text " name =" nr_telefone " id =" telefone "   value =" <?php  echo  $pessoa [" nr_telefone "] ?>" placeholder="Digite o seu telefone" required>
            <br >

        <input type ="submit" name ="bt_sub" value ="Alterar" >
      </form>

    <?php

    } else {
      $id_pessoa = $_GET ["id_pessoa"];
      $nome_ds = $_GET ["nome_ds"];
      $cd_sexo = $_GET ["cd_sexo"];
      $dt_nasc = $_GET ["dt_nasc"]; 
      $nr_telefone = $_GET ["nr_telefone"];
      $ds_email = $_GET ["ds_email"];

      try {
        
          $sql = "UPDATE `agenda`.`tb_pessoa` SET `ds_nome`=:ds_nome, `cd_sexo`=:cd_sexo, `dt_nasc`=:dt_nasc, `nr_telefone`=:nr_telefone, `ds_email`=:ds_email WHERE `id_pessoa ` = :id_pessoa;";
          
          $res = $pdo -> prepare ($sql);

          $res -> bindParam ( ':ds_nome', $ds_nome);
          $res -> bindParam ( ':cd_sexo' , $cd_sexo);
          $res -> bindParam ( ':dt_nasc' , $dt_nasc);
          $res -> bindParam ( ':nr_telefone' , $nr_telefone);
          $res -> bindParam ( ':ds_email' , $ds_email);
          $res -> bindParam ( ':id_pessoa' , $id_pessoa);
          $res -> execute ();
        
          if ($res -> rowCount ()>0) {
            echo "<p>Registro alterado com sucesso</p>";
          }
        } catch (PDOException  $e) {
          echo  'Erro: ' .$e -> getMessage ();
        }
    }

    ?>
    <p><a href ="index.php">Página principal</a></p>
</body>
</html>