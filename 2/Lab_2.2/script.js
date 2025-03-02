document.addEventListener('DOMContentLoaded', function() {
    const display = document.getElementById('display') // Получаем ссылку на элемент отображения калькулятора
   
    const buttons = document.querySelectorAll('.button') // Получаем все кнопки калькулятора
    
    const clearButton = document.getElementById('clear') // Получаем кнопку очистки
    
    const calculateButton = document.getElementById('calculate') // Получаем кнопку вычисления результата

    // Функция для добавления символа в поле отображения
    const appendToDisplay = (value) => {
        display.value += value
    }
  
    // Функция для очистки поля отображения
    const clearDisplay = () => {
        display.value = ''
    }
  
    // Функция для отправки выражения на сервер и получения результата
    const calculateResult = () => {
        const expression = display.value
  
        // Дополнительная проверка на пустое выражение перед отправкой
        if (!expression) {
            display.value = 'Ошибка: Введите выражение'
            return
        }
  
        // Отправляем POST-запрос на сервер для вычисления выражения
        fetch('calculate.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `expression=${encodeURIComponent(expression)}`
        })
        .then(response => {
            // Проверяем, что ответ от сервера успешен
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`)
            }
            return response.text()
        })
        .then(result => {
            // Отображаем результат в поле отображения
            display.value = result
        })
        .catch(error => {
            // Обрабатываем ошибки и выводим сообщение об ошибке
            console.error('Ошибка при вычислении:', error)
            display.value = 'Ошибка: Произошла ошибка' // Более общее сообщение об ошибке
        })
    }
  
  
    // Добавляем обработчики событий для каждой кнопки
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const value = this.getAttribute('data-value-btn') // Получаем значение data-value-btn атрибута

            // Проверяем, является ли кнопка кнопкой удаления(очистки) или вычисления
            if (this.id === 'clear') {
                clearDisplay() // Очищаем поле отображения
            } else if (this.id === 'calculate') {
                calculateResult() // Вычисляем результат
            } else {
                appendToDisplay(value) // Добавляем символ в поле отображения
            }
        })
    })
  
    // Обработчик для кнопки "Удалитьы"
    clearButton.addEventListener('click', clearDisplay)
  
    // Обработчик для кнопки "Результат"
    calculateButton.addEventListener('click', calculateResult)
  })
  