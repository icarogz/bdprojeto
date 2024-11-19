<?php
session_start();
include('conexao.php');  // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Verificação de campos vazios
    if (empty($username) || empty($password)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Consultar usuário no banco de dados
        $sql = "SELECT * FROM loginsitedirack WHERE usuario = :usuario LIMIT 1";

        try {
            // Preparando a consulta para evitar SQL Injection
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':usuario', $username, PDO::PARAM_STR);
            $stmt->execute();

            // Verificando se o usuário foi encontrado
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                // Verificando a senha armazenada como texto simples
                if ($password === $user['senha']) {
                    // Iniciando a sessão do usuário
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['nome'] = $user['nome'];

                    // Regenerando o ID da sessão para evitar fixação de sessão
                    session_regenerate_id(true);

                    // Redirecionando para a página inicial após o login
                    header("Location: index1.php");
                    exit;
                } else {
                    echo "Senha incorreta.";
                }
            } else {
                echo "Usuário não encontrado.";
            }
        } catch (PDOException $e) {
            // Registrando o erro para desenvolvedores, sem exibir detalhes ao usuário
            error_log($e->getMessage());
            echo "Ocorreu um erro, tente novamente mais tarde.";
        }
    }
}
?>

<form method="POST" action="login.php">
    <input name="username" placeholder="Nome de usuário" type="text" required/>
    <input name="password" placeholder="Senha" type="password" required/>
    <input class="btn" type="submit" value="Entrar">
</form>
