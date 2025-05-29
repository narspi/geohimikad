<?php

$services = get_posts(array(
    'post_type' => 'service',
    'numberposts' => -1
));
?>
<div class="services">
    <div class="services__inner">
        <?php
        $i = 0;
        foreach ($services as $post):
            setup_postdata($post);
            $is_active = $i === 0 ? true : false;
            $id = get_the_ID();
            ?>
            <article class="services__elem">
                <h2 class="<?php if ($is_active) echo 'services__elem-title active';
                else echo 'services__elem-title'; ?>">
                    <button class="services__btn">
                        <span class="services__btn-decor">
                            <?= esc_html(get_the_title()); ?>
                        </span>
                    </button>
                </h2>
                <div class="<?php if ($is_active) echo 'services__elem-drop active';
                else echo 'services__elem-drop'; ?>">
                    <div class="container services__elem-body">
                        <?php
                        $img_elem = get_field('index-img', $id);
                        if ($img_elem): ?>
                            <img class="services__elem-img" src="<?= $img_elem['url'] ?>"
                                alt="<?= esc_attr($img_elem['alt']); ?>">
                        <?php endif; ?>
                        <div class="services__elem-content">
                            <div>
                                <?php the_field('index-text', $id); ?>
                            </div>
                            <div class="services__elem-row">
                                <a class="services__elem-btn services__elem-btn--red"
                                    href="<?= esc_url(get_permalink()); ?>">Узнать
                                    подробнее</a>
                                <button class="services__elem-btn services__elem-btn--white" data-popup="form-service"
                                    data-service="<?= esc_html(get_the_title()); ?>">Заказать услугу</button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <?php
            $i++;
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
</div>