<?php
	session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

	require_once "../../modelo/Livro.php";
	require_once "../../DAO/LivroDAO.php";
		
	if(isset($_POST["salvar"])){}

        $livro = new Livro();
        $livroDAO = new LivroDAO();

        $livro->setCodigo_de_barra($_POST["codigo_de_barra"]);
        $livro->setTitulo($_POST["titulo"]);
        $livro->setAutor($_POST["autor"]);
        $livro->setQuantidade($_POST["quantidade"]);
        $livro->setPrateleira($_POST["prateleira"]);
        $livro->setDivisoria($_POST["divisoria"]);

        $return = $livroDAO->inserir($livro);

        if($return == "400"){
            //Falta de Dados
            echo '400';
        } else if($return == "202"){
            //Ja cadastrado, adicionado
            echo '202';
        } else if($return == "200"){
            //cadastrado
            echo '200';
        } 