<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/_style/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/_style/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="/_style/css/main.css">
    <link rel="shortcut icon" href="/_img/logo/logo.png" type="image/x-icon">
    <title>Невский на карте Пскова | ЦБС г. Пскова</title>
</head>
<body class="page">
    <section>
        <?php include_once ('../_templates/header.html');?>
    </section>
    <section class="content">
        <div class="container">
        <?php
            // Преобразование переменных из POST для безопасности
            function validate_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // Счётчик ошибок
            $error_counter = 0;

            // Массив переменных
            $arr = array();
            foreach ($_POST as $key => $value) {
                $arr[$key] = validate_input($value);
            }

            if (empty($arr['klient']) || empty($arr['email'])) {
                $error_counter++;
            }
            //'abonement@bibliopskov.ru', 
            // Выбор email для отправки
            $emails = array();

            $email_arr = array(
                'cgb' => array('abonement@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '1f' => array('ovs@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '2f' => array('vasilevka@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '3f' => array('rodnik@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '5f' => array('dialog@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '6f' => array('bibliolub@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '7f' => array('lik@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '9f' => array('cdc@bibliopskov.ru', 'cbs.psk@gmail.com'),
                '10f' => array('raduga@bibliopskov.ru', 'cbs.psk@gmail.com'),
                'bco' => array('bco@bibliopskov.ru', 'cbs.psk@gmail.com'),
                'kirpich' => array('pk@bibliopskov.ru', 'cbs.psk@gmail.com'),
            );

            // Вызываем элемент массива email`ов библиотек через ключ
            $emails = $email_arr[$arr['lib']];

            $forma = "Библиотека - ".$arr['lib'].",
                    \r\nФИО - ".$arr['klient'].",
                    \r\nНомер читательского билета (для взрослых) - ".$arr['bilet'].",
                    \r\nДля учащихся - место учебы (школа, класс) - ".$arr['bilet2'].",
                    \r\nЭлектронная почта читателя - ".$arr['email']."";

            // Отправка письма
            if ($error_counter == 0) {
                $sended = 0;
                if(isset($emails) && is_array($emails)) foreach ($emails as $email_item) {
                    if (!filter_var($email_item, FILTER_VALIDATE_EMAIL)) {
                        continue;
                    }
                    else {
                        // Отправка письма (Подставляем текущий email, названный переменной $value в цикле)
                        if (mail($email_item, "Продление книг ONLINE", $forma, "From: Prodlenie_Knig <admin@bibliopskov.ru>\r\n")) {
                            // Увеличиваем счётчик отправленных писем
                            $sended++;
                        }
                        else {
                            echo 'Произошла ошибка при отправке на почту '. $email_item.'.';
                        }
                    }
                }

                // Если было отправлено хоть одно письмо (Счетчик отправленных сообщений больше 0) - то выводим сообщение об успехе.
                if ($sended > 0) {
                    echo "Спасибо! Ваша заявка на продление принята и будет обработана в ближайшее время. <br> 
                    Если Вы сообщили координаты,  мы свяжемся с вами в течение трех рабочих дней. <br>
                    Напоминаем, что вы также можете продлить срок пользования книгами по номерам телефонов библиотек г. Пскова";
                }
                else {
                    echo "Произошла ошибка. Проверьте правильность заполнения полей.";
                }

            }
            else {
                echo 'Произошла ошибка. Проверьте правильность заполнения полей.';
            }

            ?>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </section>
    <footer class="footer bg-dark">
        <?php include_once ('../_templates/footer.html');?>
    </footer>
    <button onclick="topFunction()" id="btnUp" class="btnUp" title="Go to top"><i class="fa fa-chevron-up"></i></button>
    <script src="/_style/js/bootstrap/bootstrap.bundle.js"></script>
    <script src="/_style/js/scroll.js"></script>
</body>
</html>