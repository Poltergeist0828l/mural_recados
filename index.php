<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/pg.css">
<title>Mural</title>
</head>
<body>
<p>Bem-vindo, <?= $_SESSION['usuario'] ?> | <a href="logout.php">Sair</a></p>
<div class="container">
<?php include("recados/listar.php"); ?>
</div>
</body>
</html>
