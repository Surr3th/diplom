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
                        <form class="form_enter" method="post">
                            <h2>Регистрация</h2>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"><br>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
                            <input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию"><br>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
                            <input type="password" class="form-control" name="password_2" id="password_2" placeholder="Повторите пароль"><br>
                            <button class="button_search" name="do_signup" type="submit">Зарегистрировать</button>
                        </form>
                        <?php
                        if (isset($_POST['do_signup']) && input_reg($_POST['login'], $_POST['email'], $_POST['name'], $_POST['surname'], $_POST['password']) && $_POST['password'] == $_POST['password_2']) {
                            global $pdo;
                            $inputLogin = $_POST['login'];
                            $inputMail = $_POST['email'];
                            $inputName = $_POST['name'];
                            $inputSurname = $_POST['surname'];
                            $inputPassword = md5($_POST['password']);
                            $pdo->query("INSERT INTO auth(login, email, name, surname, password)
                            VALUES('$inputLogin','$inputMail','$inputName','$inputSurname','$inputPassword');");
                        }
                        ?>
                        <br>
                    </div>
                </div>
                <div class="main_login">
                    <div class="col_login">
                        <form method="post">
                            <h2>Авторизация</h2>
                            <input type="text" class="form-control" name="auth_login" placeholder="Ваш логин" /><br>
                            <input type="password" class="form-control" name="auth_password" placeholder="Ваш пароль" /><br>
                            <input class="button_search" type="submit" value="Войти" name="log_in" />
                        </form>
                        <?php
                        if (isset($_POST['log_in']) && input_auth($_POST['auth_login'], $_POST['auth_password'])) {
                            global $pdo;
                            $login = $_POST['auth_login'];
                            $password = $_POST['auth_password'];
                            setcookie("login", $login, time() + 36000, "/diplom");
                            setcookie("password", $password, time() + 36000, "/diplom");
                            if (enter($login, $password)) {
                                get_token($login, $password);
                            }
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