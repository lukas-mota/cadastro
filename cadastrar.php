<?php

require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        try {
            $pdo = getConnection();
            // Verificar se o e-mail já está registrado
            $stmt = $pdo->prepare("SELECT idusuario FROM usuario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "E-mail já registrado!";
            } else {
                // Hash da senha para segurança
                $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

                // Inserir usuário no banco de dados
                $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $hashedPassword);
                $stmt->execute();

                echo "Cadastro realizado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "Preencha todos os campos!";
    }
} else {
    echo "Método não permitido!";
}
?>
