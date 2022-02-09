<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('Location: index.php');
    }

    require_once "../../DAO/LivroDAO.php";

    if(!isset($_GET['searchTerm'])){ 
        $json = [];
    } else {
        $searchTerm = $_GET['searchTerm'];

        $livroDAO = new LivroDAO();

        $return = $livroDAO->listarSelect($searchTerm);        
    }

    echo json_encode($return);
?>