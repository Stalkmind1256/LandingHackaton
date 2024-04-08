<?php
session_start();

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$connect = mysqli_connect($hostname,$username,$password,$database,$port);

if (!$connect) {
    die('ERROR: ' . mysqli_error($connect)); // Используйте mysqli_error
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data === null) {
    error_log("Данные не были получены или JSON некорректен: " . json_last_error_msg());
    echo json_encode(['error' => "Данные не были получены или JSON некорректен: " . json_last_error_msg()]);
    exit;
}

foreach ($data as $user) {
    $stmt = mysqli_prepare($connect, "UPDATE users_table SET firstname=?, lastname=? WHERE user_id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $user['firstname'], $user['lastname'], $user['user_id']);
    
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Ошибка при выполнении запроса: " . mysqli_stmt_error($stmt)); // Используйте mysqli_stmt_error
    }
}

mysqli_close($connect);
echo json_encode(['success' => true]);
?>
