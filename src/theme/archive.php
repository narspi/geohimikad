<?php get_header(); ?>
<div class="container">
    <h1 class="title"><?php the_archive_title(); ?></h1>
    <?php if (have_posts()): ?>
        <div class="news-list">
            <?php while (have_posts()):
                the_post(); ?>
                <article class="news-item">
                    <h2 class="news-title"><?php the_title(); ?></h2>
                    <p class="news-excerpt"><?php the_excerpt(); ?></p>
                    <p class="news-date"><?php echo get_the_date(); ?></p>
                    <a href="<?php the_permalink(); ?>">Подробнееы</a>
                </article>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else: ?>
        <p>Пока нет записпей.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>