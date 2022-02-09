<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require_once 'links.php';
    $links = new Links();

?>
<script src="dist/table/fomantic-ui/semantic.min.js"></script>


</head>

	<body>
			<?php
				$links->nav_bar();
			?>
			<!-- Incio -->
			<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
				<div class="ui container grid">
					<div class="row">
						<div class="fifteen wide computer sixteen wide phone centered column">
							<h2><i class="user secret icon"></i> DESENVOLVEDORES</h2>
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column" style="text-align: center">
									<!-- Conteudo -->
                  <div style="display:flex;justify-content: space-around;">
                    <div>
                      <img class="ui medium circular image" style="width:150px;" src="images/guilherme.jpg"> 
                      <h3 style="">Guilherme L. Nallon</h3>
                    </div>
                    <div>
                      <img class="ui medium circular image" style="width:150px; " src="images/robson.jpg">
                      <h3>Robson F. Wierzkon</h3>
                    </div>
                  </div>
                  
                  <br><br>
                  <div class="ui divider"></div>
                  <div style="">
                    <h4><i class="briefcase icon"></i> DADOS SOBRE O DESENVOLVIMENTO.</h4>
                    <div class="ui divider"></div>
                    <h5 style="">Essa Dashboard originalmente pertence a empresa Semantic UI, de tal forma foi alterado dados para o desenvolvimento desse projeto.</h5>
                    <h5 style="">Sendo assim todos os diretos reservados a R & G System Developers.</h5>
                  </div>
                  
                  <br><br>
                  <div class="ui divider"></div>
                  <h4><i class="tasks icon"></i> NOSSOS DADOS.</h4>
                  <div class="ui divider"></div>

                  <h5 style="">Atualmente egressos da ultima turma de Sistemas de Informação.</h5>
                  <h5 style="">Grande conhecimento em desenvolvimento de Página Web.</h5>
                  <h5 style="">Egressos do Centro Universitário Vale do Iguaçu - UNIGUAÇU.</h5>

                  <br><br>
                  <div class="ui divider"></div>
                  <h4><i class="phone icon"></i>NOSSO CONTATO.</h4>
                  <div class="ui divider"></div>

                  <h5><i class="envelope icon"></i> sis-guilhermenallon@uniguacu.edu.br</h5>
                  <h5><i class="envelope icon"></i> sis-robsonwierzkon@uniguacu.edu.br</h5>
                  <h5><i class="phone icon"></i> (42) 99836-7483 ou (42) 99962-4969</h5>
                  
                  <br><br>
                  <div class="ui divider"></div>
                  <!-- Fim do Conteudo -->
                  <div class="ui vertical footer segment" style="width: 100%">
                    <div class="ui container">
                      <div class="ui stackable divided equal height stackable grid">
                        <div class="three wide column">
                          <h4 class="ui header">Skills</h4>
                          <div class="ui link list">
                            <a class="item">CSS</a>
                            <a class="item">HTML</a>
                            <a class="item">PHP</a>
                            <a class="item">SQL</a>
                          </div>
                        </div>
                        <div class="three wide column">
                          <h4 class="ui header">Serviços</h4>
                          <div class="ui link list">
                            <a class="item">Paginas</a>
                            <a class="item">Sistemas Web</a>
                            <a class="item">Manutenção</a>
                            <a class="item">Design</a>
                          </div>
                        </div>
                        <div class="seven wide column">
                          <h4 class="ui header">Direitos</h4>
                          <p>© Copyright 2020 R & G System Developers. - Todos Direitos Reservados.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

<?php
	$links->end_navbar();
?>
