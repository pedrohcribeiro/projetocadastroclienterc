<?php
  require_once 'init.php';
     header('Content-type: text/html; charset=ISO-8859-1');
  // abre a conexão
  $PDO = db_connect();
  
  // SQL para selecionar os registros
 
$dataatual = date('Y-m-d'); 
           
$sql_msg = "SELECT id, nome, contato, cnpj, cliente , incidente, chamado, solucao, acessoremoto, automacao, servidor, dataatual FROM atendimento WHERE dataatual = '{$dataatual}' ORDER BY id DESC";
//$sql_msg = "SELECT id, nome, contato, cnpj, cliente , incidente, chamado, solucao FROM atendimento ORDER BY id DESC";

    // seleciona os registros
  $resultado_msg = $PDO->prepare($sql_msg);
  $resultado_msg->execute();
?>
  
  
<!doctype html>
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/iconenav.ico" />
    <title>Atendimento - Linx</title>
  </head>
  <body>
  
	<div class="container">	
	<div class="page-header">
	  
	<!-- Botão para cadastro -->
	<div class="pull-right">
        <a href="cadastro.php"><button type="button" class="btn btn-default btn-sm">
		<span class="glyphicon glyphicon-plus"></span></button></a>
		</div>
	<!-- Fim do botão para cadastro -->
	  
	<!-- Botão para feedback-->
	<div class="pull-right">
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
		<span class="glyphicon glyphicon-ok"></span></button>
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 style="color:#ffff;" class="modal-title text-center" id="myModalLabel">Feedback</h6>
              </div>
              <div style="color:#ffff;" class="modal-body">
                Seu chamado foi concluído.<br />
                <p>Caso necessário, poderás reabrir no prazo de até 5 dias.<br /></p>
                Você sabia? <br>
                Temos um novo canal de comunicação com o nosso time de suporte que é através de chat. Utilize-o, é muito simples, fácil e rápido! <br>
                Em breve chegará em seu e-mail uma pesquisa para avaliar sua experiência com meu atendimento.<br />
                Por favor, responda! Sua opinião é muito importante para nós!
              </div>
            </div>
          </div>
        </div>
      </div>
	  </div>
	<!-- Fim do botão de feedback -->
	
	

	  
	    	   <!-- Inicio do campo de pesquisa -->
			 <div class="pull-right">
            <form method="POST" action="pesquisar.php">
            <input class="pesquisa" type="text" name="pesquisar" placeholder="Buscar...">
            <button type="submit" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-search"></span></button>
             </form>       
			</div>
			<!-- Fim do campo de pesquisa -->
			
	    	
		
	
        <h5>Registro de Atendimento</h5>
        
        <a href="https://operacaodtef.linxsaas.com.br/instalador-tef/" target="blank">Portal DTEF</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="https://share.linx.com.br/pages/releaseview.action?pageId=13707687" target="blank">Erros e Soluções DTEF</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="https://share.linx.com.br/display/public/MPGTOSUP/Servidores+D-TEF+Azure" target="blank">Lista Servidores DTEF</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="https://share.linx.com.br/pages/releaseview.action?pageId=105759926" target="blank">Lista Servidores SITEF</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="https://portal.azure/#home" target="blank">Portal Azure</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="https://operacaodtef.linxsaas.com.br/CERTIFICADOS/Gerenciador_Certificado.cgi/BuscaCertificado" target="blank">Gerador Certificado</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="https://share.linx.com.br/display/public/MPGTOSUP/TELEFONES+%7C+RAMAIS" target="blank">Ramais</a>
        
      </div>

      
	<!-- Fim do botão de agenda -->
	
	
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th>Data</th>
              <th>Nome</th>
              <th>Contato</th>
              <th>CNPJ</th>
              <th>Cliente</th>
              <th>Incidente</th>
              <th>Chamado</th>
              <th>Solução</th>
			  <th>PIN</th>
        <th>Automação</th>
        <th>Servidor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
		  
            <?php
              while ($msg_atendimentos = $resultado_msg->fetch(PDO::FETCH_ASSOC)):
                  ?>
				  
            <tr>
              <td><?php echo $msg_atendimentos['dataatual']; ?></td>
              <td><?php echo $msg_atendimentos['nome']; ?></td>
              <td><?php echo $msg_atendimentos['contato']; ?></td>
              <td><?php echo $msg_atendimentos['cnpj']; ?></td>
              <td><?php echo $msg_atendimentos['cliente']; ?></td>
              <td><?php echo $msg_atendimentos['incidente']; ?></td>
              <td><?php echo $msg_atendimentos['chamado']; ?></td>
              <td><?php echo $msg_atendimentos['solucao']; ?></td>
			  <td><?php echo $msg_atendimentos['acessoremoto']; ?></td>
        <td><?php echo $msg_atendimentos['automacao']; ?></td>
        <td><?php echo $msg_atendimentos['servidor']; ?></td>
              <td>
                <span style="cursor:pointer;" class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php echo $msg_atendimentos['id']; ?>"></span>
                </a>
                <a href="alterar.php?id=<?php echo $msg_atendimentos['id']; ?>">
                <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span>
                </a>
                <a href="deletar.php?id=<?php echo $msg_atendimentos['id']; ?>" onclick="return confirm('Deseja deletar este atendimento?');">
                <span class="glyphicon glyphicon-trash text-primary" aria-hidden="true"></span>
                </a>
              </td>
              <!-- Inicio Modal -->
              <div class="modal fade" id="myModal<?php echo $msg_atendimentos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" style="color:#ffff" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h5 style="color:#ffff;" class="modal-title text-center" id="myModalLabel">Atendimento: <?php echo $msg_atendimentos['id']; ?></h5>
                    </div>
                    <div style="color:#ffff;" class="modal-body">
                      <p><?php echo $msg_atendimentos['incidente']; ?></p>
                      Nome: <?php echo $msg_atendimentos['nome']; ?><br />
                      Contato: <?php echo $msg_atendimentos['contato']; ?><br />
                      CNPJ: <?php echo $msg_atendimentos['cnpj']; ?><br />
                      Cliente: <?php echo $msg_atendimentos['cliente']; ?><br />
                      Automação: <?php echo $msg_atendimentos['automacao']; ?><br />
                      Servidor: <?php echo $msg_atendimentos['servidor']; ?><br />
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fim Modal -->
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
