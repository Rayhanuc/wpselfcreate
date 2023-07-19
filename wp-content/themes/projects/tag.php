<?php
/**
 * The template for displaying archive pages
 *
 * @package Projects
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="all_projects_page_heading text-center">
				<h1>
					Projects Under <strong><?php single_tag_title(); ?></strong>
				</h1>
			</div>
			<main id="primary" class="site-main">

				<?php if ( have_posts() ) : ?>
					<div class="projects_area">
						<div class="row">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<h2>
								<a href="<?php the_permalink();?>"><?php the_title();?></a>
							</h2>
							
							<?php
						endwhile;
					
						?>
						</div>
					</div>

				<?php endif; ?>
			</main><!-- #main -->

		</div>
	</div>
</div>



<?php
// get_sidebar();
get_footer();
