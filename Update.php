<?php
require 'db.php';
require 'function.php';
 
 
$id = $_GET['id'];
 
 
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();
 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
 
 
    $sql = "UPDATE transactions 
            SET item=:item, price=:price, qty=:qty, total=:total
            WHERE id=:id";
 
 
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total,
        ':id' => $id
    ]);
 
 
    header("Location: read.php");
}
?>
 
 
<form method="post">
    Item: <input type="text" name="item" value="<?= $data['item'] ?>"><br>
    Price: <input type="number" name="price" value="<?= $data['price'] ?>"><br>
    Qty: <input type="number" name="qty" value="<?= $data['qty'] ?>"><br>
    <button type="submit">Update</button>
</form>