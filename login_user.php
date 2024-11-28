<?php
// login_user.php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        try {
            $pdo = getConnection();

            // Buscar usuário no banco de dados
            $stmt = $pdo->prepare("SELECT idusuario, senha FROM usuario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($senha, $user['senha'])) {
                session_start();
                $_SESSION['idusuario'] = $user['idusuario'];
                echo "Login realizado com sucesso!";
             
            } else {
                echo "E-mail ou senha incorretos!";
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
