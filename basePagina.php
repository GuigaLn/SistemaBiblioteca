<?php
	session_start();
	if(empty($_SESSION['nome'])){
		header('Location: index.php');
	}
    require_once 'links.php';
    $links = new Links();
?>

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
									

									<!-- Fim do Conteudo -->
								

<?php
	$links->end_navbar();
?>