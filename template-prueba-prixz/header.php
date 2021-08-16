<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prixz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'farmacia' ); ?></a>

	<header id="masthead" class="site-header container-fluid header-prixz " style="margin-bottom:50px;">
	<div class="container">	
	<div class="row">
		<div class="site-branding base col-md-4">
			<div class="logo_square" >
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$farmacia_description = get_bloginfo( 'description', 'display' );
				if ( $farmacia_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $farmacia_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation base col-md-8">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'farmacia' ); ?></button>
			
			<div class="categorias-menu pull-right">
				<div class="base" style="width:50px; height:50px; text-align:center; padding:10px;">
					<span class="base" style="height:4px; width:30px; background:#ccc;" ></span>
					<span class="base" style="height:4px; margin:5px 0px; width:30px; background:#ccc;" ></span>
					<span class="base" style="height:4px; width:30px; background:#ccc;" ></span>
				</div>
				<div class="lista-categorias-menu">

				<?php

					$taxonomy     = 'product_cat';
					$orderby      = 'name';  
					$show_count   = 0;      // 1 for yes, 0 for no
					$pad_counts   = 0;      // 1 for yes, 0 for no
					$hierarchical = 1;      // 1 for yes, 0 for no  
					$title        = '';  
					$empty        = 0;

					$args = array(
							'taxonomy'     => $taxonomy,
							'orderby'      => $orderby,
							'show_count'   => $show_count,
							'pad_counts'   => $pad_counts,
							'hierarchical' => $hierarchical,
							'title_li'     => $title,
							'hide_empty'   => $empty
					);
					$all_categories = get_categories( $args );
					foreach ($all_categories as $cat) {
						if($cat->category_parent == 0) {
							$category_id = $cat->term_id;       
							echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

							$args2 = array(
									'taxonomy'     => $taxonomy,
									'child_of'     => 0,
									'parent'       => $category_id,
									'orderby'      => $orderby,
									'show_count'   => $show_count,
									'pad_counts'   => $pad_counts,
									'hierarchical' => $hierarchical,
									'title_li'     => $title,
									'hide_empty'   => $empty
							);
							$sub_cats = get_categories( $args2 );
							if($sub_cats) {
								foreach($sub_cats as $sub_category) {
									echo  $sub_category->name ;
								}   
							}
						}       
					}
					?>

				</div>

			</div>
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class' =>'pull-right',
				)
			);
			?>

			
		</nav><!-- #site-navigation -->

	</div>
	
	</div>
	</header><!-- #masthead -->
