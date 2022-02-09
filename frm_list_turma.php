<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require __DIR__ . "/DAO/TurmaDAO.php";
    require_once 'links.php';
    $turmaDAO = new TurmaDAO();

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
							<h2><i class="table icon"></i> LISTA DE TODOS ALUNOS</h2>
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column">
                                    <!-- Conteudo -->
                                    
                                    <!-- Lista -->
                                    <div class="ui stacked segment">
                                        <div class="ui blue ribbon icon label">LISTA DE TURMAS</div>
                                        <br><br>
                                        <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Descrição</th>
                                                    <th>Ano letivo</th> 
                                                    <th>Períodoo</th> 
                                                    <th>Editar</th>                                                         
                                                </tr>
                                            </thead>
                                            <tbody>
                                    <?php
                                        foreach($turmaDAO->listar($_SESSION['ano_letivo']) as $item){
                                            echo "<tr>";
                                            echo"<td>{$item['codigo']}</td>";
                                            echo "<td>{$item['descricao']}</td>";
                                            echo "<td>{$item['ano_letivo']}</td>";
                                            echo "<td>{$item['periodo']}</td>";
                                            echo "<td><a href=\"frm_edit_turma.php?codigo={$item['codigo']}\"><i class=\"icon edit\"></i>Editar</a></td>";
                                            echo"</tr>";
                                        }
                                    ?>         
                                            </tbody>
                                        </table>
                                    </div>         
									<!-- Fim do Conteudo -->
								

<?php
	$links->end_navbar();
?>


                                   
                                                
                                            