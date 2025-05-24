<?php
get_header();
?>
<div class="porfolio container">
    <div class="heading-row">
        <a class="heading-row__btn" href="<?= home_url() ?>" aria-label="На главную" title="На главную"></a>
        <h1 class="title-big">Наши работы</h1>
    </div>
    <p class="porfolio__descr-top">Наши работы: примеры качества и мастертсва</p>
    <p class="porfolio__descr-bot">Мы гордимся результатами своей работы</p>
    <?php
    $services = get_posts(array(
        'post_type' => 'service',
        'numberposts' => -1
    ));
    get_template_part('parts/filter', null, array(
        'services' => $services
    )); ?>
    <?php if (have_posts()): ?>
        <div class="porfolio-list">
            <?php while (have_posts()):
                the_post(); ?>
                <article class="porfolio-list__item">
                    <div class="porfolio-list__body">
                        <div class="porfolio-list__service">
                            <div>
                                <span>Бурение на воду <?php echo get_the_ID(); ?></span>
                            </div>
                            <div>
                                <span>Геодезические услуги</span>
                            </div>
                        </div>
                        <h2 class="porfolio-list__title"><?php the_title(); ?></h2>
                        <div class="porfolio-list__content">
                            <p>
                                Lorem ipsum dolor sit a met, consectetuer adipiscing elitLorem ipsum dolor sit a met,
                                consectetuer adipiscing elit
                            </p>
                            <p>
                                Lorem ipsum dolor sit a met, consectetuer adipiscing elitLorem ipsum dolor sit a met,
                                consectetuer adipiscing elit
                            </p>
                        </div>
                        <a class="porfolio-list__link" href="<?php the_permalink(); ?>">Узнать подробнее</a>
                    </div>
                    <div class="porfolio-list__view">
                        <div class="porfolio-list__pic">
                            <img class="porfolio-list__img"
                                src="<?= get_template_directory_uri() ?>/assets/img/placeholder-project.svg"
                                alt="Кейс какой то">
                        </div>
                        <button class="porfolio-list__view-btn">Заказать эту услугу</button>
                    </div>
                    <a class="porfolio-list__btn" href="<?php the_permalink(); ?>" aria-label="перейти на кейс"
                        title="перейти на кейс"></a>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Кейсы не найдены.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>