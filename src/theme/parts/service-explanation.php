<?php
$descr = get_field('service-explanation-descr');
if (have_rows('service-explanation-items') || !empty($descr)):
  ?>
  <div class="service-explanation">
    <div class="container service-explanation__inner">
      <div class="service-explanation__items">
        <?php while (have_rows('service-explanation-items')):
          the_row(); ?>
          <div class="service-explanation__item">
            <p class="service-explanation__title title"><?= esc_html(get_sub_field('service-explanation-tltle')) ?></p>
            <?php if (have_rows('service-explanation-list')): ?>
              <ul class="service-explanation__list">
                <?php while (have_rows('service-explanation-list')):
                  the_row(); ?>
                  <li class="service-explanation__list-elem">
                    <?= esc_html(get_sub_field('text')) ?>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
      <p class="service-explanation__descr"><?= esc_html($descr) ?></p>
    </div>
  </div>
<?php endif; ?>