<?php

/* https://api.telegram.org/bot1357627504:AAH8HfnZgHo4sYI_pDIhSpFogxUz6BT4z9o/getMe,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST['user_name'];
$phone = $_POST['user_tel'];

//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1357627504:AAH8HfnZgHo4sYI_pDIhSpFogxUz6BT4z9o";

//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-448309486";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
$txt = '';
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo '
  <div><img src="img/y.png"></div>
  <p>Спасибо</p>
  <span>Наш оператор скоро свяжется с вами</span>';
} else {
  echo '
  <div><img src="img/x.png"></div>
  <p>Ошибка</p>
  <span>Попробуйте поже</span>';
}
?>