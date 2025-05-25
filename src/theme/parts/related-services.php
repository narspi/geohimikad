<?php if (have_rows('related-services')): ?>
    <div class="related-services">
        <div class="container">
            <p class="title related-services__title">Подходящие сопутствующие услуги</p>
            <div class="related-services__list">
                <?php while (have_rows('related-services')):
                    the_row(); ?>
                    <?php
                    $post_obj = get_sub_field('related-services-post');
                    if ($post_obj):
                        setup_postdata($post_obj);
                        $thumb_id = get_post_thumbnail_id($post_obj->ID);
                        $thumb_url = get_the_post_thumbnail_url($post_obj->ID, 'medium');
                        $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                        $price = get_field('services-price', $post_obj->ID);
                        ?>
                        <article class="related-services__item">
                            <div class="related-services__pic">
                                <?php if ($thumb_url): ?>
                                    <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr($thumb_alt); ?>"
                                        class="related-services__img">
                                <?php else: ?>
                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/services/list/placeholder-project.jpg"
                                        alt="Нет изображения" class="related-services__img">
                                <?php endif; ?>
                            </div>
                            <h2 class="related-services__item-title"><?= esc_html(get_the_title($post_obj)); ?></h2>
                            <?php if ($price): ?>
                                <p class="related-services__item-price"><?= esc_html($price); ?></p>
                            <?php endif; ?>
                            <a class="btn-dark related-services__item-btn"
                                href="<?= esc_url(get_permalink($post_obj)); ?>">Подробнее</a>
                        </article>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>