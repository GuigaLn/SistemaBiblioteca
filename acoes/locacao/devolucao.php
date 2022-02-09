<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    
	
    require_once "../../DAO/LocacaoDAO.php";
    require_once "../../DAO/LivroDAO.php";
		
	if($_POST['codigo_locacao'] != null){

        $locacaoDAO = new LocacaoDAO();
        $livroDAO = new LivroDAO();

        $return = $locacaoDAO->devolucao($_POST['codigo_locacao']);

        if($return == "400"){
            //Falta de Dados
            echo '400';
        } else if($return == "200"){
            $livroDAO->devolucao($_POST['codigo_de_barra']);
            echo '200';
        }
    } else {
        echo '400';
    }