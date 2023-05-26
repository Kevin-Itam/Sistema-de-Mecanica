<?php
include 'connect.php';

$result_atv = "SELECT * FROM tbl_atividades ORDER BY id_atividades DESC ";
$resultado_atv = mysqli_query($conn,$result_atv);

if(($resultado_atv)->num_rows != 0){
    while($row_atividade = mysqli_fetch_assoc($resultado_atv)){
        echo $row_atividade['descricao_atividade'];
    }
}else{
    echo "nenhum resultado";
}





?>
 