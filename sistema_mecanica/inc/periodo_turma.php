<?php
	require_once '../connect.php';
    $periodo_result = $conn->query('SELECT * FROM tbl_turma WHERE id_turma = '.$_POST['idTurma'].' ORDER BY periodo ASC');
	$row_periodo = $periodo_result->fetch_assoc();
	echo json_encode($row_periodo);
