<?php get_header(); ?>
<div class="container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= home_url() ?>" aria-label="На главную" title="На главную"></a>
        <h1 class="title-big"><?php the_title(); ?></h1>
    </div>
    <div>
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>