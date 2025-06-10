<?php
// Получаем ID услуги из URL, если он есть
$service_id = isset($_GET['service_page']) ? intval($_GET['service_page']) : 0;

// Базовые параметры для get_posts()
$args = array(
  'post_type' => 'review',
  'numberposts' => -1,
);

// Если передан service-page, добавляем meta_query для фильтрации
if ($service_id > 0)
{
  $args['meta_query'] = array(
    array(
      'key' => 'related-services', // Поле ACF с привязанными услугами
      'value' => '"' . $service_id . '"', // Ищем ID в сериализованном массиве ACF
      'compare' => 'LIKE'
    )
  );
}
$reviews = get_posts($args);
?>
<?php if ($reviews): ?>
  <div class="reviews-list">
    <?php
    foreach ($reviews as $post):
      setup_postdata($post);
      $rating = get_field('rating');
      $services_related = get_field('related-services');
      $gallery = get_field('gallery');
      $video_list = get_field('video-list');
      $count = 0;
      if (gettype($gallery) === 'array') $count = count($gallery);
      if (gettype($video_list) === 'array') $count += count($video_list);

      $is_wide = get_field('is-wide');
      $is_tall = get_field('is-tall');
      $bg_color_choose = get_field('bg-color-choose');
      $classes = 'reviews-list__item';
      if ($bg_color_choose) $classes .= " reviews-list__item--dark";
      if ($is_wide) $classes .= " reviews-list__item--wide reviews-list__item--row";
      if ($is_tall) $classes .= " reviews-list__item--tall";
      ?>
      <article class="<?= $classes ?>">
        <div class="reviews-list__content<?php if ($count > 2) echo ' reviews-list__block--hulf'; ?>">
          <p class=" reviews-list__text">
            <?= esc_html(get_field('text')) ?>
          </p>
          <div class="reviews-list__info">
            <?php
            if (is_numeric($rating) && !($is_wide && $count === 1)):
              $n = 0;
              $count_rationg = (int) $rating;
              ?>
              <p class="reviews-list__rating">
                <span class="visually-hidden"><?= esc_html($count_rationg) ?></span>
                <? while ($n < $count_rationg): ?>
                  <img class="reviews-list__rating-img"
                    src="<?= get_template_directory_uri() ?>/assets/img/icons/star-fill-full.svg" alt="">
                  <?php $n++; endwhile; ?>
              </p>
            <?php endif; ?>
            <?php
            if (!$is_wide && $count > 0):
              ?>
              <div class="reviews-list__media reviews-list__media--info">
                <?php
                foreach ($gallery as $gallery_elem):
                  ?>
                  <img class="reviews-list__media-img" src="<?= esc_url($gallery_elem['url']) ?>"
                    alt="<?= esc_attr($gallery_elem['alt']); ?>">
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <?php if ($services_related): ?>
              <div class="reviews-list__service">
                <?php
                foreach ($services_related as $service_id):
                  $title = get_the_title($service_id);
                  ?>
                  <div>
                    <span><?php echo esc_html($title); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <h2 class="reviews-list__name"><?= esc_html(get_the_title()) ?></h2>
          </div>
        </div>
        <?php if ($count > 0 && $is_wide): ?>
          <div class="reviews-list__media<?php if ($count > 2) echo ' reviews-list__block--hulf'; ?> ">
            <?php
            foreach ($gallery as $gallery_elem):
              ?>
              <img class="reviews-list__media-img" src="<?= esc_url($gallery_elem['url']) ?>"
                alt="<?= esc_attr($gallery_elem['alt']); ?>">
              <?php
            endforeach;
            ?>
            <?php
            if (is_numeric($rating) && ($is_wide && $count === 1)):
              $n = 0;
              $count_rationg = (int) $rating;
              ?>
              <p class="reviews-list__rating">
                <span class="visually-hidden"><?= esc_html($count_rationg) ?></span>
                <? while ($n < $count_rationg): ?>
                  <img class="reviews-list__rating-img"
                    src="<?= get_template_directory_uri() ?>/assets/img/icons/star-fill-full.svg" alt="">
                  <?php $n++; endwhile; ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>
    Отзывы не найдены
  </p>
<?php endif; ?>