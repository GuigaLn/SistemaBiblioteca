<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require_once 'links.php';
    $links = new Links();

    require __DIR__ . "/DAO/LivroDAO.php";
    $livroDAO = new LivroDAO();

    require __DIR__ . "/DAO/AlunoDAO.php";
    $alunoDAO = new AlunoDAO();

    require __DIR__ . "/DAO/TurmaDAO.php";
    $turmaDAO = new TurmaDAO();

    require __DIR__ . "/DAO/LocacaoDAO.php";
    $locacaoDAO = new LocacaoDAO();

    require __DIR__ . "/DAO/Aluno_TurmaDAO.php";
    $aluno_TurmaDAO = new Aluno_TurmaDAO();

    if(!empty($_GET['loginSucesso'])){
       echo "<script>
       $(document).ready(function(){
           $.uiAlert({
               textHead: 'Login Realizado Com Sucesso!', // header
               text: 'Bem-Vindo ao Sistema de Gerenciamento de Biblioteca', // Text
               bgcolor: '#19c3aa', // background-color
               textcolor: '#fff', // color
               position: 'top-left',// position . top And bottom ||  left / center / right
               icon: 'checkmark box', // icon in semantic-UI
               time: 3, // time
             })
       });
        </script>";
    }
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
                            <h2><i class="home icon"></i> DASHBOARD</h2>

                            <div class="ui positive message">
                                <i class="close icon"></i>
								<div class="header">
									Bem-Vindo ao seu Dashboard!
								</div>
								<p>Visualize e gerencie todo sua estrutura.</p>
                            </div>
                            
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column">
									<!-- Conteudo -->
                                    <div class="ui grid">
                                        <!-- TOTAL EMPRESTIMOS -->
                                        <div class="four wide computer sixteen wide phone centered column">
                                            <div class="ui centered card">
                                                <div class="content">
                                                    <div class="ui centered grid">
                                                        <div class="row">
                                                            <div class="six wide computer column">
                                                                <div class="ui small image simpleimage itemcolor1">
                                                                    <i class="chart bar outline icon simpleicon"></i>
                                                                </div>
                                                            </div>
                                                            <div class="ten wide computer column">
                                                                <span><h4>Emprestimos</h4></span>
                                                                <?= $locacaoDAO->retornarTotal()['quantidade']; ?> livros
                                                                <a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- TOTAL LIVROS -->
                                        <div class="four wide computer sixteen wide phone centered column">
                                            <div class="ui centered card">
                                                <div class="content">
                                                    <div class="ui centered grid">
                                                        <div class="row">
                                                            <div class="six wide computer column">
                                                                <div class="ui small image simpleimage itemcolor2">
                                                                        <i class="book icon simpleicon"></i>
                                                                </div>
                                                            </div>
                                                            <div class="ten wide computer column">
                                                                <span><h4>Total Livros</h4></span>                                                                
                                                                <?= $livroDAO->retornarTotal()['quantidade']; ?> livros
                                                                <a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- TOTAL ALUNOS -->
                                        <div class="four wide computer sixteen wide phone centered column">
                                            <div class="ui centered card">
                                                <div class="content">
                                                    <div class="ui centered grid">
                                                        <div class="row">
                                                            <div class="six wide computer column">
                                                                <div class="ui small image simpleimage itemcolor4">
                                                                        <i class="user icon simpleicon"></i>
                                                                </div>
                                                            </div>
                                                            <div class="ten wide computer column">
                                                                <span><h4>Total Alunos</h4></span>
                                                                <?= $alunoDAO->retornarTotal()['quantidade']; ?> alunos
                                                                <a class="ui tiny label simplelable"><i class="eye icon"></i> Detailsa</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- TOTAL TURMAS ATIVAS -->
                                        <div class="four wide computer sixteen wide phone centered column">
                                            <div class="ui centered card">
                                                <div class="content">
                                                    <div class="ui centered grid">
                                                        <div class="row">
                                                            <div class="six wide computer column">
                                                                <div class="ui small image simpleimage itemcolor3">
                                                                        <i class="archive icon simpleicon"></i>
                                                                </div>
                                                            </div>
                                                            <div class="ten wide computer column">
                                                                <span><h4>Turmas Ativas</h4></span>
                                                                <?= $turmaDAO->retornarTotal($_SESSION['ano_letivo'])['quantidade']; ?> turmas
                                                                <a class="ui tiny label simplelable"><i class="eye icon"></i> Detailsa</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="eight wide computer sixteen wide phone column justifed">
                                            <br><h4>Estatísticas</h4>
                                            <div class="ui divider"></div>
                                        </div>
                                    </div>

                                    <div class="ui indicating progress" data-value="<?= $locacaoDAO->retornarTotal()['quantidade']; ?>" data-total="<?= $livroDAO->retornarTotal()['quantidade']; ?>" id="example1">
                                        <div class="bar"></div>
                                        <div class="label"><?= $locacaoDAO->retornarTotal()['quantidade']; ?> livros emprestados</div>
                                    </div>

                                    <div class="ui teal progress" data-value="<?= $aluno_TurmaDAO->retornarTotal($_SESSION['ano_letivo'])['quantidade']; ?>" data-total="<?= $alunoDAO->retornarTotal()['quantidade']; ?>" id="example3">
                                        <div class="bar"></div>
                                        <div class="label"><?=  $alunoDAO->retornarTotal()['quantidade'] - $aluno_TurmaDAO->retornarTotal($_SESSION['ano_letivo'])['quantidade']; ?> alunos sem turmas</div>
                                    </div>
                                    
                                    <div class="ui teal progress" data-value="<?= $aluno_TurmaDAO->retornarTotalGroupBy($_SESSION['ano_letivo']); ?>" data-total="<?= $turmaDAO->retornarTotal($_SESSION['ano_letivo'])['quantidade']; ?>" id="example4">
                                        <div class="bar"></div>
                                        <div class="label"><?= $turmaDAO->retornarTotal($_SESSION['ano_letivo'])['quantidade'] - $aluno_TurmaDAO->retornarTotalGroupBy($_SESSION['ano_letivo']); ?> turmas sem alunos</div>
                                    </div>
                                    
									<!-- Fim do Conteudo -->
<script>
    $('#example1').progress();
    $('#example2').progress();
    $('#example3').progress();
    $('#example4').progress();
	$('.message .close').on('click', function() {
		$(this).closest('.message').transition('fade');
    });
</script>

<?php
	$links->end_navbar();
?>