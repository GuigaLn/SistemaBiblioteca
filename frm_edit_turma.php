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
    <script>
        function enviar(){
          //document.getElementById('ee').submit();
          var descricao = $('#campo_descricao').val();
          var periodo = $('#campo_periodo').val();
          $('#confirmar_cadastro').html("Deseja alterar a turma para " + descricao + " período da " + periodo + "?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
            var dados = $("#form_cadastro").serialize();
            $.ajax({
                url : "acoes/turma/editar.php",
                data: dados,
                method :"POST",
                success : function(data){						
                    if(data == "200"){
                    $.uiAlert({
                        textHead: 'Alteração Realizada Com Sucesso!', // header
                        text: 'Sem erros', // Text
                        bgcolor: '#19c3aa', // background-color
                        textcolor: '#fff', // color
                        position: 'top-left',// position . top And bottom ||  left / center / right
                        icon: 'checkmark box', // icon in semantic-UI
                        time: 3, // time
                    })  
                    window.location.href = "./frm_list_turma.php";
                    //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                    }else if(data == "409"){
                    $.uiAlert({
                        textHead: "Turma Ja Cadastrada!", // header
                        text: 'Verifique Em Sua Tabela de Turmas', // Text
                        bgcolor: '#DB2828', // background-color
                        textcolor: '#fff', // color
                        position: 'top-left',// position . top And bottom ||  left / center / right
                        icon: 'remove circle', // icon in semantic-UI
                        time: 3, // time
                    })
                    }else if(data == "400"){
                    $.uiAlert({
                        textHead: "Falta de Dados!", // header
                        text: 'Verifique se Digitou Todos os Campos', // Text
                        bgcolor: '#F2711C', // background-color
                        textcolor: '#fff', // color
                        position: 'top-left',// position . top And bottom ||  left / center / right
                        icon: 'warning sign', // icon in semantic-UI
                        time: 3, // time
                    })
                    }
                },
                })
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
							<h2><i class="table icon"></i>EDITAR TURMA</h2>
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column">
									<!-- Conteudo -->
                                    <div class="ui form warning">
                                        <div class="ui warning message">
                                        <div class="header">Atenção ao preencher este formulário!</div>
                                        <ul class="list">
                                            <li>Todos os campos que conter * são de preenchimento obrigatório.</li>
                                        </ul>
                                        </div>
                                    </div>
                                    <!-- Form -->
									<form class="ui form" id="form_cadastro" action="dash.php">
                                        <div class="field"><br>
                                            <h2>EDITAR TURMA</h2><br>
                                            <input type="number" name="codigo" value="<?= $_GET['codigo'] ?>" readonly>
                                            <label>Adicione uma descrição *</label>
                                            <div class="ui fluid icon input">
                                                <div class="ui icon input">                            
                                                    <i class="archive icon"></i>
                                                    <input id="campo_descricao" name="descricao" type="text" value="<?= $turmaDAO->buscar($_GET['codigo'])['descricao']; ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="ui form">
                                            <div class="field">
                                                <label>Selecione o Período *</label>
                                                <select name="periodo" id="campo_periodo">
                                                    <?php 
                                                        if($turmaDAO->buscar($_GET['codigo'])['periodo'] == 'Manha'){
                                                            echo '<option value="Manha" selected>Manha</option>';
                                                            echo '<option value="Tarde">Tarde</option>';
                                                            echo '<option value="Noite">Noite</option>';
                                                        } else if ($turmaDAO->buscar($_GET['codigo'])['periodo'] == 'Tarde') {
                                                            echo '<option value="Manha">Manha</option>';
                                                            echo '<option value="Tarde" selected>Tarde</option>';
                                                            echo '<option value="Noite">Noite</option>';
                                                        } else {
                                                            echo '<option value="Manha">Manha</option>';
                                                            echo '<option value="Tarde">Tarde</option>';
                                                            echo '<option value="Noite" selected>Noite</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div><br>
                                        <a class="ui inverted primary button" onclick="enviar()"><i class="address book outline icon"></i>ALTERAR</a>
                                    </form>
                  
                                    <!-- Modal -->
                                    <div class="ui basic modal">
                                        <div class="ui icon header">
                                        <i class="archive icon"></i>
                                        Mensagem de Confirmação!
                                        </div>
                                        <div class="content" id="confirmar_cadastro" style="text-align: center">
                                        </div>
                                        <div class="actions">
                                        <div class="ui red basic cancel inverted button">
                                            <i class="remove icon"></i>
                                            Não
                                        </div>
                                        <div class="ui green ok inverted button" onclick="returnYes()">
                                            <i class="checkmark icon"></i>
                                            Sim
                                        </div>
                                        </div>
                                    </div>
									<!-- Fim do Conteudo -->
								

<?php
	$links->end_navbar();
?>