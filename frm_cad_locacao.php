<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

    require __DIR__ . "/DAO/AlunoDAO.php";
    $alunoDAO = new AlunoDAO();
    
    require __DIR__ . "/DAO/LivroDAO.php";
    $livroDAO = new LivroDAO();

    require_once 'links.php';
    $links = new Links();
?>
  <script>
        function enviar(){
          //document.getElementById('ee').submit();
          $('#confirmar_cadastro').html("Deseja cadastrar o livro ?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
          var dados = $("#form_cadastro").serialize();
          $.ajax({
            url : "acoes/locacao/inserir.php",
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
                  $('.select-aluno').val(null).trigger('change'); 
                  $('.select-livro').val(null).trigger('change'); 
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                } else if(data == "400"){
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
							<h2><i class="table icon"></i>EMPRÉSTIO</h2>
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

									<form class="ui form" id="form_cadastro">
                    <div class="field"><br>
                        <h2>ADICIONAR DADOS</h2><br>

                        <label>Inserir código do aluno *</label>
                        <div class="ui icon input">
                            <select id="codigo" name="codigo_aluno" class="postName select-aluno form-control" name="postName" style="width: 100%; display: flex; justify-content: space-between;"></select>
                        </div><input id="campo_aluno" type="text" placeholder="Guilherme..." disabled><br><br>

                        <label>Inserir código de barras *</label>
                        <div class="ui icon input">
                            <select id="codigo_livro" name="codigo_de_barra" class="postName select-livro form-control" name="postName" style="width: 100%; display: flex; justify-content: space-between;"></select>
                        </div><input id="campo_livro" type="text" placeholder="Bela e a Fera..." disabled><br><br>                    

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

                  <!-- Select Aluno -->
                  <script type="text/javascript">
                      $('.select-aluno').select2({
                        placeholder: 'Selecione',
                    escapeMarkup: function (markup) {
                      return markup;
                    },
                    ajax: {
                      url: './acoes/aluno/select.php',
                       dataType: 'json',
                       delay: 250,
                       data: function (data) {
                        return {
                          searchTerm: data.term // search term
                        };
                      },
                              
                      processResults: function (response) {
                        return {
                          results:response
                            };
                          },
                          cache: true
                        },
                        templateResult: function (d) {
                    return '<span>'+d.subText+'</span><span style="float: right; margin-right: 20px" class="subtext">'+d.text+'</span>';
                  },
                  templateSelection: function (d) {
                    return d.text + ' - ' + d.subText;
                  }
                      });
                </script>

                <!-- Select livro -->
                <script type="text/javascript">
                    $('.select-livro').select2({
                      placeholder: 'Selecione',
                  escapeMarkup: function (markup) {
                    return markup;
                  },
                  ajax: {
                    url: './acoes/livro/select.php',
                      dataType: 'json',
                      delay: 250,
                      data: function (data) {
                      return {
                        searchTerm: data.term // search term
                      };
                    },
                              
                    processResults: function (response) {
                      return {
                        results:response
                          };
                        },
                        cache: true
                      },
                      templateResult: function (d) {
                    return '<span>'+d.subText+'</span><span style="float: right; margin-right: 20px" class="subtext">'+d.text+'</span>';
                  },
                  templateSelection: function (d) {
                    return d.text + ' - ' + d.subText;
                  }
                      });
                </script>

<?php
	$links->end_navbar();
?>