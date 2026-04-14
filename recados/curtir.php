<?php
include("../conexao/conexao.php");
$id = $_POST['id'];
$conn->query("UPDATE recados SET curtidas = curtidas + 1 WHERE id = $id");
header("Location: ../index.php");
?>