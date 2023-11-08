<?php
 
require_once 'init.php';

// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null; 
$contato = isset($_POST['contato']) ? $_POST['contato'] : null;  
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;
$incidente = isset($_POST['incidente']) ? $_POST['incidente'] : null;
$chamado = isset($_POST['chamado']) ? $_POST['chamado'] : null;
$solucao = isset($_POST['solucao']) ? $_POST['solucao'] : null;
$acessoremoto = isset($_POST['acessoremoto']) ? $_POST['acessoremoto'] : null;
$automacao = isset($_POST['automacao']) ? $_POST['automacao'] : null;
$servidor = isset($_POST['servidor']) ? $_POST['servidor'] : null;
//$dataatual = isset($_POST['dataatual']) ? $_POST['dataatual'] : null;
$dataatual = date('Y-m-d H:m:s'); 

// validação para evitar dados vazios
//if (empty($nome) || empty($contato) || empty($cnpj) || empty ($cliente) || empty($incidente) || empty($chamado))
//{
   // echo "Volte e preencha todos os campos";
   // exit;
//}

// insere no banco
$PDO = db_connect();
$sql_msg_atendimentos = "INSERT INTO atendimento(nome, contato, cnpj, cliente, incidente, chamado, solucao, acessoremoto, automacao, servidor, dataatual) VALUES(:nome, :contato, :cnpj, :cliente, :incidente, :chamado, :solucao, :acessoremoto, :automacao, :servidor, :dataatual)";
$insert_registro_atendimento = $PDO->prepare($sql_msg_atendimentos);
$insert_registro_atendimento->bindParam(':nome', $nome);
$insert_registro_atendimento->bindParam(':contato', $contato); 
$insert_registro_atendimento->bindParam(':cnpj', $cnpj);
$insert_registro_atendimento->bindParam(':cliente', $cliente);
$insert_registro_atendimento->bindParam(':incidente', $incidente);
$insert_registro_atendimento->bindParam(':chamado', $chamado);
$insert_registro_atendimento->bindParam(':solucao', $solucao);
$insert_registro_atendimento->bindParam(':acessoremoto', $acessoremoto);
$insert_registro_atendimento->bindParam(':automacao', $automacao);
$insert_registro_atendimento->bindParam(':servidor', $servidor);
$insert_registro_atendimento->bindParam(':dataatual' , $dataatual);



if ($insert_registro_atendimento->execute()){
    header('Location: index.php');
}else{
    echo "Erro ao cadastrar";
    print_r($insert_registro_atendimento->errorInfo());
}
 
 
 
 
 
