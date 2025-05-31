<div class="contacts-form" id="contacts-form">
    <div class="container contacts-form__inner">
        <div class="contacts-form__block">
            <p class="contacts-form__title">Нужна консультация?</p>
            <form class="contacts-form__elem" data-send data-url="<?= admin_url('admin-ajax.php') ?>">
                <input type="hidden" name="submit_send_form_nonce"
                    value="<?= wp_create_nonce('submit_send_form_action'); ?>">
                <input type="hidden" name="target"
                    value="Нужна консультация со страницы <?= esc_html(get_the_title()) ?>">
                <input class="contacts-form__input" type="text" name="name" placeholder="Ваше имя">
                <input class="contacts-form__input" type="tel" name="tel" placeholder="Ваш номер телефона">
                <label class="contacts-form__policy">
                    <input type="checkbox" class="contacts-form__checkbox">
                    <span class="contacts-form__fake"></span>
                    <span>Я ознакомлен и согласен с политикой обработки персональных данных,
                        и даю согласие на обработку моих персональных данных</span>
                </label>
                <button class="contacts-form__btn">Перезвонить мне</button>
            </form>
        </div>
    </div>
</div>