<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }
    require_once "../../DAO/LocacaoDAO.php";
    $locacaoDAO = new LocacaoDAO();


    $return = '';
    foreach($locacaoDAO->buscar($_POST['codigo_de_barra']) as $item){
        $return.="<option value=\"{$item['codigo']}\">{$item['nome']}</option>";
    }

    echo $return;
