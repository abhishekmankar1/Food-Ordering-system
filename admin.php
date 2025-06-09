<?php
include 'db.php';

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

echo "<h2>All Orders</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Food</th>
  <th>Quantity</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>".$row["id"]."</td>
          <td>".$row["name"]."</td>
          <td>".$row["food"]."</td>
          <td>".$row["qty"]."</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No orders found</td></tr>";
}
echo "</table>";

$conn->close();
?>
