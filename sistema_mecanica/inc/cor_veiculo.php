<?php
	require_once '../connect.php';
    $cor_result = $conn->query('SELECT * FROM tbl_veiculo WHERE id_veiculo = '.$_POST['idCor'].' ORDER BY cor_veiculo ASC');
	$row_veiculo = $cor_result->fetch_assoc();
	echo json_encode($row_veiculo);
