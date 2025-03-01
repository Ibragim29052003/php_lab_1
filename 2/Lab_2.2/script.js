// Функция для добавления значения в поле ввода
function appendToDisplay(value) {
    document.getElementById('display').value += value;
}

// Функция для очистки поля ввода
function clearDisplay() {
    document.getElementById('display').value = '';
}

// Функция для отправки выражения на сервер и получения результата
function calculate() {
    const expression = document.getElementById('display').value; // Получаем выражение из поля ввода

    
    // Создаем объект FormData для отправки данных методом POST
    const formData = new FormData();
    formData.append('expression', expression); // Добавляем выражение в FormData

    // Отправляем POST-запрос на сервер
    fetch('calculate.php', {
        method: 'POST', 
        body: formData // Передаем данные в теле запроса
    })
    .then(response => response.text()) // Получаем ответ от сервера в виде текста
    .then(result => {
        document.getElementById('display').value = result; // Отображаем результат в поле ввода
    })
    .catch(error => {
        console.error('Ошибка:', error); // Выводим ошибку в консоль
        document.getElementById('display').value = 'Ошибка'; // Отображаем сообщение об ошибке в поле ввода
    });
}

