<?php

     header('Content-type: text/html; charset=ISO-8859-1');
	 
    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "atendimento";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
 
    $pesquisar = $_POST['pesquisar'];

	$result_atendimentos = "SELECT * FROM atendimento WHERE nome LIKE '%$pesquisar%' OR contato LIKE '%$pesquisar%' OR cnpj LIKE '%$pesquisar%' OR cliente LIKE '%$pesquisar%' OR incidente LIKE '%$pesquisar%' OR chamado LIKE '%$pesquisar%' OR solucao LIKE '%$pesquisar%' OR acessoremoto LIKE '%$pesquisar%' OR automacao LIKE '%$pesquisar%' OR servidor LIKE '%$pesquisar%'  ORDER BY id DESC";

	$resultado_atendimentos = mysqli_query($conn, $result_atendimentos);
	
	
?>


<!doctype html>
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <title>Atendimento - Linx</title>
  </head>
  <body>
  
	  <div class="container">
	
      <div class="page-header">
	  
	    	    	<!-- Inicio do botão para cadastro de atendimento -->
	       <div class="pull-right">
        <a href="index.php"><button type="button" class="btn btn-default btn-sm">
		<span class="glyphicon glyphicon-menu-left"></span></button></a>
		</div>
		
	    	   <!-- Inicio do campo de pesquisa -->
			 <div class="pull-right">

            <form method="POST" action="pesquisar.php">
            <input class="pesquisa" type="text" name="pesquisar" placeholder="Buscar..."/>
            <button type="submit" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-search"></span></button>
             </form>       
			</div>
			<!-- Fim do campo de pesquisa -->
        <h5>Pesquisa de Atendimento</h5>
      </div>

			  
      <div>
          
          <div class="row">
		  
        <table class="table">
		
          <thead>
		  
            <tr>    
			
              <th>Nome</th>
              <th>Contato</th>
              <th>CNPJ</th>
              <th>Cliente</th>
              <th>Incidente</th>
              <th>Chamado</th>
              <th>Solucao</th>
              <th>PIN</th>
              <th>Automação</th>
              <th>Servidor</th>
			  <th>Açoes</th>
			  
            </tr>
			
          </thead>
		  

		  
          <tbody>
		  
  	<?php
	while($rows_atendimentos = mysqli_fetch_array($resultado_atendimentos))
	{ ?>  
			
            <tr>

              <td><?php echo $rows_atendimentos['nome']; ?></td>
              <td><?php echo $rows_atendimentos['contato']; ?></td>
              <td><?php echo $rows_atendimentos['cnpj']; ?></td>
              <td><?php echo $rows_atendimentos['cliente']; ?></td>
              <td><?php echo $rows_atendimentos['incidente']; ?></td>
              <td><?php echo $rows_atendimentos['chamado']; ?></td>
              <td><?php echo $rows_atendimentos['solucao']; ?></td>
              <td><?php echo $rows_atendimentos['acessoremoto']; ?></td>
              <td><?php echo $rows_atendimentos['automacao']; ?></td>
              <td><?php echo $rows_atendimentos['servidor']; ?></td>
                            <td>
                <span style="cursor:pointer;" class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php echo $rows_atendimentos['id']; ?>"></span>
                </a>
                <a href="alterar.php?id=<?php echo $rows_atendimentos['id']; ?>">
                <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span>
                </a>
                <a href="deletar.php?id=<?php echo $rows_atendimentos['id']; ?>" onclick="return confirm('Deseja deletar este atendimento?');">
                <span class="glyphicon glyphicon-trash text-primary" aria-hidden="true"></span>
                </a>
              </td>
			  
			   <!-- Inicio Modal -->
              <div class="modal fade" id="myModal<?php echo $rows_atendimentos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h5 style="color:#000;" class="modal-title text-center" id="myModalLabel">Atendimento: <?php echo $rows_atendimentos['id']; ?></h5>
                    </div>
                    <div style="color:#000;" class="modal-body">
                      <p><?php echo $rows_atendimentos['incidente']; ?></p>
                      Nome: <?php echo $rows_atendimentos['nome']; ?><br />
                      Contato: <?php echo $rows_atendimentos['contato']; ?><br />
                      CNPJ: <?php echo $rows_atendimentos['cnpj']; ?><br />
                      Cliente: <?php echo $rows_atendimentos['cliente']; ?><br />
                      Automação: <?php echo $rows_atendimentos['automacao']; ?><br />
                      Servidor: <?php echo $rows_atendimentos['servidor']; ?><br />
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fim Modal -->
               
            </tr>
            <?php 
} 
?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

