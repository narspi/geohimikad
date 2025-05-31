<div class="request-form">
    <div class="container">
        <div class="request-form__block">
            <p class="title request-form__title">Оставьте заявку</p>
            <p class="request-form__top-text">Вы можете позвонить прямо сейчас</p>
            <?php
            $phone = get_field('main-phone', 'option');
            if ($phone):
                $cleaned = preg_replace('/[^0-9+]/', '', $phone);
                ?>
                <a class="request-form_tel" href="tel:<?= $cleaned ?>"><?= $phone ?></a>
                <p class="request-form__bot-text">или заполнить форму ниже и мы свяжемся с Вами для уточнения деталей</p>
            <?php endif; ?>
            <form class="request-form__elem" data-send data-url="<?= admin_url('admin-ajax.php') ?>">
                <input type="hidden" name="submit_send_form_nonce"
                    value="<?= wp_create_nonce('submit_send_form_action'); ?>">
                <input type="hidden" name="target" value="Форма снизу со страницы <?= esc_html(get_the_title()) ?>">
                <input class="request-form__input" type="text" name="name" placeholder="Ваше имя">
                <input class="request-form__input" type="tel" name="tel" placeholder="Ваш номер телефона">
                <label class="request-form__policy">
                    <input class="request-form__checkbox" type="checkbox">
                    <span class="request-form__checkbox-fake"></span>
                    <span>Я ознакомлен и согласен с политикой обработки персональных данных, и даю согласие на обработку
                        моих персональных данных</span>
                </label>
                <button class="request-form__btn">Перезвонить мне</button>
            </form>
        </div>
    </div>
</div>