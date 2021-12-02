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
                if(isset($_POST)){
                    $sendto   = "cbs.psk@gmail.com";//адрес куда должно прийти письмо
                    $username = htmlentities($_POST['username']);
                    $email = htmlentities($_POST['email']);
                    $country = htmlentities($_POST['country']);
                    $age = htmlentities($_POST['age']);
                    $link = htmlentities($_POST['link']);
                    //$user = $_POST[''];
                    
                    // Формирование заголовка письма
                    $subject  = "Новое сообщение с сайта nevsky-pskov.ru";
                    $headers  = "ФИО:" . strip_tags($username) . "\r\n";
                    $headers .= "Эл. почта:". strip_tags($email) . "\r\n";
                    $headers .= "Страна:". strip_tags($country). "\r\n";
                    $headers .= "Возраст:". strip_tags($age). "\r\n";
                    $headers .= "Ссылка на видео:". strip_tags($link). "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
                    
                    // Формирование тела письма
                    $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
                    $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Заявка с nevsky-pskov.ru</h2>\r\n";
                    $msg .= "<p><strong>Имя:</strong>".$username."</p>\r\n";
                    $msg .= "<p><strong>Email:</strong>".$email."</p>\r\n";
                    $msg .= "<p><strong>Тема:</strong>".$country."</p>\r\n";
                    $msg .= "<p><strong>Дата:</strong>".$age."</p>\r\n";
                    $msg .= "<p><strong>Дата:</strong>".$link."</p>\r\n";
                    $msg .= "</body></html>";
                    
                    // отправка сообщения
                    if(@mail($sendto, $subject, $msg, $headers)){
                    //ответ отправителю
                        echo "<p  style='margin-top:15%'><strong>".$username." ваша заявка принята,</strong></p>\r\n <p><strong>ответ будет отправлен,</strong></p>\r\n <p><strong>на адрес : ".$email."</strong></p>";
                    } else {
                        echo "<p><strong>Приносим извинения.</strong></p>\r\n <p><strong>Произошел сбой системы.</strong></p>\r\n <p><strong>Попробуйте еще раз.</strong></p>";
                    }

                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $country = $_POST['country'];
                    $age = $_POST['age'];
                    $link = $_POST['link'];
    
                    $forma = "ФИО - $username,
                    \r\nЭл. почта - $email,
                    \r\nСтрана, населенный пункт - $country,
                    \r\nВозраст - $age,
                    \r\nСсылка на видео - $link";
    
                    $send = mail("cbs.psk@gmail.com", "Konkurs Nevsky", $forma, "From: Konkurs Nevsky <admin@bibliopskov.ru>\r\n");
    
                    if ($send == 'true') {echo "Ваша заявка успешно отправлена!";} 
                    else {echo "Ой, что-то пошло не так";}
                };
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