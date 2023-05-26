<?php
include_once('connect.php');

if (!empty($_GET['id'])) {


    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM tbl_atividades WHERE id_atividades=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM tbl_atividades WHERE id_atividades=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
}
header('Location: consulta_atividade.php');