<?php
//CONEXÃO COM O BANCO DE DADOS (DATABASE)

$host = "localhost:3306";             
$dbname = "agenda";            
$user = "root";    
$password = "271140";                 

$dsn = "mysql:host=$host;dbname=$dbname; charset=UTF8";

try {
	$pdo = new PDO($dsn, $user, $password);
    
    if ($pdo) {
        echo "Conexão com Banco de Dados $dbname realizada com sucesso!";  
    }
} catch (PDOException $e) {
	echo "Erro ao conectar com o Banco de Dados: ".$e->getMessage();

} catch (Exception $e) {
	echo " Erro genérico: " . $e -> getMessage ();
}

?>