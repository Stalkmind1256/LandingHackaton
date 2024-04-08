function toggleCheck(event) {
  var totalPrice = 75000000;
  var checkboxes = document.querySelectorAll('input[onclick="toggleCheck(event)"]');;

  // Проходимся по всем чекбоксам и суммируем цену выбранных объектов
  for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
          totalPrice -= parseInt(checkboxes[i].parentNode.querySelector('#price').innerText.match(/\d+/)[0]);
          if (totalPrice < 0 ) {
            event.preventDefault();
            alert('Общая цена выбранных объектов превышает 75000000. Нельзя выбрать этот объект.');
            return;
          }
        }
  }
  
  // Обновляем общую цену
  document.getElementById('totalPrice').innerText = 'Осталось: ' + totalPrice;
}

let acceptbtn = document.getElementById('acceptvote');

acceptbtn.addEventListener('click', function(){
  acceptvote();
  
});

function acceptvote(){
  let checkboxes = document.querySelectorAll('input[name="objvote"]:checked');
  let selectedobjects = [];
  checkboxes.forEach(function(checkbox) {
    selectedobjects.push(checkbox.value);
  });
  let objects = JSON.stringify(selectedobjects);
  console.log(objects);
  let firstname = document.getElementById('firstname').value;
  let lastname = document.getElementById('lastname').value;
  let patronymic = document.getElementById('patronymic').value;
  let birthday = document.getElementById('birthday').value;
  let gender = document.getElementById('gender').value;
  let text = document.getElementById('text').value;
  let votedate = new Date();

  $.ajax({
    type: 'POST', 
    url: 'insertbd.php',
    data: {
      selectedobjects: objects,
      firstname: firstname,
      lastname: lastname,
      patronymic: patronymic,
      birthday: birthday,
      gender: gender,
      text: text,
      curdate: votedate,
    },
    success: function(result) { 
        
        $('#res').html(result);
    },
    error: function(xhr, status, error) {
        console.error('Ошибка при выполнении AJAX-запроса:', status, error);
    }
});

}