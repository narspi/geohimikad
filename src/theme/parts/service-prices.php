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
                <img src="<?= esc_url($img['url']) ?>" alt="<?= esc_attr($img['alt']) ?>" class="service-prices__img">
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
  </div>
<?php endif; ?>