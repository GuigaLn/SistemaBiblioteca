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

        $return = $alunoDAO->listarSearch($searchTerm);        

        foreach($return as $item){
          echo "<tr>";
          echo"<td>{$item['codigo']}</td>";
          echo "<td>{$item['nome']}</td>";
          echo "<td><a href=\"frm_edit_aluno.php?codigo={$item['codigo']}\"><i class=\"icon edit\"></i>Editar</a></td>";
          echo"</tr>";
        }
    }

    echo json_encode($return);
?>