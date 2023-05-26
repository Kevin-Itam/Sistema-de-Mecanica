<?php
include 'connect.php';

$id = filter_input(INPUT_GET, 'CampoID', FILTER_SANITIZE_NUMBER_INT);
$Nome = filter_input(INPUT_GET, 'Turma', FILTER_SANITIZE_STRING);
$Turno = filter_input(INPUT_GET, 'secte', FILTER_SANITIZE_STRING);


if (empty($Nome) || empty($Turno)) {
    echo "<script>alert('Erro ao cadastrar turma! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='consulta_geral.php' </script>";


} else {
    $update_turma = "UPDATE tbl_turma SET nome_turma='$Nome', periodo='$Turno' WHERE id_turma='$id'";
    mysqli_query($conn, $update_turma);
    echo "<script>  window.location='consulta_turma.php' </script>";
}