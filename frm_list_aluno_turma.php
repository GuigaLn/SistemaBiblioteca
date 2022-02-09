<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require_once 'source/DBConexao.php';
    
    require_once 'links.php';

    $links = new Links();
?>
    <script src="dist/table/fomantic-ui/semantic.min.js"></script>

    <script>
        function cadastrar_locacao(){
          //document.getElementById('ee').submit();
          var nome = $('#titulo').val();
          $('#confirmar_cadastro').html("Deseja alocar o livro?");
          $('.modal_cadastrar').modal('show');
        };  

        function cadastrar_devolucao(){
          //document.getElementById('ee').submit();
          var nome = $('#titulo').val();
          $('#confirmar_devolucao').html("Deseja alocar o livro?");
          $('.modal_devolver').modal('show');
        };  

        function returnYesCadastrar(){
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
                  $('#codigo_livro').val(null).trigger('change'); 
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                }else if(data == "400") {
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

        function returnYesDevolver(){
          var dados = $("#form_devolucao").serialize();
          $.ajax({
            url : "acoes/locacao/devolucao.php",
            data: dados,
            method :"POST",
              success : function(data){					
                if(data == "200"){
                  $.uiAlert({
                    textHead: 'Devolvido Com Sucesso!', // header
                    text: 'Sem erros', // Text
                    bgcolor: '#19c3aa', // background-color
                    textcolor: '#fff', // color
                    position: 'top-left',// position . top And bottom ||  left / center / right
                    icon: 'checkmark box', // icon in semantic-UI
                    time: 3, // time
                  })  
                  $('#select_livro_devolucao').val(null).trigger('change'); 
                  //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
                }else if(data == "400") {
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

        function cadastrar(codigo_aluno){
            $('#codigo_aluno_cadastrar').val(codigo_aluno);
            $('#modal_cadastrar_livro').modal('show');
        }

        function devolver(codigo_aluno){
            $.ajax({
            url : "acoes/aluno/selectDevolucao.php",
            data: {codigo_aluno: codigo_aluno},
            method :"POST",
              success : function(data){			
                $('#select_livro_devolucao').html(data);

                $('#codigo_aluno_devolver').val(codigo_aluno);
                $('#modal_devolver_livro').modal('show');
              },
            })
        }
    </script>

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
                                        <div class="ui blue ribbon icon label">LISTA DE ALUNOS</div>
                                        <br><br>
                                        <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Cadastrar livro</th>        
                                                    <th>Devolver livro</th>                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                    <?php
                                        $conexao = DBConexao::getInstance();

                                        $query = $conexao->prepare("SELECT aluno.codigo,aluno.nome,turma.descricao FROM aluno_turma,aluno,turma WHERE aluno_turma.codigo_aluno = aluno.codigo AND aluno_turma.codigo_turma = turma.codigo AND turma.codigo = ? AND turma.ano_letivo = ?");
                                        $query->bindValue(1, $_GET['codigo_turma']);
                                        $query->bindValue(2, $_SESSION['ano_letivo']);
                                        $query->execute();
                        
                                        foreach($query->fetchAll() as $item){
                                            echo "<tr>";
                                            echo"<td>{$item['codigo']}</td>";
                                            echo "<td>{$item['nome']}</td>";
                                            echo"<td style=\"cursor: pointer\" onclick='cadastrar({$item['codigo']})'><a><i class='icon book'> Cadastrar<i></a></td>";
                                            echo"<td style=\"cursor: pointer\" onclick='devolver({$item['codigo']})'><a><i class='icon book'> Devolver<i></a></td>";
                                            echo"</tr>";
                                        }
                                    ?>         
                                            </tbody>
                                        </table>
                                    </div>         

                                    <!-- Modal Cadastrar Emprestimo Livro -->
                                    <div class="ui modal" id="modal_cadastrar_livro">
                                        
                                        <div class="header">Livro</div>
                                        <div class="scrolling content">
                                            <form id="form_cadastro">
                                                <label>Código do aluno</label><br>
                                                <div class="ui icon input">
                                                    <input id="codigo_aluno_cadastrar" name="codigo_aluno" readonly type="number" placeholder="1, 2, 3...">
                                                </div><br><br>

                                                <label>Selecione o Livro</label><br>
                                                <div class="ui icon input" style="width: 100%">
                                                    <select id="codigo_livro" name="codigo_de_barra" class="postName form-control" name="postName" style="width: 100%; display: flex; justify-content: space-between;"></select>
                                                </div><br><br> 
                                      
                                                <a class="ui inverted primary button" onclick="cadastrar_locacao()"><i class="address book outline icon"></i>CADASTRAR</a>                                                                                    
                                            </form>
                                        </div>
                                        
                                    </div>

                                    <!-- Modal Devolver Livro -->
                                    <div class="ui modal" id="modal_devolver_livro">
                                        
                                        <div class="header">Devolução de Livro</div>
                                        <div class="scrolling content">
                                            <form id="form_devolucao">
                                                <label>Código do aluno</label><br>
                                                <div class="ui icon input" >
                                                    <input id="codigo_aluno_devolver" name="codigo_aluno" readonly type="number" placeholder="1, 2, 3...">
                                                </div><br><br>

                                                <label>Selecione o Livro para devolver</label><br>
                                                <div class="ui icon input" style="width: 100%">
                                                  <select style="width: 100%" class="ui search dropdown" id="select_livro_devolucao" name="codigo_locacao">
                                                    <option value="">Selecione</option>
                                                  </select>
                                                </div><br><br> 
                                      
                                                <a class="ui inverted primary button" onclick="cadastrar_devolucao()"><i class="address book outline icon"></i>DEVOLVER</a>                                                                                    
                                            </form>
                                        </div>
                                        
                                    </div>

                                     <!-- Modal Confirmar Cadastro -->
                                    <div class="ui basic modal modal_cadastrar">
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
                                        <div class="ui green ok inverted button" onclick="returnYesCadastrar()">
                                            <i class="checkmark icon"></i>
                                            Sim
                                        </div>
                                        </div>
                                    </div>

                                    <!-- Modal Confirmar Devolucao -->
                                    <div class="ui basic modal modal_devolver">
                                        <div class="ui icon header">
                                        <i class="book icon"></i>
                                        Mensagem de Confirmação de Devolução!
                                        </div>
                                        <div class="content" id="confirmar_devolucao" style="text-align: center">
                                        </div>
                                        <div class="actions">
                                        <div class="ui red basic cancel inverted button">
                                            <i class="remove icon"></i>
                                            Não
                                        </div>
                                        <div class="ui green ok inverted button" onclick="returnYesDevolver()">
                                            <i class="checkmark icon"></i>
                                            Sim
                                        </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                      $('.postName').select2({
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
                                        console.log(response)
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


                                   
                                                
                                            