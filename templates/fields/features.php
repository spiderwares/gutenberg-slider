<?php
/**
 * Features Comparison Table Template
 * 
 * Displays a comparison table of Free vs Pro features.
 *
 * @package Blocksy_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

$wrong_image = WPBS_URL . 'assets/images/wrong.svg';
$check_image = WPBS_URL . 'assets/images/check.svg';

?>

<div class="wpbs-features-header">
    <h1><?php echo esc_html__( 'Blocksy Slider - Features Comparison', 'blocksy-slider' ); ?></h1>
    <p><?php echo esc_html__( 'Compare the features available in Free and Pro versions', 'blocksy-slider' ); ?></p>
</div>

<table class="wpbs-features-table">
    <thead>
        <tr>
            <th class="wpbs-feature"><?php echo esc_html__( 'Feature', 'blocksy-slider' ); ?></th>
            <th class="wpbs-free-version"><?php echo esc_html__( 'Free Version', 'blocksy-slider' ); ?></th>
            <th class="wpbs-pro-version"><?php echo esc_html__( 'Pro Version', 'blocksy-slider' ); ?></th>
        </tr>
    </thead>
    <?php // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin assets, not WordPress media library attachments. ?>
    <tbody>
        <tr>
            <td><?php echo esc_html__( 'Transition type (Fade, Flip, Cube)', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>"></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Advance Transition(Cards, Coverflow, etc)', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Navigation Style', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Custom Navigation', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Pagination (Bullets, Progressbar)', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Pagination (Fraction, Custom)', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Responsive', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide view auto', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Centered Slide', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Thumbnail Gallery Control', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Autoplay', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Circular Autoplay Progress', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Scrollbar Control', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Image Width & Height', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Image Border Radius', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Vertical Slide', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Lazy Load Image', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Grab cursor', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Space', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Speed', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Rewind', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Loop Slides', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Zoom Images', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'RTL Support', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Mousewheel Control', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Keyboard Control', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Grid Layout Support', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slides Group Control', 'blocksy-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'blocksy-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'blocksy-slider' ); ?>" ></td>
        </tr>
    </tbody>
    <?php // phpcs:enable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
</table>

<div class="wpbs-message">
    <h3><?php echo esc_html__( 'Upgrade to Pro Version', 'blocksy-slider' ); ?></h3>
    <p>
        <?php echo esc_html__( 'Unlock all premium features including thumbnail gallery, scrollbar, grid layout, and much more!', 'blocksy-slider' ); ?>
    </p>
</div

