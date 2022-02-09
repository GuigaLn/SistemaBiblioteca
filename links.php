<?php 
class links{ 
    function __construct(){
        echo '
            <!DOCTYPE html>
            <html>
            <head>
            <!-- Standard Meta -->
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
            

            <link rel="stylesheet" type="text/css" href="alert/src/docs.css">
            <link rel="stylesheet" type="text/css" href="alert/src/rtl.css">
            <link rel="stylesheet" type="text/css" href="alert/src/home.css">
            <link rel="stylesheet/less" type="text/css" href="alert/src/button.less" />
            <link rel="stylesheet" type="text/css" href="alert/Semantic-UI-Alert/Semantic-UI-Alert.css">
            <script type="text/javascript" src="alert/jQuery/jQuery.min.js"></script>
            <script src="alert/Semantic-UI-Alert/Semantic-UI-Alert.js"></script>

            <!-- Site Properties -->
            <title>Login Example - Semantic</title>
            <link rel="stylesheet" type="text/css" href="dist/components/reset.css">
            <link rel="stylesheet" type="text/css" href="dist/components/site.css">
            <link rel="stylesheet" type="text/css" href="dist/components/container.css">
            <link rel="stylesheet" type="text/css" href="dist/components/grid.css">
            <link rel="stylesheet" type="text/css" href="dist/components/header.css">
            <link rel="stylesheet" type="text/css" href="dist/components/image.css">
            <link rel="stylesheet" type="text/css" href="dist/components/menu.css">
            <link rel="stylesheet" type="text/css" href="dist/components/divider.css">
            <link rel="stylesheet" type="text/css" href="dist/components/segment.css">
            <link rel="stylesheet" type="text/css" href="dist/components/form.css">
            <link rel="stylesheet" type="text/css" href="dist/components/input.css">
            <link rel="stylesheet" type="text/css" href="dist/components/button.css">
            <link rel="stylesheet" type="text/css" href="dist/components/list.css">
            <link rel="stylesheet" type="text/css" href="dist/components/message.css">
            <link rel="stylesheet" type="text/css" href="dist/components/icon.css">
            <script src="dist/components/form.js"></script>
            <script src="dist/components/transition.js"></script>

            <!-- DataTable -->
            <link rel="stylesheet" href="dist/table/fomantic-ui/semantic.min.css">
            <link rel="stylesheet" href="dist/table/datatables.net/datatables.net-se/css/dataTables.semanticui.min.css">
            <link rel="stylesheet" href="dist/table/datatables.net/datatables.net-responsive-se/css/responsive.semanticui.min.css">
            <link rel="stylesheet" href="dist/table/datatables.net/datatables.net-buttons-se/css/buttons.semanticui.min.css">

            
            <script src="dist/table/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-se/js/dataTables.semanticui.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-responsive-se/js/responsive.semanticui.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-buttons/js/buttons.colVis.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="dist/table/datatables.net/datatables.net-buttons-se/js/buttons.semanticui.min.js"></script>
            <script src="dist/table/jszip/jszip.min.js"></script>
            <script src="dist/table/pdfmake/pdfmake.min.js"></script>
            <script src="dist/table/pdfmake/vfs_fonts.js"></script>

            <link href="dist/select2.min.css" rel="stylesheet" />
            <script src="dist/select2.min.js"></script>

            <script>
            $(window).on("load", function(){
                $("#status").fadeOut();
                $("#preloader").delay(0).fadeOut("slow");
                });
            </script>
            
    
            <style type="text/css">
            html, body {
                background-color: #eeeeee;
                height: 100%;
                margin: 0;
                padding: 0; }
              
              canvas {
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none; }
              
              .navcolor {
                background-color: #0097a7 !important; }
              
              .navtext {
                color: #ffffff !important; }
              
              .clear {
                margin: 0px 10px; }
              
              .imgrad {
                border-radius: 50%; }
              
              .hidden {
                display: none; }
              
              .clearsidebar {
                margin-top: 40px; }
              
              #sidebar-image {
                max-height: 90px;
                max-width: 90px;
                height: 90px;
                width: 90px;
                margin-left: auto;
                margin-right: auto;
                border-radius: 50%; }
              
              #computersidebar {
                position: fixed;
                top: 1em;
                left: 0;
                padding: 0;
                bottom: 0;
                background-color: #FFF; }
              
              .scrollable {
                overflow-y: auto;
                overflow-x: hidden; }
              
              #simplefluid {
                height: 100%;
                border-bottom: 0 none !important;
                box-shadow: none; }
              
              #content {
                top: 1em; }
              
              .simpleimage {
                color: #fff;
                text-align: center; }
              
              .itemcolor1 {
                background-color: #ef5350 !important; }
              
              .itemcolor2 {
                background-color: #1976d2 !important; }
              
              .itemcolor3 {
                background-color: #009688 !important; }
              
              .itemcolor4 {
                background-color: #ffb300 !important; }
              
              i.simpleicon.simpleicon.simpleicon.icon, i.simpleicon.simpleicon.simpleicon.icons {
                line-height: 1.6;
                font-size: 3em;
                width: 100%;
                height: 100%; }
              
              .simplelable {
                width: 100%;
                text-align: center; }
                #preloader{
                  position: fixed;
                  top: 0;
                  left: 0;
                  right: 0;
                  left: 0;
                  background-color: #FFF;
                  z-index: 999;
                  height: 100%;
                  width: 100%;
              }
              #status{
                  width: 256px;
                  height: 256px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  margin: -128px 0 0 -128px;
                  background: url(images/pre_loader.gif) center no-repeat;
              }
            </style>
        ';
    }

    function script(){
        echo "
        $(document).ready(function(){
            // - ACCOUNT DROPDOWN
            $('.ui.admindropdown').dropdown({
                transition: 'swing down',
                on : 'click',
                duration  : 1000			
            });
        
            $('.ui.sidebardropdown').dropdown({
                transition: 'swing left',
                on : 'click',
                duration  : 1000
            });
            $('.ui.moredropdown').dropdown({
                transition: 'swing down',
                duration  : 1000
            });
        
            // - SHOW & HIDE SIDEBAR
            $(\"#showmobiletabletsidebar\").click(function(){
                $('.mobiletabletsidebar.animate .menu').transition({
                      animation : 'swing right',
                    duration  : 1000
                  })
                ;
                $('#mobiletabletsidebar').removeClass('hidden');
            });
            $(\"#hidemobiletabletsidebar\").click(function(){
                $('.mobiletabletsidebar.animate .menu')
                  .transition({
                      animation : 'fade',
                    duration  : 1000
                  });
            });
            // - DATA TABLES
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );
            table.buttons().container()
                .appendTo( $('div.eight.column:eq(0)', table.table().container()) );
        }); ";
    
    }

    function nav_bar(){
        echo '
        <div id="preloader">
            <div id="status"></div>
        </div>

        <div class="ui grid">
		<div class="row">
			<div class="ui grid">
				<!-- BEGIN NAVBAR -->
				<!-- computer only navbar -->
				<div class="computer only row">
					<div class="column">
						<div class="ui top fixed menu navcolor">
							<div class="item">
								<img src="images/logo.png" alt="SimpleIU">
							</div>
							<div class="left menu">
								<div class="nav item">
									<strong class="navtext">SGB</strong>
								</div>
							</div>
							<div class="ui top pointing dropdown admindropdown link item right">
								<img class="imgrad" src="images/user.png" alt="">
								<span class="clear navtext"><strong>ACCOUNT</strong></span>
								<i class="dropdown icon navtext"></i>
								<div class="menu">
									<div class="item"><p><i class="settings icon"></i>Account Setting</p></div>
									<div class="item"><a href="source/sair.php"><i class="sign out alternate icon"></i>Logout</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end computer only navbar -->
				<!-- mobile and tablet only navbar -->
				<div class="tablet mobile only row">
					<div class="column">
				    <div class="ui top fixed menu navcolor">
						<a id="showmobiletabletsidebar" class="item navtext"><i class="content icon"></i></a>
						<div class="right menu">
							<div class="item">
								<strong class="navtext">SGB</strong>
							</div>
							<div class="item">
								<img src="images/logo.png">
							</div>
						</div>
					</div>
					</div>
				</div>
				<!-- end mobile and tablet only navbar -->
				<!-- END NAVBAR -->

				<!-- BEGIN SIDEBAR -->
				<!-- mobile and tablet only sidebar -->
				<div class="tablet mobile only row">
					<div id="mobiletabletsidebar" class="mobiletabletsidebar animate hidden">
						<div class="ui left fixed vertical menu scrollable">
							<div class="item">
								<table>
									<tr>
										<td>
											<img class="ui mini image" src="images/logo.png">
										</td>
										<td>
											<span class="clear"><strong>BIBLIOTECA</strong></span>
										</td>
									</tr>
								</table>
							</div>
              <a class="item" href="dashboard.php"><i class="home icon"></i> Dashboard</a>
              <a class="item" href="frm_cad_locacao.php"><i class="book icon"></i> Cadastrar emprestimo</a>
              <a class="item" href="devolucao.php"><i class="book icon"></i> Devolver emprestimo</a>
              <a class="item" href="lista_turmas.php"><i class="archive icon"></i>Listagem </a>
							<a class="item"><i class="settings icon" href="alt_ano_letivo.php"></i> Alterar ano letivo</a>	
              <a class="item" href="relatorio.php"><i class="table icon"></i> Relatório </a>
							<a class="item" href="source/sair.php"><i class="sign out alternate icon"></i> Logout</a>
							<a class="item" href="https://semantic-ui.com/"><i class="heart icon"></i>Sobre</a>
							<div class="item" id="hidemobiletabletsidebar">
								<button class="fluid ui button">
									Close
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end mobile and tablet only sidebar -->
				<!-- computer only sidebar -->
				<div class="computer only row">
					<div class="left floated three wide computer column" id="computersidebar">
						<div class="ui vertical fluid menu scrollable" id="simplefluid">
							<div class="clearsidebar"></div>
							<div class="item">
								<img src="images/user.png" id="sidebar-image">
							</div>
							<a class="item" href="dashboard.php"><i class="home icon"></i> Dashboard</a>
							<div class="ui right pointing dropdown sidebardropdown link item">
								<i class="angle right icon"></i>
								Cadastrar
								<div class="menu">
									<a href="frm_cad_aluno.php" class="item"><p><i class="user icon"></i> Alunos</p></a>
									<a href="frm_cad_turma.php" class="item"><p><i class="archive icon"></i> Turmas</p></a>
									<a href="frm_cad_aluno_turma.php" class="item"><p><i class="users icon"></i> Vincular alunos</p></a>
									<a href="frm_cad_livro.php" class="item"><p><i class="book icon"></i> Livros</p></a>
								</div>
              </div>		
              <a class="item" href="lista_turmas.php"><i class="archive icon"></i>Listagem</a>
              <a class="item" href="frm_cad_locacao.php"><i class="book icon"></i> Cadastrar emprestimo</a>	
              <a class="item" href="devolucao.php"><i class="book icon"></i> Devolver emprestimo</a>	
              <div class="ui right pointing dropdown sidebardropdown link item">
								<i class="angle right icon"></i>
								Ano letivo
								<div class="menu">
                  <a class="item" href="alt_ano_letivo.php"><i class="settings icon"></i> Alterar ano letivo</a>	
								</div>
              </div>
              <a class="item" href="relatorio.php"><i class="table icon"></i> Relatórios </a>
							<a class="item"  href="source/sair.php"><i class="sign out alternate icon"></i> Logout</a>
							<a class="item" href="https://semantic-ui.com/"><i class="heart icon"></i>Sobre</a>
							<a class="item"></a>
						</div>
					</div>
				</div>
				<!-- end computer only sidebar -->
				<!-- END SIDEBAR -->
			</div>
		</div>';
    }

    function end_navbar(){
        echo "</div>
						</div>
					</div>
				</div>
			</div>
        </div>";

        echo "
        <script>
        $(document).ready(function(){
            // - ACCOUNT DROPDOWN
            $('.ui.admindropdown').dropdown({
                transition: 'swing down',
                on : 'click',
                duration  : 1000			
            });
        
            $('.ui.sidebardropdown').dropdown({
                transition: 'swing left',
                on : 'click',
                duration  : 1000
            });
            $('.ui.moredropdown').dropdown({
                transition: 'swing down',
                duration  : 1000
            });
        
            // - SHOW & HIDE SIDEBAR
            $(\"#showmobiletabletsidebar\").click(function(){
                $('.mobiletabletsidebar.animate .menu').transition({
                      animation : 'swing right',
                    duration  : 1000
                  })
                ;
                $('#mobiletabletsidebar').removeClass('hidden');
            });
            $(\"#hidemobiletabletsidebar\").click(function(){
                $('.mobiletabletsidebar.animate .menu')
                  .transition({
                      animation : 'fade',
                    duration  : 1000
                  });
            });
            // - DATA TABLES
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );
            table.buttons().container()
                .appendTo( $('div.eight.column:eq(0)', table.table().container()) );

            
                // - SIMPLE
              $(document).ready(function() {
                  $('#table_simple').DataTable();
              } );
              var tableSimple = $('#table_simple').DataTable( {
                  searching: false,
                  lengthChange: false,
                  paging:   false,
                  info: false
              } );
              tableSimple.buttons().container()
                  .appendTo( $('div.eight.column:eq(0)', tableSimple.table().container()) );
        }); </script></body></html>";

    }
}