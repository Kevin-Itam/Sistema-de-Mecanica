<?php
session_start();
if ((!isset($_SESSION['Usuario']) == true) and (!isset($_SESSION['Senha']) == true)) {
    unset($_SESSION['Usuario']);
    unset($_SESSION['Senha']);
    header('Location: index.php');

}
$logado = $_SESSION['Usuario'];

include 'connect.php';

$turma_result = $conn->query('SELECT * FROM tbl_turma');
$cadastro_result = $conn->query('SELECT * FROM tbl_cadastro');
$carro_result = $conn->query('SELECT * FROM tbl_veiculo');

$periodo_result = $conn->query('SELECT * FROM tbl_turma ORDER BY periodo ASC');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lobster&family=Noto+Sans:wght@400;700&family=Philosopher:wght@700&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <title>Consulta Geral</title>
</head>
<style>
    /*ESTILIZAÇÃO GLOBAL DA PAGINA*/
    body {
        background-image: url(img/black.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    .janela {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Ocultar a janela modal */
        display: none;
    }

    .divmodal {
        display: flex;
        column-gap: 2vw;
        position: absolute;
        top: 60%;
        left: 48%;
        transform: translate(-50%, -50%);
        width: 60%;
        height: 550px;
        color: black;
    }

    input:-webkit-autofill {
        background-color: transparent;
    }

    .corr {
        background-color: antiquewhite;
        height: 33vh;
        width: 60vw;
        position: absolute;
        top: 2vh;
        left: 11%;
        transform: translate(-50px, -50px);
        z-index: -1;
    }

    .divmodal .input_cad {
        height: 35vh;
        width: 24%;
        border: none;
        background-color: white;
    }

    button {
        transition: box-shadow .3s;

    }

    button:hover {
        box-shadow: 15px 10px 30px rgba(33, 33, 33, .9);
    }

    .sec-cad-prof .X-lateral {
        position: absolute;
        top: 3vh;
        right: 3vw;
        z-index: 1;
        font-size: xx-large;
        border-radius: 50px;
        cursor: pointer;
    }

    /*=============================================================================================*/
    /*=============================================================================================*/
    /*=============================================================================================*/
    /*=============================================================================================*/
    /*CADASTRO DE ATIVIDADES */
    .inp_vei {
        height: 20px;
        width: 13vw;
        position: absolute;
        top: 6vh;
        border: 2px solid black;
    }

    .X-lateral-atv {
        position: absolute;
        top: 3vh;
        right: 3vw;
        z-index: 1;
        font-size: xx-large;
        border-radius: 50px;
        cursor: pointer;
    }

    .div-atv {
        width: 70vw;
        height: 65vh;
        border-radius: 30px;
        column-gap: 10vw;
        display: flex;
        align-items: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #BFC0BA;
    }

    .select {
        display: flex;
        align-items: center;
        position: absolute;
        left: 0;
        height: 40px;
        width: 13vw;
        font-size: 20px;
        padding-left: 45px;
        border: 2px solid black;
        border-radius: 5px;
        text-decoration: none;
    }

    .selectt {
        display: flex;
        align-items: center;
        height: 40px;
        width: 13vw;
        font-size: 20px;
        padding-left: 46px;
        border: 2px solid black;
        border-radius: 5px;
    }

    .seletores {
        display: flex;
        flex-direction: row;
        column-gap: 5vw;
        position: absolute;
        top: 20vh;
        left: 20vw;
    }
    textarea {
        border: 2px solid black;
        overflow: auto;
        resize: none;
        position: absolute;
        right: 15vw;
        left: 15vw;
        padding: 10px;
        max-width: 100%;
        border-radius: 5px;
    }

    input[type="date"] {
        background-color: #BFC0BA;
        padding: 4px;
        position: absolute;
        height: 27px;
        top: 20vh;
        left: 5vw;
        color: black;
        font-size: 18px;
        border: 2px solid black;
        outline: none;
        border-radius: 5px;
    }

    ::-webkit-calendar-picker-indicator {
        background-color: #ffffff;
        padding: 5px;
        cursor: pointer;
        border-radius: 3px;
    }

    .inp-data {}

    /*=================================================== */
    .selec_uno {
        display: flex;
        flex-direction: column;
        row-gap: 5vh;
        position: absolute;
        left: 32vw;

    }

    .selec_duo {
        display: flex;
        flex-direction: column;
        row-gap: 5vh;
        position: absolute;
        left: 15vw;
    }

    
    .pp {
        font-size: 16px;
       font-weight: 600;
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
    <!-- TELA MODAL CADASTRO Professor-->
    <!--NAVBAR-->
    <nav class="full">
        <a class="men" href="menu.php">Home</a>
        <a class="men" href="cad_geral.php">Registrar</a>
        <a class="men" href="">Consultar Registros</a>
        <a class="men" href="menu.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>
    <!--==========================================================-->


    <div class="divmodal input_cad" id="divmodal">
         <!-- TELA MODAL consulta PROFESSOR-->
        <div class="corr" id="corr"></div>
        <button class="input_cad" value="open"><a class="pp" href="consulta_prof.php"
                style="text-decoration: none; color:black;">
                <h2>Consulta de <br>Professores</h2><br><br>Consulta o Professor <br>responsavel pelas aulas
            </a></button>

        <!-- TELA MODAL consulta TURMA-->

        <button class="input_cad"><a class="pp" href="consulta_turma.php" style="text-decoration: none; color:black;">
                <h2>Consulta de <br>Turmas</h2><br><br>Conulta as Turmas<br> que terão suas aulas
            </a></button>


        <!-- TELA MODAL consulta VEÍCULO-->

        <button class="input_cad"><a class="pp" href="consulta_veiculo.php" style="text-decoration: none; color:black;">
                <h2>Consulta de <br>Veículos</h2><br><br>Consulta os Veículos <br>que serão usados na aulas
            </a></button>

        <!-- TELA MODAL consulta ATIVIDADE-->

        <button class="input_cad"><a class="pp" href="consulta_atividade.php"
                style="text-decoration: none; color:black;">
                <h2>Consulta de <br>Atividades</h2><br><br>Consulta as atividades <br>realizadas nas aulas
            </a></button>


    </div>
    <script src="JS/janela_modal.js"></script>
</body>

</html>