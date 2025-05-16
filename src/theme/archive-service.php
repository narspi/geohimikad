<?php get_header(); ?>

<main class="service-archive">
    <h1>Наши услуги</h1>
    <ul>
        <?php while (have_posts()):
            the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile; ?>
    </ul>
</main>

<?php get_footer(); ?>