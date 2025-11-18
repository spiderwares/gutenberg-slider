<?php
/**
 * Settings Tab: Features
 * Loads the Features comparison table in the plugin settings page.
 * 
 * @package Spin_Rewards_For_WooCommerce
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div id="features-tab" class="wpsbs-tab-content">
    <?php
    wpsbs_get_template(
        'fields/features.php',
        array(),
    );
    ?>
</div>
