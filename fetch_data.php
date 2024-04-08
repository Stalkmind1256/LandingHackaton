<?php
session_start();

// Проверка на существование административной сессии
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    http_response_code(403);
    die('Access denied');
}

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$connect = mysqli_connect($hostname, $username, $password, $database, $port);

if (!$connect) {
    http_response_code(500);
    die('ERROR: Cannot connect to database');
}

$query = "SELECT vs.user_id, v.firstname, v.lastname, v.patronymic, v.birthday, v.gender, v.predlozheniya, o.name, o.description, o.price, o.visname, vs.votingdate
          FROM voter_selections vs
          JOIN voters v ON vs.user_id = v.id
          JOIN objects o ON vs.object_id = o.id";

$result = mysqli_query($connect, $query);

if ($result) {
    $selections = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $selections[] = $row;
    }
    echo json_encode($selections);
} else {
    http_response_code(500);
    echo "ERROR: Could not execute $query. " . mysqli_error($connect);
}

mysqli_close($connect);
?>
