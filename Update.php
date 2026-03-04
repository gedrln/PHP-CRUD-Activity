<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();

if (!$data) {
    redirect("read.php");
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    if (!validateNumber($price) || !validateNumber($qty)) {
        $error = "Price and Quantity must be valid positive numbers.";
    } else {

        $total = computeTotal($price, $qty);

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

        redirect("read.php");
    }
}
?>

<link rel="stylesheet" href="style.css">

<h2>Update Transaction</h2>

<?php if ($error): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

<form method="post">
    <label>Item</label>
    <input type="text" name="item" value="<?= htmlspecialchars($data['item']) ?>" required>

    <label>Price</label>
    <input type="number" name="price" step="0.01" value="<?= $data['price'] ?>" required>

    <label>Quantity</label>
    <input type="number" name="qty" value="<?= $data['qty'] ?>" required>

    <button type="submit">Update</button>
</form>

<div style="text-align:center; margin-top:15px;">
    <a href="read.php" class="btn">Back</a>
</div>
