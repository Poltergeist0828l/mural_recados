<?php
include("../conexao/conexao.php");

$id = $_POST['id'];

$sql = "UPDATE recados 
        SET curtidas = IF(curtidas > 0, curtidas - 1, 0) 
        WHERE id = $id";

$conn->query($sql);

header("Location: ../index.php");
?>