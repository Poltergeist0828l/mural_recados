<?php
include("conexao/conexao.php");
include("recados/cadastrar.php");

$sql = "SELECT * FROM recados ORDER BY data_recado DESC";
$result = $conn->query($sql);
?>

<h2>Mural</h2>

<?php while($row = $result->fetch_assoc()): ?>
<div class="card">
<strong><?= $row['nome'] ?></strong><br><br>
<?= $row['mensagem'] ?><br><br>
 Curtidas ❤: <?= $row['curtidas'] ?>

<form action="recados/curtir.php" method="POST">
<input type="hidden" name="id" value="<?= $row['id'] ?>">
<button type="submit">Curtir</button>
</form>
</div>

<div class="actions">
    
    <form action="recados/curtir.php" method="POST" style="display:inline;">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button class="btn-like">Curtir</button>
    </form>

    <form action="recados/descurtir.php" method="POST" style="display:inline;">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button class="btn-delete">Descurtir</button>
    </form>

</div>
<?php endwhile; ?>
