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
                            <a href="./" class="active">Главная</a>
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
            <div class="header__btns header__btns--grey">
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
    <div class="top">
        <div class="container">
            <div class="top__content">
                <h1 class="top__title">
                    Профессиональные<br />геодезические<br />и&nbsp;кадастровые<br />услуги
                </h1>
                <div class="steps top__steps">
                    <p class="steps__descr">Как подготовиться к строительству дома?</p>
                    <div class="steps__list">
                        <div class="steps__item">
                            <p class="steps__item-num">1 этап</p>
                            <ul class="steps__item-list">
                                <li>
                                    <a class="active" href="./service-page.html">Бурение на воду</a>
                                </li>
                                <li>
                                    <a href="./service-page.html">Геологические услуги</a>
                                </li>
                                <li>
                                    <a href="./service-page.html">Геодезические услуги</a>
                                </li>
                            </ul>
                        </div>
                        <div class="steps__item">
                            <p class="steps__item-num">2 этап</p>
                            <ul class="steps__item-list">
                                <li>
                                    <a href="./service-page.html">Разрешение на строитеьство</a>
                                </li>
                                <li>
                                    <a href="./service-page.html">Проектные работы</a>
                                </li>
                            </ul>
                        </div>
                        <div class="steps__item">
                            <p class="steps__item-num">3 этап</p>
                            <ul class="steps__item-list">
                                <li>
                                    <a href="./service-page.html">РосАвиация</a>
                                </li>
                                <li>
                                    <a href="./service-page.html">адастровые услуги</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top__btns">
                <div class="top__bot">
                    <a href="./contacts.html#contacts-form" class="top__btn-colsunctation">Получить бесплатную
                        консультацию</a>
                </div>
                <a href="<?php echo get_post_type_archive_link('service'); ?>" class="btn-red top__btn-service">Выбрать
                    услугу</a>
            </div>
            <div class="top__list">
                <div class="top__list-item">
                    <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-1.svg"
                        alt="" />
                    <p class="top__list-title">10+ лет опыта</p>
                    <p class="top__list-descr">Более 1000 проектов выполнено.</p>
                </div>
                <div class="top__list-item">
                    <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-2.svg"
                        alt="" />
                    <p class="top__list-title">Гарантия<br />качества</p>
                    <p class="top__list-descr">Используем сертифицированные материалы</p>
                </div>
                <div class="top__list-item">
                    <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-3.svg"
                        alt="" />
                    <p class="top__list-title">Команда профессионалов</p>
                    <p class="top__list-descr">Высокая квалификация сотрудников</p>
                </div>
                <div class="top__list-item">
                    <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-4.svg"
                        alt="" />
                    <p class="top__list-title">Собственный автопарк</p>
                    <p class="top__list-descr">Оперативное выполнение работ</p>
                </div>
                <div class="top__list-item">
                    <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-5.svg"
                        alt="" />
                    <p class="top__list-title">Онлайн-запись</p>
                    <p class="top__list-descr">Удобное расписание, свободные даты</p>
                </div>
            </div>
        </div>
    </div>