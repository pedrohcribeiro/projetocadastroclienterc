<?php 
session_start();
require_once 'init.php';

//Recuperar o id da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

//Validar o id
if(empty($id)){
	echo "ID não informado";
	exit;
}
//Remover o contato do banco de dados
$PDO = db_connect();
$sql_registro_atendimentos = "DELETE FROM atendimento WHERE id = :id ";
$delete_registro_atendimento = $PDO->prepare($sql_registro_atendimentos);
$delete_registro_atendimento->bindParam(':id', $id, PDO::PARAM_INT);

if($delete_registro_atendimento->execute()){
	$_SESSION['sucesso'] = "Sucesso";
	header('Location: index.php');
}else{
	$_SESSION['erro'] = "erro";
	header('Location: index.php');
}