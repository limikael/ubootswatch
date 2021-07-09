		<footer class="container-fluid <?php echo esc_attr($args["footer-class"]); ?>">
			<div class="container pt-4 pb-4">
				<div class="row">
					<?php dynamic_sidebar('footer'); ?>
				</div>
			</div>
		</footer><!-- #colophon -->
		<?php wp_footer(); ?>
	</body>
</html>
