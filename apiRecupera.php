<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

$data = file_get_contents("php://input");
$objData = json_decode($data);

$counter = $objData->counter;
$token = $objData->token;

include_once 'includes/conexao.php';

if ($token === "1f3d2gs3f2fg3as2fdg3re2t1we46er45" && isset($token)) {

	//echo("SELECT * FROM tb_usuario ORDER BY dt_cadastro DESC LIMIT {$counter}, 5");

	$query = $con->prepare("SELECT * FROM tb_usuario LIMIT {$counter}, 5");

	$query->execute();

	$retorno = array();

	while($result = $query->fetch()){
		$retorno[] 		= array(
						'id' 	=> $result["cd_usuario"],
						'nome' 	=> $result["nm_usuario"],
						'email' => $result["email"],
						'data' => $result["dt_cadastro"]
		);
	}

	echo(json_encode($retorno));
}else{
	die('Acesso negado!');
}

