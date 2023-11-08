<?php
require 'init.php';

// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

//Valida a variavel da URL
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql_registro_atendimento = "SELECT id, nome, contato, cnpj, cliente, incidente, chamado, solucao, acessoremoto, automacao, servidor FROM atendimento WHERE id='$id'";
$result_registro_atendimento = $PDO->prepare($sql_registro_atendimento);
$result_registro_atendimento->bindParam(':id', $id, PDO::PARAM_INT);

$result_registro_atendimento->execute();

$resultado_registro_atendimento = $result_registro_atendimento->fetch(PDO::FETCH_ASSOC);

if (!is_array($resultado_registro_atendimento)) {
    echo "Nenhum contato encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="estilo.css" rel="stylesheet" type="text/css">
         <link rel="shortcut icon" href="img/favicon.ico" />
        <title>Atendimento - Linx</title>
    </head>

    <body>
        <div class="container theme-showcase" role="main"> 
            <div class="page-header">
			
				    	    	<!-- Inicio do botão para retornar ao index -->
	       <div class="pull-right">
        <a href="index.php"><button type="button" class="btn btn-default btn-sm">
		<span class="glyphicon glyphicon-menu-left"></span></button></a>
		</div>
		
                <h5>Alteração de Atendimento</h5>
            </div>
            <form action="atendimento_alterar.php" method="POST">

             <input type="hidden" name="id" value="<?php echo $resultado_registro_atendimento['id']; ?>">                     
                            
                
                
                <fieldset>
                    <label for="nome">Nome<br>
                        <textarea name="nome" id="nome" rows="1" cols="50"><?php echo $resultado_registro_atendimento['nome']; ?></textarea>
                    </label>
                    <label for="contato">Contato<br>

                        <textarea name="contato" id="contato" rows="1" cols="50"><?php echo $resultado_registro_atendimento['contato']; ?></textarea>
                    </label>
                </fieldset>        
                
               


               <fieldset>
                    <label for="cnpj">CNPJ<br>
                        <textarea name="cnpj" id="cnpj" rows="1" cols="50"><?php echo $resultado_registro_atendimento['cnpj']; ?></textarea>
                    </label >


                    <label for="cliente">Cliente<br>
                        <textarea name="cliente" id="cliente" rows="1" cols="50"><?php echo $resultado_registro_atendimento['cliente']; ?></textarea>
                    </label>
                </fieldset>

                <fieldset>
                    <label for="incidente">Incidente<br>
                        <textarea name="incidente" id="incidente" rows="3" cols="50"><?php echo $resultado_registro_atendimento['incidente']; ?></textarea>
                    </label>
                    <label for="solucao">Solução<br>
                        <textarea name="solucao" id="solucao" rows="3" cols="50"><?php echo $resultado_registro_atendimento['solucao']; ?></textarea>
                    </label>
                    <br>
                </fieldset>


              
                
               <fieldset>
                    
					<label for="chamado">Chamado<br>
                        <textarea name="chamado" id="chamado" rows="1" cols="50"><?php echo $resultado_registro_atendimento['chamado']; ?></textarea>
                    </label>
					<label for="acessoremoto">PIN<br>
                        <textarea name="acessoremoto" id="acessoremoto" rows="1" cols="50"><?php echo $resultado_registro_atendimento['acessoremoto']; ?></textarea>
                    </label>
                     </fieldset>


                     <label for="servidor">Servidor<br>
                        <textarea name="servidor" id="servidor" rows="1" cols="50"><?php echo $resultado_registro_atendimento['servidor']; ?></textarea>
                    </label>
                     </fieldset>

                     <p>Automação: </p> 
                    <label for="automacao"></label>
                    <select name="automacao" id="automacao">
                    <option value="Linxpos">LinxPOS</option>
                    <option value="Microvix">Microvix</option>
                    <option value="Degust">Degust</option>
                    <option value="AutoSystem">AutoSystem</option>
                    <option value="TacGas">TacGas/Emsys</option>
                    <option value="Seller">Seller</option>
                    <option value="PostoFacil">Posto Fácil</option>
                    <option value="SoftPharma">Softpharma</option>
                    <option value="LinxBig">LinxBig</option>
                    <option value="Apollo">Apollo/DMS</option>
                    <option value="Seta">Seta</option> 
                    <option value="Seta">Outros</option> 
                    </select><?php echo $resultado_registro_atendimento['automacao']; ?></textarea>



                <button type="submit" id="submit" class="btn btn-sm btn-success">Alterar</button>


               

            </form>
        </body>
</html>