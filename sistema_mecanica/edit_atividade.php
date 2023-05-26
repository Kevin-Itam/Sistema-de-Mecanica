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
    
    $sqlSelect = "SELECT * FROM tbl_atividades WHERE id_atividades=$id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while($user_date = mysqli_fetch_array($result)){
            $nome = $user_date['nome_professor'];
            $modelo = $user_date['modelo_veiculo'];
            $cor = $user_date['cor_veiculo'];
            $turma = $user_date['nome_turma'];
            $periodo = $user_date['periodo_turma'];
            $data = $user_date['datas'];
            $texto = $user_date['descricao_atividade'];
        }
    }
    else
    {
        header('Location: consulta_veiculo.php');
    }

}

$turma_result = $conn->query('SELECT * FROM tbl_turma');
$cadastro_result = $conn->query('SELECT * FROM tbl_cadastro');
$carro_result = $conn->query('SELECT * FROM tbl_veiculo');

$periodo_result = $conn->query('SELECT * FROM tbl_turma ORDER BY periodo ASC');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/STYLE_EDIT.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <title>Editar Atividades</title>
</head>
<style>
    header {
        position: relative;
        top: 6vh;
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
        <a class="men" href="consulta_atividade.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>
    <?php


    if (isset($_GET["id"])) {
        if (is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT  * FROM tbl_atividades WHERE id_atividades =" . $_GET["id"];
            $executa = mysqli_query($conn, $sql);
            $resultado = mysqli_fetch_array($executa);
        }
    }
    ?>

    <form action="edit_atividade_proc.php" autocomplete="off">

        <section class="sec-edit">
            <section align="center" class="sec-g testo">
                <input type="hidden" name="CampoID" value="<?php echo $resultado["id_atividades"]; ?>">

                <header align="center">Editar Atividade</header>
                <!--primeiro select-->
                <section class="nome" name="nome_professor">
                    <select name='nome_professor'>
                    <option disabled><?php echo $nome ?> - Nome Atual </option>
                    <option value="" readonly>Professor</option>
                        <?php
                        while ($row_cadastro = $cadastro_result->fetch_array()) {
                            
                            ?>
                            <option value="<?php echo $row_cadastro['nome_professor']; ?>">
                                <?php echo $row_cadastro["nome_professor"] ?> </option>

                        <?php } ?>

                    </select>
                </section>


                <div>
                    <!--segundo select-->
                    <section class="sec-duo">
                        <select name="select_turma">
                        <option disabled><?php echo $turma ?> - Turma Atual </option>
                        <option value="" readonly>Turma</option>
                            <?php
                            while ($row_turma = $turma_result->fetch_array()) {
                                $periodo = $row_turma['periodo'];
                                ?>
                                <option value="<?php echo $row_turma['id_turma']; ?>"><?php echo $row_turma["nome_turma"] ?>
                                </option>
                            <?php } ?>
                        </select>

                        <script>
                            $(function (e) {

                                $(document).on('change', '[name="select_turma"]', function () {
                                    var _this = this;

                                    $.ajax({
                                        type: "POST",
                                        url: "inc/periodo_turma.php",
                                        data: {
                                            idTurma: _this.value
                                        },
                                        success: function (response) {
                                            if (response && response != '') {
                                                var response = JSON.parse(response);

                                                console.dir(response)
                                                document.querySelector('[name="periodo_turma"]').value = response.periodo;
                                            }
                                        },
                                        error: function () {
                                            console.dir('error')
                                        },
                                        complete: function () {
                                        }
                                    });

                                });

                            })
                        </script>

                        <input type="text" value="" class="inp_peri" name="periodo_turma"
                            placeholder="Periodo Das Turmas" readonly>
                    </section>
                    <!--terceiro select-->
                    <section class="sec_tres">
                        <select name="select_veiculo">
                        <option disabled><?php echo $modelo ?> - Veiculo Atual </option>
                        <option value="" readonly>Veiculo</option>
                            <?php
                            while ($row_carro = $carro_result->fetch_array()) {
                                $corVeiculo = $row_carro['cor_veiculo'];
                                ?>
                                <option value="<?php echo $row_carro['id_veiculo']; ?>"><?php echo $row_carro["modelo_veiculo"] ?> </option>
                            <?php } ?>
                        </select>


                        <script>
                            $(function (e) {

                                $(document).on('change', '[name="select_veiculo"]', function () {
                                    var _this = this;

                                    $.ajax({
                                        type: "POST",
                                        url: "inc/cor_veiculo.php",
                                        data: {
                                            idCor: _this.value
                                        },
                                        success: function (response) {
                                            if (response && response != '') {
                                                var response = JSON.parse(response);

                                                console.dir(response)
                                                document.querySelector('[name="cor_veiculo"]').value = response.cor;
                                                document.getElementById("cor").value = response.cor_veiculo;
                                            }
                                        },
                                        error: function () {
                                            console.dir('error')
                                        },
                                        complete: function () {
                                        }
                                    });

                                });

                            })
                        </script>

                        <input type="text" class="inp_cor" value="" name="cor_veiculo" id="cor"
                            placeholder="Cor do Carro"  readonly>
                    </section>
                </div>

                <section class="data">
                    <input type="date" class="inp-data" name="data_atividade" required value="<?php echo $data ?>">
                </section>


                <textarea id="" class="testo" name="texto_atividade"  rows="10" cols="70"
                    style="resize: none" maxlength="5000"><?php echo $texto ?></textarea>

            </section>
            <button type="submit" class="btn-EDIT">EDITAR</button>
        </section>
    </form>

</body>

</html>