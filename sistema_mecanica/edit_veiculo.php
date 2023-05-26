<?php


session_start();
include_once("connect.php");


if ((!isset($_SESSION['Usuario']) == true) and (!isset($_SESSION['Senha']) == true)) {
    unset($_SESSION['Usuario']);
    unset($_SESSION['Senha']);
    header('Location: index.php');

}
$logado = $_SESSION['Usuario'];

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM tbl_veiculo WHERE id_veiculo=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_date = mysqli_fetch_array($result)) {
            $modelo = $user_date['modelo_veiculo'];
            $cor = $user_date['cor_veiculo'];
        }
    } else {
        header('Location: consulta_veiculo.php');
    }

}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/STYLE_EDIT.css" rel="stylesheet">
    <title>Editar Veiculo</title>
</head>
<style>
    .sec-edit {
        display: flex;
        row-gap: 15vh;
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

<body>
    <!--NAVBAR-->
    <nav class="full">
        <a class="men" href="menu.php">Home</a>
        <a class="men" href="cad_geral.php">Registrar</a>
        <a class="men" href="consulta_geral.php">Consultar Registros</a>
        <a class="men" href="consulta_veiculo.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>


    <?php

    if (isset($_GET["id"])) {
        if (is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT  * FROM tbl_veiculo WHERE id_veiculo =" . $_GET["id"];
            $executa = mysqli_query($conn, $sql);
            $resultado = mysqli_fetch_array($executa);
        }
    }
    ?>

    <form action="edit_veiculo_proc.php" autocomplete="off">
        <section align="center" class="sec-edit">
            <input type="hidden" name="CampoID" value="<?php echo $resultado["id_veiculo"]; ?>">

            <header class="cabeça-turma" align="center">Editar Veiculo</header>

            <div class="div-edit">
                <input name="Modelo" required autocomplete="name" value="<?php echo $modelo ?>">
                <label> Modelo do Veiculo</label>
            </div>

            <div class="div-edit">
                <input name="Cor" required autocomplete="username" value="<?php echo $cor ?>">
                <label>Cor do Veiculo</label>
            </div>
            <section class="sec-btn">
                <button type="submit" class="btn">EDITAR</button>
            </section>

        </section>
    </form>

</body>

</html>