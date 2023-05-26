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

    $sqlSelect = "SELECT * FROM tbl_turma WHERE id_turma=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_date = mysqli_fetch_array($result)) {
            $turma = $user_date['nome_turma'];
            $periodo = $user_date['periodo'];
        }
    } else {
        header('Location: consulta_veiculo.php');
    }

}



?>
]
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/STYLE_EDIT.css" rel="stylesheet">
    <title>Editar Turma</title>
</head>
<style>
    .secc-edit {
        align-items: center;
        display: flex;
        flex-direction: column;
        row-gap: 25%;
        position: absolute;
        top: 50%;
        left: 50%;
        height: 70%;
        width: 50%;
        transform: translate(-50%, -50%);
        color: white;
        background: #212121;
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
        <a class="men" href="consulta_turma.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>

    <?php

    if (isset($_GET["id"])) {
        if (is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT  * FROM tbl_turma WHERE id_turma =" . $_GET["id"];
            $executa = mysqli_query($conn, $sql);
            $resultado = mysqli_fetch_array($executa);
        }
    }
    ?>

    <form action="edit_turma_proc.php" autocomplete="off">
        <section align="center" class="secc-edit">
            <input type="hidden" name="CampoID" value="<?php echo $resultado["id_turma"]; ?>">

            <header align="center">Editar Turma</header>

            <div class="div-edit">
                <input name="Turma" required value="<?php echo $turma ?>">
                <label>Nome da Turma</label>
            </div>
            <select name="secte">
                <option value="" readonly>Selecione</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
                <option value="Noturno">Noturno</option>
                <option value="<?php echo $periodo ?>" disabled><?php echo $periodo ?> - Periodo atual</option>
            </select>


            <section class="sec-btn">
                <button type="submit" class="btn">EDITAR</button>
            </section>
        </section>

    </form>

</body>

</html>