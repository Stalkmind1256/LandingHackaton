 //ПЕРЕТАСИВАНИЕ ТОЧЕК
 const map = document.querySelector('.map');
 const points = document.querySelectorAll('.point');
 const coordinateField = document.querySelector('.current-coordinate');
 const popup = document.createElement('div');
 const popupImage = document.createElement('img');
 const popupDescription = document.createElement('div');
 
 popup.classList.add('popup');
 popup.appendChild(popupImage);
 popup.appendChild(popupDescription);
 document.body.appendChild(popup); // Прикрепляем всплывающее окно к body
 
 let activePoint = null;
 let offset = { x: 0, y: 0 };
 
 // Настройка обработчика событий для точек
 points.forEach(point => {
   point.addEventListener('mousedown', handleMousedown);
   point.addEventListener('mouseover', handleMouseover);
   point.addEventListener('mouseout', handleMouseout);
 });
 
 function handleMousedown(event) {
   activePoint = event.target;
 
   // Отображаем координаты активной точки в .coordinate-field
   updateCoordinateField(activePoint.getAttribute('data-coordinate'));
 
   offset.x = event.clientX - activePoint.getBoundingClientRect().left;
   offset.y = event.clientY - activePoint.getBoundingClientRect().top;
   
   document.addEventListener('mousemove', handleMousemove);
   document.addEventListener('mouseup', handleMouseup);
 
   event.preventDefault(); // Предотвращение стандартного поведения для текстовых элементов и т.д.
 }
 
 function handleMousemove(event) {
   if (!activePoint) return;
 
   const mapRect = map.getBoundingClientRect();
   let x = event.clientX - mapRect.left - offset.x;
   let y = event.clientY - mapRect.top - offset.y;
 
   // Ограничение перемещения точек в пределах области карты
   x = Math.max(0, Math.min(x, mapRect.width - activePoint.offsetWidth));
   y = Math.max(0, Math.min(y, mapRect.height - activePoint.offsetHeight));
 
   // Перемещение точки
   activePoint.style.left = `${x}px`;
   activePoint.style.top = `${y}px`;
 }
 
 function handleMouseup() {
   document.removeEventListener('mousemove', handleMousemove);
   document.removeEventListener('mouseup', handleMouseup);
   activePoint = null;
 }
 
 // Обработчики событий для всплывающих окон при наведении
 function handleMouseover(event) {
   const point = event.target;
   const imageId = point.getAttribute('data-image-id'); // предполагаем, что у точек есть атрибут data-image-id
   const description = point.getAttribute('data-description');
 
   // Вызываем функцию для загрузки картинки из базы данных
   fetchImageById(imageId).then(imageUrl => {
     popupImage.src = imageUrl;
     popupDescription.textContent = description;
     showPopup(point);
   });
 
   function fetchImageById(id) {
     // Замените '/api/images' на фактический путь к вашему API
     return fetch(`/api/images/${id}`)
       .then(response => response.json())
       .then(data => data.imageUrl) // предполагаем, что API возвращает объект с ключом imageUrl
       .catch(error => console.error('Error fetching image:', error));
   }
 
   function showPopup(pointElement) {
     const pointRect = pointElement.getBoundingClientRect();
     popup.style.top = `${window.scrollY + pointRect.top}px`;
     popup.style.left = `${window.scrollX + pointRect.right}px`;
     popup.style.display = 'block';
   }
 }
 
 function handleMouseout() {
   popup.style.display = 'none';
 }
 
 function updateCoordinateField(coordinate) {
   const coordinateFieldSpan = document.querySelector('.coordinate-field .current-coordinate');
   coordinateFieldSpan.textContent = coordinate;
 }
 
     
   /* ФУНКЦИЯ ДЛЯ ОТОБРАЖЕНИЯ ПРИ НАВЕДЕНИИ
      const mapContainer = document.querySelector('.map-container');
 const points = document.querySelectorAll('.point');
 const popup = document.createElement('div');
 const popupImage = document.createElement('img');
 const popupDescription = document.createElement('div');
 
 popup.classList.add('popup');
 popup.appendChild(popupImage);
 popup.appendChild(popupDescription);
 mapContainer.appendChild(popup);
 
 points.forEach((point) => {
   point.addEventListener('mouseover', handleMouseover);
   point.addEventListener('mouseout', handleMouseout);
 });
 
 function handleMouseover(event) {
   const currentPoint = event.target;
   const image = currentPoint.getAttribute('data-image');
   const description = currentPoint.getAttribute('data-description');
 
   popupImage.src = image;
   popupDescription.textContent = description;
   popup.style.display = 'block';
 
   const rect = mapContainer.getBoundingClientRect();
   const pointRect = currentPoint.getBoundingClientRect();
 
   const popupTop = pointRect.top - rect.top + (pointRect.height / 2) - (popup.offsetHeight / 2);
   const popupLeft = pointRect.left - rect.left + pointRect.width;
 
   popup.style.top = popupTop + 'px';
   popup.style.left = popupLeft + 'px';
 }
 
 function handleMouseout() {
   popup.style.display = 'none';
 }
 */