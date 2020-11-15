<?php
/**
FrontPage template
 */

namespace BuddyX\Buddyx;

get_header('home'); ?>

<?php
buddyx()->print_styles( 'buddyx-content' );
buddyx()->print_styles( 'buddyx-sidebar', 'buddyx-widgets' );

?>

	<?php do_action( 'buddyx_sub_header' ); ?>
	
	<?php do_action( 'buddyx_before_content' ); ?>
	<!-- frontpage.php -->
	
	<main id="primary" class="site-main">
		
	<?php
		if ( have_posts() ) {?>
			<?php 
				while ( have_posts() ) {
					the_post();
	
					the_content();
				} ?>
			<?php 			

			if ( ! is_singular() ) {
				get_template_part( 'template-parts/content/pagination' );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
	?>
	
	
	</main><!-- #primary -->
		

	<?php do_action( 'buddyx_after_content' ); ?>
	


<?php
get_footer();
