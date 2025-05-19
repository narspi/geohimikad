<section class="contacts">
    <div class="container">
        <h2 class="title contacts__title">Контакты</h2>
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
                    <a class="contacts__info-link" href="mailto:geoarhikad@mail.ru"><?= $email ?></a>
                <?php endif; ?>
                <?php
                $address = get_field('main-address', 'option');
                if ($address):
                    ?>
                    <p class="contacts__info-address"><?php echo esc_html($address); ?></p>
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
</section>