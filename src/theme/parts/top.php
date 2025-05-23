<div class="top">
    <div class="container">
        <div class="top__content">
            <h1 class="top__title">
                <?php echo wp_kses_post(get_field('top_title')); ?>
            </h1>
            <div class="steps top__steps">
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
        </div>
        <div class="top__btns">
            <div class="top__bot">
                <a href="<?= get_permalink(30) ?>#contacts-form" class="top__btn-colsunctation">Получить
                    бесплатную
                    консультацию</a>
            </div>
            <a href="<?php echo get_post_type_archive_link('service'); ?>" class="btn-red top__btn-service">Выбрать
                услугу</a>
        </div>
        <div class="top__list">
            <div class="top__list-item">
                <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-1.svg" alt="">
                <p class="top__list-title">10+ лет опыта</p>
                <p class="top__list-descr">Более 1000 проектов выполнено.</p>
            </div>
            <div class="top__list-item">
                <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-2.svg" alt="">
                <p class="top__list-title">Гарантия<br>качества</p>
                <p class="top__list-descr">Используем сертифицированные материалы</p>
            </div>
            <div class="top__list-item">
                <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-3.svg" alt="">
                <p class="top__list-title">Команда профессионалов</p>
                <p class="top__list-descr">Высокая квалификация сотрудников</p>
            </div>
            <div class="top__list-item">
                <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-4.svg" alt="">
                <p class="top__list-title">Собственный автопарк</p>
                <p class="top__list-descr">Оперативное выполнение работ</p>
            </div>
            <div class="top__list-item">
                <img class="top__list-img" src="<?= get_template_directory_uri() ?>/assets/img/top-list-5.svg" alt="">
                <p class="top__list-title">Онлайн-запись</p>
                <p class="top__list-descr">Удобное расписание, свободные даты</p>
            </div>
        </div>
    </div>
</div>