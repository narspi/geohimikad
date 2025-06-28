<?php if (have_rows('service-prices')): ?>
<div class="service-prices">
    <div class="container service-prices__inner">
        <?php
      while (have_rows('service-prices')):
        the_row(); ?>
        <article class="service-prices__item">
            <div class="service-prices__view">
                <?php
            $img = get_sub_field('service-prices-img');
            if ($img):
              ?>
                <div class="service-prices__pic">
                    <img src="<?= esc_url($img['url']) ?>" alt="<?= esc_attr($img['alt']) ?>"
                        class="service-prices__img">
                    <?php
                $price_title = get_sub_field('service-prices-title');
                if ($price_title):
                  ?>
                    <h2 class="service-prices__title"><?= esc_html($price_title) ?></h2>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php
            $price_descr = get_sub_field('service-prices-descr');
            if ($price_descr):
              ?>
                <div class="service-prices__view-descr">
                    <?= wp_kses_post($price_descr) ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="service-prices__content">
                <?php
            $price_list_title = get_sub_field('service-prices-list-title');
            if ($price_list_title):
              ?>
                <p class="service-prices__content-descr"><?= esc_html($price_list_title); ?></p>
                <?php endif; ?>
                <?php if (have_rows('service-prices-list')): ?>
                <ul class="service-prices__content-list">
                    <?php while (have_rows('service-prices-list')):
                  the_row(); ?>
                    <li class="service-prices__content-item">
                        <?php
                    $elem_text = get_sub_field('service-prices-list-text');
                    echo esc_html($elem_text);
                    ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php
            $price_num = get_sub_field('service-prices-num');
            if ($price_num):
              ?>
                <p class="service-prices__content-price"><?= esc_html($price_num) ?></p>
                <?php endif; ?>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
    <div class="container">
        <div class="steps service-prices__steps">
            <p class="steps__descr">Как подготовиться к строительству дома?</p>
            <?php if (have_rows('stages', 'option')): ?>
            <div class="steps__list">
                <?php
                        $stage_number = 1;
                        while (have_rows('stages', 'option')):
                            the_row(); ?>
                <div class="steps__item">
                    <p class="steps__item-num"><?php echo $stage_number; ?> этап</p>
                    <?php if (have_rows('stage_item', 'option')): ?>
                    <ul class="steps__item-list">
                        <?php while (have_rows('stage_item', 'option')):
                                            the_row();
                                            $service__id = get_sub_field('service-id', 'option');
                                            if ($service__id): ?>
                        <li>
                            <?php $elem_url = get_permalink($service__id); ?>
                            <a<?php if ($page_url === $elem_url) echo ' class="active"'; ?>
                                href="<?php echo esc_url($elem_url); ?>">
                                <?php echo esc_html(get_the_title($service__id)); ?>
                                </a>
                        </li>
                        <?php endif;
                                        endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php
                            $stage_number++;
                        endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>