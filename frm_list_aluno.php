<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require __DIR__ . "/DAO/AlunoDAO.php";
    require_once 'links.php';
    $alunoDAO = new AlunoDAO();

    $links = new Links();
?>
    <script>
        function consultar(){
            $("#status").fadeIn();
            $("#preloader").delay(0).fadeIn("fast");
          //document.getElementById('ee').submit();
          $('#table_simple').DataTable().destroy();
          var nome = $('#campo_nome').val();
          $.ajax({
            url : "acoes/aluno/listarSearch.php",
            data: {searchTerm: nome},
            method :"GET",
              success : function(data){	
                console.log(data)		
                $('#table_itens').html(data);
                $('#table_simple').DataTable();
                $("#status").fadeOut();
                $("#preloader").delay(0).fadeOut("slow");
              },
            });
        }; 
    </script>

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
                                <div class="ui form warning">
                                    <div class="ui warning message">
                                        <div class="header">Atenção a pesquisa buscara apenas 100 registros!</div>
                                            <ul class="list">
                                                <li>Digíte o nome mais proxímo possivel, caso contrario poderá acontecer de não localizar!</li>
                                            </ul>
                                        </div>
                                </div><br><br>
                                    <!-- Conteudo -->
                                    <!-- Form -->
									<form class="ui form" id="form_cadastro">
                                        <div class="field"><br>
                                        <label>Nome completo *</label>
                                            <div class="ui icon input">                            
                                                <input type="text" name="nome" placeholder="Tonhão da quebrada" id="campo_nome">
                                                <a class="ui inverted primary button" style="margin-left: 20px" onclick="consultar()"><i class="address book outline icon"></i>CONSULTAR</a>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <!-- Lista -->
                                    <div class="ui stacked segment">
                                        <div class="ui blue ribbon icon label">LISTA DE TABELAS</div>
                                        <br><br>
                                        <table id="table_simple" class="ui celled table responsive nowrap unstackable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Editar</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="table_itens">       
                                            </tbody>
                                        </table>
                                    </div>         
									<!-- Fim do Conteudo -->
								

<?php
	$links->end_navbar();
?>

<!-- Listas -->
                                   
                                                
                                            