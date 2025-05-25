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
        <?php
        if (has_post_thumbnail()):
            $thumbnail_id = get_post_thumbnail_id();
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            ?>
            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= esc_attr($alt); ?>" class="service-page__img">
        <?php endif; ?>
        <div class="service-page__body">
            <div class="service-page__content">
                <?php the_content(); ?>
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
    <?php
    $title = get_field('bot-block-title');
    $descr = get_field('bot-block-descr');
    if ($title or $descr):
        ?>
        <div class="<?php if (have_rows('bot-block-list')) echo 'service-page__bot service-page__bot';
        else echo 'service-page__bot service-page__bot--full'; ?>">
            <div class="service-page__info">
                <?php if ($title): ?>
                    <p class="service-page__info-title"><?= esc_html($title) ?></p>
                <?php endif; ?>
                <?php if ($descr): ?>
                    <p class="service-page__info-descr">
                        <?= esc_html($descr) ?>
                    </p>
                <?php endif; ?>
            </div>
            <?php
            if (have_rows('bot-block-list')):
                ?>
                <ul class="service-page__bot-list">
                    <?php while (have_rows('bot-block-list')):
                        the_row();
                        $elem = get_sub_field('bot-block-li');
                        ?>
                        <li><?= esc_html($elem) ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php
get_template_part('parts/service-stages');
get_template_part('parts/service-prices');
get_template_part('parts/service-form');
get_template_part('parts/service-certificates');
get_template_part('parts/related-services');
$questions = get_field('questions');
get_template_part('parts/questions', null, array(
    'is_grey' => true,
    'questions' => $questions
));
get_template_part('parts/request-form');
get_footer();
?>