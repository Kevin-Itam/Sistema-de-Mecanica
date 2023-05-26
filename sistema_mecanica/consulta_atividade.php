<?php
session_start();

include 'connect.php';

if ((!isset($_SESSION['Usuario']) == true) and (!isset($_SESSION['Senha']) == true)) {
    unset($_SESSION['Usuario']);
    unset($_SESSION['Senha']);
    header('Location: index.php');

}
$logado = $_SESSION['Usuario'];

if (!empty($_GET['nome_professor'])) {
    $data = $_GET['nome_professor'];
    $sql = "SELECT * FROM tbl_atividades WHERE nome_professor LIKE '%$data%'  ORDER BY id_atividades DESC";
} else {
    $sql = "SELECT * FROM tbl_atividades ORDER BY id_atividades DESC";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consultar Atividade</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .X {
        position: absolute;
        top: 2vh;
        right: 2vw;
        z-index: 1;
        font-size: xx-large;
        border-radius: 50px;
        cursor: pointer;
        color: #111;
    }

    .textarea {
        height: 80%;
        width: 100%;
        border: 5px solid black;
        overflow: auto;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%);
        border-radius: 5px;
        padding: 60px 44px;
        transition: box-shadow 0.5s;
    }

    .textarea:focus {
        outline: none;
        box-shadow: 0 0 20px black inset;
    }

    .descc {
        position: absolute;
        top: 50%;
        left: 50%;
        height: 70%;
        width: 50%;
        transform: translate(-50%, -50%);
        color: black;
        display: none;
        /* Ocultar a janela modal */

    }

    body {
        background-color: #212121;
        margin: 0;
        padding: 0;
    }

    h1 {
        margin-top: 4vh;
        margin-bottom: 4vh;
        color: white;
    }

    /*=============TABLE================= */
    .table {
        table-layout: fixed;
        text-align: center;
    }

    /*===================================================== */
    .form__group {
        margin-left: 50px;
        padding: 15px 0 0;
        margin-top: 10px;
        width: 50%;

    }

    .tdd {
        word-break: all;
    }

    .form__field {
        border: 0;
        border-bottom: 2px solid #A27F5F;
        font-size: 20px;
        color: white;
        padding: 16px;
        background: transparent;
        outline: 0;
    }

    ::placeholder {
        font-size: 20px;
        color: white;
    }

    .psq {
        color: #A27F5F;
        background: rgba(214, 206, 206, 0.055);
        border: none;
        padding: 10px 20px;
        display: inline-block;
        font-size: 20px;
        font-weight: 800;
        width: 200px;
        transform: skew(-21deg);
        text-decoration: none;
        position: relative;
        left: 2vw;
        box-sizing: border-box;
        transition: all 400ms ease;
    }

    .psq:hover {
        background: black;
        color: #fd951f;
        box-shadow: inset 0 0 0 3px;
    }

    img {
        height: 60px;
        width: 60px;
        margin: 1px;
    }

    .img-edit {
        position: absolute;
        height: 40px;
        width: 40px;
        right: 6.4vw;
        margin-top: 5px;
    }


    /*===================================================== */
    :root {
        --underline-height: .5em;
        --transition-duration: .5s;
    }

    nav {
        height: 10vh;
        width: 100vw;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .men {
        width: 30%;
        text-align: center;
        cursor: pointer;
        text-decoration: none;
        color: white;

    }

    nav.full {
        font-weight: bold;
        background: #111;
    }

    .men:hover {
        color: #fd951f;
        background-color: #1111;
    }

    abbr {
        cursor: pointer;
    }
</style>

<body>
    <nav class="full">
        <a class="men" href="menu.php">Home</a>
        <a class="men" href="cad_geral.php">Registrar</a>
        <a class="men" href="consulta_geral.php">Consultar Registros</a>
        <a class="men" href="consulta_geral.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>
    <header align="center">
        <h1>Consulta Atividades</h1>
    </header>

    <form id="divBusca" method="GET" action="" autocomplete="off">
        <div class="form__field group">
            <input class="form__field" type="text" name="nome_professor" size="50"
                placeholder="Buscar professor responsável" value="<?php if (isset($_GET['nome_professor']))
                    echo $_GET['nome_professor']; ?>">
            <button class="psq" type="submit">Pesquisar</button>
        </div>
    </form>
    <div class="m-5">
        <table class="table text-white table-bg">
            <tr align="center">
                <th scope="col">#</th>
                <th scope="col">Responsável</th>
                <th scope="col">Data</th>
                <th scope="col">Turma</th>
                <th scope="col">Periodo</th>
                <th scope="col">Veiculo</th>
                <th scope="col">Cor</th>
                <th scope="col">Descrição</th>
                <th scope="col"> &nbsp;&nbsp;Excluir</th>
                <th scope="col">Editar</th>

            </tr>
            <?php
            $pesquisa = "";

            if (isset($_GET['nome_professor']))
                $pesquisa = $conn->real_escape_string($_GET['nome_professor']);

            $sql_code = "SELECT * FROM tbl_atividades WHERE nome_professor LIKE '%$pesquisa%'";
            $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error);
            if ($sql_query->num_rows == 0) {

                ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado...</td>
                </tr>
                <tbody>
                    <?php
            } else {

                while ($row_atividade = $sql_query->fetch_assoc()) {
                    $vaiaparecer = $row_atividade['descricao_atividade'];
                    echo "<tr>";
                    echo "<td>" . $row_atividade['id_atividades'] . "</td>";
                    echo "<td>" . $row_atividade['nome_professor'] . "</td>";
                    echo "<td>" . $row_atividade['datas'] . "</td>";
                    echo "<td>" . $row_atividade['nome_turma'] . "</td>";
                    echo "<td>" . $row_atividade['periodo_turma'] . "</td>";
                    echo "<td>" . $row_atividade['modelo_veiculo'] . "</td>";
                    echo "<td>" . $row_atividade['cor_veiculo'] . "</td>";
                    echo "<td>" . "<button class='btnV' onclick='abrir(" . $row_atividade['id_atividades'] . ")' >Visualizar Descrição</button>" . "</td>";
                    echo "<td>" . '<a class="linkar2" href=excluido_atividade.php?id=' . $row_atividade['id_atividades'] . "><img  src='.\img\lixo-bw.png'></a>" . "</td>";
                    echo "<td>" . '<a class="linkar" href=edit_atividade.php?id=' . $row_atividade['id_atividades'] . "><img class='img-edit' src='.\img\dita.png'></a>" . "</td>";

                    echo "<div data-modal-id='" . $row_atividade['id_atividades'] . "' class='descc div-x'>
                        <span class='X' onclick='fechar(" . $row_atividade['id_atividades'] . ")'><i class='fa-regular fa-circle-xmark'></i></span>
                    <textarea class='textarea' id='tx' rows='10' cols='70' style='resize: none' readonly>" . $row_atividade['descricao_atividade'] . "</textarea>
                    </div> ";


                    echo '</tr>';

                }
            }
            ?>
            </tbody>
            <?php

            ?>
        </table>
    </div>


    <script src="JS/janela_modal.js">

    </script>
</body>

</html>