<?php
include 'connect.php';

$id = filter_input(INPUT_GET, 'CampoID', FILTER_SANITIZE_NUMBER_INT);
$Nome = filter_input(INPUT_GET, 'Nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_GET, 'Email', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_GET, 'Usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_GET, 'Senha', FILTER_SANITIZE_STRING);


if (empty($Nome) || empty($email) || empty($username) || empty($senha)|| empty($id)) {
    echo "<script>alert('Erro ao cadastrar usuário! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='consulta_geral.php' </script>";
} else {
    $update_prof = "UPDATE tbl_cadastro SET nome_professor='$Nome', email='$email', username='$username', senha='$senha' WHERE id_professor='$id'";
    mysqli_query($conn, $update_prof);
    echo "<script>  window.location='consulta_prof.php' </script>";

}
