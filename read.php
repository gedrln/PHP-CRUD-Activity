<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM transactions ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="style.css">
<div class="header">
    <h2>Transaction List</h2> <br>
    <a href="index.php" class="btn">Add New</a>

</div>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Item</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php foreach ($rows as $row): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['item'] ?></td>
    <td><?= $row['price'] ?></td>
    <td><?= $row['qty'] ?></td>
    <td><?= $row['total'] ?></td>
    <td class="action">
      <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
      <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
