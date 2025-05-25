<?php get_header(); ?>

<div class="container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= home_url(); ?>" aria-label="На главную" title="На главную"></a>
        <h1 class="title-big">Новости</h1>
    </div>

    <?php if (have_posts()): ?>
        <div class="news-list">
            <?php
            $i = 0;
            while (have_posts()):
                the_post();
                $i++;
                $big_class = ($i % 4 === 0) ? ' news-list__item--big' : '';
                ?>
                <article class="news-list__item<?= $big_class; ?>">
                    <div class="news-list__pic">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?= get_the_post_thumbnail_url(null, 'large'); ?>" alt="<?= esc_attr(get_the_title()); ?>"
                                class="news-list__img">
                        <?php else: ?>
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/new-placeholder.jpg" alt="Фото новости"
                                class="news-list__img">
                        <?php endif; ?>

                        <?php
                        $services_related = get_field('related-services');
                        if ($services_related):
                            ?>
                            <ul class="news-list__pic-list">
                                <?php foreach ($services_related as $service_id): ?>
                                    <li class="news-list__pic-category">
                                        <span class="news-list__pic-link"><?= esc_html(get_the_title($service_id)); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="news-list__content">
                        <h2 class="news-list__title"><?= get_the_title(); ?></h2>
                        <p class="news-list__descr"><?= wp_trim_words(get_the_excerpt(), 30); ?></p>
                        <a class="news-list__link" href="<?= get_permalink(); ?>">Подробнее</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?= paginate_links(); ?>
        </div>
    <?php else: ?>
        <p>Пока новостей нет.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>