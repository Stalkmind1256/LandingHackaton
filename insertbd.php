<?php

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$conn = mysqli_connect($hostname, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $name = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $patronymic = $_POST["patronymic"];
    $gender = $_POST["gender"];
    $birthday = date("Y-m-d", strtotime($_POST["birthday"]));
    $text = $_POST["text"];

    $sql = "INSERT INTO voters (firstname,lastname,patronymic,gender,birthday,predlozheniya) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("ssssss", $name, $lastname, $patronymic, $gender, $birthday, $text);
    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $voter = $conn->insert_id;
    $jsonArray = $_POST["selectedobjects"];
    $array = json_decode($jsonArray);
    $currentDateTime = date("Y-m-d");
    $voteday = date("Y-m-d", strtotime($currentDateTime));
    $sql = "INSERT INTO voter_selections (user_id, object_id, votingdate) VALUES (?, ?, ?)";

    // Подготовка запроса
    $stmt = $conn->prepare($sql);

    // Проход по каждому элементу массива и вставка в базу данных
    foreach ($array as $element) {
        // Привязка значения к параметру запроса
        $stmt->bind_param("sss", $voter, $element, $voteday);
        
        // Выполнение запроса
        if ($stmt->execute() === false) {
            // Если произошла ошибка вставки, выведите сообщение об ошибке
            echo "Error inserting element: " . $conn->error;
        }
    }

    // Закрываем выражение и соединение с базой данных
    $stmt->close();


// Закрываем соединение с базой данных
$conn->close();
?>
