<?php get_header(); ?>
<div class="container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= home_url() ?>" aria-label="На главную" title="На главную"></a>
        <h1 class="title-big">Наши услуги</h1>
    </div>
    <?php if (have_posts()): ?>
        <div class="services-list">
            <?php while (have_posts()):
                the_post(); ?>
                <article class="services-list__item">
                    <div class="services-list__pic">
                        <img class="services-list__img"
                            src="<?= get_template_directory_uri() ?>/assets/img/services/list/item-1.jpg"
                            alt="Декорация услуги">
                    </div>
                    <div class="services-list__body">
                        <h2 class="services-list__title"><?php the_title(); ?></h2>
                        <div class="services-list__content">
                            <p>
                                Мы поможем Вам с выполнением таких работ как: технический план
                                объекта капитального строительства, межевой план
                            </p>
                            <p>
                                В команде ГЕОАРХИКАД кадастровые инженеры обладают опытом работы
                                свыше 8-ми лет. Помимо этого, наши специалисты имеют образование и
                                аттестат кадастрового инженера, позволяющий ему выполнять работы.
                            </p>
                        </div>
                        <p class="services-list__price">от 10 000 руб.</p>
                        <div class="services-list__btns-row">
                            <a class="btn-light" href="<?php the_permalink(); ?>">Узнать подробнее</a>
                            <button class="btn-red">Заказать услугу</button>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Услуги не найдены.</p>
    <?php endif; ?>
</div>
<section class="services-form">
    <div class="container">
        <h2 class="title services-form__title">Спецпредложение!</h2>
    </div>
    <div class="services-form__body">
        <div class="services-form__content">
            <p class="services-form__text">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                ultricies nec.
            </p>
            <img class="services-form__decor" src="./img/auto-decor.svg" alt="">
        </div>
        <form class="services-form__elem">
            <input class="services-form__input" type="text" name="name" placeholder="Ваше имя">
            <input class="services-form__input" type="tel" name="tel" placeholder="Ваш номер телефона">
            <label class="services-form__policy">
                <input class="services-form__checkbox" type="checkbox">
                <span class="services-form__checkbox-fake"></span>
                <span>Я ознакомлен и согласен с политикой обработки персональных данных, и
                    даю согласие на обработку моих персональных данных
                </span>
            </label>
            <button class="services-form__btn">Перезвонить мне</button>
        </form>
    </div>
</section>
<?php get_footer(); ?>