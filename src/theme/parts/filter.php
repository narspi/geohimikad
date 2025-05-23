<?php
$services = $args['services'];
?>
<!-- <pre>
  <?php print_r($services) ?>
</pre> -->
<ul class="filter">
  <li class="filter__item">
    <button class="filter__btn active">Все</button>
  </li>
  <?php
  foreach ($services as $post): ?>
    <li class="filter__item">
      <button class="filter__btn"><?php echo $post->post_title; ?></button>
    </li>
  <?php endforeach; ?>
</ul>