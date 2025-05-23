<?php if (have_rows('team', 'option')): ?>
  <section class="team">
    <div class="container">
      <h2 class="title team__title">Наша команда</h2>
      <div class="team__list">
        <?php
        while (have_rows('team', 'option')):
          the_row();
          ?>
          <article class="team__list-item">
            <div class="team__list-pic">
              <?php
              $team_img = get_sub_field('team-item-img', 'option');
              if (!empty($team_img))
              {
                echo '<img class="team__list-img" src="' . esc_url($team_img['url']) . '" alt="' . esc_attr($team_img['alt'] ?: 'Член команды') . '">';
              } else
              {
                echo '<img class="team__list-img" src="' . get_template_directory_uri() . '/assets/img/team-placeholder.svg" alt="Член команды">';
              }
              ?>
            </div>
            <h3 class="team__list-title"><?= esc_html(get_sub_field('team-item-name')); ?></h3>
            <p class="team__list-descr"><?= esc_html(get_sub_field('team-item-text')); ?></p>
          </article>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>