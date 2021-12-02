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

                if (empty($arr['username']) || empty($arr['email']) || empty($arr['message'])) {
                    $error_counter++;
                }

                $forma = "Имя и фамилия: ".$arr['username'].",
                        \r\nЭлектронная почта: ".$arr['email'].",
                        \r\nТекст сообщения: ".$arr['message']."";

                if ($error_counter == 0) {
                    mail("cbs.psk@gmail.com", "Обратная связь", $forma, "From: nevsky-pskov.ru <admin@bibliopskov.ru>\r\n");
                    echo "Ваше сообщение успешно отправлено!";
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