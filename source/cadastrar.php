<?php
    require __DIR__ . "../../modelo/Funcionario.php";
    require __DIR__ . "../../DAO/FuncionarioDAO.php";

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    $funcionario = new Funcionario();
    $funcionarioDAO = new FuncionarioDAO();

    $funcionario->setNome("{$nome}");
    $funcionario->setSenha("{$senha}");

    $return = $funcionarioDAO->inserir($funcionario);

    
    if($return == "0"){
        //Falta de Dados
        echo '0';
   
    } else if($return == "1"){
        //Ja cadastrado
        echo '1';
    } else if($return == "2"){
        //Ja cadastrado
        echo '2';
    }

