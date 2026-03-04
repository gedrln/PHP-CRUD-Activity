<?php
require 'db.php';
require 'functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    redirect("read.php");
}

$stmt = $pdo->prepare("DELETE FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);

redirect("read.php");
?>
