<link rel="stylesheet" href="style.css">


<form method="post" action="create.php">
<h2>Add Transaction</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="error">
            <?= htmlspecialchars($_GET['error']) ?>
        </div>
    <?php endif; ?>

    <label>Item</label>
    <input type="text" name="item" required>

    <label>Price</label>
    <input type="number" name="price" required>

    <label>Quantity</label>
    <input type="number" name="qty" required>

    <button type="submit">Save</button>
</form>

<div style="text-align:center; margin-top:15px;">
    <a href="read.php" class="btn">View Transactions</a>
</div>
