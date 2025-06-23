<?php get_header(''); ?>
<div class="about-top">
    <div class="container">
        <div class="heading-row">
            <a class="heading-row__btn" href="./" aria-label="На главную" title="На главную"></a>
            <h1 class="title-big">О нас</h1>
        </div>
        <?php
            $top_text = get_field('top-text');
            if ($top_text):
                ?>
        <p class="about-top__top-text"><?php echo esc_html($top_text); ?></p>
        <?php endif; ?>
        <?php
            $red_text = get_field('red-text');
            if ($red_text):
                ?>
        <p class="about-top__red-text"><?php echo esc_html($red_text); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php
get_template_part('parts/team');
get_template_part('parts/about-top');
get_template_part('parts/results');
get_template_part('parts/projects');
get_template_part('parts/about-video');
get_template_part('parts/request-form');
get_footer();