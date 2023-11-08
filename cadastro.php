<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
		
		
                <h5>Cadastro de Atendimento</h5>
            </div>
  
            
            <form action="atendimento_cadastro.php" method="POST">

               
                <div>
                <fieldset>
                    <label for="nome">Nome<br>
                        <textarea name="nome" id="nome" rows="1" cols="50"></textarea>
                    </label>
                    
                    <label for="contato">Contato<br>
                        <textarea name="contato" id="contato" rows="1" cols="50"></textarea>
                    </label>
                </fieldset>


                <fieldset>
                    <label for="cnpj">CNPJ<br>
                        <textarea name="cnpj" id="cnpj" rows="1" cols="50"></textarea>
                    </label >


                    <label for="cliente">Cliente<br>
                        <textarea name="cliente" id="cliente" rows="1" cols="50"></textarea>
                    </label>
                </fieldset>

                <fieldset>
                    <label for="incidente">Incidente<br>
                        <textarea name="incidente" id="incidente" rows="3" cols="50"></textarea>
                    </label>
                    <label for="solucao">Solução<br>
                        <textarea name="solucao" id="solucao" rows="3" cols="50"></textarea>
                    </label>
                    <br>
                </fieldset>

					<fieldset>
                    <label for="chamado">Chamado<br>
                    <textarea name="chamado" id="chamado" rows="1" cols="50"></textarea>
                    </label>

					 <label for="acessoremoto">PIN<br>
                    <textarea name="acessoremoto" id="acessoremoto" rows="1" cols="50"></textarea>
					</label>

                                        
                    </fieldset>
                    <label for="servidor">Servidor<br>
                    <textarea name="servidor" id="servidor" rows="1" cols="50"></textarea>
					</label>
                    </fieldset>

                    
                    <p> Automação: </p> 
                    
                    <label for="automacao" ></label>
                    <select name="automacao" id="automacao">
                    <option value="linxpos">LinxPOS</option>
                    <option value="microvix">Microvix</option>
                    <option value="degust">Degust</option>
                    <option value="autosystem">AutoSystem</option>
                    <option value="tacgas">TacGas/Emsys</option>
                    <option value="seller">Seller</option>
                    <option value="postofacil">Posto Fácil</option>
                    <option value="softfarma">Softpharma</option>
                    <option value="linxbig">LinxBig</option>
                    <option value="apollo">Apollo/DMS</option>
                    <option value="seta">Seta</option>
                    <option value="outros">Outros</option>
                    
                    

                    </select>
                
					<button type="submit" id="submit" class="btn btn-sm btn-success">Cadastrar</button>




            </form>
            </div>
    </body>
</html>