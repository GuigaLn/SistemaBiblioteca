<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require __DIR__ . "/DAO/LivroDAO.php";
    require_once 'links.php';
    $livroDAO = new LivroDAO();
    $links = new Links();

    $livro = $livroDAO->buscar($_GET['codigo_de_barra']);
?>
  <script>
        function enviar(){
          //document.getElementById('ee').submit();
          var nome = $('#titulo').val();
          $('#confirmar_cadastro').html("Deseja editar o livro " + nome + "?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
          var dados = $("#form_cadastro").find("input").serialize();
          $.ajax({
            url : "acoes/livro/editar.php",
            data: dados,
            method :"POST",
              success : function(data){						
                if(data == "200"){
                  $.uiAlert({
                    textHead: 'Editado Com Sucesso!', // header
                    text: 'Sem erros', // Text
                    bgcolor: '#19c3aa', // background-color
                    textcolor: '#fff', // color
                    position: 'top-left',// position . top And bottom ||  left / center / right
                    icon: 'checkmark box', // icon in semantic-UI
                    time: 3, // time
                  })  
                  window.location.href = "./frm_list_livro.php";
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                }else if(data == "409"){
                  $.uiAlert({
                    textHead: "Erro ao Editar!", // header
                    text: 'Tente novamente!', // Text
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
							<h2><i class="table icon"></i>EDITAR LIVRO</h2>
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
									<form class="ui form" id="form_cadastro">

                  <div class="field"><br>
                        <h2>EDITAR DADOS DO LIVRO</h2><br>

                        <label>Inserir código de barras *</label>
                        <input name="codigo_de_barra_antigo" style="opacity: 0" type="text" value="<?= $livro['codigo_de_barra']?>" readonly>
                        <div class="ui icon input">                            
                            <i class="barcode icon"></i>
                            <input name="codigo_de_barra" type="text" value="<?= $livro['codigo_de_barra']?>">
                        </div><br><br>
                        
                        <label>Título do Livro *</label>
                        <div class="ui icon input">                            
                            <i class="book icon"></i>
                            <input name="titulo" type="text" id="titulo" value="<?= $livro['titulo']?>">
                        </div><br><br>

                        <label>Autor do Livro *</label>
                        <div class="ui icon input">                            
                            <i class="user icon"></i>
                            <input name="autor" type="text" value="<?= $livro['autor']?>">
                        </div><br><br>
                        
                        <label>Quantidade *</label>
                        <div class="ui icon input">                            
                            <i class="folder icon"></i>
                            <input name="quantidade" type="text" value="<?= $livro['quantidade']?>">
                        </div><br><br>

                        <label>Prateleira *</label>
                        <div class="ui icon input">                            
                            <i class="tasks icon"></i>
                            <input name="prateleira" type="text" value="<?= $livro['prateleira']?>">
                        </div><br><br>

                        <label>Divisória *</label>
                        <div class="ui icon input">                            
                            <i class="exchange icon"></i>
                            <input name="divisoria" type="text" value="<?= $livro['divisoria']?>">
                        </div><br><br>

                    <a class="ui inverted primary button" onclick="enviar()"><i class="address book outline icon"></i>EDITAR</a>
                  </form>
                  
                  <!-- Modal -->
                  <div class="ui basic modal">
                    <div class="ui icon header">
                      <i class="book icon"></i>
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
<script>
	$('.message .close').on('click', function() {
		$(this).closest('.message').transition('fade');
  });
</script>
<?php
	$links->end_navbar();
?>