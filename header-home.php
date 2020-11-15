<?php
/**
Homepage Header
 */

namespace BuddyX\Buddyx;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<!-- header-home -->
<body <?php body_class(); ?>>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="homepage__header-hero" style="background-image:url(<?php the_post_thumbnail_url(); ?>); background-size:cover;">
		
		<?php
		
		$image = get_field('main_logo', 'options');
		
		if( !empty($image) ):
			// vars
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$caption = $image['caption'];
		
			// thumbnail
			$size = 'large';
			$thumb = $image['sizes'][ $size ];
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ]; ?>
		
			<div class="logo__hero">
				<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			</div>
			
			<?php if (have_rows('social_platforms', 'option')) : ?>
				<ul class="social-platforms">
					
							
				<?php while (have_rows('social_platforms', 'option')) : the_row(); ?>
				<?php 
				$link = get_sub_field('social_link');
				if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
				<li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" alt="<?php echo esc_html( $link_title ); ?>"><?php the_sub_field('social_icon'); ?></a></li>
				<?php endif; endwhile; ?>
				</ul>
			<?php endif; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="<?php echo esc_url( '#primary' ); ?>"><?php esc_html_e( 'Skip to content', 'buddyx' ); ?></a>
	
	<div class="site-header-wrapper">
		
		<div class="container">
			<header id="masthead" class="site-header site-header__home">
				<?php get_template_part( 'template-parts/header/navigation' ); ?>
			</header><!-- #masthead -->
				
		</div>
  </div>
<?php
$classes = get_body_class();
if(! in_array('page-template-full-width',$classes) ) { ?>

	<div class="container">
<?php } ?>