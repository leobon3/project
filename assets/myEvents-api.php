<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

include '../connectDB.php';

switch ($method) {
    // display events
    case 'GET':
        $result = $conn->query("SELECT events.*, users.username AS event_manager
        FROM events
        INNER JOIN users ON events.event_manager = users.id
        WHERE events.event_manager = {$_SESSION['user_id']}
        ORDER BY events.date_time ASC;");


        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }

        echo json_encode($events);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}

$conn->close();
?>