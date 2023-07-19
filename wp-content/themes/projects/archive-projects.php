<?php
/**
 * The template for displaying archive pages
 *
 * @package Projects
 * Template Name: Projects
 */

get_header();
$projects_terms = get_terms(['taxonomy'=>'ptag']);
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="all_projects_page_heading text-center">
				<h2>All Projects</h2>
						<div class="filter_menu filter filter-button-group">
							<ul class="project-filter">
								<li data-filter="*" class="active">All</li>
								<?php
								// Only exist tag will show
								foreach ($projects_terms as $projects_term) {
						
								?>
										<li data-filter=".<?php echo $projects_term->slug;?>"><?php echo $projects_term->name;?></li>
									<?php } ?>
							</ul>


							<ul>
								<li>
									<?php
									// Get the current post's ID
									$post_id = get_the_ID();

									// Get the categories for the custom post
									$categories = get_the_terms($post_id, 'ptag'); // Replace 'ptag' with your actual taxonomy name

									// Check if categories exist
									if ($categories && !is_wp_error($categories)) {
										foreach ($categories as $category) {
											// Check if the category is available for the custom post type
											if (taxonomy_exists($category->taxonomy)) {
												//echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><br>';
											}
										}
									}
									?>
								</li>
							</ul>

							<div class="sorting_options">
								<label for="project_sorting">Sort by:</label>
								<select id="project_sorting">
									<option value="title">Title</option>
									<option value="category">Category</option>
								</select>
							</div>

						</div>
						
					</div>
			</div>
			<main id="primary" class="site-main">

				<?php if ( have_posts() ) : ?>
					<div class="projects_area">
						<div class="row project-list">
							<?php
								$args = array(
									'post_type' => 'projects',
									'posts_per_page' => 30,
								);

								$query = new 	WP_Query($args);
							
								while ( $query->have_posts() ) :
									$query->the_post();
									
									$termsArray = get_the_terms($post->ID, 'ptag');
									// var_dump($post_details);
									$termsSlug = '';
									foreach ($termsArray as $key => $term) {
										$termsSlug .= $term->slug . ' ';
										// $termsName .= $term->name;
										$post_id = $post->ID;
									}
									// var_dump($post_id);
									?>
									<div class="col-md-3 <?php echo esc_attr($termsSlug); ?> "  data-bs-target="#<?php echo esc_attr($post_id); ?>" data-bs-toggle="modal">
										<div class="single_project_post_content_area">
												<div class="project_image">
													<?php echo get_the_post_thumbnail(); ?>
												</div>
												
												<div class="single_project_text_content">
													<h2 class="project_title">
														<?php echo get_the_title();?>
													</h2>

													<div class="categories_area">
														<div class="categorie">
															<ul>
																<li>
																													<?php
																// Get the current post's ID
																$post_id = get_the_ID();

																// Get the categories for the custom post
																$categories = get_the_terms($post_id, 'ptag'); // Replace 'your_taxonomy' with your actual taxonomy name

																// Check if categories exist
																if ($categories && !is_wp_error($categories)) {
																		foreach ($categories as $category) {
																				// Check if the category is available for the custom post type
																				if (taxonomy_exists($category->taxonomy)) {
																						echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><br>';
																				}
																		}
																}
																?>
																</li>
															</ul>


													</div>
													
													
												</div>
												</div>
										</div>
									</div>
									
									<!-- Modal dialog box start -->
									<div class="modal fade" id="<?php echo esc_attr($post_id); ?>">		
										<div class="modal-dialog">
											<div class="single_project_post_content_area_modal_body modal-body">
												<button class="btn-close modal_window_close_btn" data-bs-dismiss="modal"></button>
												<div class="project_image">
													<?php echo get_the_post_thumbnail(); ?>
												</div>
												
												<div class="single_project_text_content">
													<h2 class="project_title">
														<?php echo get_the_title();?>
													</h2>

													<div class="project_description">
														<p>
															<?php echo get_the_content();?>
														</p>
													</div>

													<!-- Category / Taxonomy start -->
													<div class="categories_area">
														<div class="categorie">
															<ul>
																<li>
																	<?php
																		// Get the current post's ID
																		$post_id = get_the_ID();

																		// Get the categories for the custom post
																		$categories = get_the_terms($post_id, 'ptag'); // Replace 'your_taxonomy' with your actual taxonomy name

																		// Check if categories exist
																		if ($categories && !is_wp_error($categories)) {
																				foreach ($categories as $category) {
																						// Check if the category is available for the custom post type
																						if (taxonomy_exists($category->taxonomy)) {
																								echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><br>';
																						}
																				}
																		}
																	?>
																</li>
															</ul>
															</div>
													</div>
													<!-- Category / Taxonomy end -->


													<div class="external_url">
														<p class="url_link">
														<strong>External Url: </strong><span><?php 
														$external_url = get_post_meta( get_the_ID(), 'project_url');
														echo $external_url[0];
														
														?></span>
														</p>
													</div>

													<!-- Feature Images view start -->													
													<div class="preview_images_area">
														<div class="all_feature_images">
																		<?php
																			// Retrieve the additional featured images for a specific post
																			$additional_featured_images = get_post_meta( get_the_ID(), 'additional_featured_image', true );
																			
																			if ( $additional_featured_images ) {
																				$image_urls = explode(',', $additional_featured_images);
																				echo '<div class="additional-featured-images">';
																				
																				// Loop through each image URL and display it
																				foreach ( $image_urls as $image_url ) {
																					// var_dump($image_url);
																					echo '<img src="' . esc_url( $image_url ) . '" alt="Additional Featured Image">';
																				}
																				
																				echo '</div>';
																			}
																		?>
														</div>
													</div>
													<!-- Feature Images view end -->


												
											</div>
										</div>
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

<script>
	jQuery(document).ready(function($) {

		$(".project-filter li").on('click', function() {
		$(".project-filter li").removeClass("active");
		$(this).addClass("active");

		var filterValue = $(this).attr("data-filter");

		$(".project-list").isotope({
			filter: filterValue,
			layoutMode: 'masonry',
			masonry: {
				columnWidth: '.col-md-3',
				horizontalOrder: false
			}
		});
	});


	});
</script>


<script>
jQuery(document).ready(function($) {
  // Handle sorting of projects
  $('#project_sorting').on('change', function() {
    var sortBy = $(this).val();

    if (sortBy === 'title') {
      // Sort projects by title
      $('.projects_area .row').isotope({ sortBy: 'original-order' });
    } else if (sortBy === 'category') {
      // Sort projects by category
      $('.projects_area .row').isotope({ sortBy: 'category' });
    }
  });
});
</script>


<?php
// get_sidebar();
get_footer();
