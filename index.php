<?php $args=ubootswatch_get_args(); ?>

<?php get_header(null,$args); ?>

<div class="container mb-5 <?php echo esc_attr($args["container-class"]); ?>">
	<div class="row">
		<div class="col-lg-9">
			<?php ubootswatch_content($args); ?>
		</div>
		<div class="d-none d-lg-block col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php /*get_sidebar();*/ ?>
<?php get_footer(null,$args); ?>