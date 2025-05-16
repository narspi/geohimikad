<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Adamina&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div class="header">
        <div class="container header__inner">
            <div class="header__links">
                <div class="header__contacts">
                    <a href="<?= home_url() ?>" class="logo">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/logo.svg"
                            alt="Перейти на главную страницу">
                    </a>
                    <a href="mailto:geoarhikad@mail.ru" class="header__contacts-link">geoarhikad@mail.ru</a>
                    <a href="tel:89188888888" class="header__contacts-link">8 918 888 88 88</a>
                </div>
                <nav class="header__nav">
                    <ul>
                        <li>
                            <a href="<?= home_url() ?>" class="active">Главная</a>
                        </li>
                        <li>
                            <a href="./services.html">Услуги</a>
                        </li>
                        <li>
                            <a href="./porfolio.html">Портфолио</a>
                        </li>
                        <li>
                            <a href="./reviews.html">Отзывы</a>
                        </li>
                        <li>
                            <a href="./news.html">Новости</a>
                        </li>
                        <li>
                            <a href="./contacts.html">Контакты</a>
                        </li>
                        <li>
                            <a href="./about.html">О нас</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header__btns">
                <button class="header__call-back">Заказать звонок</button>
                <ul class="header__social">
                    <li class="header__social-item">
                        <a href="#" class="header__social-link">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/icons/phone.svg"
                                class="heaer__social-img" alt="Позвонить">
                        </a>
                    </li>
                    <li class="header__social-item">
                        <a href="#" class="header__social-link">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/icons/tg.svg"
                                class="heaer__social-img" alt="Написать в телеграмм">
                        </a>
                    </li>
                    <li class="header__social-item">
                        <a href="#" class="header__social-link">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/icons/phone.svg"
                                class="heaer__social-img" alt="Написать в whatsup">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>