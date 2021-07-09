<h1 class="mt-4 pb-2 border-bottom">
	<a href="<?php echo esc_attr(get_permalink()); ?>" class="text-decoration-none text-dark">
		<?php the_title(); ?>
	</a>
</h1>
<p class="lead">
	By <?php the_author(); ?> on <?php the_date(); ?>
</p>
<?php the_content(); ?>
