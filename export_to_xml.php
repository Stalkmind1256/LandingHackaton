<?php
// export_to_xml.php
session_start();

if ((!isset($_SESSION["admin"])) || ($_SESSION["admin"] != true)) {
    header("Location: registr.php");
    exit();
}

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$connect = mysqli_connect($hostname,$username,$password,$database,$port);

if (!$connect){
    die('ERROR: '. mysql_error($connect));
}

// Создаем XML документ и корневой элемент
$dom = new DOMDocument('1.0', 'utf-8');
$root = $dom->createElement('data');
$dom->appendChild($root);

// Задаем запрос для выборки данных
$query = "SELECT * FROM table_name"; // Замените table_name на имя вашей таблицы
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $item = $dom->createElement('item');
    foreach ($row as $key => $value) {
        $child = $dom->createElement($key);
        $childText = $dom->createTextNode($value);
        $child->appendChild($childText);
        $item->appendChild($child);
    }
    $root->appendChild($item);
}

header("Content-Type: text/xml");
header("Content-Disposition: attachment; filename=exported_data.xml");

echo $dom->saveXML();

mysqli_close($connect);
?>
