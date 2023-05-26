<?php
include 'connect.php';

$id = filter_input(INPUT_GET, 'CampoID', FILTER_SANITIZE_NUMBER_INT);
$modelo = filter_input(INPUT_GET, 'Modelo', FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_GET, 'Cor', FILTER_SANITIZE_STRING);

if (empty($modelo) || empty($cor)) {
    echo "<script>alert('Erro ao cadastrar veiculo! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='consulta_geral.php' </script>";
} else {
    $update_veiculo = "UPDATE tbl_veiculo SET modelo_veiculo='$modelo', cor_veiculo='$cor' WHERE id_veiculo='$id'";
    mysqli_query($conn, $update_veiculo);
    echo "<script>  window.location='consulta_veiculo.php' </script>";

}