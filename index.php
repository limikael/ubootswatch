<?php $args=ubootswatch_get_args(); ?>
<?php $sidebarSetting=get_theme_mod("ubootswatch_sidebar"); ?>

<?php get_header(null,$args); ?>

<div class="container mb-5 <?php echo esc_attr($args["container-class"]); ?>">
	<div class="row">
		<?php if ($sidebarSetting=="hide") { ?>
			<div class="d-none d-lg-block" style="width: 12.5%"></div>
		<?php } ?>
		<div class="col-lg-9">
			<?php ubootswatch_content($args); ?>
		</div>
		<?php if ($sidebarSetting=="show") { ?>
			<div class="d-none d-lg-block col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
	</div>
</div>

<?php get_footer(null,$args); ?>