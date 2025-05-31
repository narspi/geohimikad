<?php
get_header('');
?>
<div class="contacts contacts--page">
    <div class="container">
        <div class="heading-row">
            <a class="heading-row__btn" href="<?= home_url() ?>" aria-label="На главную" title="На главную"></a>
            <h1 class="title-big">Свяжитесь с нами</h1>
        </div>
        <?php
        $address = get_field('main-address', 'option');
        if ($address):
            ?>
            <p class="contacts__address">
                <span class="contacts__address-pref">Наш адрес:</span>
                <span class=""><?php echo esc_html($address); ?></span>
            </p>
        <?php endif; ?>
        <div class="contacts__main">
            <div class="contacts__map">
                <?php
                $iframe_raw = get_field('map-iframe', 'option');

                if ($iframe_raw)
                {
                    $allowed_tags = array(
                        'iframe' => array(
                            'src' => true,
                            'loading' => true,
                        ),
                    );

                    echo wp_kses($iframe_raw, $allowed_tags);
                }
                ?>
            </div>
            <div class="contacts__info">
                <p class="contacts__info-message">Звоните нам!</p>
                <?php
                $phone = get_field('main-phone', 'option');
                if ($phone):
                    $cleaned = preg_replace('/[^0-9+]/', '', $phone);
                    ?>
                    <a class="contacts__info-link contacts__info-link--phone" href="tel:<?= $cleaned ?>"><?= $phone ?></a>
                <?php endif; ?>
                <?php
                $email = get_field('main-email', 'option');
                if ($email):
                    ?>
                    <a class="contacts__info-link" href="mailto:<?= $email ?>"><?= $email ?></a>
                <?php endif; ?>
                <ul class="contacts__social">
                    <?php
                    $whatsup_url = get_field('whatsup-url', 'option');
                    if ($whatsup_url):
                        ?>
                        <li class="contacts__social-item">
                            <a href="<?= $whatsup_url ?>" class="contacts__social-link">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/icons/phone.svg"
                                    class="heaer__social-img" alt="Написать в whatsup">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $tg_url = get_field('tg-url', 'option');
                    if ($tg_url):
                        ?>
                        <li class="contacts__social-item">
                            <a href="<?= $tg_url ?>" class="contacts__social-link">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/icons/tg.svg"
                                    class="heaer__social-img" alt="Написать в телеграмм">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $inst_url = get_field('inst-url', 'option');
                    if ($inst_url):
                        ?>
                        <li class="contacts__social-item">
                            <a href="<?= $inst_url ?>" class="contacts__social-link">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/icons/inst-head.svg"
                                    class="heaer__social-img" alt="Написать в instagram">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php
                $work_time = get_field('work-time', 'option');
                if ($work_time):
                    ?>
                    <p class="contacts__info-time"><?php echo esc_html($work_time); ?></p>
                <?php endif; ?>
                <?php
                $coords = get_field('map-coordinates', 'option');
                if ($coords && isset($coords['lat'], $coords['lng'])):
                    $lat = floatval($coords['lat']);
                    $lng = floatval($coords['lng']);
                    $url = 'https://yandex.ru/maps/?rtext=~' . esc_attr($lat . ',' . $lng);
                    ?>
                    <a href="<?php echo esc_url($url) ?>" class="contacts__info-btn" target="_blank">Построить маршрут</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php get_template_part('parts/contacts-form'); ?>
</div>
<?php
get_footer();
?>