<?php
get_header();
?>
<div class="porfolio container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= home_url() ?>" aria-label="На главную" title="На главную"></a>
        <h1 class="title-big">Наши работы</h1>
    </div>
    <p class="porfolio__descr-top">Наши работы: примеры качества и мастертсва</p>
    <p class="porfolio__descr-bot">Мы гордимся результатами своей работы</p>
    <?php if (have_posts()): ?>
        <div class="porfolio-list">
            <?php while (have_posts()):
                the_post(); ?>
                <article class="porfolio-list__item">
                    <div class="porfolio-list__body">
                        <?php
                        $services_related = get_field('service-related');
                        if ($services_related):
                            ?>
                            <div class="porfolio-list__service">
                                <?php
                                foreach ($services_related as $service_id):
                                    $title = get_the_title($service_id);
                                    ?>
                                    <div>
                                        <span><?php echo esc_html($title); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <h2 class="porfolio-list__title"><?= esc_html(get_the_title()); ?></h2>
                        <div class="porfolio-list__content">
                            <?php the_content(); ?>
                        </div>
                        <a class="porfolio-list__link" href="<?php the_permalink(); ?>">Узнать подробнее</a>
                    </div>
                    <div class="porfolio-list__view">
                        <?php

                        ?>
                        <div class="porfolio-list__pic">
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            if ($thumbnail_url):
                                $thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                                ?>
                                <img class="porfolio-list__img" src="<?= esc_url($thumbnail_url); ?>"
                                    alt="<?= esc_attr($thumbnail_alt); ?>">
                            <?php else: ?>
                                <img class="porfolio-list__img"
                                    src="<?= get_template_directory_uri() ?>/assets/img/placeholder-project.svg"
                                    alt="Кейс какой то">
                            <?php endif; ?>
                        </div>
                        <button class="porfolio-list__view-btn" data-popup="popup-case"
                            data-point="<?= esc_html(get_the_title()); ?>">Заказать эту
                            услугу</button>
                    </div>
                    <a class="porfolio-list__btn" href="<?php the_permalink(); ?>" aria-label="перейти на кейс"
                        title="перейти на кейс"></a>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Кейсы не найдены.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>