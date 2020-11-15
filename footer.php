<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package buddyx
 */

namespace BuddyX\Buddyx;

?>
	<?php
	$classes = get_body_class();
	if(! in_array('page-template-full-width',$classes) ) { ?>
		</div><!-- .container -->
	<?php } ?>

<?php 
if( have_rows('full_width_content') ): ?>
<div class="full-width__content">
<?php while ( have_rows('full_width_content') ) : the_row(); ?>
<?php if( get_row_layout() == 'member_businesses' ): ?>
<div class="full-width full-width__businesses">
	<h5>
		<?php if (get_sub_field('headline')) : the_sub_field('headline'); else : the_field('default_headline', 'option'); endif; ?>
	</h5>
	<?php if( have_rows('member_businesses', 'option') ) : $i = 0; ?>
		<ul class="member__businesses">
			<?php while( have_rows('member_businesses', 'option') ) : the_row(); ?>
			<?php $i++;
			
			if( $i > 10 )
			{
				break;
			}
			?>
			<li>
				<?php if (get_sub_field('business_website') ) : ?>
				<a href="<?php the_sub_field('business_website'); ?>" target="_blank">
				<?php endif; ?>
				<img src="<?php the_sub_field('business_logo'); ?>" alt="<?php the_sub_field('name'); ?>">
				<?php if (get_sub_field('business_website') ) : ?>
				</a>
				<?php endif; ?>
			</li>
			<?php endwhile; ?> 
		</ul>
	<?php endif; ?>
</div>
	<?php elseif( get_row_layout() == 'instagram_feed' ): ?>
  <div class="full-width full-width__instagram-feed">
		<h5>
			<?php if (get_sub_field('headline')) : the_sub_field('headline'); else : the_field('default_headline_instagram', 'option'); endif; ?>
		</h5>
		<?php $instagram = get_sub_field('instagram_feed'); $instagram_default = get_field('default_instagram_feed', 'option'); ?>
		<?php if (get_sub_field('instagram_feed')) : echo do_shortcode('$instagram'); else : echo do_shortcode($instagram_default); endif; ?>
	</div>
	<?php elseif( get_row_layout() == 'sponsors' ): ?>
	<div class="full-width full-width__sponsors">
		<h5>
			<?php if (get_sub_field('headline')) : the_sub_field('headline'); else : the_field('default_headline_sponsors', 'option'); endif; ?>
		</h5>
		<?php if( have_rows('sponsors', 'option') ) : $i = 0; ?>
		<ul class="member__businesses">
			<?php while( have_rows('sponsors', 'option') ) : the_row(); ?>
			<?php $i++;
			
			if( $i > 5 )
			{
				break;
			}
			?>
			<li>
				<?php if (get_sub_field('business_website') ) : ?>
				<a href="<?php the_sub_field('business_website'); ?>" target="_blank">
				<?php endif; ?>
				<img src="<?php the_sub_field('business_logo'); ?>" alt="<?php the_sub_field('name'); ?>">
				<?php if (get_sub_field('business_website') ) : ?>
				</a>
				<?php endif; ?>
			</li>
			<?php endwhile; ?> 
		</ul>
		<?php endif; ?>
	</div>
		<?php elseif( get_row_layout() == 'contact_section' ): ?>
		<div class="full-width full-width__contact-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php if (get_sub_field('contact_message')) : the_sub_field('contact_message'); else : the_field('contact_message', 'option'); endif; ?>
					</div>
					<div class="col-md-6">
						<?php $contact = get_sub_field('contact_form_shortcode'); $contact_default = get_field('contact_form_shortcode', 'option'); ?>
						<?php if (get_sub_field('contact_form_shortcode')) : echo do_shortcode('$contact'); else : echo do_shortcode($contact_default); endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

<?php endwhile; ?>
</div>
<?php endif; ?>
	
	<footer id="colophon" class="site-footer">
		<div class="site-footer-wrapper">
			<div class="container">
				<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ): ?>
					<div class="footer-inner" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'buddyx' ); ?>">
							<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
							<?php }	if ( is_active_sidebar( 'footer-2' ) ) { ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<?php } ?>
							<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
							<?php }	if ( is_active_sidebar( 'footer-4' ) ) { ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
						<?php } ?>
					</div><!-- .widget-area inner-->
				<?php endif; ?>	
			</div><!-- .container -->
		</div><!-- .site-footer-wrapper -->
		<?php get_template_part( 'template-parts/footer/info' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="mobile-menu-close"></div>
<?php wp_footer(); ?>

</body>
</html>
