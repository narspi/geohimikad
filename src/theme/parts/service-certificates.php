<?php if (have_rows('docs-slider', 'option')): ?>
    <div class="service-certificates">
        <div class="container service-certificates__inner">
            <button class="service-certificates__btn-next" aria-label="перейти на слайд"></button>
            <button class="service-certificates__btn-prev" aria-label="перейти на слайд"></button>
            <div class="service-certificates__slider swiper">
                <ul class="swiper-wrapper service-certificates__slider-list">
                    <?php
                    while (have_rows('docs-slider', 'option')):
                        the_row();
                        $img_item = get_sub_field('docs-slider-img', 'option');
                        ?>
                        <li class="swiper-slide service-certificates__slider-item">
                            <img class="service-certificates__slider-img" src="<?= $img_item['url'] ?>"
                                alt="<?= $img_item['alt'] ?>" loading="lazy">
                            <div class="swiper-lazy-preloader"></div>
                        </li>
                        <?php
                    endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>