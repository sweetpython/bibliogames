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
            <nav aria-label="breadcrumb mb-0">
                <ol class="breadcrumb pb-0">
                <li class="breadcrumb-item"><a href="/index.html">Главная</a></li>
                <li class="breadcrumb-item"><a href="/contest.html">Конкурс</a></li>
                </ol>
            </nav>
            <hr>
            <?php
                function validate_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $error_counter = 0;

                $arr = array();
                
                foreach ($_POST as $key => $value) {
                    $arr[$key] = validate_input($value);
                }

                if (empty($arr['username']) || empty($arr['email']) || empty($arr['country']) || empty($arr['age']) || empty($arr['link'])) {
                    $error_counter++;
                }

                $forma = "ФИО: ".$arr['username'].",
                        \r\nЭлектронная почта: ".$arr['email'].",
                        \r\nСтрана, населенный пункт: ".$arr['country'].",
                        \r\nВозраст: ".$arr['age'].",
                        \r\nСсылка на видео: ".$arr['link']."";

                if ($error_counter == 0) {
                    mail("viktorina@bibliopskov.ru, deti@bibliopskov.ru", "Заявка на участие в конкурсе", $forma, "From: Konkurs Nevsky <admin@bibliopskov.ru>\r\n");
                    echo "Благодарим за участие в конкурсе!<br>
                    Сертификат участника придет на указанный Вами почтовый адрес в течение 5 дней.
                    ";
                }
                else {
                    echo 'Произошла ошибка. Проверьте правильность заполнения полей.';
                }

                // if(isset($_POST["username"]) {
                //     //Если параметр есть, присваеваем ему переданое значение
                //     $username = trim(strip_tags($_POST["username"]));
                // }
                // if(isset($_POST["email"])) {
                //     $email = trim(strip_tags($_POST["email"]));
                // }
                // if (isset( $_POST["country"])) {
                //     $country  = trim(strip_tags($country));
                // }
                // if (isset( $_POST["age"])) {
                //     $age  = trim(strip_tags($age));
                // }
                // if (isset( $_POST["link"])) {
                //     $link  = trim(strip_tags($link));
                // }

                // $username = $_POST['username'];
                // $email = $_POST['email'];
                // $country = $_POST['country'];
                // $age = $_POST['age'];
                // $link = $_POST['link'];

                // $forma = "ФИО - $username,
                // \r\nЭл. почта - $email,
                // \r\nСтрана, населенный пункт - $country,
                // \r\nВозраст - $age,
                // \r\nСсылка на видео - $link";

                // $send = mail("cbs.psk@gmail.com", "Konkurs Nevsky", $forma, "From: <admin@bibliopskov.ru>\r\n");

                // if ($send == 'true') {echo "Ваша заявка успешно отправлена!";} 
                // else {echo "Ой, что-то пошло не так";}
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