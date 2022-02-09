<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    
	require_once "../../modelo/Aluno.php";
	require_once "../../DAO/AlunoDAO.php";
	
		
	if(isset($_POST["salvar"])){}

        $aluno = new Aluno();
        $alunoDAO = new AlunoDAO();

		$aluno->setNome($_POST["nome"]);

        $return = $alunoDAO->inserir($aluno);
        
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