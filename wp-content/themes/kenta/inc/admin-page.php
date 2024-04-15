<?php
/**
 * Kenta Theme Admin Page Hooks
 *
 * @package Kenta
 */

if ( ! function_exists( 'kenta_admin_get_start_notice' ) ) {
	/**
	 * Show get start notice
	 *
	 * @return void
	 */
	function kenta_admin_get_start_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( get_option( 'kenta_active_template' ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( ! in_array( $screen->base, array( 'dashboard', 'themes' ) ) ) {
			return;
		}

		get_template_part( 'template-parts/admin-start' );
	}
}

add_action( 'admin_notices', 'kenta_admin_get_start_notice' );

if ( ! function_exists( 'kenta_dismiss_notice' ) ) {
	/**
	 * Dismiss admin notice
	 */
	function kenta_dismiss_notice() {

		global $current_user;

		$user_id = $current_user->ID;

		$dismiss_option = esc_html( $_GET['kenta_dismiss'] ?? '' );
		if ( is_string( $dismiss_option ) && in_array( $dismiss_option, array( 'start' ) ) ) {
			check_ajax_referer( 'kenta_dismiss' );

			if ( isset( $_GET['revert'] ) ) {
				delete_user_meta( $user_id, "kenta_dismissed_$dismiss_option", 'true', true );
			} else {
				add_user_meta( $user_id, "kenta_dismissed_$dismiss_option", 'true', true );
			}
			wp_die( '', '', array( 'response' => 200 ) );
		}
	}
}
add_action( 'admin_init', 'kenta_dismiss_notice' );

if ( ! function_exists( 'kenta_install_companion' ) ) {
	/**
	 * Install Kenta Companion Plugin By One Click
	 */
	function kenta_install_companion() {
		check_ajax_referer( 'kenta_install_companion' );

		if ( ! current_user_can( 'activate_plugins' ) ) {
			wp_die(
				'<h1>' . __( 'You need a higher level of permission.', 'kenta' ) . '</h1>' .
				'<p>' . __( 'Sorry, you are not allowed to activate plugins on this site.', 'kenta' ) . '</p>',
				403
			);
		}

		require_once ABSPATH . 'wp-admin/admin-header.php';

		?>
        <div class="wrap">
			<?php
			kenta_do_install_plugins( [
				'kenta-companion' => esc_html__( 'Kenta Companion', 'kenta' ),
				'kenta-blocks'    => esc_html__( 'Kenta Blocks', 'kenta' ),
			], admin_url( 'themes.php' ) );
			?>
        </div>
		<?php
	}
}
add_action( 'admin_action_kenta_install_companion', 'kenta_install_companion' );

/**
 * Update dynamic css cache action
 */
if ( ! function_exists( 'kenta_update_dynamic_css_cache_action' ) ) {
	function kenta_update_dynamic_css_cache_action() {

		check_ajax_referer( 'kenta_update_dynamic_css_cache' );

		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_die(
				'<h1>' . __( 'You need a higher level of permission.', 'kenta' ) . '</h1>' .
				'<p>' . __( 'Sorry, you are not allowed to customize this site.', 'kenta' ) . '</p>',
				403
			);
		}

		kenta_reset_dynamic_css_cache();
		kenta_update_customizer_default_settings();
	}
}
add_action( 'admin_action_kenta_update_dynamic_css_cache', 'kenta_update_dynamic_css_cache_action' );

if ( ! function_exists( 'kenta_show_admin_page' ) ) {
	/**
	 * Show admin page
	 *
	 * @return void
	 */
	function kenta_show_admin_page() {
		get_template_part( 'template-parts/admin', 'container' );
	}
}

if ( ! function_exists( 'kenta_add_admin_menu' ) ) {
	/**
	 * Add admin menu
	 *
	 * @return void
	 */
	function kenta_add_admin_menu() {
		add_theme_page(
			esc_html__( 'Kenta Theme', 'kenta' ),
			esc_html__( 'Kenta Theme', 'kenta' ),
			'edit_theme_options',
			'kenta-theme',
			'kenta_show_admin_page'
		);
	}
}

if ( ! function_exists( 'kenta_cmp_need_upgrade_notice' ) ) {
	/**
	 * Show upgrade Kenta Companion notice
	 */
	function kenta_cmp_need_upgrade_notice() {
		get_template_part( 'template-parts/admin-cmp-upgrade' );
	}
}

if ( KENTA_CMP_ACTIVE ) {
	add_action( 'kcmp/show_admin_setup_page', 'kenta_show_admin_page' );
	// Kenta Companion plugin is out of date
	if ( defined( 'KCMP_VERSION' ) && version_compare( KCMP_VERSION, MIN_KENTA_CMP_VERSION, '<' ) ) {
		add_action( 'admin_notices', 'kenta_cmp_need_upgrade_notice' );
	}
} else {
	add_action( 'admin_menu', 'kenta_add_admin_menu' );
}
