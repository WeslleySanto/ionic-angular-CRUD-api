<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

$data = file_get_contents("php://input");
$objData = json_decode($data);

$id = $objData;

include_once 'includes/conexao.php';

if(isset($id) && $id !== " "){
	
	$query = $con->prepare("DELETE FROM tb_usuario WHERE cd_usuario = {$id}");

	if($query->execute()){
		echo "Deletado com sucesso!";
	}else{
		echo "Problema ao deletar!";
	}
}