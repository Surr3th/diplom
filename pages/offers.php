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
    <link rel="stylesheet" type="text/css" href="/Diplom/style/style.css">
    <link rel="stylesheet" type="text/css" href="/Diplom/style/chief-slider.css">
    <link rel="stylesheet" type="text/css" href="/Diplom/style/slider.css">
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
                <a class="footer_info_company dan" href="../pages/info.php">О компании</a>
                <a class="footer_info_company dan" href="../pages/rules.php">Правила для пассажиров</a>
            </div>
            <?php
            login_on();
            ?>
        </div>
    </header>
    <main>
        <div class="main_brat">
            <div class="little_brat">
                <h2 class="h2_brat">Поиск скидок</h2>
                <form class="form_brat" method="POST">
                    <label for="tabs_place">Откуда</label>
                    <select name="search_depart">
                        <option>Город вылета</option>
                        <?php
                        global $pdo;
                        foreach ($pdo->query("SELECT DISTINCT depart FROM tickets") as $row1) {
                            echo '<option name="' . $row1['depart'] . '" value="' . $row1['depart'] . '">' . $row1['depart'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="tabs_place">Куда</label>
                    <select name="search_arrive">
                        <option>Город прилёта</option>
                        <?php
                        global $pdo;
                        foreach ($pdo->query("SELECT DISTINCT arrive FROM tickets") as $row2) {
                            echo '<option name="' . $row2['arrive'] . '" value="' . $row2['arrive'] . '">' . $row2['arrive'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="tabs_date">Дата вылета</label>
                    <input type="submit" name="button_search" class="button_search table-open" id="button-search-username" value="Найти">
                    <input type="checkbox" name="button_return_search" id="button-return-search-username">
                    <label for="button_return_search">Найти обратные рейсы?</label>
                </form>
                <?php
                if (isset($_POST['button_search'])) {
                    global $pdo;
                    $inputSearch1 = $_POST['search_depart'];
                    $inputSearch2 = $_POST['search_arrive'];
                    $tickets = array();
                    $tickets2 = array();
                    foreach ($pdo->query("SELECT * FROM tickets WHERE depart = '$inputSearch1' and discount is not null AND arrive = '$inputSearch2'  order by id") as $row3) {
                        array_push($tickets, $row3['id']);
                    };
                    foreach ($pdo->query("SELECT * FROM tickets WHERE depart = '$inputSearch2' and discount is not null AND arrive = '" . $inputSearch1 . "' order by id") as $row4) {
                        array_push($tickets2, $row4['id']);
                    };
                    for ($i = 0; $i < count($tickets); $i++) {
                        $key = $tickets[$i];
                        $value = $pdo->query("SELECT * FROM tickets WHERE id=$key")->fetch(PDO::FETCH_ASSOC);
                        echo '
                            <div class="table-fade">
                            <div class="table">
                            <h2 class="table_title">' . $value['depart'] . ' - ' . $value['arrive'] . '</h2>
                                <table class="upper_table">
                                <tr>
                                    <th>Вылет:</th>
                                    <th>Прилёт:</th>
                                    <th>Дата:</th>
                                    <th>Рейс:</th>
                                    <th>Кол-во билетов:</th>
                                    <th>В пути:</th>
                                    <th>Цена со скидкой:</th>
                                </tr>
                                <tr>
                                    <td>' . $value['depart'] . '</td>
                                    <td>' . $value['arrive'] . '</td>
                                    <td>' . $value['date'] . '</td>
                                    <td>' . $value['code'] . '</td>
                                    <td>' . $value['count'] . '</td>
                                    <td>' . $value['flight_time'] . '</td>
                                    <td>' . $value['discount'] . '</td>
                                    <td><input type="submit" name="button_buy" class="popup-open button-buy" id="button-buy-ticket" value="Купить билет"></td>
                                </tr>
                                </table>
                                <div class="under_table hidden">
                                <h2 class="table_title">' . $value['arrive'] . ' - ' . $value['depart'] . '</h2>
                                </div>
                                </div>
                            ';
                    }
                    if (isset($_POST['button_return_search'])) {
                        foreach ($pdo->query("SELECT * FROM tickets WHERE depart = '$inputSearch2' AND arrive = '" . $inputSearch1 . "' order by id") as $row5) {
                            array_push($tickets2, $row5['id']);
                        };
                        echo '<h2 class="h2_brat"> Обратные рейсы </h2>';
                        for ($g = 0; $g < count($tickets2); $g++) {
                            $elem = $tickets2[$g];
                            $array = $pdo->query("SELECT * FROM tickets WHERE id=$elem")->fetch(PDO::FETCH_ASSOC);
                            echo '
                                <div class="table-fade">
                                <div class="table">
                                <h3 class="table_title">' . $array['depart'] . ' - ' . $array['arrive'] . '</h2>
                                    <table class="upper_table">
                                    <tr>
                                        <th>Вылет:</th>
                                        <th>Прилёт:</th>
                                        <th>Дата:</th>
                                        <th>Рейс:</th>
                                        <th>Кол-во билетов:</th>
                                        <th>В пути:</th>
                                        <th>Лучшая цена:</th>
                                    </tr>
                                    <tr>
                                        <td>' . $array['depart'] . '</td>
                                        <td>' . $array['arrive'] . '</td>
                                        <td>' . $array['date'] . '</td>
                                        <td>' . $array['code'] . '</td>
                                        <td>' . $array['count'] . '</td>
                                        <td>' . $array['flight_time'] . '</td>
                                        <td>' . $array['price'] . '</td>
                                        <td><input type="submit" name="button_buy" class="popup-open button-buy" id="button-buy-ticket" value="Купить билет"></td>
                                    </tr>
                                    </table>
                                </div>
                                </div>
                                ';
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class='popup-fade'>
            <div class='popup'>
                <input type='email' class='form-control' name='email' id='email' placeholder='Введите Email'><br>
                <input type='text' class='form-control' name='name' id='name' placeholder='Введите имя'><br>
                <input type='text' class='form-control' name='urname' id='surname' placeholder='Введите фамилию'><br>
                <input type='tel' class='form-control' name='tel' id='tel' placeholder='Введите телефон'><br>
                <input type='number' class='form-control' name='count' id='count' placeholder='Кол-во билетов'><br>
                <input type='text' class='form-control' name='com' id='com' placeholder='Комментарий'><br>
                <a class='popup-close' href='#'>Купить билет</a>
            </div>
        </div>
        <div class="container">
            <div class="slider">
                <div class="slider__container">
                    <div class="slider__wrapper">
                        <div class="slider__items">
                            <div class="slider__item">
                                <div class="slider_text1">
                                    Тбилиси, Грузия
                                </div>
                            </div>
                            <div class="slider__item">
                                <div class="slider_text1">
                                    Ереван, Армения
                                </div>

                            </div>
                            <div class="slider__item">
                                <div class="slider_text1">
                                    Пекин, Китай
                                </div>
                            </div>
                            <div class="slider__item">
                                <div class="slider_text1">
                                    Сидней, Австралия
                                </div>
                            </div>
                            <div class="slider__item">
                                <div class="slider_text1">
                                    Абу-даби, ОАЭ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="slider__control" data-slide="prev"></a>
                <a href="#" class="slider__control" data-slide="next"></a>
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
    <script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
    <script src="../script/chief-slider.js"></script>
    <script src="../script/slider.js"></script>
    <script src="../script/script.js"></script>
</body>

</html>