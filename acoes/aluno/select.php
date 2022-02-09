<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

    require_once "../../DAO/AlunoDAO.php";

    if(!isset($_GET['searchTerm'])){ 
        $json = [];
    } else {
        $searchTerm = $_GET['searchTerm'];

        $alunoDAO = new AlunoDAO();

        $return = $alunoDAO->listarSelect($searchTerm);        
    }

    echo json_encode($return);
?>