<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

	require_once "../../modelo/Turma.php";
	require_once "../../DAO/TurmaDAO.php";
		
	if(empty($_POST['codigo']) || empty($_POST['descricao']) || empty($_POST['periodo'])){
        echo '400';
        exit;
    } else{ 
        if($_POST['codigo'] == null || $_POST['descricao'] == null || $_POST['periodo'] == null){
            echo '400';
            exit;
        } else { 
            $turma = new Turma();
            $turmaDAO = new TurmaDAO();

            $turma->setCodigo($_POST["codigo"]);
            $turma->setDescricao($_POST["descricao"]);
            $turma->setPeriodo($_POST["periodo"]);
            $turma->setAno_letivo($_SESSION['ano_letivo']);

            $return = $turmaDAO->alterar($turma);

            if($return == "400"){
                //Falta de Dados
                echo '400';
            } else if($return == "409"){
                //Ja cadastrado
                echo '409';
            } else if($return == "200"){
                //Ja cadastrado
                echo '200';
            }
            
        }
    }

        

        