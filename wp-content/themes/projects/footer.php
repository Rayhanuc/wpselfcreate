<?php
/**
 * The template for displaying the footer
 *
 * @package Projects
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="site-info text-center">
						<!-- <span class="sep"> | </span> -->
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'projects' ), 'projects', '<a href="https://rayhanuddinchy.com/">Md. Rayhan Uddin Chowdhury Chowdhury</a>' );
							?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
