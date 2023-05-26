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
    $sql = "SELECT * FROM tbl_cadastro WHERE nome_professor LIKE '%$data%'  ORDER BY id_professor DESC";
} else {
    $sql = "SELECT * FROM tbl_cadastro ORDER BY id_professor DESC";

}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consultar Professor</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #212121;
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
        right: 9vw;
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
</style>

<body class="">
    <nav class="full">
        <a class="men" href="menu.php">Home</a>
        <a class="men" href="cad_geral.php">Registrar</a>
        <a class="men" href="consulta_geral.php">Consultar Registros</a>
        <a class="men" href="consulta_geral.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>
    <header align="center" class="">
        <h1 class="">Consulta Professores</h1>
    </header>

    <form id="divBusca" method="GET" action="" autocomplete="off">
        <div class="form__field group">
            <input class="form__field" type="text" name="nome_professor" size="50" placeholder="Buscar professor" value="<?php if (isset($_GET['nome_professor']))
                echo $_GET['nome_professor']; ?>">
            <button class="psq" type="submit">Pesquisar</button>
        </div>
    </form>
    <div class="m-5">
        <table class="table text-white table-bg">


            <tr>
                <th scope="col">#</th>
                <th scope="col">Professor</th>
                <th scope="col">E-mail</th>
                <th scope="col">Usuário</th>
                <th scope="col">Excluir</th>
                <th scope="col">Editar</th>
            </tr>


            <?php


            $pesquisa = "";

            if (isset($_GET['nome_professor']))
                $pesquisa = $conn->real_escape_string($_GET['nome_professor']);

            $sql_code = "SELECT * FROM tbl_cadastro WHERE nome_professor LIKE '%$pesquisa%'";
            $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error);

            if ($sql_query->num_rows == 0) {

                ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado...</td>
                </tr>
                <tbody>
                    <?php
            } else {

                while ($row_usuario = $sql_query->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row_usuario['id_professor'] . "</td>";
                    echo "<td>" . $row_usuario['nome_professor'] . "</td>";
                    echo "<td>" . $row_usuario['email'] . "</td>";
                    echo "<td>" . $row_usuario['username'] . "</td>";
                    echo "<td>" . '<a class="linkar2" href=excluido_prof.php?id=' . $row_usuario['id_professor'] . "><img  src='.\img\lixo-bw.png'></a>" . "</td>";
                    echo "<td>" . '<a class="linkar" href=edit_prof.php?id=' . $row_usuario['id_professor'] . "><img class='img-edit' src='.\img\dita.png'></a>" . "</td>";
                    echo '</tr>';
                }

            }
            ?>
            </tbody>
            <?php

            ?>
        </table>
    </div>
</body>

</html>