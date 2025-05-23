<div class="service-form">
  <div class="container service-form__inner">
    <div class="service-form__info">
      <p class="service-form__info-text">
        Бесплатно выедем на ваш участок, подберем место для скважины и
        рассчитаем стоимость
      </p>
      <ul class="service-form__info-list">
        <li>
          <p class="service-form__info-elem">
            <img class="service-form__info-img"
              src="<?= get_template_directory_uri() ?>/assets/img/service-form-decor-1.svg" alt="">
            10 лет<br>обучения
          </p>
        </li>
        <li>
          <p class="service-form__info-elem">
            <img class="service-form__info-img"
              src="<?= get_template_directory_uri() ?>/assets/img/service-form-decor-2.svg" alt="">
            Заключаем<br>договор
          </p>
        </li>
        <li>
          <p class="service-form__info-elem">
            <img class="service-form__info-img"
              src="<?= get_template_directory_uri() ?>/assets/img/service-form-decor-3.svg" alt="">
            Бурим за 2<br>дня
          </p>
        </li>
      </ul>
    </div>
    <form class="service-form__elem">
      <p class="service-form__elem-title">Оставить заявку</p>
      <input class="service-form__elem-input" type="text" name="name" placeholder="Ваше имя">
      <input class="service-form__elem-input" type="tel" name="name" placeholder="Ваш номер телефона">
      <label class="service-form__elem-policy">
        <input class="service-form__elem-checkbox" type="checkbox">
        <span class="service-form__elem-fake"></span>
        <span>Я ознакомлен и согласен с политикой обработки персональных данных, и даю согласие на обработку моих
          персональных данных</span>
      </label>
      <button class="service-form__elem-btn">Перезвонить мне</button>
    </form>
  </div>
</div>