<?php
    const USER = "root";
    const PASSWORD = "";
    $mysqli = new mysqli('localhost', USER, PASSWORD, 'backupb');

    if(!isset($_GET['searchTerm'])){ 
        $json = [];
    }else{
        $search = $_GET['searchTerm'];
        $sql = "SELECT livro.codigo_de_barra, livro.titulo FROM livro 
                WHERE titulo LIKE '%".$search."%' OR codigo_de_barra LIKE '".$search."%'
                LIMIT 10"; 
        $result = $mysqli->query($sql);
        $json = [];
        while($row = $result->fetch_assoc()){
            $json[] = ['id'=>$row['codigo_de_barra'], 'text'=> $row['codigo_de_barra'], 'subText' => $row['titulo']];
        }
        
    }

    echo json_encode($json);
?>