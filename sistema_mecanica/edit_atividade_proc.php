<?php

include 'connect.php';
//var_dump($_POST);
$id = filter_input(INPUT_GET, 'CampoID', FILTER_SANITIZE_NUMBER_INT);
$professor = filter_input(INPUT_GET, 'nome_professor', FILTER_SANITIZE_STRING);
$turma = filter_input(INPUT_GET, 'select_turma', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_GET, 'periodo_turma', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_GET, 'select_veiculo', FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_GET, 'cor_veiculo', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_GET, 'data_atividade', FILTER_SANITIZE_STRING);
$texto = filter_input(INPUT_GET, 'texto_atividade', FILTER_SANITIZE_STRING);



if (empty($data) || empty($texto) || empty($modelo) || empty($cor) || empty($periodo) || empty($turma) || empty($professor)) {

    echo "<script>alert('Erro ao registrar! Favor preencher os campos corretamente'); </script>";
    echo "<script> window.location='consulta_geral.php' </script>";

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
    $update_atividade = "UPDATE tbl_atividades SET nome_professor='$professor', nome_turma='$id_turma', periodo_turma='$periodo', modelo_veiculo='$id_modelo', cor_veiculo='$cor'
    , datas='$data', descricao_atividade='$texto' WHERE id_atividades='$id'";

    mysqli_query($conn, $update_atividade);

    echo "<script>  window.location='consulta_atividade.php' </script>";
}

print_r($professor);
echo '<br>';
print_r($id_turma);
echo '<br>';
print_r($periodo);
echo '<br>';
print_r($id_modelo);
echo '<br>';
print_r($cor);
echo '<br>';
print_r($data);
echo '<br>';
print_r($texto);