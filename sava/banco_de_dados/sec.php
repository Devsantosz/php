<?php

//Paramentro de conexao do banco
define('HOST', '127.0.0.1'); //Local do provedor do banco
define('PORT', '5432');     //Porta de entrada
define('DBNAME', 'test');   //Nome do banco de dados
define('USER', 'user');     //Login do banco
define('PASSWORD', 'psswd');    //Senha do banco

try {
    //Paramentros de acesso/conexao
	$dsn = new PDO("pgsql:host=". HOST . ";port=".PORT.";dbname=" . DBNAME .";user=" . USER . ";password=" . PASSWORD, array(PDO::ATTR_PERSISTENT => true)) ;

} catch (PDOException $e) {
	echo 'A conexão falhou e retornou a seguinte mensagem de erro: ' .$e->getMessage();
}

//encerramento da conexão aberta
$dsn = null;

?>