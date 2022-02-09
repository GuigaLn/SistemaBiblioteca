<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    
	require_once "../../modelo/Aluno_turma.php";
	require_once "../../DAO/Aluno_TurmaDAO.php";
	
		
	if(!isset($_POST["codigo_aluno"])){
        echo '400';
    } else {
        $aluno_turma = new Aluno_turma();
        $aluno_turmaDAO = new Aluno_TurmaDAO();

        $aluno_turma->setCodigo_aluno($_POST['codigo_aluno']);
        $aluno_turma->setCodigo_turma($_POST['codigo_turma']);

        $return = $aluno_turmaDAO->inserir($aluno_turma,$_SESSION['ano_letivo']);

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
    }