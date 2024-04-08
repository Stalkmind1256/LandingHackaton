<?php
session_start();

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$connect = mysqli_connect($hostname,$username,$password,$database,$port);

if (!$connect){
    die('ERROR: '. mysqli_error());
}

if ((!isset($_SESSION["admin"])) || ($_SESSION["admin"] != true)) {
    // Если администратор не вошел в систему, перенаправляем на страницу входа
    
    header("Location: registr.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="generator" content="Geany 2.0" />
        <title>Admin panel</title>

    </head>

    <body>
        <header>
            <a href="index.php" class="logo">Logo</a>
            <a href="registr.php" class="logo">Service</a><br>
            <a>Меню администратора</a><br>
            <button onclick="loadData()">Загрузить данные</button>
            <button onclick="viev_statistic()">Вывести статистику</button>
            <button id='data_changer' onclick="changeData()" disabled>Изменить данные</button>
        </header>
        
        <div class="datacontainer">

        </div>
        
        <script type="text/javascript">
            function loadData() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        var table = '<table border="1"><thead><tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Отчество</th><th>Дата рождения</th><th>Пол</th><th>Предложения</th><th>Название объекта</th><th>Описание объекта</th><th>Цена</th><th>Видимое имя</th><th>Дата голосования</th></tr></thead><tbody>';
                        for(var i = 0; i < response.length; i++) {
                            var data = response[i];
                            table += '<tr>' +
                                    '<td id="1" contenteditable = false>' + data.user_id + '</td>' +
                                    '<td id="2" contenteditable = false>' + data.firstname + '</td>' +
                                    '<td id="3" contenteditable = false>' + data.lastname + '</td>' +
                                    '<td id="4" contenteditable = false>' + data.patronymic + '</td>' +
                                    '<td id="5" contenteditable = false>' + data.birthday + '</td>' +
                                    '<td id="6" contenteditable = false>' + data.gender + '</td>' +
                                    '<td id="7" contenteditable = false>' + data.predlozheniya + '</td>' +
                                    '<td id="8" contenteditable = false>' + data.name + '</td>' +
                                    '<td id="9" contenteditable = false>' + data.description + '</td>' +
                                    '<td id="10" contenteditable = false>' + data.price + '</td>' +
                                    '<td id="11" contenteditable = false>' + data.visname + '</td>' +
                                    '<td id="12" contenteditable = false>' + data.votingdate + '</td>' +
                                    '</tr>';
                        }
                        table += '</tbody></table>';
                        document.querySelector(".datacontainer").innerHTML = table;
                    }
                };
                xmlhttp.open("GET", "fetch_data.php", true);
                xmlhttp.send();
                var button_enable = document.getElementById("data_changer");
                button_enable.disabled = false;
            }
            /*
            function viev_statistic(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        
                        // Создаем массивы данных для диаграмм
                        var genderLabels = Object.keys(response.gender);
                        var genderData = Object.values(response.gender);
                        
                        var predlozheniyaLabels = response.predlozheniya.map(function(item) {
                            return item.predlozheniya;
                        });
                        var predlozheniyaData = response.predlozheniya.map(function(item) {
                            return item.count;
                        });
                        
                        // Создаем гендерную диаграмму
                        var ctxGender = document.getElementById('genderChart').getContext('2d');
                        var genderChart = new Chart(ctxGender, {
                            type: 'bar',
                            data: {
                                labels: genderLabels,
                                datasets: [{
                                    label: 'Количество по гендеру',
                                    data: genderData,
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 99, 132, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255,99,132,1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });

                        // Создаем диаграмму предложений
                        var ctxPredlozheniya = document.getElementById('predlozheniyaChart').getContext('2d');
                        var predlozheniyaChart = new Chart(ctxPredlozheniya, {
                            type: 'pie',
                            data: {
                                labels: predlozheniyaLabels,
                                datasets: [{
                                    label: 'Количество голосов',
                                    data: predlozheniyaData,
                                    backgroundColor: predlozheniyaLabels.map(function() {
                                        return 'rgba(' + Math.floor(Math.random() * 255) + ', ' +
                                                        Math.floor(Math.random() * 255) + ', ' +
                                                        Math.floor(Math.random() * 255) + ', 0.2)';
                                    }),
                                    borderColor: predlozheniyaLabels.map(function() {
                                        return 'rgba(0, 0, 0, 1)';
                                    }),
                                    borderWidth: 1
                                }]
                            }
                        });
                    }
                };
                xmlhttp.open("GET", "fetch_statistics.php", true);
                xmlhttp.send();
            }

            */
            /*function viev_statistic(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        // Отобразить статистику
                        var statsHtml = "<p>Количество мужчин: " + response.gender.M + "</p>" +
                                        "<p>Количество женщин: " + response.gender.F + "</p>" +
                                        "<h3>Статистика голосования:</h3>";
                        for(var i = 0; i < response.votes.length; i++) {
                            statsHtml += "<p>Объект: " + response.votes[i].name + ", количество голосов: " + response.votes[i].count + "</p>";
                        }
                        document.getElementById("dataContainer").innerHTML = statsHtml;
                    }
                };
                xmlhttp.open("GET", "fetch_statistics.php", true);
                xmlhttp.send();
            }*/


            /*function viev_statistic(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        //var table = '<table border="1"><thead><tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Отчество</th><th>Дата рождения</th><th>Пол</th><th>Предложения</th><th>Название объекта</th><th>Описание объекта</th><th>Цена</th><th>Видимое имя</th><th>Дата голосования</th></tr></thead><tbody>';
                        for(var i = 0; i < response.length; i++) {
                            var data = response[i];
                            table += '<tr>' +
                                    '<td id="1" contenteditable = false>' + data.user_id + '</td>' +
                                    '<td id="2" contenteditable = false>' + data.firstname + '</td>' +
                                    '<td id="3" contenteditable = false>' + data.lastname + '</td>' +
                                    '<td id="4" contenteditable = false>' + data.patronymic + '</td>' +
                                    '<td id="5" contenteditable = false>' + data.birthday + '</td>' +
                                    '<td id="6" contenteditable = false>' + data.gender + '</td>' +
                                    '<td id="7" contenteditable = false>' + data.predlozheniya + '</td>' +
                                    '<td id="8" contenteditable = false>' + data.name + '</td>' +
                                    '<td id="9" contenteditable = false>' + data.description + '</td>' +
                                    '<td id="10" contenteditable = false>' + data.price + '</td>' +
                                    '<td id="11" contenteditable = false>' + data.visname + '</td>' +
                                    '<td id="12" contenteditable = false>' + data.votingdate + '</td>' +
                                    '</tr>';
                        }
                        table += '</tbody></table>';
                        document.getElementById("dataContainer").innerHTML = table;
                    }
                };
                xmlhttp.open("GET", "fetch_data.php", true);
                xmlhttp.send();
                var button_enable = document.getElementById("data_changer");
                button_enable.disabled = false;

            }*/
            /*function changeData(){
                var button_enable_2 = document.getElementById("save_new_data");
                button_enable_2.disabled = false;

                var rows = document.querySelectorAll('#dataContainer tbody tr');
                
                // Для каждой строки...
                rows.forEach(function(row) {
                    // Для каждой ячейки в строке, кроме первой (с ID пользователя)
                    for (var i = 1; i < row.cells.length; i++) {
                        // Устанавливаем атрибут contenteditable в 'true'
                        row.cells[i].setAttribute('contenteditable', 'true');
                    }
                });
            }
            function saveData(){
                // Собираем данные для сохранения из каждого ряда таблицы
                var tableRows = document.querySelectorAll('#dataContainer tbody tr');
                var userData = [];

                tableRows.forEach(function(row) {
                    var user = {
                        user_id: row.cells[0].innerText,
                        firstname: row.cells[1].innerText,
                        lastname: row.cells[2].innerText,
                        patronymic: row.cells[3].innerText,
                        birthday: row.cells[4].innerText,
                        gender: row.cells[5].innerText,
                        predlozheniya: row.cells[6].innerText,
                        name: row.cells[7].innerText,
                        description: row.cells[8].innerText,
                        price: row.cells[9].innerText,
                        visname: row.cells[10].innerText,
                        votingdate: row.cells[11].innerText
                    };
                    userData.push(user);
                });

                // Отправляем данные на сервер для сохранения
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_data.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
                
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Обработка ответа от сервера
                        alert('Изменения успешно сохранены.');
                        // Можно добавить обновление страницы или другие действия
                    } else {
                        // В случае ошибки сообщаем пользователю
                        alert('Произошла ошибка при сохранении данных.');
                    }
                };

                // Отправляем JSON-строку с данными пользователя
                xhr.send(JSON.stringify(userData));
            }*/
        </script>
    </body>
</html>

<?php
mysqli_close($connect);
?>





