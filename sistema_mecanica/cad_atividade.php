<?php

include 'connect.php';
//var_dump($_POST);
$professor = ($_POST['nome_professor']);
$turma = $_POST['select_turma'];
$periodo = $_POST['periodo_turma'];
$modelo = $_POST['select_veiculo'];
$cor = $_POST['cor_veiculo'];
$data = $_POST['data_atividade'];
$texto = $_POST['texto_atividade'];


if (empty($data) || empty($texto)) {

    echo "<script>alert('Erro ao registrar! Favor preencher os campos corretamente'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";

} else {
    $nome_result_turma = ("SELECT nome_turma FROM tbl_turma WHERE id_turma = $turma");
    $cons_turma = $conn->query($nome_result_turma);

    if ($cons_turma && $cons_turma->num_rows > 0)
        ; {
        $row_turma = $cons_turma->fetch_assoc();
        $id_turma = $row_turma['nome_turma'];
    }
    $nome_result_modelo = ("SELECT modelo_veiculo FROM tbl_veiculo WHERE id_veiculo = $modelo");
    $cons_modelo = $conn->query($nome_result_modelo);

    if ($cons_modelo && $cons_modelo->num_rows > 0)
        ; {
        $row_modelo = $cons_modelo->fetch_assoc();
        $id_modelo = $row_modelo['modelo_veiculo'];


    }
    $sql = "INSERT INTO tbl_atividades(nome_professor,nome_turma,periodo_turma,modelo_veiculo,cor_veiculo,datas,descricao_atividade) 
    VALUES('$professor','$id_turma','$periodo','$id_modelo','$cor','$data','$texto')";
    $conn->query($sql);
    echo "<script>alert('Registrado com sucesso'); </script>";
    echo "<script> window.location='cad_geral.php' </script>";
}


//print_r($id_turma);
//print_r($id_modelo);
//print_r($_POST);

?>