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
                    <?php
                    $email = get_field('main-email', 'option');
                    if ($email):
                        ?>
                        <a href="mailto:<?= $email ?>" class="header__contacts-link"><?= $email ?></a>
                    <?php endif; ?>
                    <?php
                    $phone = get_field('main-phone', 'option');
                    if ($phone):
                        $cleaned = preg_replace('/[^0-9+]/', '', $phone);
                        ?>
                        <a href="tel:<?= $cleaned ?>" class="header__contacts-link"><?= $phone ?></a>
                    <?php endif; ?>
                </div>
                <div class="header__burger-wrap">
                    <button class="header__burger" aria-label="Открыть меню" data-popup="nav-menu"></button>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_mail',
                    'container_class' => 'header__nav',
                    'container' => 'nav'
                ));
                ?>
            </div>
            <div class="header__btns header__btns--grey">
                <button class="header__call-back" data-popup="form-call">Заказать звонок</button>
                <ul class="header__social">
                    <?php
                    $whatsup_url = get_field('whatsup-url', 'option');
                    if ($whatsup_url):
                        ?>
                        <li class="header__social-item">
                            <a href="<?= $whatsup_url ?>" class="header__social-link" target="_blank">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/icons/phone.svg"
                                    class="heaer__social-img" alt="Позвонить">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $tg_url = get_field('tg-url', 'option');
                    if ($tg_url):
                        ?>
                        <li class="header__social-item">
                            <a href="<?= $tg_url ?>" class="header__social-link" target="_blank">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/icons/tg.svg"
                                    class="heaer__social-img" alt="Написать в телеграмм">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $inst_url = get_field('inst-url', 'option');
                    if ($inst_url):
                        ?>
                        <li class="header__social-item">
                            <a href="<?= $inst_url ?>" class="header__social-link" target="_blank">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/icons/inst-head.svg"
                                    class="heaer__social-img" alt="Написать в instagram">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>