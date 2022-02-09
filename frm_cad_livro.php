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
          var nome = $('#titulo').val();
          $('#confirmar_cadastro').html("Deseja cadastrar o livro " + nome + "?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
          var dados = $("#form_cadastro").find("input").serialize();
          $.ajax({
            url : "acoes/livro/inserir.php",
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
                  $('#codigo_de_barra').val('');
                  $('#titulo').val('');
                  $('#autor').val('');
                  $('#quantidade').val('');
                  $('#prateleira').val('');
                  $('#divisoria').val('');
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                }else if(data == "202"){
                  $.uiAlert({
                    textHead: "Livro Adicionado!", // header
                    text: 'Sem Erros', // Text
                    bgcolor: '#19c3aa', // background-color
                    textcolor: '#fff', // color
                    position: 'top-left',// position . top And bottom ||  left / center / right
                    icon: 'remove circle', // icon in semantic-UI
                    time: 3, // time
                  })
                  $('#codigo_de_barra').val('');
                  $('#titulo').val('');
                  $('#autor').val('');
                  $('#quantidade').val('');
                  $('#prateleira').val('');
                  $('#divisoria').val('');
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
							<h2><i class="table icon"></i>CADASTRAR LIVRO</h2>
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="sixteen wide computer sixteen wide phone centered column">

									<!-- Conteudo -->
                  <div class="ui positive message">
                      <i class="close icon"></i>
                      <div class="header">
                        Cadastro de Livros!
                      </div>
                      <p>Se o livro já estiver cadastro, e for para adicionar um quantidade a mais, basta digitar o código de barras e colocar o numero a ser adicionado, caso seja necessário diminuir exemplares basta colocar o simbole de " - " e a quantidade. 
                      Obs: Poderá alterar as informações do livro com maior facilidade, na aba alterações</p>
                  </div>

                  <div class="ui form warning">
                    <div class="ui warning message">
                      <div class="header">Atenção ao preencher este formulário!</div>
                      <ul class="list">
                        <li>Todos os campos que conter * são de preenchimento obrigatório.</li>
                      </ul>
                    </div>
                  </div>
                  <!-- Form -->
									<form class="ui form" id="form_cadastro">

                  <div class="field"><br>
                        <h2>ADICIONAR DADOS DO LIVRO</h2><br>

                        <label>Inserir código de barras *</label>
                        <div class="ui icon input">                            
                            <i class="barcode icon"></i>
                            <input name="codigo_de_barra" id="codigo_de_barra" type="text" placeholder="Ex: 7892745392742">
                        </div><br><br>
                        
                        <label>Título do Livro *</label>
                        <div class="ui icon input">                            
                            <i class="book icon"></i>
                            <input name="titulo" type="text" id="titulo" placeholder="Ex: A bela e a fera">
                        </div><br><br>

                        <label>Autor do Livro *</label>
                        <div class="ui icon input">                            
                            <i class="user icon"></i>
                            <input name="autor" id="autor" type="text" placeholder="Ex: Virginia Woolf">
                        </div><br><br>
                        
                        <label>Quantidade *</label>
                        <div class="ui icon input">                            
                            <i class="folder icon"></i>
                            <input name="quantidade" id="quantidade" type="text" placeholder="Ex: 1, 2, 3... 99">
                        </div><br><br>

                        <label>Prateleira *</label>
                        <div class="ui icon input">                            
                            <i class="tasks icon"></i>
                            <input name="prateleira" id="prateleira" type="text" placeholder="Ex: Geografia, Português, Amarela, Azul, 1, 14...">
                        </div><br><br>

                        <label>Divisória *</label>
                        <div class="ui icon input">                            
                            <i class="exchange icon"></i>
                            <input name="divisoria" id="divisoria" type="text" placeholder="Ex: 2, 8...">
                        </div><br><br>

                    <a class="ui inverted primary button" onclick="enviar()"><i class="address book outline icon"></i>CADASTRAR</a>
                  </form>
                  
                  <!-- Modal -->
                  <div class="ui basic modal">
                    <div class="ui icon header">
                      <i class="book icon"></i>
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
<script>
	$('.message .close').on('click', function() {
		$(this).closest('.message').transition('fade');
  });
</script>
<?php
	$links->end_navbar();
?>