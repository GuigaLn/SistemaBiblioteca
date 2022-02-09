<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

	require_once "../../modelo/Turma.php";
	require_once "../../DAO/TurmaDAO.php";
		
	if(isset($_POST["salvar"])){}

        $turma = new Turma();
        $turmaDAO = new TurmaDAO();

        $turma->setDescricao($_POST["descricao"]);
        $turma->setAno_letivo($_SESSION['ano_letivo']);
        $turma->setPeriodo($_POST["periodo"]);

        $return = $turmaDAO->inserir($turma);

        if($return == "400"){
            //Falta de Dados
            echo '400';
        } else if($return == "409"){
            //Ja cadastrado
            echo '409';
        } else if($return == "200"){
            //cadastrado
            echo '200';
        }