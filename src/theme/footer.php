<footer class="footer">
    <div class="container footer__inner">
        <div class="footer__info">
            <div>
                <a href="<?= home_url() ?>" class="footer__logo">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/footer-logo.svg" alt="Главная страница"
                        width="180" height="65">
                </a>
                <p class="footer__descr">
                    Профессиональные<br>геодезические<br>и кадастровые услуги
                </p>
            </div>
            <ul class="footer__social">
                <?php
                $whatsup_url = get_field('whatsup-url', 'option');
                if ($whatsup_url):
                    ?>
                    <li class="footer__social-item">
                        <a class="footer__social-link" href="<?= $whatsup_url ?>" target="_blank">
                            <img class="footer__social-img"
                                src="<?= get_template_directory_uri() ?>/assets/img/icons/whatsapp.svg"
                                alt="Написать в ватсап">
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                $inst_url = get_field('inst-url', 'option');
                if ($inst_url):
                    ?>
                    <li class="footer__social-item">
                        <a class="footer__social-link" href="<?= $inst_url ?>" target="_blank">
                            <img class="footer__social-img"
                                src="<?= get_template_directory_uri() ?>/assets/img/icons/instagram.svg"
                                alt="Написать в инстаграм">
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                $tg_url = get_field('tg-url', 'option');
                if ($tg_url):
                    ?>
                    <li class="footer__social-item">
                        <a class="footer__social-link" href="<?= $tg_url ?>" target="_blank">
                            <img class="footer__social-img"
                                src="<?= get_template_directory_uri() ?>/assets/img/icons/footer-tg.svg"
                                alt="Написать в телеграмм">
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                $phone = get_field('main-phone', 'option');
                if ($phone):
                    $cleaned = preg_replace('/[^0-9+]/', '', $phone);
                    ?>
                    <li class="footer__social-item">
                        <a class="footer__social-link" href="tel:<?= $cleaned ?>">
                            <img class="footer__social-img"
                                src="<?= get_template_directory_uri() ?>/assets/img/icons/footer-phone.svg"
                                alt="Позвонить нам">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="footer__services">
            <p class="footer__services-title">Услуги</p>
            <?php
            $services = get_posts(array(
                'post_type' => 'service',
                'numberposts' => -1
            ));
            ?>
            <ul class="footer__services-list">
                <?php
                foreach ($services as $post):
                    setup_postdata($post);
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
            <?php
            $privacy_url = get_privacy_policy_url();
            if ($privacy_url):
                ?>
                <p class="footer__policy">
                    <a class="footer__policy-link" href="<?php echo $privacy_url; ?>">Политика
                        конфидициальности</a>
                </p>
            <?php endif; ?>
        </div>
        <button class="footer__scroll-up" title="Вернуться в начало"></button>
    </div>
</footer>
<div class="form-popup" id="form-call">
    <div class="form-popup__inner">
        <p class="form-popup__title">Заказать звонок</p>
        <form class="form-popup__elem" data-send data-url="<?= admin_url('admin-ajax.php') ?>">
            <input type="hidden" name="submit_send_form_nonce"
                value="<?= wp_create_nonce('submit_send_form_action'); ?>">
            <input type="hidden" name="target" value="Заказать звонок">
            <input class="form-popup__input" type="text" name="name" placeholder="Ваше имя" />
            <input class="form-popup__input" type="tel" name="tel" placeholder="Ваш телефон" />
            <label class="form-popup__policy">
                <input class="form-popup__checkbox" type="checkbox" required />
                <span class="form-popup__fake"></span>
                <span>
                    Я ознакомлен и согласен с политикой обработки персональных данных, и
                    даю согласие на обработку моих персональных данных
                </span>
            </label>
            <button class="form-popup__submit" type="submit">Перезвонить мне</button>
        </form>
    </div>
    <button class="form-popup__close" aria-label="Закрыть окно"></button>
</div>
<div class="form-popup" id="form-service">
    <div class="form-popup__inner">
        <p class="form-popup__title">Заказать услугу</p>
        <form class="form-popup__elem" data-send data-url="<?= admin_url('admin-ajax.php') ?>">
            <input type="hidden" name="submit_send_form_nonce"
                value="<?= wp_create_nonce('submit_send_form_action'); ?>">
            <input class="form-popup__input form-popup__input--service" type="text" name="target" value=""
                readonly="readonly">
            <input class="form-popup__input" type="text" name="name" placeholder="Ваше имя" />
            <input class="form-popup__input" type="tel" name="tel" placeholder="Ваш телефон" />
            <label class="form-popup__policy">
                <input class="form-popup__checkbox" type="checkbox" required />
                <span class="form-popup__fake"></span>
                <span>
                    Я ознакомлен и согласен с политикой обработки персональных данных, и
                    даю согласие на обработку моих персональных данных
                </span>
            </label>
            <button class="form-popup__submit" type="submit">Перезвонить мне</button>
        </form>
    </div>
    <button class="form-popup__close" aria-label="Закрыть окно"></button>
</div>
<div class="form-popup" id="nav-menu">
    <div class="form-popup__inner"></div>
    <button class="form-popup__close" aria-label="Закрыть окно"></button>
</div>
<div class="form-popup" id="popup-case">
    <div class="form-popup__inner">
        <p class="form-popup__title">Консультация</p>
        <form class="form-popup__elem" data-send data-url="<?= admin_url('admin-ajax.php') ?>">
            <input type="hidden" name="submit_send_form_nonce"
                value="<?= wp_create_nonce('submit_send_form_action'); ?>">
            <input class="form-popup__hidden--point" type="hidden" name="target" value="Заказать звонок">
            <input class="form-popup__input" type="text" name="name" placeholder="Ваше имя">
            <input class="form-popup__input" type="tel" name="tel" placeholder="Ваш телефон">
            <label class="form-popup__policy">
                <input class="form-popup__checkbox" type="checkbox" required>
                <span class="form-popup__fake"></span>
                <span>
                    Я ознакомлен и согласен с политикой обработки персональных данных, и
                    даю согласие на обработку моих персональных данных
                </span>
            </label>
            <button class="form-popup__submit" type="submit">Перезвонить мне</button>
        </form>
    </div>
    <button class="form-popup__close" aria-label="Закрыть окно"></button>
</div>
<div class="popup-video" id="popup-video">
    <div class="popup-video__inner"></div>
    <button class="popup-video__close" aria-label="Закрыть видео"></button>
</div>
<?php wp_footer(); ?>
</body>

</html>