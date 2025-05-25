<?php get_header(); ?>
<div class="new-page container">
    <div class="heading-row">
        <a class="heading-row__btn" href="/n/" aria-label="На страницу новости" title="Перейти на страницу новости"></a>
        <h1 class="title-big"><?php the_title(); ?></h1>
    </div>
    <?php
    $new_descr = get_field('new-descr');
    if ($new_descr):
        ?>
        <p class="new-page__descr">
            <?= esc_html($new_descr) ?>
        </p>
    <?php endif; ?>
    <?php
    $services_related = get_field('related-services');
    if ($services_related):
        ?>
        <div class="new-page__related">
            <?php
            foreach ($services_related as $service_id):
                $title = get_the_title($service_id);
                ?>
                <div class="btn-green-light new-page__category">
                    <?php echo esc_html($title); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="new-page__content">
        <?php the_content(); ?>
    </div>
    <?php
    $gallery = get_field('new-gallery');
    if ($gallery):
        ?>
        <div class="new-page__gallery">
            <?php foreach ($gallery as $image): ?>
                <img class="new-page__gallery-img" src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>