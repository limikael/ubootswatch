<?php $args=ubootswatch_get_args(); ?>

<?php get_header(null,$args); ?>

<div class="container">
	<div class="page-header">
		<h1 class="mt-4 mb-3 pb-2 border-bottom"><?php the_title(); ?></h1>
	</div>
	<?php the_content(); ?>
</div>

<?php /*get_sidebar();*/ ?>
<?php get_footer(null,$args); ?>