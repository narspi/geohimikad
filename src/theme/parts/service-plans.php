<?php
if (have_rows('service-plan-list')):
  $count_list = 0;
  while (have_rows('service-plan-list')):
    $count_list++;
    the_row(); ?>
    <article class="service-plan<?php if ($count_list % 2 === 1) echo ' service-plan--decor'; ?>">
      <div class="container">
        <h2 class="service-plan__title">
          <?= esc_html(get_sub_field('title')) ?>
        </h2>
        <?php
        $plan_descr = get_sub_field('descr');
        if ($plan_descr):
          ?>
          <div class="service-plan__text">
            <?= wp_kses_post($plan_descr) ?>
          </div>
        <?php endif; ?>
        <?php
        if (have_rows('service-plan-items')):
          $items_count = 0;
          ?>
          <div class="service-plan__items">
            <?php
            while (have_rows('service-plan-items')):
              $items_count++;
              the_row();
              ?>
              <div class="service-plan__item<?php if ($items_count % 3 === 0) echo ' service-plan__item--big'; ?>">
                <p class="service-plan__item-title"><?= esc_html(get_sub_field('item-title')) ?></p>
                <?php
                $item_content = get_sub_field('item-content');
                if ($item_content):
                  ?>
                  <div class="service-plan__item-content">
                    <?= wp_kses_post($item_content) ?>
                  </div>
                <?php endif; ?>
                <?php
                $item_price = get_sub_field('item-price');
                if ($item_price):
                  ?>
                  <p class="service-plan__item-price"><?= esc_html($item_price) ?></p>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </article>
  <?php endwhile;
endif; ?>