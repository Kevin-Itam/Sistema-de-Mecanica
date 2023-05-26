<?php

include 'connect.php';
$modelo = $_POST['Modelo'];
$cor = $_POST['Cor'];


if (empty($modelo) || empty($cor)) {
    echo "<script>alert('Erro ao cadastrar veiculo! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";
} else {
    $sql = "INSERT INTO tbl_veiculo(modelo_veiculo,cor_veiculo) VALUES('$modelo','$cor')";
    $conn->query($sql);

    echo "<script>alert('Cadastrado com sucesso'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";

}
?>