<?php
/**
 * The template for displaying archive pages
 *
 * @package Projects
 * Template Name: Home
 */

get_header();

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="all_projects_page_heading text-center">
				<h2>All Projects</h2>
		
					<div class="custom_post_taxonomy_area">
						<div class="filter_menu filters filter-button-group">
							<ul>
								<li class="active" data-filter="*">All</li>
								<?php
								// Only exist tag will show
								$terms = get_terms('ptag');
								foreach ($variable as $key => $value) {
									?>
									<li class="filter-item" data-filter=".<?php esc_attr($term->slug);?>"><?php esc_html($term->name); ?></li>
								<?php }
								?>
							</ul>
						</div>
						
					</div>
			</div>
			<main id="primary" class="site-main">

				<?php if ( have_posts() ) : ?>
					<div class="projects_area">
						<div class="row">
						<?php
						while ( have_posts() ) :
							the_post();
		
							
							
							?>
								<div class="col-md-3">
									<div class="single_project_post_content_area">
										<a href="<?php the_permalink(); ?>">
											<div class="project_image">
												<?php echo get_the_post_thumbnail(); ?>
											</div>
											
											<div class="single_project_text_content">
												<h2 class="project_title">
													<?php echo get_the_title();?>
												</h2>

												<div class="categories_area">
													<?php
														// Only exist tag will show

														// Check if categories exist
																// Loop through each category
																foreach ($projects_terms as $key => $projects_term) {
																		// Display category name and link
																		?>
																			<div class="categorie">
																				<ul>
																					<li>
																						<?php
																						if (! taxonomy_exists($projects_term)) {
																							echo '<a href="' . get_category_link($projects_term->term_id) . '">' . $projects_term->name . '</a><br>';
																						}
																						?>
																					</li>
																				</ul>
																			</div>
																		<?php
																}
													?>
												</div>
												
												
											</div>
										</a>
									</div>
									
								</div>

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
