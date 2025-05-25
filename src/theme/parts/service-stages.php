<?php if (have_rows('service-stages')): ?>
  <div class="service-stages">
    <div class="container">
      <p class="service-stages__title">Как всё проходит?</p>
      <ol class="service-stages__list">
        <?php while (have_rows('service-stages')):
          the_row();
          $elem = get_sub_field('service-stages-text');
          ?>
          <li class="service-stages__item">
            <p class="service-stages__text"><?= esc_html($elem) ?></p>
          </li>
        <?php endwhile; ?>
      </ol>
    </div>
  </div>
<?php endif; ?>