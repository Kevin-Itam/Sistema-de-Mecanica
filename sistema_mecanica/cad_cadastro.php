<?php

include 'connect.php';
//var_dump($_POST);
$nome = $_POST['Nome'];
$email = $_POST['Email'];
$usuario = $_POST['Usuario'];
$senha = $_POST['Senha'];


if (empty($nome) || empty($email) || empty($usuario) || empty($senha)) {
    echo "<script>alert('Erro ao cadastrar usuário! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";
} else {
    $sql = "INSERT INTO tbl_cadastro(nome_professor,email,username,senha) VALUES('$nome','$email','$usuario','$senha')";
    echo "<script>alert('Cadastrado com sucesso'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";


    $conn->query($sql);

}

