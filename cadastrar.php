<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php'); 

    // Verificando se algum campo obrigatório está vazio
    if (empty($_POST["email"]) || empty($_POST["nome"]) || empty($_POST["sobre"]) || empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Capturando os dados do formulário
        $email = $_POST["email"];
        $nome = $_POST["nome"];
        $sobre = $_POST["sobre"];
        $username = $_POST["username"]; 
        $password = $_POST["password"]; 

        if (empty($password)) {
            echo "A senha não pode estar vazia.";
        } else {
            $sql = "INSERT INTO loginsitedirack (usuario, senha, email, nome, sobrenome) 
                    VALUES (:usuario, :senha, :email, :nome, :sobrenome)";
            
            try {

                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':usuario', $username, PDO::PARAM_STR);
                $stmt->bindValue(':senha', $password, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindValue(':sobrenome', $sobre, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    echo "Cadastro realizado com sucesso!";
                } else {
                    echo "Erro ao cadastrar. Tente novamente.";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
}
?>