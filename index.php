<?php $args=ubootswatch_get_args(); ?>

<?php get_header(null,$args); ?>

<div class="container mb-5">
	<div class="row">
		<div class="col-lg-8">
			<?php ubootswatch_content($args); ?>
		</div>
		<div class="d-none d-lg-block col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php /*get_sidebar();*/ ?>
<?php get_footer(null,$args); ?>