<?php


session_start();
include_once("connect.php");


if ((!isset($_SESSION['Usuario']) == true) and (!isset($_SESSION['Senha']) == true)) {
    unset($_SESSION['Usuario']);
    unset($_SESSION['Senha']);
    header('Location: index.php');
  
  }
  $logado = $_SESSION['Usuario'];



if(!empty($_GET['id'])){

    $id = $_GET['id'];
    
    $sqlSelect = "SELECT * FROM tbl_cadastro WHERE id_professor=$id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while($user_date = mysqli_fetch_array($result)){
            $nome = $user_date['nome_professor'];
            $email = $user_date['email'];
            $usuario = $user_date['username'];
            $senha = $user_date['senha'];
        }
    }
    else
    {
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
    <title>Editar Professor</title>
</head>
<style>
    body {
        background-image: url(img/black.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    header {
        position: relative;
        top: 7%;
        font-size: 20px;
        font-weight: 800;
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
        <a class="men" href="consulta_prof.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>
    <?php

    if (isset($_GET["id"])) {
        if (is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT  * FROM tbl_cadastro WHERE id_professor =" . $_GET["id"];
            $executa = mysqli_query($conn, $sql);
            $resultado = mysqli_fetch_array($executa);
        }
    }
    ?>

    <form action="edit_prof_proc.php" autocomplete="off">

        <section align="center" class="sec-edit">
            <input type="hidden" name="CampoID" value="<?php echo $resultado["id_professor"]; ?>">

            <header align="center">Editar Usuário</header>
            <div class="div-edit ">
                <input name="Nome" required autocomplete="name" value="<?php echo $nome ?>">
                <label>Nome</label>
            </div>

            <div class="div-edit">
                <input name="Usuario" required autocomplete="username" value="<?php echo $usuario ?>">
                <label>Usuario</label>
            </div>

            <div class="div-edit">
                <input name="Email" required autocomplete="email" value="<?php echo $email ?>">
                <label>E-mail</label>
            </div>

            <div class="div-edit">
                <input type="password" id="" name="Senha" required autocomplete="current-password" value="<?php echo $senha ?>">
                <label>Senha</label>
            </div>
            <br>
            <section class="sec-btn">
                <button type="submit" class="btn">EDITAR</button>
            </section>
        </section>



    </form>

</body>

</html>
