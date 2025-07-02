<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode($_POST['orderData'], true);
    $items = json_encode($data['items']);
    $total = $data['total'];

    $stmt = $conn->prepare("INSERT INTO orders (items, total) VALUES (?, ?)");
    $stmt->bind_param("sd", $items, $total);
    $stmt->execute();
    
    echo "Order received! Thank you.";
}
?>
