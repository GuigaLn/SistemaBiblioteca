<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require_once "../../DAO/LocacaoDAO.php";
    $locacaoDAO = new LocacaoDAO();


    $return = '';
    foreach($locacaoDAO->buscarByAluno($_POST['codigo_aluno']) as $item){
        $return.="<option value=\"{$item['codigo']}\">{$item['codigo_de_barra']} - {$item['titulo']}</option>";
    }

    echo $return;
