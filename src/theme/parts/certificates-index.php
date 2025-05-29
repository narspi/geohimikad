<section class="certificates">
    <div class="container">
        <h2 class="title certificates__title">Документы и сертификаты</h2>
        <?php if (have_rows('docs-list', 'option')): ?>
            <ul class="certificates__list">
                <?php
                while (have_rows('docs-list', 'option')):
                    the_row();
                    $img_item = get_sub_field('docs-list-img', 'option');
                    ?>
                    <li class="certificates__list-item">
                        <img src="<?= $img_item['url'] ?>" alt="<?= $img_item['alt'] ?>" class="certificates__list-img"
                            loading="lazy">
                    </li>
                    <?php
                endwhile; ?>
            </ul>
        <?php endif; ?>
        <?php if (have_rows('docs-slider', 'option')): ?>
            <div class="certificates__slider swiper">
                <ul class="swiper-wrapper certificates__slider-list">
                    <?php
                    while (have_rows('docs-slider', 'option')):
                        the_row();
                        $img_item = get_sub_field('docs-slider-img', 'option');
                        ?>
                        <li class="swiper-slide certificates__slider-slide">
                            <img class=" certificates__slider-img" src="<?= $img_item['url'] ?>" alt="<?= $img_item['alt'] ?>"
                                loading="lazy">
                            <div class="swiper-lazy-preloader"></div>
                        </li>
                        <?php
                    endwhile; ?>
                </ul>
                <button class="certificates__slider-prev" aria-label="Листать слайдер назад"></button>
                <button class="certificates__slider-next" aria-label="Листать слайдер вперёд"></button>
            </div>
        <?php endif; ?>
    </div>
</section>