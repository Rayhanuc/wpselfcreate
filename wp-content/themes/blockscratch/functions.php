<?php

function change_case($text){
  return strtoupper($text);
}


function before_title(){
  echo "<p style='color:green;'>Hello this is before title</p>";
}
add_action('bs_before_title','before_title');


function after_title(){
  echo "<p style='color:blue;'>Hello this is after title</p>";
}
add_action('bs_after_title', 'after_title');



function capital_text($cap_text){
  $cap_text = "
  <h1 style='color:red; margin:auto; width: 200px;'>Heading 1</h1>
  <h2 style='color:green;'>Heading 2</h2>
  <p style='color:yellow;'>How do I use multiple featured images in WordPress?</p>
  ";
  return strtoupper($cap_text);
}
add_filter('bs_text','capital_text');


if ( ! function_exists( 'blockscratch_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.

	 */
	function blockscratch_one_setup() {

		load_theme_textdomain( 'blockscratch', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);


		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'blockscratch' ),
				'footer'  => esc_html__( 'Secondary menu', 'blockscratch' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		$editor_stylesheet_path = './assets/css/style-editor.css';

		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		add_editor_style( $editor_stylesheet_path );

		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'blockscratch' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'blockscratch' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'blockscratch' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'blockscratch' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'blockscratch' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'blockscratch' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'blockscratch' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'blockscratch' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'blockscratch' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'blockscratch' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'blockscratch' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'blockscratch' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'blockscratch' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'blockscratch' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'blockscratch' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'blockscratch' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'blockscratch' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'blockscratch' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'blockscratch' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'blockscratch' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'blockscratch' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'blockscratch' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'blockscratch' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'blockscratch' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'blockscratch' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);


		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}
}
add_action( 'after_setup_theme', 'blockscratch_one_setup' );

function blockscratch_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'blockscratch' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'blockscratch' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'blockscratch_widgets_init' );

function blockscratch_file_enqueue_scripts() {
  wp_enqueue_style('verum-main-css',get_theme_file_uri( 'assets/css/main_style.css' ));

  wp_enqueue_style('verum-main-css',get_stylesheet_uri());




  
}
add_action('wp_enqueue_scripts', 'blockscratch_file_enqueue_scripts');



















// function theme_slug_scripts() {



// 	wp_enqueue_style('verum-google-fonts','//fonts.googleapis.com/css?family=Lora:400,400i,700|Playfair+Display:700');

// 	wp_enqueue_style('bootstrap-css',get_theme_file_uri( 'assets/vendor/bootstrap/css/bootstrap.min.css' ));
// 	wp_enqueue_style('font-awesome-css',get_theme_file_uri( 'assets/vendor/font-awesome/css/font-awesome.min.css' ));
// 	wp_enqueue_style('slicknav-css',get_theme_file_uri( 'assets/vendor/slicknav/slicknav.css' ));
// 	wp_enqueue_style('owlcarousel-css',get_theme_file_uri( 'assets/vendor/owl/assets/owl.carousel.min.css' ));
// 	wp_enqueue_style('owl.theme-css',get_theme_file_uri( 'assets/vendor/owl/assets/owl.theme.default.min.css' ));
// 	wp_enqueue_style('magnific-popup-css',get_theme_file_uri( 'assets/vendor/magnific-popup/magnific-popup.css' ));
// 	wp_enqueue_style('animate-css',get_theme_file_uri( 'assets/vendor/animate.css' ));
// 	wp_enqueue_style('justifiedGallery-css',get_theme_file_uri( 'assets/vendor/justifiedGallery/css/justifiedGallery.min.css' ));

// 	// wp_enqueue_style('verum-main-css',get_stylesheet_uri());






// 	wp_enqueue_script('popper-js', get_theme_file_uri('assets/vendor/popper.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('bootstrap-js', get_theme_file_uri('assets/vendor/bootstrap/js/bootstrap.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('imagesloaded-js', get_theme_file_uri('assets/vendor/imagesloaded.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('jquery-slicknav-js', get_theme_file_uri('assets/vendor/slicknav/jquery.slicknav.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('owlcarousel-js', get_theme_file_uri('assets/vendor/owl/owl.carousel.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('owlcarouse-thumbs-js', get_theme_file_uri('assets/vendor/owl/owl.carousel2.thumbs.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('magnific-popup-js', get_theme_file_uri('assets/vendor/magnific-popup/jquery.magnific-popup.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('justifiedGallery-js', get_theme_file_uri('assets/vendor/justifiedGallery/js/jquery.justifiedGallery.min.js'),array('jquery'), VERSION, true);
// 	wp_enqueue_script('verum-main-js', get_theme_file_uri('assets/js/scripts.js'),array('jquery'), time(), true);
// 	$template_directory = get_template_directory_uri();
// 	wp_localize_script('verum-main-js','verum',array('template_path' => $template_directory));
	
// }
// add_action( 'wp_enqueue_scripts', 'theme_slug_scripts' );