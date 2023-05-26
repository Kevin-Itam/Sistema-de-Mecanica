<?php

include 'connect.php';
//var_dump($_POST);
$turma = $_POST['Turma'];
$periodo = $_POST['secte'];
//print_r($_POST);

if (!isset($turma) || empty($turma) || empty($periodo)) {
    echo "<script>alert('Erro ao cadastrar turma! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";


} else {
    if (isset($_POST['secte']) && $_POST['secte'] != 'invalido') {
        $periodo = $_POST['secte'];
        $sql = "INSERT INTO tbl_turma(nome_turma,periodo) VALUES('$turma','$periodo')";
        $conn->query($sql);
        echo "<script>alert('Cadastrado com sucesso'); </script>";
        echo "<script> window.location='cad_geral.php' </script>";
    } else {
        echo "<script>alert('Erro ao cadastrar turma! Favor preencher os campos necessários'); </script>";
        echo "<script> window.location='cad_geral.php' </script>";
    }
}
