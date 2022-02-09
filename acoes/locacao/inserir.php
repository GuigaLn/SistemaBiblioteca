<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    
	require_once "../../modelo/Locacao.php";
    require_once "../../DAO/LocacaoDAO.php";
    
    require_once "../../DAO/LivroDAO.php";
    
    $livroDAO = new LivroDAO();
	
    if(!isset($_POST["codigo_de_barra"]) || !isset($_POST["codigo_aluno"]) || !isset($_SESSION["nome"])) {
        echo '400';
    } else {
        if($livroDAO->buscarNome($_POST["codigo_de_barra"])->rowCount()){

            $locacao = new Locacao();
            $locacaoDAO = new LocacaoDAO();

            $locacao->setCodigo_aluno($_POST["codigo_aluno"]);
            $locacao->setFuncionario($_SESSION['nome']);
            $locacao->setCodigo_de_barra($_POST["codigo_de_barra"]);

            $return = $locacaoDAO->inserir($locacao);

            if($return == "400"){
                //Falta de Dados
                echo '400';
            } else if($return == "200"){
                // cadastrado
                $livroDAO->emprestimo($_POST["codigo_de_barra"]);
                echo '200';
            }
        } else {
            echo '400';
        }
    }