window.addEventListener('DOMContentLoaded', function() {
  const checkbox = document.getElementById("image-checkbox");
  const res1 = document.getElementById("res1");
  const res2 = document.getElementById("res2");

  res1.classList.add('hide-screki');
  res2.classList.add('hide-screki');

  // Обработчик события для чекбокса
  checkbox.addEventListener('change', function() {
    if (this.checked) {
      
      res1.classList.remove('hide-screki');
      res2.classList.remove('hide-screki');
    } else {
      res1.classList.add('hide-screki');
      res2.classList.add('hide-screki');
    }
  });
});

//Функция создания textarea
let offerTextareaContainer = document.getElementById('offer-textarea-container');
let offerBtn = document.getElementById('offer-btn');

offerBtn.addEventListener('click', function() {
    if (offerTextareaContainer.style.display === 'none') {
        offerTextareaContainer.style.display = 'block';
    } else {
        offerTextareaContainer.style.display = 'none';
    }
});