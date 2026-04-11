<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
<?php endwhile; else: ?>
		Записей нет
<?php endif; ?>
<?php wp_reset_postdata();?>
    <section class="container-xxl mt-5 text-white">
        <div class="border-bottom">
            <h2>EXIM STONE — предприятие по добыче и обработке гранита и мрамора из г. Днепр</h2>
        </div>
        <div class="mt-3">
            <?php
                $query = new WP_Query( 'pagename=about-us' );
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $short_description = get_the_excerpt($query->post->ID);
                    echo '<p>' . $short_description . '</p>';
                }
            ?>
        </div>
        <a href="<?php echo get_permalink() ?>"><button class="btn btn-primary">Читать больше</button></a>
        <?php wp_reset_postdata();?>
    </section>

<?php get_footer(); ?>