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
    <link rel="stylesheet" type="text/css" href="/Diplom/style/info.css">
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
        <div class="info_company">
            <h1>1. Политика конфиденциальности</h1>
            <p class="p_info">
                1.1. ПАО «Воздушный компаньон» осуществляет все необходимые мероприятия, связанные с защитой конфиденциальной информации, в соответствии с законодательством Российской Федерации и Политикой по обработке персональных данных работников в соответствии с Общим регламентом ЕС по защите персональных данных (РКп-ГД-007).

                Организационно-распорядительные документы ПАО «Воздушный компаньон», функционирующие в сфере защиты конфиденциальной информации, охватывают все элементы защиты предоставляемых клиентами ПАО «Воздушный компаньон» конфиденциальных сведений.</p>
            <p class="p_info">
                1.2. Обработка персональных данных в ПАО «Воздушный компаньон» осуществляется на основе следующих принципов:
            </p>
            <li>обработка персональных данных должна осуществляться на законной и справедливой основе;</li>
            <li>обработка персональных данных должна ограничиваться достижением конкретных, заранее определенных и законных целей; не допускается обработка персональных данных, несовместимая с целями сбора персональных данных;</li>
            <li>не допускается объединение баз данных, содержащих персональные данные, обработка которых осуществляется в целях, несовместимых между собой;</li>
            <li>обработке подлежат только те персональные данные, которые отвечают целям их обработки;</li>
            <li>содержание и объем обрабатываемых персональных данных должны соответствовать заявленным целям обработки;
                обрабатываемые персональные данные не должны быть избыточными по отношению к заявленным целям их обработки;</li>
            <li>при обработке персональных данных должны быть обеспечены точность персональных данных, их достаточность, а в необходимых случаях и актуальность по отношению к целям обработки персональных данных.
                ПАО «Воздушный компаньон» должно принимать необходимые меры по удалению или уточнению неполных или неточных данных либо обеспечивать их принятие;</li>
            <li>хранение персональных данных должно осуществляться в форме, позволяющей определить субъекта персональных данных не дольше, чем этого требуют цели обработки персональных данных,
                если срок хранения персональных данных не установлен федеральным законом, договором, стороной которого, выгодоприобретателем или поручителем по которому является субъект персональных данных;</li>
            <li>обрабатываемые персональные данные подлежат уничтожению без возможности восстановления либо обезличиванию
                по достижении целей обработки или в случае утраты необходимости в достижении этих целей, если иное не предусмотрено федеральным законом;</li>
            <li>персональные данные должны обрабатываться способом, гарантирующим безопасность персональных данных, включая защиту от несанкционированной или незаконной обработки и от случайной потери,
                разрушения или уничтожения данных, с использованием соответствующих технических и организационных мер.</li>
        </div>
        <div class="table_company">
            Защита информации является одной из основных задач ПАО «Воздушный компаньон» наряду с безопасностью полетов.
            В целях предотвращения несанкционированного доступа, неоговоренной передачи персональных данных третьим лицам или нецелевого использования персональных данных клиентов
            ПАО «Воздушный компаньон» постоянно разрабатывает и модернизирует средства осуществления защиты получаемой информации.
            Регулярно проверяются процессы сбора, хранения и обработки данных, используются специальные защитные механизмы и технологии.
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
    <script src="script/chief-slider.js"></script>
    <script src="script/slider.js"></script>
</body>

</html>