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

    function newblock($obj, $conn){
      $sql = "SELECT * FROM objects WHERE name LIKE '$obj%'";
      $result = $conn->query($sql);
      $html = "";
      $html .= "
                <div class='verevka'>
                    <img src='assets/verevka.png' alt='Object'>
                </div>
                <div class='container'>
                ";

      $html .= "
                  <div class='object-card'>";
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $html .= "
                          <div class='image-wrapper' id=".$row['name'].">
                            <div class='card'>
                              <img src='".$row['img']."' alt='Object'>
                              <div class='description'>
                                  <h1>".$row['visname']."</h1>
                                  <h2>".$row['description']."</h2><br>
                                  <p id='price'>Цена: ".$row['price']."</p>
                                  <input name='$obj' value=".$row['id']." type='radio' onclick='toggleCheck(event)'>
                              </div>
                            </div>
                          </div>
                        ";
          }
      } else {
          $html .= "No results";
      }
      $html .= "  </div></div>";
  
      return $html;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style_form.css">
  <title>Lending designed</title>
</head>
<body>
  <div class='section'>
    <input type="checkbox" id="check">
          <header>
          <h2><a href="index.php" class="logo">Logo</a></h2>
              <div class="navigator">
                 
                  <a href="registr.php">Service</a>
              </div>
              <label for="check">
                  <i class="fas fa-bars menu-btn"></i>
                  <i class="fas fa-times close-btn"></i>
              </label>
          </header>
          <div class="content">
              <div class="info">
                  <h2>Звездные Увалы</h2>
              </div>
          </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  </div>
  <div class='section2'>
    <?php
    echo newblock('amfiteatr',$conn);
    echo newblock('art_object',$conn);
    echo newblock('besedka',$conn);
    echo newblock('camping',$conn);
    echo newblock('det_plosh',$conn);
    echo newblock('ecoshkila',$conn);
    echo newblock('glemping',$conn);
    echo newblock('liji_trassa',$conn);
    echo newblock('lijn_baza',$conn);
    echo newblock('mini_zoo',$conn);
    echo newblock('oranj',$conn);
    echo newblock('peshi',$conn);
    echo newblock('picnic',$conn);
    echo newblock('podemnik',$conn);
    echo newblock('prud',$conn);
    echo newblock('rodnik',$conn);
    echo newblock('smotr_plosh',$conn);
    echo newblock('trassa_downhill',$conn);
    echo newblock('trassa_tubing',$conn);
    echo newblock('WC',$conn);
    echo newblock('workout',$conn);
    echo newblock('zone_chill',$conn);
    ?>

  </div>    
    <section3>
<div id="totalPrice" class="total-price">Осталось: 75000000</div>


<style>
       body {
  margin: 0;
  padding: 0;
}

.map {
  position: relative;
  width: 1400px;
  height: 90px;
  border: none; /* Удалить границу */
  box-sizing: border-box;
  background-image: url("Шадринск1-1_pages-to-jpg-0001.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  padding: 10px;
}

.map-container {
  position: relative;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
}

.map-container .map {
  position: relative;
  width: 70%;
  height: 80%;
  padding: 0; /* Удалить отступы */
  background-color: transparent; /* Удалить фоновый цвет */
  border: 4px solid black;
}
    
        .point {
      position: absolute;
      width: 20px;
      height: 20px;
      background: red;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      user-select: none;
      pointer-events: auto;
      transform: translate(-50%, -50%);
    }
        .coordinate-field {
          position: absolute;
          bottom: 10px;
          left: 10px;
          background: white;
          padding: 5px 10px;
          border: 4px solid black;
          opacity: 0.5;
          z-index: 999;
        }
        .popup {
  position: absolute;
  display: none;
  padding: 10px;
  background-color: white;
  border: 4px solid black;
  z-index: 9999;
}
      </style>

      <div class="map-container">
        <div class="map">
          <div class="point" style="top: 50%; left: 65%;" data-image-id="assets." data-description="Описание точки 1">1</div>
          <div class="point" style="top: 50%; left: 54%;" data-coordinate="55.7558° N, 37.6176° E">2</div>
          <div class="point" style="top: 70%; left: 37%;" data-coordinate="55.7558° N, 37.6176° E">3</div>
          <div class="point" style="top: 52%; left: 36%;" data-coordinate="55.7558° N, 37.6176° E">4</div>
          <div class="point" style="top: 63%; left: 47%;" data-coordinate="55.7558° N, 37.6176° E">5</div>
          <div class="point" style="top: 56%; left: 56%;" data-coordinate="55.7558° N, 37.6176° E">6</div>
        </div>
        <div class="coordinate-field">Координаты: <span class="current-coordinate"></span></div>
      </div>



  <style>
      .voterinfo{
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
        display: flex;
        flex-direction: column; 
        justify-content: center; /* Центрирование по горизонтали */
        align-items: center; /* Центрирование по вертикали */
      }
      label{ padding-top: 10px; font-size: 16px; text-align: center; }
      input{ height: 40px; font-size: 16px;  }
      select{ font-size: 16px;  }

  </style>

      

  <div class='voterinfo'>
      <div>
        <label for='firstname'>Имя:</label><input id='firstname'>
        <label for='lastname'>Фамилия:</label><input id='lastname'>
        <label for='patronymic'>Отчество:</label><input id='patronymic'>
      </div>
      <label for='birthday'>Год рождения</label><input type='date' id='birthday'>
      <label for='gender'>Пол:</label>
      <select id='gender'>
          <option value='male'>Мужской</option>
          <option value='female'>Женский</option>
      </select><br>
      <label for='text'>Ваше предложение:</label><textarea id='text' rows='20' cols='50' style='font-size: 16px'></textarea>
      <button style='margin-top: 10px; text-align: center' type='accept' id='acceptvote'>Проголосовать</button>
      <div id='res'></div>
  </div>
  
        <footer>
            <div class="media-icons">
               <!--
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
               --> 
            </div>
        </footer>
    </section3>
    <script src="map.js"></script>
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
<?php
$conn->close();
?>
</html>