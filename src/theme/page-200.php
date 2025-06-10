<?php get_header(); ?>
<div class="container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= home_url() ?>" aria-label="На главную" title="На главную"></a>
        <h1 class="title-big">Отзывы наших клиентов</h1>
    </div>
    <?php get_template_part('parts/filter'); ?>
    <?php get_template_part('parts/reviews-list'); ?>
</div>
<?php get_template_part('parts/reviews-form'); ?>
<?php get_footer(); ?>