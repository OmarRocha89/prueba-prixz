<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prixz
 */

get_header();
?>
<div class="container-fluid">
<div class="container">
<div class="row">
	<main id="primary" class="site-main col-sm-12">

	<div class="owl-carousel slider owl-theme">
	<div class="item text-center">
		<img src="<?php echo esc_url( home_url( '/wp-content/uploads/2021/08' ) ); ?>/slider.jpg" alt="">
	</div>
	<div class="item text-center">
		<img src="<?php echo esc_url( home_url( '/wp-content/uploads/2021/08' ) ); ?>/slider.jpg" alt="">
	</div>
	</div>

	<div class="owl-carousel categorias owl-theme" style="margin-top:50px;">
  


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
	
	  $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	  $image = wp_get_attachment_url( $thumbnail_id );
	  if ( $image ) {
		  echo '<div class="item text-center"><div style="width: 80px;height: 80px;margin: 0 auto;background:#4C95FF; border-radius:360px; padding:10px; display:flex; align-items:center; justify-content:center;"><img src="' . $image . '" alt="' . $cat->name . '" /></div><br><a style="color:#223263 !important;" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></div>';
	  }
	
  }       
}
?>

</div>

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
        echo '<h2><a style="color:#223263 !important;" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></h2>';
	
		$args2 = array(
			'taxonomy'     => $taxonomy,
			'post_type' => 'product',
			'posts_per_page' => 12
			);
		$loop = new WP_Query( $args2 );
		if ( $loop->have_posts() ) {
			 
			while ( $loop->have_posts() ) : $loop->the_post();
		
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
    }       
}
?>



	</main><!-- #main -->
	
</div>
</div>
</div>
<?php

get_footer();
