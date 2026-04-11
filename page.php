<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="container-xxl mt-3 text-white">
	<?php the_content(); ?>
</section>
<?php endwhile; else: ?>
	Записей нет
<?php endif; ?>

<?php get_footer(); ?>