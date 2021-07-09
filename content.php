<h1 class="mt-5 pb-2 border-bottom <?php echo esc_attr($args["page-header-class"]); ?>">
	<a href="<?php echo esc_attr(get_permalink()); ?>" class="text-decoration-none text-dark">
		<?php the_title(); ?>
	</a>
</h1>
<?php if (get_post_type()=="post") { ?>
	<p class="lead">
		By <?php the_author(); ?> on <?php the_date(); ?>
	</p>
<?php } ?>

<?php if (is_singular()) { ?>
	<?php the_content(); ?>
<?php } else { ?>
	<?php the_excerpt(); ?>
<?php } ?>