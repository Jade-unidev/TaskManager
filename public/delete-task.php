<?php
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/user-var.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id']) && isset($_SESSION['user_id'])) {
    $task_id = intval($_POST['task_id']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Tâche supprimée"]);
    } else {
        echo json_encode(["error" => "Erreur suppression"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Requête invalide"]);
}
?>
