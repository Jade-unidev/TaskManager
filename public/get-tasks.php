<?php
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/user-var.php';

header('Content-Type: application/json');

if (!isset($_SESSION["user_id"])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION["user_id"];

$stmt = $conn->prepare("SELECT id, title, is_completed, is_priority FROM tasks WHERE user_id = ? ORDER BY is_priority DESC, created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);

$stmt->close();
?>
