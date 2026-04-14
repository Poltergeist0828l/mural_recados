<?php
session_start();
include("conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['nome'];
            header("Location: index.php");
            exit;
        } else {
            echo "<p style='color:red;'>Senha incorreta</p>";
        }
    } else {
        echo "<p style='color:red;'>Usuário não encontrado</p>";
    }
}
?>

<link rel="stylesheet" href="css/pg.css">

<div class="center">
    <form method="POST" class="card-login">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
        <br><br>
        <a href="registrar.php">Criar conta</a>
    </form>
</div>