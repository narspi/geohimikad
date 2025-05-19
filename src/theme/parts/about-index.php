<section class="about">
    <div class="about__top">
        <div class="container">
            <h2 class="title">О компании</h2>
            <div class="about__body">
                <div class="about__content">
                    <?php the_field('about-text'); ?>
                </div>
                <div class="about__experience">
                    <p class="about__experience-item">
                        <span class="about__number-small">более</span>
                        <span class="about__number-big">1 400</span>
                        <span class="about__text">Архитектурных<br>проектов</span>
                    </p>
                    <p class="about__experience-item">
                        <span class="about__number-small">более</span>
                        <span class="about__number-big">36 500 <span class="about__number-small">п.м</span></span>
                        <span class="about__text">земли мы<br>пробурили</span>
                    </p>
                    <p class="about__experience-item">
                        <span class="about__number-small">более</span>
                        <span class="about__number-big">1 200</span>
                        <span class="about__text">домов, для которых мы<br>зарегестрировали<br>право
                            собственности
                        </span>
                    </p>
                    <p class="about__experience-item">
                        <span class="about__number-small">более</span>
                        <span class="about__number-big">3000 га</span>
                        <span class="about__text">было охвачено для<br>топографической<br>съемки</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="about__bot">
        <div class="container about__bot-inner">
            <?php
            $video = get_field('about-video');
            if ($video):
                ?>
                <div class="about__media">
                    <div class="about__bot-title">Видео о нас</div>
                    <div class="about__video">
                        <video controls>
                            <source src="<?= esc_url($video['url']) ?>" type="<?= esc_attr($video['mime_type']) ?>">
                            Ваша браузер не поддерживает тег
                        </video>
                    </div>
                </div>
            <?php endif; ?>
            <form class="about__form">
                <p class="about__bot-title">Заказать звонок</p>
                <p class="about__form-accent">Консультация бесплатно</p>
                <input class="about__form-input" type="text" name="name" placeholder="Ваше имя">
                <input class="about__form-input" type="tel" name="name" placeholder="Ваш номер телефона">
                <label class="about__policy">
                    <input type="checkbox" class="about__checkbox">
                    <span class="about__checkbox-fake"></span>
                    <span>Я ознакомлен и согласен с политикой обработки персональных данных,
                        и даю согласие на обработку моих персональных данных
                    </span>
                </label>
                <button class="about__form-submit">Перезвонить мне</button>
            </form>
        </div>
    </div>
</section>