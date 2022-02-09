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

        $return = $livroDAO->listarSearch($searchTerm);        

        foreach($return as $item){
            echo "<tr>";
            echo"<td>{$item['codigo_de_barra']}</td>";
            echo "<td>{$item['titulo']}</td>";
            echo"<td>{$item['autor']}</td>";
            echo "<td>{$item['quantidade']}</td>";
            echo"<td>{$item['quantidade_locado']}</td>";
            echo "<td>{$item['prateleira']}</td>";
            echo"<td>{$item['divisoria']}</td>";
            echo "<td><a href=\"frm_edit_livro.php?codigo_de_barra={$item['codigo_de_barra']}\"><i class=\"icon edit\"></i>Editar</a></td>";
            echo"</tr>";
        }
    }

    echo json_encode($return);
?>