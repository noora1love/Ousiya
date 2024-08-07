<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$token = "7071123260:AAEf4JqzcosBt5vCaByXUUMk6xNITYhHSic";
$chat_id = "-4217055405";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Message: ' => $message
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: index.html');
} else {
  echo "Error";
}
?>