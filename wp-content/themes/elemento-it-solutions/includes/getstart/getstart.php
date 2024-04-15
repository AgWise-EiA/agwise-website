<?php
//about theme info
add_action( 'admin_menu', 'elemento_it_solutions_gettingstarted' );
function elemento_it_solutions_gettingstarted() {
	add_theme_page( esc_html__('Elemento IT Solutions', 'elemento-it-solutions'), esc_html__('Elemento IT Solutions', 'elemento-it-solutions'), 'edit_theme_options', 'elemento_it_solutions_about', 'elemento_it_solutions_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function elemento_it_solutions_admin_theme_style() {
	wp_enqueue_style('elemento-it-solutions-custom-admin-style', get_template_directory_uri() . '/includes/getstart/getstart.css');
	wp_enqueue_script('elemento-it-solutions-tabs', get_template_directory_uri() . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'elemento_it_solutions_admin_theme_style');

// Changelog
if ( ! defined( 'ELEMENTO_IT_SOLUTIONS_CHANGELOG_URL' ) ) {
    define( 'ELEMENTO_IT_SOLUTIONS_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function elemento_it_solutions_changelog_screen() {	
	global $wp_filesystem;
	$changelog_file = apply_filters( 'elemento_it_solutions_changelog_file', ELEMENTO_IT_SOLUTIONS_CHANGELOG_URL );
	if ( $changelog_file && is_readable( $changelog_file ) ) {
		WP_Filesystem();
		$changelog = $wp_filesystem->get_contents( $changelog_file );
		$changelog_list = elemento_it_solutions_parse_changelog( $changelog );
		echo wp_kses_post( $changelog_list );
	}
}

function elemento_it_solutions_parse_changelog( $content ) {
	$content = explode ( '== ', $content );
	$changelog_isolated = '';
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}
	$changelog_array = explode( '= ', $changelog_isolated );
	unset( $changelog_array[0] );
	$changelog = '<div class="changelog">';
	foreach ( $changelog_array as $value) {
		$value = preg_replace( '/\n+/', '</span><span>', $value );
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div><hr>';
		$changelog .= str_replace( '<span></span>', '', $value );
	}
	$changelog .= '</div>';
	return wp_kses_post( $changelog );
}

//guidline for about theme
function elemento_it_solutions_mostrar_guide() { 
	//custom function about theme customizer
	$elemento_it_solutions_return = add_query_arg( array()) ;
	$elemento_it_solutions_theme = wp_get_theme( 'elemento-it-solutions' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Elemento IT Solutions', 'elemento-it-solutions' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'elemento-it-solutions' ); ?>: <?php echo esc_html($elemento_it_solutions_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="elemento_it_solutions_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'elemento-it-solutions' ); ?></button>
				<button class="tablinks" onclick="elemento_it_solutions_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'elemento-it-solutions' ); ?></button>
				<button class="tablinks" onclick="elemento_it_solutions_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'elemento-it-solutions' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$plugin_ins = Elemento_IT_Solutions_Plugin_Activation_WPElemento_Importer::get_instance();
					$elemento_it_solutions_actions = $plugin_ins->recommended_actions;
					?>
					<div class="elemento-it-solutions-recommended-plugins ">
							<div class="elemento-it-solutions-action-list">
								<?php if ($elemento_it_solutions_actions): foreach ($elemento_it_solutions_actions as $key => $elemento_it_solutions_actionValue): ?>
										<div class="elemento-it-solutions-action" id="<?php echo esc_attr($elemento_it_solutions_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($elemento_it_solutions_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($elemento_it_solutions_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($elemento_it_solutions_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'elemento-it-solutions'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'elemento-it-solutions'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'elemento-it-solutions'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent ">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'elemento-it-solutions'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'elemento-it-solutions'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'elemento-it-solutions'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'elemento-it-solutions'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'elemento-it-solutions'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'elemento-it-solutions'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'elemento-it-solutions'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'elemento-it-solutions'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'elemento-it-solutions'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'elemento-it-solutions'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'elemento-it-solutions'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'elemento-it-solutions'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'elemento-it-solutions' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','elemento-it-solutions'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','elemento-it-solutions'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','elemento-it-solutions'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','elemento-it-solutions'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php elemento_it_solutions_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'elemento-it-solutions'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Elemento IT Solutions WordPress Theme', 'elemento-it-solutions'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'elemento-it-solutions'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'elemento-it-solutions'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'elemento-it-solutions'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'elemento-it-solutions'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'elemento-it-solutions' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'elemento-it-solutions' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'elemento-it-solutions' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'elemento-it-solutions' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'elemento-it-solutions' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'elemento-it-solutions' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'elemento-it-solutions'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( ELEMENTO_IT_SOLUTIONS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'elemento-it-solutions'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'elemento-it-solutions' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>