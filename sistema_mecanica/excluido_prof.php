<?php
include_once('connect.php');

if (!empty($_GET['id'])) {


    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM tbl_cadastro WHERE id_professor=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM tbl_cadastro WHERE id_professor=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
}
header('Location: consulta_prof.php');