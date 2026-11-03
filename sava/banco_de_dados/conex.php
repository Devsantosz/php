<?php
/***CONEXÃO COM O BD ***/
//Parâmetros utilizados na conexão.
define('HOST', '192.168.52.128');
define('PORT', '5432');
define('DBNAME', 'minimundo');
define('USER', 'postgres');
define('PASSWORD', '159753');
try {
              //Estabelecimento da conexão:
	$dsn = new PDO("pgsql:host=". HOST . ";port=".PORT.";dbname=" . DBNAME .";user=" . USER . ";password=" . PASSWORD);
} catch (PDOException $e) {
	echo 'A conexão falhou e retorno a seguinte mensagem de erro: ' .$e->getMessage();
}
/***PREPARAÇÃO E INSERÇÃO NO BANCO DE DADOS ***/
$instrucaoSQL = "Select id_cliente, nome_cliente, cpf_cliente, email_cliente,data_nascimento_cliente From cliente";
$resultSet = $dsn->query($instrucaoSQL);
?>