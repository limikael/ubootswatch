
<?php $args=ubootswatch_get_args(); ?>

<?php get_header(null,$args); ?>

<div class="container">
	<?php ubootswatch_content($args); ?>
</div>

<?php /*get_sidebar();*/ ?>
<?php get_footer(null,$args); ?>