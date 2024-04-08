<?php

$assets_folder = "assets";

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$conn = mysqli_connect($hostname, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function get_image_files($folder) {
    $image_files = [];
    if ($handle = opendir($folder)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && (strtolower(pathinfo($file, PATHINFO_EXTENSION)) == "jpg" || strtolower(pathinfo($file, PATHINFO_EXTENSION)) == "png")) {
                $image_files[] = $file;
            }
        }
        closedir($handle);
    }
    return $image_files;
}

$images = get_image_files($assets_folder);

foreach ($images as $image) {
    $name = pathinfo($image, PATHINFO_FILENAME);
    $img_path = $assets_folder . "/" . $image;
    $sql = "INSERT INTO objects (name, img) VALUES ('$name', '$img_path')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully: $name <br>";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>
