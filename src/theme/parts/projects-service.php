<?php
$current_service_id = get_the_ID();
$cases = get_posts(array(
    'post_type' => 'cases',
    'numberposts' => -1,
    'meta_query' => array(
        array(
            'key' => 'service-related',
            'value' => '"' . $current_service_id . '"',
            'compare' => 'LIKE'
        )
    )
));
if ($cases):
    ?>
    <section class="projects projects--service">
        <div class="container">
            <div class="projects__top">
                <h2 class="title projects__title">Наши результаты</h2>
                <div class="projects__btns">
                    <button class="projects__btn-prev" aria-label="перейти на предыдущий слайд"></button>
                    <button class="projects__btn-next" aria-label="перейти на следующий слайд"></button>
                </div>
            </div>
            <div class="projects__slider swiper">
                <div class="projects__slider-list swiper-wrapper">
                    <?php
                    foreach ($cases as $post):
                        setup_postdata($post);
                        ?>
                        <article class="projects__item swiper-slide">
                            <div class="projects__item-pic">
                                <?php
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                if ($thumbnail_url):
                                    $thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                                    ?>
                                    <img class="projects__item-img" src="<?= esc_url($thumbnail_url); ?>"
                                        alt="<?= esc_attr($thumbnail_alt); ?>">
                                <?php else: ?>
                                    <img class="projects__item-img"
                                        src="<?= get_template_directory_uri() ?>/assets/img/placeholder-project.svg"
                                        alt="Изображение работы">
                                <?php endif; ?>
                            </div>
                            <?php
                            $services_related = get_field('service-related');
                            if ($services_related):
                                ?>
                                <div class="projects__item-service">
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
                            <h2 class="projects__item-title"><?php the_title(); ?></h2>
                            <div class="projects__item-descr">
                                <?php the_content(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="projects__item-btn">Посмотреть кейс</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>