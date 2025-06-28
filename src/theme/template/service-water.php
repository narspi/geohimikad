<?php
/**
 * Template Name: Шаблон Нижнее описание
 * Template Post Type: service
 */
get_header();
$id = get_the_ID();
?>
<div class="service-page container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= get_post_type_archive_link('service'); ?>" aria-label="На страницу услуг"
            title="На страницу услуг"></a>
        <h1 class="title-big"><?= esc_html(get_the_title()); ?></h1>
    </div>
    <?php $page_url = get_permalink(); ?>
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
            <button class="btn-red service-page__btn" data-popup="form-service"
                data-service="<?= esc_html(get_the_title()); ?>">Заказать услугу</button>
        </div>
    </div>
    <?php get_template_part('parts/service-page-goods'); ?>
</div>
<?php get_template_part('parts/service-stages'); ?>
<?php
$title = get_field('bot-block-title');
$descr = get_field('bot-block-descr');
if ($title or $descr):
    ?>
    <div class="service-page__bot-wrap">
        <div class="container">
            <div class="<?php if (have_rows('bot-block-list')) echo 'service-page__bot service-page__bot';
            else echo 'service-page__bot service-page__bot--full'; ?>">
                <div class="service-page__info">
                    <?php if ($title): ?>
                        <p class="title-big service-page__info-title"><?= esc_html($title) ?></p>
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
        </div>
    </div>
<?php endif; ?>
<?php
get_template_part('parts/service-prices');
get_template_part('parts/service-form');
get_template_part('parts/service-certificates');
get_template_part('parts/related-services');
$questions = get_field('questions');
get_template_part('parts/questions', null, array(
    'is_grey' => true,
    'questions' => $questions
));
get_template_part('parts/projects-service');
get_template_part('parts/request-form');
get_footer();
?>