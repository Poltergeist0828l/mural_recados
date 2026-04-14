<?php
session_start();
include("../conexao/conexao.php");

$nome = $_SESSION['usuario'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO recados (nome, mensagem)
        VALUES ('$nome', '$mensagem')";

$conn->query($sql);
header("Location: ../index.php");
?>