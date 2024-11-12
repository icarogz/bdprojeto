<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Log in / Sign up</title>
  <link rel="stylesheet" href="./includes/css/style.css">

</head>
<body>
<div class="container">
  <div class="box"></div>
  <div class="container-forms">
    <div class="container-info">
      <div class="info-item">
        <div class="table">
          <div class="table-cell">
            <p>
              Você tem uma conta?
            </p>
            <div class="btn">
              Entrar
            </div>
          </div>
        </div>
      </div>
      <div class="info-item">
        <div class="table">
          <div class="table-cell">
            <p>
              Você não tem uma conta?
            </p>
            <div class="btn">
              Cadastrar
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-form">
      <div class="form-item log-in">
        <div class="table">
	  <div class="table-cell">
    

    <form method="POST" action="login.php">
    <input name="username" placeholder="Nome de usuário" type="text" required/>
    <input name="password" placeholder="Senha" type="password" required/>
    <input class="btn" type="submit" value="Entrar">
      </form>
          </div>
        </div>
      </div>
      <div class="form-item sign-up">
        <div class="table">
	  <div class="table-cell">

    <form method="POST" action="cadastrar.php">
    <input name="email" placeholder="Email" type="text" required />
    <input name="nome" placeholder="Nome" type="text" required />
    <input name="sobre" placeholder="Sobrenome" type="text" required />
    <input name="username" placeholder="Nome de usuário" type="text" required />
    <input name="password" placeholder="Senha" type="password" required />
    
    <input class="btn2" type="submit" value="Cadastrar" />
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<a class="box-item" href="https://www.instagram.com/gabrielalves.code/" target="_blank"><img src="./assets/img/Logo/logo1.png" class="rabbit"> </a>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./includes/js/script.js"></script>

</body>
</html>