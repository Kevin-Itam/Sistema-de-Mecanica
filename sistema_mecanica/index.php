<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Login Mecanica</title>
  <script type="text/javascript" src="javascript.js"></script>
  <link href="css/style.css" rel="stylesheet" />
</head>
<script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
<style>
   * {
    box-sizing: border-box;
  }

  .cab {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 25px 12.5%;
    background: transparent;
    display: flex;
    align-items: center;
    z-index: 100;
  }
  h1{
    position: relative;
    left:10%;
    top:50%;
    transform: translate(-50%,-50%);

  }
  h2 {
    position: relative;
    font-size: 32px;
    margin-top: 10vh;
    color: white;
  }

  .sec-filho img {
    display: flex;
    align-items: center;
    position: absolute;
    height: 17%;
    width: 50%;
    top: 40%;
    left: 52%;
    transform: translate(-50%, -50%);

  }
  .btn-ind{
  position: absolute;
  width: 24vw;
  height: 50px;
  top: 44vh;
  left: 8vw;
  appearance: none;
  background-color: transparent;
  border: 2px solid #ffffff;
  border-radius: 15px;
  box-sizing: border-box;
  color: #ffffff;
  cursor: pointer;
  font-size: 20px;
  font-weight: 600;
  line-height: normal;
  outline: none;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  will-change: transform;
}

.btn-ind:disabled {
  pointer-events: none;
}

.btn-ind:hover {
  color: white;
  box-shadow: rgb(0, 0, 0) 0 8px 15px;
  transform: translateY(-2px);;
}

.btn-ind:active {
  box-shadow: none;
  transform: translateY(0);
}
</style>

<body class="body-menu">
  <form class="form-menu" action="valida.php" method="post">
    <div class="sec-menu">
      <div class="sec-filho">
        <div class="logo">
          <h1>Bem-Vindo</h1>
        </div>
        <img src="img/senai-sesi.png">
        <div class="testo" align="center">
          <p>Efetue seu login para fazer o controle das atividades exercidas pela sua turma</p>
        </div>

      </div>

      <div class="sec-irmao">
        <h2 align="center">FAÇA LOGIN</h2>
        <div class="form-login-sign">

          <div class="input-box">
            <span class="icon"><i class="fa-regular fa-user"></i></span>
            <input type="text" name="Usuario" autocomplete="off" required>
            <label>Usuario</label>
          </div>

          <div class="input-box">
            <span class="icon"><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="Senha" autocomplete="off" required>
            <label>Senha</label>
          </div>

          <div>
            <input type="submit" name="submit" class="btn-ind">
          </div>
        </div>

      </div>

    </div>
  </form>
 
</body>

</html>