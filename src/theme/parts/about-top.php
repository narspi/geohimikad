<div class="about-top">
    <div class="container">
        <div class="heading-row">
            <a class="heading-row__btn" href="./" aria-label="На главную" title="На главную"></a>
            <h1 class="title-big"><?php the_title(); ?></h1>
        </div>
        <div class="about-top__body">
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
            <div class="about-top__content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>