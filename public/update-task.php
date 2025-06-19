<?php
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/user-var.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id']) && isset($_POST['is_completed']) && isset($_SESSION['user_id'])) {
    $task_id = intval($_POST['task_id']);
    $is_completed = $_POST['is_completed'] === '1' ? 1 : 0;
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("UPDATE tasks SET is_completed = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("iii", $is_completed, $task_id, $user_id);
    
    if ($stmt->execute()) {
        echo json_encode(["success" => "Tâche mise à jour"]);
    } else {
        echo json_encode(["error" => "Erreur de mise à jour"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Requête invalide"]);
}
?>
