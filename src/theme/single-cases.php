<?php
get_header();
?>
<div class="porfolio-item container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= get_post_type_archive_link('cases'); ?>" aria-label="На страницу кейсов"
            title="Перейти на страницу кейсов"></a>
        <h1 class="title-big">Название кейса</h1>
    </div>
    <div class="porfolio-item__top">
        <?php
        if (has_post_thumbnail()):
            $thumbnail_id = get_post_thumbnail_id();
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            ?>
            <div class="porfolio-item__pic">
                <img class="porfolio-item__img" src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= esc_attr($alt); ?>">
            </div>
        <?php endif; ?>
        <div class="porfolio-item__top-content">
            <p class="porfolio-item__top-title">Результат в цифрах</p>
            <div class="porfolio-item__top-list">
                <p class="porfolio-item__top-text">xx</p>
                <p class="porfolio-item__top-text">xx</p>
                <p class="porfolio-item__top-text">xx</p>
                <p class="porfolio-item__top-text">xx</p>
            </div>
        </div>
    </div>
    <?php
    $bot_title = get_field('bot-title');
    if ($bot_title):
        ?>
        <p class="porfolio-item__descr"><?= esc_html($bot_title); ?></p>
        <?php
    endif;
    $bot_text = get_field('bot-text');
    if ($bot_text):
        ?>
        <div class="porfolio-item__content">
            <?= wp_kses_post($bot_text); ?>
        </div>
    <?php endif ?>
</div>
<?
get_template_part('parts/contacts-form');
get_footer();
?>