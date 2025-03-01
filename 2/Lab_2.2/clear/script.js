// Массив допустимых символов для математических операций
let sim = ['*', '/', '-', '+', '.'];
// Текущее значение введенное пользователем
let input = '';
// История вычислений (массив строк)
let story = [];
// Полная история вычислений (строка)
let longStory = '';
// Ссылка на элемент input в HTML
let $input = document.querySelector('.input');
// Ссылка на элемент story в HTML, где отображается история
let $story = document.querySelector('.story');

// Обработчик события нажатия клавиши в input
$input.onkeyup = function(e){
  console.log(e)
  // Если нажата клавиша Enter, эмулируем нажатие кнопки "="
  if(e.key == 'Enter')
    ev('=');
}

// Обработчик события ввода в input
$input.oninput = function(e){
  // Если это удаление символа, передаем '<' в функцию ev, иначе переданный символ
  ev(e.inputType == "deleteContentBackward" ? '<' : e.data);
  // Предотвращаем стандартное поведение input
  return false;
};

// Привязываем функцию ev ко всем кнопкам
[...document.querySelectorAll('button')].forEach(function(el) {
  el.onclick = ev;
})

// Основная функция вычислений и отображения
function ev(data) {
  // Если data - строка, используем её, иначе берем значение из атрибута 'inTo' кнопки
  let value = typeof data == 'string' ? data : this.attributes['inTo'].value;

  // Обработка нажатия кнопки "C" (Clear)
  if(value == 'C'){
    // Если input пустой, но в поле ввода что-то есть, берем это значение
    if(!input && $input.value)
      input = $input.value;

    // Если input не пустой, очищаем все переменные и поле ввода
    if(input)
      return $input.value = longStory = input = '';

    // Очищаем историю вычислений
    $story.innerHTML = '';
    return false;
  }

  // Обработка нажатия кнопки "=" (равно)
  if(value == '='){
    // Если значение input отличается от текущего input, обновляем input
    if(input != $input.value)
      input = $input.value;
    
    // Удаляем последний символ, если это оператор
    input = sim.includes(input[input.length-1]) ? input.slice(0, -1) : input;
    input = sim.includes(input[input.length-1]) ? input.slice(0, -1) : input;

    // Составляем строку для вычисления, используя longStory, если она есть
    let string = longStory ? `${longStory.split('=')[0]}${input.replace(longStory.split('=')[1], '')}` : input;
    // Вычисляем результат
    let result = strToMath(string);
    
    // Обновляем longStory
    longStory = `${string}=${result}`;
    // Добавляем текущее вычисление в историю
    story.push(`${input}=${result}`);
    // Отображаем историю в элементе $story
    $story.innerHTML += `<i>${story[story.length-1]}</i>`;
    // Обновляем input и поле ввода результатом
    input = $input.value = result;

    return false;
  }

  // Обработка нажатия кнопки "<" (backspace)
  if(value == '<'){
    // Удаляем последний символ из input и обновляем поле ввода
    input = $input.value = input.slice(0, -1);
    return false;
  }

  // Если в истории есть записи, а текущий ввод - точка, и input пустой, то добавляем "0."
  if(story.length && value == '.' || !input && value == '.'){
    value = '0.';
  }

  // Обработка ситуации, когда подряд идут операторы
  if(sim.includes(input[input.length-1]) && sim.includes(value)){
    // Если value не минус и последний символ - оператор, то удаляем последний символ
    if(value != '-' && sim.includes(input[input.length-1]))
      input = input.slice(0, -1);
    // Если value и последний символ - минусы или плюс, то удаляем последний символ
    if(value == '-' && input[input.length-1] == '-' || value == '-' && input[input.length-1] == '+')
      input = input.slice(0, -1);
    // Если value не минус и последний символ - оператор, то удаляем последний символ
    if(value != '-' && sim.includes(input[input.length-1]))
      input = input.slice(0, -1);
  }

  // Если input пустой и value - оператор, кроме минуса, то ничего не добавляем
  if(input == '' && sim.includes(value) && value != '-'){
    value = '';
  }

  // Если в истории есть записи и value не является оператором, то очищаем input и longStory
  if(story.length && !sim.includes(value)){
    input = '';
    longStory = '';
  }

  // Очищаем историю (возможно, логика не совсем верна)
  story = [];

  // Добавляем value к input
  input += value;
  // Обновляем поле ввода
  $input.value = input;
}


// Функция для преобразования строки в математическое выражение и его вычисления
function strToMath(string){
  // Заменяем пробелы и операторы пробелами для разделения
  string = string.replaceAll(' ', '').replaceAll('+', ' + ').replaceAll('*', ' * ').replaceAll('-', ' - ').replaceAll('/', ' / ').split(' ');
  
  // Обрабатываем случай, когда после оператора идет пробел и отрицательное число
  for(let i = 0; i < string.length; i++){
    if(string[i] == ''){
      string.splice(i, 2);
      string[i] = '-'+string[i];
    }
  }
  
  // Создаем элемент calc для вычисления выражения
  let calc = document.createElement('calc');
  // Применяем стиль opacity с выражением calc
  calc.style['opacity'] = `calc(${string.join(' ')})`;
  // Получаем результат из стиля opacity
  let result = parseFloat(calc.style['opacity'].replace('calc(', '').replace(')', ''))
  // Удаляем элемент calc
  calc.remove();

  // Возвращаем результат
  return result;
}
