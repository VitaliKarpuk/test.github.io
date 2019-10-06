<?php
$to = "kurpuk-job@yandex.ru"; // емайл получателя данных из формы 
$tema = "Форма обратной связи kontakt.ormedia.by"; // тема полученного емайла 
$message = "Ваше имя : ".$_POST['uname']."<br>";//присвоить переменной значение, полученное из формы name=name
$message .= "Номер телефона: ".$_POST['unumber']."<br>"; //полученное из формы name=phone
$headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
 //отправляет получателю на емайл значения переменных

if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($to, $tema, $message, $headers)) {
    header('Refresh: 5; URL=http://kontakt.ormedia.by/');
    echo '
    
    Письмо отправлено, через 5 секунд вы вернетесь на страницу';}
else {
    header('Refresh: 2; URL=http://kontakt.ormedia.by/');
    echo '
    
    Письмо не отправлено, через 5 секунд вы вернетесь на страницу YYY';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>