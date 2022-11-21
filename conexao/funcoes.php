<?php

function  lerPessoa($pdo, $id_pessoa) {

    $sql = " SELECT id_pessoa, ds_nome, ds_email, dt_nasc, cd_sexo, nr_telefone de tb_pessoa where id_pessoa = :id_pessoa ";

    $statement = $pdo -> prepare ($sql);
    $statement -> bindParam (":id_pessoa", $id_pessoa);
    $statement -> execute ();

    return $statement -> fetch (PDO :: FETCH_ASSOC);
}
