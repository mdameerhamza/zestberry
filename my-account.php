<?php
/* Template Name: My Account */
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
get_header();
/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>
<main id="main">
	<div class="container flex account-cols">
		<?php
		if ( !is_user_logged_in() ) {
			echo '<div class="login-message">Please <a href="' . wp_login_url() . '">login</a> to view your account.</div>';
		} else {
			?>
			<?php do_action( 'woocommerce_account_navigation' ); ?>
				<div class="woocommerce-MyAccount-content">
					<?php
						/**
						 * My Account content.
						 *
						 * @since 2.6.0
						 */
						do_action( 'woocommerce_account_content' );
					?>
				</div>
			<?php
		}
		?>
	</div>
</main>
<?php get_footer(); ?>
