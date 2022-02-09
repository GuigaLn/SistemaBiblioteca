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
          $('#confirmar_cadastro').html("Deseja alterar o ano letivo para " + nome + "?");
          $('.ui.basic.modal').modal('show');
        };  

        function returnYes(){
          var dados = $("#form_cadastro").find("input").serialize();
          $.ajax({
            url : "source/alt_ano_letivo.php",
            data: dados,
            method :"POST",
              success : function(data){						
                if(data == "2"){
                  $.uiAlert({
                    textHead: 'Alterado Com Sucesso!', // header
                    text: 'Sem erros', // Text
                    bgcolor: '#19c3aa', // background-color
                    textcolor: '#fff', // color
                    position: 'top-left',// position . top And bottom ||  left / center / right
                    icon: 'checkmark box', // icon in semantic-UI
                    time: 3, // time
                  })  
                  window.location.href = "./dashboard.php";
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                }else if(data == "1"){
                  $.uiAlert({
                    textHead: "Erro ao Alterar Com Sucesso!", // header
                    text: 'Tente Novamente', // Text
                    bgcolor: '#DB2828', // background-color
                    textcolor: '#fff', // color
                    position: 'top-left',// position . top And bottom ||  left / center / right
                    icon: 'remove circle', // icon in semantic-UI
                    time: 3, // time
                  })
                }else if(data == "0"){
                  $.uiAlert({
                    textHead: "Erro ao Alterar Com Sucesso", // header
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
							<h2><i class="table icon"></i>ANO LETIVO</h2>
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
                      <h2>ALTERAÇÃO DO ANO LETIVO</h2><br>
                      <label>Ano letivo *</label>
                      <div class="ui icon input">                            
                        <i class="settings icon"></i>
                        <input type="number" name="ano_letivo" placeholder="2020" id="campo_nome">
                      </div>
                    </div>
                    <a class="ui inverted primary button" onclick="enviar()"><i class="address book outline icon"></i>ALTERAR</a>
                  </form>
                  
                  <!-- Modal -->
                  <div class="ui basic modal">
                    <div class="ui icon header">
                      <i class="user icon"></i>
                      Alterar ano letivo?
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