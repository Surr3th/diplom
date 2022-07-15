<?php
include $_SERVER['DOCUMENT_ROOT'] . "/diplom/php/connect.php";
include $_SERVER['DOCUMENT_ROOT'] . "/diplom/profile/login_func.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Воздушный компаньон</title>
    <link rel="stylesheet" type="text/css" href="/diplom/style/enter.css">
    <link rel="stylesheet" type="text/css" href="/diplom/style/chief-slider.css">
    <link rel="stylesheet" type="text/css" href="/diplom/style/slider.css">
</head>

<body>
    <header>
        <div class="flexcontainer">
            <div class="Logo_flexbox">
                <div class="Logo">
                    <img src="/Diplom/images/logo2.png" width="40" height="40">
                </div>
            </div>

            <div class="main_flexbox">
                <a class="footer_info_company dan" href="../">На главную</a>
                <a class="footer_info_company dan" href="../pages/offers.php">Спецпредложения</a>
                <a class="footer_info_company dan" href="../pages/info.php">О компании</a>
                <a class="footer_info_company dan" href="../pages/rules.php">Правила для пассажиров</a>
            </div>
            <?php
            login_on();
            ?>
        </div>
    </header>
    <div class="bg">
    </div>
    <main>
        <div class="bg1">
            <div class="container mt-4">
                <div class="main_auth">
                    <div class="col_auth">
                        <?php
                        global $pdo;
                        $account = $pdo->query("SELECT * FROM auth WHERE token='" . $_COOKIE['token'] . "'")->fetch(PDO::FETCH_ASSOC);
                        $accLogin = $account['login'];
                        $accMail = $account['email'];
                        $accName = $account['name'];
                        $accSurname = $account['surname'];
                        $accPassword = $account['password'];
                        ?>
                        <form class="form_enter" method="post">
                            <h2>Данные пользователя</h2>
                            Логин:<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" value="<?= $accLogin ?>"><br>
                            Почта:<input type="email" class="form-control" name="email" id="email" placeholder="Введите Email" value="<?= $accMail ?>"><br>
                            Имя:<input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" value="<?= $accName ?>"><br>
                            Фамилия:<input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию" value="<?= $accSurname ?>"><br>
                            Пароль:<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" value="<?= $accPassword ?>"><br>
                            <button class="button_search" name="do_signup" type="submit">Изменить</button>
                        </form>
                        <?php
                        if (isset($_POST['do_signup'])) {
                            global $pdo;
                            $account = $pdo->query("SELECT * FROM auth WHERE token='" . $_COOKIE['token'] . "'")->fetch(PDO::FETCH_ASSOC);
                            $accLogin = $_POST['login'];
                            $accMail = $_POST['email'];
                            $accName = $_POST['name'];
                            $accSurname = $_POST['surname'];
                            $accPassword = $_POST['password'];
                            $pdo->query("UPDATE auth SET login='$accLogin', email='$accMail', name='$accName', surname='$accSurname', password='$accPassword' WHERE token='" . $_COOKIE['token'] . "'");
                        }
                        ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer_flexcontainer">
            <div class="footer_contacts_flexbox">
                <div class="footer_contacts">
                    Контакты
                </div>
                <div class="footer_telephone">
                    <a class="footer_number dan" href="tel:+74955552211">+7 (495) 555-22-11</a>
                    <span class="footer_telephone_text">- бесплатно для России</span>
                </div>
                <div class="footer_telephone">
                    <a class="footer_number dan" href="tel:+74955466565">+7 (495) 546-65-65</a>
                    <span class="footer_telephone_text">- для международных номеров</span>
                </div>
                <div class="footer_telephone">
                    <a class="footer_number dan" href="tel:+74954387373">+7 (495) 438-73-73</a>
                    <span class="footer_telephone_text">- для Москвы</span>
                </div>
            </div>

            <div class="footer_info_flexbox">
                <div class="footer_info">
                    Справочная информация
                </div>
                <a class="footer_info_company dan" href="../pages/info.php">О компании</a>
                <a class="footer_info_company dan" href="../pages/policity.php">Политика конфиденциальности</a>
                <a class="footer_info_company dan" href="../pages/rules.php">Грузовые перевозки</a>
            </div>
        </div>
    </footer>
    <script scr="node_modules/jquery/dist/jquery.js"></script>
</body>

</html>