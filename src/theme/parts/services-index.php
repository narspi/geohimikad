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
                        <img class="services__elem-img"
                            src="<?= get_template_directory_uri() ?>/assets/img/services/main/elem-1.jpg" alt="фото услуги">
                        <div class="services__elem-content">
                            <p>
                                Инженеры-геодезисты компании ГЕОАРХИКАД - дипломированные специалисты,
                                с опытом работы на территории Сочи свыше 7ми лет, знающие все
                                особенности местных рельефов. Мы являемся членами Национального
                                реестра специалистов НОПРИЗ.
                            </p>
                            <p>
                                Наши специалисты используют поверенное геодезическое оборудование
                                ведущих производителей.
                            </p>
                            <div class="services__elem-row">
                                <a class="services__elem-btn services__elem-btn--red"
                                    href="<?= esc_url(get_permalink()); ?>">Узнать
                                    подробнее</a>
                                <button class="services__elem-btn services__elem-btn--white">Заказать услугу</button>
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