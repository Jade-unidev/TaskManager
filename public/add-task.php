<?php
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/user-var.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["task"]) && isset($_SESSION["user_id"])) {
    $title = trim($_POST["task"]);
    $user_id = $_SESSION["user_id"];

    if ($title !== "") {
        $is_priority = 0;
        $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, is_priority) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $user_id, $title, $is_priority);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Tâche ajoutée"]);
        } else {
            echo json_encode(["error" => "Erreur insertion"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Tâche vide"]);
    }
} else {
    echo json_encode(["error" => "Mauvaise requête"]);
}
?>




