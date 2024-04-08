<?php
session_start();

// Проверка аутентификации администратора
if ((!isset($_SESSION["admin"])) || ($_SESSION["admin"] != true)) {
    echo json_encode(array('error' => 'Access denied.'));
    exit();
}

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";

$connect = mysqli_connect($hostname,$username,$password,$database,$port);

if (!$connect){
    die('ERROR: ' . mysqli_error($connect));
}

// Получаем количество мужчин и женщин
$query_gender = "SELECT gender, COUNT(*) as count FROM voters GROUP BY gender";
$result_gender = mysqli_query($connect, $query_gender);

$gender_stats = array();
while ($row = mysqli_fetch_assoc($result_gender)) {
    $gender_stats[$row['gender']] = $row['count'];
}

// Получаем количество уникальных предложений и количества их выборов
$query_predlozheniya = "SELECT predlozheniya, COUNT(*) as count FROM voters GROUP BY predlozheniya";
$result_predlozheniya = mysqli_query($connect, $query_predlozheniya);

$predlozheniya_stats = array();
while ($row = mysqli_fetch_assoc($result_predlozheniya)) {
    $predlozheniya_stats[$row['predlozheniya']] = $row['count'];
}

// Собираем и отправляем результаты
$statistics = array(
    'gender' => $gender_stats,
    'predlozheniya' => $predlozheniya_stats
);

echo json_encode($statistics);

mysqli_close($connect);
?>
