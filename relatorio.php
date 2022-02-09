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
							<h2><i class="table icon"></i> LISTAS </h2>

                            <div class="ui positive message">
                                <i class="close icon"></i>
								<div class="header">
									Lista de todos cadastros!
								</div>
								<p>Visualize e gerencie todos seu cadastros de maneira geral.</p>
                            </div>

							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column">
									<!-- Conteudo -->

                                    <!-- Listas -->
                                    <div class="ui stacked segment">
                                        <div class="ui blue ribbon icon label">LISTA DE TABELAS</div>
                                        <br><br>
                                        <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Descrição</th>
                                                    <th>Função</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Aluno</td>
                                                    <td><a href="frm_list_aluno.php"><i class="edit icon"></i>Visualizar</a></td>
                                                </tr>

                                                <tr>
                                                    <td>2</td>
                                                    <td>Turmas</td>
                                                    <td><a href="frm_list_turma.php"><i class="edit icon"></i>Visualizar</a></td>
                                                </tr>

                                                <tr>
                                                    <td>3</td>
                                                    <td>Livros</td>
                                                    <td><a href="frm_list_livro.php"><i class="edit icon"></i>Visualizar</a></td>
                                                </tr>

                                                <tr>
                                                    <td>4</td>
                                                    <td>Emprestimos</td>
                                                    <td><a href="frm_list_locacao.php"><i class="edit icon"></i>Visualizar</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            
                                
									<!-- Fim do Conteudo -->
								
<script>
    $('.message .close').on('click', function() {
	    $(this).closest('.message').transition('fade');
    });
</script>

<?php
	$links->end_navbar();
?>