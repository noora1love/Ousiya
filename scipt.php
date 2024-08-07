<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

/* ОТПРАВКА ПИСЬМА ЗАКАЗА В TELEGRAM */
/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

function orderSendTelegram($message) {

    /*токен который выдаётся при регистрации бота */
    $token = "7071123260:AAEf4JqzcosBt5vCaByXUUMk6xNITYhHSic";
    /*идентификатор группы*/
    $chat_id = "-4217055405";

    /*делаем запрос*/
    parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");

}

$textMessage = "<b>ПЕРЕЗВОНИТЕ МНЕ</b>\n";
$textMessage .= "<b>Имя пользователя: </b>" . $name . "\n";
$textMessage .= "<b>Телефон: </b>" . $phone . "\n";
$textMessage .= "<b>Суть вопроса: </b>" . $message . "\n";
$textMessage = urlencode($textMessage);

orderSendTelegram($textMessage);
?>
