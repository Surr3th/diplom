<?php 
include $_SERVER['DOCUMENT_ROOT']."/diplom/php/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/diplom/profile/login_func.php";
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
                <a class="buy_ticket">Купить билет </a>
                <a class="footer_info_company dan" href="../pages/service.php">Cервисы и услуги</a>
                <a class="footer_info_company dan" href="../pages/offers.php">Спецпредложения</a>
                <a class="footer_info_company dan" href="../pages/info.php">О компании</a>
            </div>

            <div class="login_flexbox">
                <a class="dan" href="../profile/enter.php">Авторизация</a>
            </div>
        </div>
    </header>
    <div class="bg">
    </div>
    <main>
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <h2>Форма входа</h2>
                            <form method="post">
                                Логин: <input type="text" name="login" />

                                Пароль: <input type="password" name="password" />
                                <input type="submit" value="Войти" name="log_in"/>
                            </form>
                            <?php
                            if (isset($_POST['log_in']) && isset($_POST['login'])){
                                global $pdo;
                                $login=$_POST['login'];
                                $password=$_POST['password'];
                                setcookie("login", $login, time()+36000, "/diplom");
                                setcookie("password", $password, time()+36000, "/diplom");
                                if (enter($login,$password)) {
                                    get_token($login,$password);
                                }
                            }
                            ?>
                        <br>
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
                <a class="footer_info_company dan" href="../Diplom/pages/info.php">О компании</a>
                <a class="footer_info_company dan" href="">Техподдержка</a>
                <a class="footer_info_company dan" href="">Политика конфиденциальности</a>
            </div>

            <div class="footer_company_flexbox">
                <div class="footer_partners">Партнерам</div>
                <a class="footer_partners_info dan" href="">Агентам</a>
                <a class="footer_partners_info dan" href="">Грузовые перевозки</a>
                <a class="footer_partners_info dan" href="">Акционерам и инвесторам</a>
            </div>
        </div>
    </footer>
    <!-- <script scr="node_modules/jquery/dist/jquery.js"></script>
    <script src="script/chief-slider.js"></script>
    <script src="script/slider.js"></script> -->
</body>
</html>