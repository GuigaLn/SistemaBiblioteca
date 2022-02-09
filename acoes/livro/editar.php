<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

	require_once "../../modelo/Livro.php";
	require_once "../../DAO/LivroDAO.php";
		
	if(empty($_POST['codigo_de_barra']) || empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['quantidade']) || empty($_POST['prateleira']) || empty($_POST['divisoria'])){
        echo '400';
        exit;
    } else{ 
        if($_POST['codigo_de_barra'] == null || $_POST['titulo'] == null || $_POST['autor'] == null || $_POST['quantidade'] == null || $_POST['prateleira'] == null || $_POST['divisoria'] == null){
            echo '400';
            exit;
        } else{ 
            
            $livro = new Livro();
            $livroDAO = new LivroDAO();

            $livro->setCodigo_de_barra($_POST["codigo_de_barra"]);
            $livro->setTitulo($_POST["titulo"]);
            $livro->setAutor($_POST["autor"]);
            $livro->setQuantidade($_POST["quantidade"]);
            $livro->setPrateleira($_POST["prateleira"]);
            $livro->setDivisoria($_POST["divisoria"]);

            $return = $livroDAO->alterar($livro, $_POST['codigo_de_barra_antigo']);

            if($return == "400"){
                //Falta de Dados
                echo '400';
            } else if($return == "409"){
                //Ja cadastrado, adicionado
                echo '409';
            } else if($return == "200"){
                //cadastrado
                echo '200';
            } 
        }
    }

        