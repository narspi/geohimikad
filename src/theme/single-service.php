<?php
get_header();
?>
<div class="service-page container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= get_post_type_archive_link('service'); ?>" aria-label="На страницу услуг"
            title="На страницу услуг"></a>
        <h1 class="title-big"><?php the_title(); ?></h1>
    </div>
    <div class="service-page__top">
        <img src="<?= get_template_directory_uri() ?>/assets/img/services/page/item-1.jpg" alt="Фото услуги"
            class="service-page__img">
        <div class="service-page__body">
            <div class="service-page__content">
                <p>
                    Инженеры-геодезисты компании ГЕОАРХИКАД -  дипломированные
                    специалисты, с опытом работы на территории Сочи свыше 7ми лет, знающие
                    все особенности местных рельефов.Мы являемся членами Национального
                    реестра специалистов НОПРИЗ.
                </p>
                <p>ГЕОАРХИКАД имеет допуски СРО, на изыскания и проектирование.</p>
                <p>
                    Наши специалисты используют поверенное геодезическое оборудование
                    ведущих производителей.
                </p>
            </div>
            <div class="steps service-page__steps">
                <p class="steps__descr">Как подготовиться к строительству дома?</p>
                <?php if (have_rows('stages', 'option')): ?>
                    <div class="steps__list">
                        <?php
                        $stage_number = 1;
                        while (have_rows('stages', 'option')):
                            the_row(); ?>
                            <div class="steps__item">
                                <p class="steps__item-num"><?php echo $stage_number; ?> этап</p>
                                <?php if (have_rows('stage_item', 'option')): ?>
                                    <ul class="steps__item-list">
                                        <?php while (have_rows('stage_item', 'option')):
                                            the_row();
                                            $service__id = get_sub_field('service-id', 'option');
                                            if ($service__id): ?>
                                                <li>
                                                    <a href="<?php echo esc_url(get_permalink($service__id)); ?>">
                                                        <?php echo esc_html(get_the_title($service__id)); ?>
                                                    </a>
                                                </li>
                                            <?php endif;
                                        endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php
                            $stage_number++;
                        endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <button class="btn-red service-page__btn">Заказать услугу</button>
        </div>
    </div>
    <ul class="service-page__goods">
        <li class="service-page__goods-item">
            <p class="service-page__goods-text">
                <img class="service-page__goods-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-1.svg"
                    alt="">
                Гарантия
                <br>
                качества
            </p>
        </li>
        <li class="service-page__goods-item">
            <p class="service-page__goods-text">
                <img class="service-page__goods-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-2.svg"
                    alt="">
                Онлайн-запись
            </p>
        </li>
        <li class="service-page__goods-item">
            <p class="service-page__goods-text">
                <img class="service-page__goods-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-3.svg"
                    alt="">
                Гарантия
                <br>
                качества
            </p>
        </li>
        <li class="service-page__goods-item">
            <p class="service-page__goods-text">
                <img class="service-page__goods-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-4.svg"
                    alt="">
                Гарантия
                <br>
                качества
            </p>
        </li>
        <li class="service-page__goods-item">
            <p class="service-page__goods-text">
                <img class="service-page__goods-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-5.svg"
                    alt="">
                Гарантия
                <br>
                качества
            </p>
        </li>
    </ul>
    <div class="service-page__bot">
        <div class="service-page__info">
            <p class="service-page__info-title">Для кого эта услуга?</p>
            <p class="service-page__info-descr">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam
                felis, ultricies nec. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                ridiculus mus. Donec quam felis, ultricies nec.
            </p>
        </div>
        <ul class="service-page__bot-list">
            <li>Топографическая съемка</li>
            <li>Топографическая съемка с согласованием в архитектуре</li>
            <li>Расчет объема грунта</li>
            <li>Закладка пунктов и координирование геодезической разбивочной основы</li>
        </ul>
    </div>
</div>
<?php
get_template_part('parts/service-stages');
get_template_part('parts/service-prices');
get_template_part('parts/service-form');
get_template_part('parts/service-certificates');
get_template_part('parts/popular-services');
get_template_part('parts/request-form');
get_footer();
?>