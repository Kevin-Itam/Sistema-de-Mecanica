<?php
session_start();
if ((!isset($_SESSION['Usuario']) == true) and (!isset($_SESSION['Senha']) == true)) {
  unset($_SESSION['Usuario']);
  unset($_SESSION['Senha']);
  header('Location: index.php');

}
$logado = $_SESSION['Usuario'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <title>Home Page</title>
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-image: url(img/mecanico_re.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    backdrop-filter: blur(8px);
    font-family: 'Roboto', sans-serif;
  }

  header {
    position: absolute;
    top: 13vh;
    right: 8vw;
    font-size: 30px;
    font-weight: 900;
    color: #A27F5F;
  }

  .main {
    height: 60vh;
    width: 70vw;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #212121;
    border-radius: 5px;
  }

  .h2 {
    border-radius: 20px;
    word-wrap: break-all;
    height: 50px;
    width: 18vw;
    color: #A27F5F;
    background: rgba(0, 0, 0, 0);
    display: flex;
    font-size: 25px;
  }

  .link {
    color: #A27F5F;
    background-color: rgba(214, 206, 206, 0.055);
    border: none;
    padding: 10px 20px;
    display: inline-block;
    font-size: 20px;
    font-weight: 800;
    width: 200px;
    text-decoration: none;
    position: relative;
    box-sizing: border-box;
    cursor: pointer;
    transition: all 400ms ease;
  }

  .efeito {
    background: rgba(214, 206, 206, 0.055);
  }

  .efeito:hover {
    background: black;
    color: #fd951f;
    box-shadow: inset 0 0 0 3px;
  }

  .main .cadl {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 50%;
    border-radius: 5px;
    background-image: url(img/mecanico_re.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: left;
    border: 1px solid black;
    border-radius: none;
    box-shadow: black 3px;

  }

  .main .cadr {
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 50%;
    border-radius: 5px;
  }

  .cadr .up {
    display: flex;
    position: absolute;
    top: 28vh;
    max-width: 32vw;
    margin-left: 2vw;
    border-bottom: 3px solid rgb(0, 0, 0);
  }


  .cadr .down {
    display: flex;
    position: absolute;
    top: 39vh;
    max-width: 32vw;
    margin-left: 2vw;
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
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 1vh;
    right: 1vw;
    height: 50%;
    width: 10%;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    color: white;
    border: 3px solid black;
    background-color:#212121;
  }
  .men:hover {
    color: #fd951f;
  }
</style>

<body>
  <!-- TELA MODAL CADASTRO Professor-->
  <!--NAVBAR-->
  <nav class="full">
    <a class="men" href="logout.php">Sair da Sessão</a>
  </nav>
  <section class="main cadl cadr">
    <section align="center" class="cadl"></section>
    <header>Escolha o que deseja fazer</header>
    <section align="center" class="cadr">
      <div class="up">
        <h2 class="h2">Registros Em Geral </h2>

        <p><a class="link efeito" href="cad_geral.php">Registros De Informações</a></p>
      </div>

      <div class="down">
        <h2 class="h2">Consultar Informações<br> Registradas</h2>

        <p><a class="link efeito" href="consulta_geral.php">Consultar Registros</a></p>
      </div>


    </section>
  </section>

</body>

</html>