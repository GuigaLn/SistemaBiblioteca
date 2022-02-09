<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require_once 'links.php';
    $links = new Links();
?>
    <script>
        function enviar(){
          //document.getElementById('ee').submit();
          var descricao = $('#campo_descricao').val();
          var periodo = $('#campo_periodo').val();
          $('#confirmar_cadastro').html("Deseja cadastrar a turma " + descricao + " período da " + periodo + "?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
            var dados = $("#form_cadastro").serialize();
            $.ajax({
                url : "acoes/turma/inserir.php",
                data: dados,
                method :"POST",
                success : function(data){						
                    if(data == "200"){
                    $.uiAlert({
                        textHead: 'Cadastro Realizado Com Sucesso!', // header
                        text: 'Sem erros', // Text
                        bgcolor: '#19c3aa', // background-color
                        textcolor: '#fff', // color
                        position: 'top-left',// position . top And bottom ||  left / center / right
                        icon: 'checkmark box', // icon in semantic-UI
                        time: 3, // time
                    })  
                    $('#campo_descricao').val('');
                    //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                    }else if(data == "409"){
                    $.uiAlert({
                        textHead: "Turma Ja Cadastrado!", // header
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
							<h2><i class="table icon"></i> TABLE EXAMPLE</h2>
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
                                            <h2>CADASTRO DE TURMA</h2><br>
                                            
                                            <label>Adicione uma descrição *</label>
                                            <div class="ui fluid icon input">
                                                <div class="ui icon input">                            
                                                    <i class="archive icon"></i>
                                                    <input id="campo_descricao" name="descricao" type="text" placeholder="Ex: Sistemas de Informação 6N.">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="ui form">
                                            <div class="field">
                                                <label>Selecione o Período *</label>
                                                <select name="periodo" id="campo_periodo">
                                                    <option value="">Período</option>
                                                    <option value="Manha">Manha</option>
                                                    <option value="Tarde">Tarde</option>
                                                    <option value="Noite">Noite</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <a class="ui inverted primary button" onclick="enviar()"><i class="address book outline icon"></i>CADASTRAR</a>
                                    </form>
                  
                                    <!-- Modal -->
                                    <div class="ui basic modal">
                                        <div class="ui icon header">
                                        <i class="archive icon"></i>
                                        Mensagem de Confirmação de Cadastro!
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