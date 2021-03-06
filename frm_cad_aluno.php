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
          var nome = $('#campo_nome').val();
          $('#confirmar_cadastro').html("Deseja cadastrar o aluno " + nome + "?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
          var dados = $("#form_cadastro").find("input").serialize();
          $.ajax({
            url : "acoes/aluno/inserir.php",
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
                  $('#campo_nome').val('');
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                }else if(data == "409"){
                  $.uiAlert({
                    textHead: "Aluno Ja Cadastrado!", // header
                    text: 'Verifique Em Sua Tabela de Alunos', // Text
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
							<h2><i class="table icon"></i>ALUNO</h2>
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column">

									<!-- Conteudo -->
                  <div class="ui form warning">
                    <div class="ui warning message">
                      <div class="header">Aten????o ao preencher este formul??rio!</div>
                      <ul class="list">
                        <li>Todos os campos que conter * s??o de preenchimento obrigat??rio.</li>
                      </ul>
                    </div>
                  </div>
                  <!-- Form -->
									<form class="ui form" id="form_cadastro">
                    <div class="field"><br>
                      <h2>CADASTRO DE ALUNO</h2><br>
                      <label>Nome completo *</label>
                      <div class="ui icon input">                            
                        <i class="user icon"></i>
                        <input type="text" name="nome" placeholder="Tonh??o da quebrada" id="campo_nome">
                      </div>
                    </div>
                    <a class="ui inverted primary button" onclick="enviar()"><i class="address book outline icon"></i>CADASTRAR</a>
                  </form>
                  
                  <!-- Modal -->
                  <div class="ui basic modal">
                    <div class="ui icon header">
                      <i class="user icon"></i>
                      Mensagem de Confirma????o de Cadastro!
                    </div>
                    <div class="content" id="confirmar_cadastro" style="text-align: center">
                    </div>
                    <div class="actions">
                      <div class="ui red basic cancel inverted button">
                        <i class="remove icon"></i>
                        N??o
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