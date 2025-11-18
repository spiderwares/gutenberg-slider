<?php
/**
 * Features Comparison Table Template
 * 
 * Displays a comparison table of Free vs Pro features.
 *
 * @package Smart_Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

$wrong_image = WPSBS_URL . 'assets/images/wrong.svg';
$check_image = WPSBS_URL . 'assets/images/check.svg';

?>

<div class="wpsbs-features-header">
    <h1><?php echo esc_html__( 'Smart Block Slider - Features Comparison', 'smart-block-slider' ); ?></h1>
    <p><?php echo esc_html__( 'Compare the features available in Free and Pro versions', 'smart-block-slider' ); ?></p>
</div>

<table class="wpsbs-features-table">
    <thead>
        <tr>
            <th class="wpsbs-feature"><?php echo esc_html__( 'Feature', 'smart-block-slider' ); ?></th>
            <th class="wpsbs-free-version"><?php echo esc_html__( 'Free Version', 'smart-block-slider' ); ?></th>
            <th class="wpsbs-pro-version"><?php echo esc_html__( 'Pro Version', 'smart-block-slider' ); ?></th>
        </tr>
    </thead>
    <?php // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin assets, not WordPress media library attachments. ?>
    <tbody>
        <tr>
            <td><?php echo esc_html__( 'Transition type (Fade, Flip, Cube)', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>"></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Advance Transition(Cards, Coverflow, etc)', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Navigation Style', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Custom Navigation', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Pagination (Bullets, Progressbar)', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Pagination (Fraction, Custom)', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Responsive', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide view auto', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Centered Slide', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Thumbnail Gallery Control', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Autoplay', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Circular Autoplay Progress', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Scrollbar Control', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Image Width & Height', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Image Border Radius', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Vertical Slide', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Lazy Load Image', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Grab cursor', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Space', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Speed', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Rewind', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Loop Slides', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Zoom Images', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'RTL Support', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Mousewheel Control', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Keyboard Control', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Grid Layout Support', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slides Group Control', 'smart-block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'smart-block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'smart-block-slider' ); ?>" ></td>
        </tr>
    </tbody>
    <?php // phpcs:enable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
</table>

<div class="bs-message">
    <h3><?php echo esc_html__( 'Upgrade to Pro Version', 'smart-block-slider' ); ?></h3>
    <p>
        <?php echo esc_html__( 'Unlock all premium features including thumbnail gallery, scrollbar, grid layout, and much more!', 'smart-block-slider' ); ?>
    </p>
</div

