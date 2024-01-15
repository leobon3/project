<?php
session_start();
include '../connectDB.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$query = "SELECT id, username, password FROM users WHERE username=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'message' => 'Invalid username or password.');
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid username or password.');
}

header('Content-Type: application/json');
echo json_encode($response);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>