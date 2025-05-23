<?php
$video = get_field('about-video');
if ($video):
  ?>
  <div class="about-video">
    <div class="container">
      <p class="title">Как мы работаем?</p>
      <div class="about-video__block">
        <video controls>
          <source src="<?= esc_url($video['url']) ?>" type="<?= esc_attr($video['mime_type']) ?>">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
<?php endif; ?>