<?php
/**
 * The template for displaying archive pages
 *
 * @package Projects
 * 
 
 * 
 */

get_header();

// WP_Query arguments
$args = array(
	'post_type' => 'projects', // Replace 'projects' with your actual custom post type slug
	// 'posts_per_page' => -1, // Set the number of posts to display (-1 for all)
);

// The Query
$query = new WP_Query($args);

// The Loop
if ($query->have_posts()) {
	while ($query->have_posts()) {
			$query->the_post();
			?>
			<h2><?php the_title(); ?></h2>
			<div><?php the_content(); ?></div>
			<?php
	}
} else {
	// No posts found
}
// Restore original post data
wp_reset_postdata();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="all_projects_page_heading text-center">
				<h2>All Projects</h2>
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
														// Query WordPress categories
														// $projects_categories = get_the_category();
														$projects_terms = get_terms();
														var_dump($projects_terms);

														// Check if categories exist
														if ($projects_categories) {
																// Loop through each category
																foreach ($projects_categories as $project_category) {
																		// Display category name and link
																		?>
																			<div class="categorie">
																				<ul>
																					<li>
																						<?php
																						if ($project_category) {
																							echo '<a href="' . get_category_link($project_category->term_id) . '">' . $project_category->name . '</a><br>';
																						} else {
																							_e("No category"); 
																						}
																						?>
																					</li>
																				</ul>
																			</div>
																		<?php
																}
														} else {
																echo '';
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
