<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Elemento IT Solutions
 */

get_header(); ?>

<div class="header-image-box text-center">
  <div class="container">
    <?php if ( get_theme_mod('elemento_it_solutions_header_page_title' , true)) : ?>
      <h1><?php echo esc_html(get_theme_mod('elemento_it_solutions_page_not_found_title', __('404 Error!', 'elemento-it-solutions'))); ?></h1>
    <?php endif; ?>
    <?php if ( get_theme_mod('elemento_it_solutions_header_breadcrumb' , true)) : ?>
      <div class="crumb-box mt-3">
        <?php elemento_it_solutions_the_breadcrumb(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div id="content">
	<div class="container">
		<div class="py-5 text-center not-found-content">
			<figure>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/404-error.png' ); ?>" alt="<?php esc_attr_e( '404 Not Found', 'elemento-it-solutions' ); ?>">
			</figure>
      <p><?php echo esc_html(get_theme_mod('elemento_it_solutions_page_not_found_text', __('The page you are looking for may have been moved, deleted, or possibly never existed.', 'elemento-it-solutions'))); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>