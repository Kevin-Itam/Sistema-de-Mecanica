<?php
include_once('connect.php');

if (!empty($_GET['id'])) {


    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM tbl_veiculo WHERE id_veiculo=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM tbl_veiculo WHERE id_veiculo=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
}
header('Location: consulta_veiculo.php');