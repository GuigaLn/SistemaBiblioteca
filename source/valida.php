<?php
    require_once __DIR__ .'/DBConexao.php';
    
    //Falta Session
    if($_POST['nome'] != null && $_POST['senha'] != null){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $nome = filter_var($nome, FILTER_SANITIZE_STRIPPED);
        $senha = filter_var($senha, FILTER_SANITIZE_STRIPPED);

        $conexao = DBConexao::getInstance();

        $query = $conexao->prepare("SELECT codigo,nome FROM funcionario WHERE nome = ? AND senha = ?");

        $query->bindValue(1, $nome);
        $query->bindValue(2, $senha);

        $query->execute();
            
        if($query->rowCount()){
            $query = $conexao->prepare("SELECT MAX(ano_letivo) AS 'ano_letivo' FROM turma ORDER BY ano_letivo");
            $query->execute();
            $query = $query->fetch();

            session_start();
            $_SESSION['nome'] = $nome;
            $_SESSION['ano_letivo'] = $query['ano_letivo'];
            echo "1";
        }else{
            echo "0";
        }
    }