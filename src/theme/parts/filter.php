<?php
$args = array(
  'post_type' => 'service',
  'numberposts' => -1,
  'fields' => 'ids'
);
$services = get_posts($args);
?>
<div class="filter">
  <ul class="filter__track">
    <li class="filter__item">
      <a href="<?= esc_url(remove_query_arg('service_page')); ?>"
        class="filter__btn<?= empty($_GET['service_page']) ? ' active' : ''; ?>">Все</a>
    </li>
    <?php foreach ($services as $post_id): ?>
      <?php
      $is_active = (!empty($_GET['service_page']) && $_GET['service_page'] == $post_id) ? 'active' : '';
      ?>
      <li class="filter__item">
        <a href="<?= esc_url(add_query_arg('service_page', $post_id)); ?>" class="filter__btn <?= $is_active; ?>">
          <?= esc_html(get_the_title($post_id)) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>