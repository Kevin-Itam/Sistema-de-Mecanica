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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <title>Cadastro Geral</title>
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

    .pp {
        font-size: 16px;
       font-weight: 600;

    }
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
        <a class="men" href="consulta_geral.php">Consultar Registros</a>
        <a class="men" href="menu.php">Voltar </a>
        <a class="men" href="logout.php">Sair </a>
    </nav>
    <!--==========================================================-->


    <div class="divmodal input_cad" id="divmodal">
        <div class="corr" id="corr"></div>
        <button class="input_cad" onclick="abrirModal('cad-prof')" value="open"><a class="pp">
                <h2>Cadastro de <br>Professores</h2><br><br>Registre o Professor <br>responsavel pelas aulas
            </a></button>

        <div id="cad-prof" class="janela ">
            <form action="cad_cadastro.php" method="post">

                <header class="cabeça" align="center">Coloque suas Informações como Professor para se Registrar</header>
                <div class="sec-cad-prof">
                    <span class="X-lateral" onclick="fecharModal('cad-prof')"><i
                            class="fa-regular fa-circle-xmark"></i></span>
                    <section class="sec-inp1">
                        <div class="sec-cad-1">
                            <input id="" name="Nome" required autocomplete="name">
                            <label>Nome</label>
                        </div>

                        <div class="sec-cad-1">
                            <input id="" name="Usuario" required autocomplete="username">
                            <label>Usuario</label>
                        </div>
                    </section>

                    <section class="sec-inp2">
                        <div class="sec-cad-1">
                            <input id="" name="Email" required autocomplete="email">
                            <label class="spam">E-mail</label>
                        </div>
                        <div class="sec-cad-1">
                            <input type="password" id="" name="Senha" required autocomplete="current-password">
                            <label>Senha</label>
                        </div>
                    </section>
                </div>
                <section class="sec-btn-cad">
                    <button class="btn-cad-prof" type="submit">Cadastrar</button>
                    <button class="btn-cad-prof" type="reset">Limpar</button>
                </section>

            </form>
        </div>

        <!-- TELA MODAL CADASTRO TURMA-->

        <button class="input_cad" onclick="abrirModal('cad-turma')"><a class="pp">
                <h2>Cadastro de <br>Turmas</h2><br><br>Registre as Turmas<br> que terão as aulas
            </a></button>

        <div id="cad-turma" class="janela">
            <form action="cad_turma.php" method="post">
                <header class="cabeça-turma" align="center">Cadastre a Turma</header>
                <div class="div-cad-turma">
                    <span class="X-lateral-turma" onclick="fecharModal('cad-turma')"><i
                            class="fa-regular fa-circle-xmark"></i></span>
                    <div class="inp-turma">
                        <input name="Turma" required>
                        <label>Nome da Turma</label>
                    </div>
                    <select name="secte" class="sele_turma">
                        <option value="invalido">Turnos</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                    </select>
                    <div class="btn-cad-turma">
                        <button class="btn-turma" type="submit">Cadastrar</button>
                        <button class="btn-turma" type="reset">Limpar</button>
                    </div>


                </div>
            </form>
        </div>

        <!-- TELA MODAL CADASTRO VEÍCULO-->

        <button class="input_cad" onclick="abrirModal('cad-veiculo')"><a class="pp">
                <h2>Cadastro de <br>Veículos</h2><br><br>Registre os Veículos <br>que serão usados nas aulas
            </a></button>

        <div id="cad-veiculo" class="janela">
            <form action="cad_Veiculo.php" method="post">

                <div class="div_veiculo X-lateral-vei">

                    <header class="cabeça-vei">Registre os Veículos Das Aulas</header>
                    <span class="X-lateral-vei" onclick="fecharModal('cad-veiculo')"><i
                            class="fa-regular fa-circle-xmark"></i></span>
                    <section class="">

                        <section class="sec-inp-vei">
                            <div class="sec-cad-vei">
                                <input name="Modelo" required autocomplete="name">
                                <label> Modelo do Veiculo</label>
                            </div>

                            <div class="sec-cad-vei">
                                <input name="Cor" required autocomplete="username">
                                <label>Cor do Veiculo</label>
                            </div>
                        </section>

                        <section class="sec-btn-vei">
                            <button class="btn-vei" type="submit">Cadastrar</button>
                            <button class="btn-vei" type="reset">Limpar</button>
                        </section>
                    </section>
                </div>

            </form>
        </div>

        <!-- TELA MODAL CADASTRO ATIVIDADE-->

        <button class="input_cad" onclick="abrirModal('cad-ativ')"><a class="pp">
                <h2>Cadastro de <br>Atividades</h2><br><br>Registre as Atividades <br>realizadas nas aulas
            </a></button>

        <div id="cad-ativ" class="janela">
            <form action="cad_atividade.php" method="post">

                <div class="div-atv X-lateral-atv">
                    <header class="cabeça-vei">Registre as Atividades Da Turma</header>
                    <span class="X-lateral-atv" onclick="fecharModal('cad-ativ')"><i
                            class="fa-regular fa-circle-xmark"></i></span>

                    <section class="">
                        <div class="seletores">
                            <!--primeiro select-->
                            <section name="nome_professor">
                                <select class="select" name='nome_professor'>
                                <option value="" readonly>Professor Responsavel</option>
                                    <?php
                                    while ($row_cadastro = $cadastro_result->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $row_cadastro['nome_professor']; ?>">

                                            <?php echo $row_cadastro["nome_professor"] ?> </option>

                                    <?php } ?>

                                </select>
                            </section>
                            <!--segundo select-->
                            <section class="selec_uno">
                                <select class="selectt" name="select_turma">
                                <option value="" readonly>Nome das Turmas</option>
                                    <?php
                                    while ($row_turma = $turma_result->fetch_array()) {
                                        $periodo = $row_turma['periodo'];
                                        ?>
                                        <option value="<?php echo $row_turma['id_turma']; ?>"><?php echo $row_turma["nome_turma"] ?> </option>
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
                                <input type="text" value="" class="inp_vei" name="periodo_turma"
                                    placeholder="Periodo Das Turmas" readonly>
                            </section>
                            <!--terceiro select-->
                            <section class="selec_duo">
                                <select class="selectt" name="select_veiculo">
                                <option value="" readonly>Veiculos</option>
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

                                <input type="text" class="inp_vei" value="" name="cor_veiculo" id="cor" placeholder="Cor do Veiculo" readonly>
                            </section>
                        </div>

                        <section class="data">
                            <input type="date" class="inp-data" name="data_atividade" required>
                        </section>

                        <div class="testo">
                            <span for="">
                                <textarea id="" class="txtarea" name="texto_atividade" rows="10" cols="70" maxlength="5000"></textarea>
                        </div>
                    </section>


                    <section class="sec-btn-atv">
                        <button class="btn-atv" type="submit">Cadastrar</button>
                        <button class="btn-atv" type="reset">Limpar</button>
                    </section>

                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="JS/janela_modal.js"></script>
</body>

</html>