<?php
$service_id = $args['service_id'];

$reviews__args = array(
    'post_type' => 'review',
    'numberposts' => 10,
);

if ($service_id !== 0) $reviews__args = array_merge($reviews__args, array(
        'meta_query' => array(
            array(
                'key' => 'related-services',
                'value' => '"' . $service_id . '"',
                'compare' => 'LIKE'
            )
        )
    ));
$reviews = get_posts($reviews__args);
if ($reviews):
    ?>
    <section class="reviews">
        <div class="container">
            <div class="reviews__top">
                <h2 class="title">Отзывы клиентов</h2>
                <div class="reviews__btns">
                    <button class="reviews__btn-prev" aria-label="Листать слайдер назад"></button>
                    <button class="reviews__btn-next" aria-label="Листать слайдер вперёд"></button>
                </div>
            </div>
            <div class="swiper reviews__slider">
                <div class="swiper-wrapper reviews__list">
                    <?php
                    foreach ($reviews as $post):
                        setup_postdata($post);
                        $gallery = get_field('gallery');
                        $count = 0;
                        if (gettype($gallery) === 'array') $count = count($gallery);
                        ?>
                        <div class="swiper-slide reviews__item<?php if ($count > 0) echo ' reviews__item--big'; ?>">
                            <div class="reviews__item-content">
                                <p class="reviews__item-text"><?= esc_html(get_field('text')) ?></p>
                                <p class="reviews__item-title"><?= esc_html(get_the_title()) ?></p>
                            </div>
                            <?php if ($count > 0): ?>
                                <div class="reviews__item-decors">
                                    <?php
                                    $n = 0;
                                    foreach ($gallery as $gallery_elem):
                                        $n++;
                                        if ($n > 2) break;
                                        ?>
                                        <img class="reviews__item-img" src="<?= esc_url($gallery_elem['url']) ?>"
                                            alt="<?= esc_attr($gallery_elem['alt']); ?>">
                                        <?php
                                    endforeach;
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="/reviews/#reviews-form" class="reviews__btn-send">Оставить отзыв</a>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>