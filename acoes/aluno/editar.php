<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    
	require_once "../../modelo/Aluno.php";
	require_once "../../DAO/AlunoDAO.php";
	
		
	if(empty($_POST['codigo']) || empty($_POST['nome'])){
        echo '400';
        exit;
    } else{ 
        if($_POST['codigo'] == null || $_POST['nome'] == null){
            echo '400';
            exit;
        } else { 
            $aluno = new Aluno();
            $alunoDAO = new AlunoDAO();

            $aluno->setCodigo($_POST["codigo"]);
            $aluno->setNome($_POST["nome"]);
            
            $return = $alunoDAO->alterar($aluno);

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
    }