<?php include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql)) {
    echo "<script>alert('User deleted successfully!'); window.location.href = 'index.php';</script>";
} else {
    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
}
?>
