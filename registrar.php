<?php
include("conexao/conexao.php");

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql_check = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        $erro = "Esse email já está cadastrado!";
    } else {

        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES ('$nome', '$email', '$senha')";

        if ($conn->query($sql)) {
            header("Location: login.php");
            exit;
        } else {
            $erro = "Erro ao cadastrar";
        }
    }
}
?>

<link rel="stylesheet" href="css/pg.css">

<div class="center">
    <form method="POST" class="card-login">
        <h2>Cadastro</h2>

        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>

        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <button type="submit">Cadastrar</button>

        <p style="margin-top:10px;">
            Já tem conta? <a href="login.php">Entrar</a>
        </p>
    </form>
</div>