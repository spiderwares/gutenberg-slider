<?php
/**
 * Features Comparison Table Template
 * 
 * Displays a comparison table of Free vs Pro features.
 *
 * @package Block_Slider
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

$wrong_image = BS_URL . 'assets/images/wrong.svg';
$check_image = BS_URL . 'assets/images/check.svg';

?>

<div class="bs-features-header">
    <h1><?php echo esc_html__( 'Block Slider - Features Comparison', 'block-slider' ); ?></h1>
    <p><?php echo esc_html__( 'Compare the features available in Free and Pro versions', 'block-slider' ); ?></p>
</div>

<table class="bs-features-table">
    <thead>
        <tr>
            <th class="bs-feature"><?php echo esc_html__( 'Feature', 'block-slider' ); ?></th>
            <th class="bs-free-version"><?php echo esc_html__( 'Free Version', 'block-slider' ); ?></th>
            <th class="bs-pro-version"><?php echo esc_html__( 'Pro Version', 'block-slider' ); ?></th>
        </tr>
    </thead>
    <?php // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- Static plugin assets, not WordPress media library attachments. ?>
    <tbody>
        <tr>
            <td><?php echo esc_html__( 'Transition type (Fade, Flip, Cube)', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>"></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Advance Transition(Cards, Coverflow, etc)', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Navigation Style', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Custom Navigation', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Pagination (Bullets, Progressbar)', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Pagination (Fraction, Custom)', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Responsive', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide view auto', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Centered Slide', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Thumbnail Gallery Control', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Autoplay', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Circular Autoplay Progress', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Scrollbar Control', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Image Width & Height', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Image Border Radius', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Vertical Slide', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Lazy Load Image', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Grab cursor', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Space', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slide Speed', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Rewind', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Loop Slides', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Zoom Images', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'RTL Support', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Mousewheel Control', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Keyboard Control', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Grid Layout Support', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
        <tr>
            <td><?php echo esc_html__( 'Slides Group Control', 'block-slider' ); ?></td>
            <td><img src="<?php echo esc_url( $wrong_image ); ?>" alt="<?php echo esc_attr__( 'Wrong', 'block-slider' ); ?>"></td>
            <td><img src="<?php echo esc_url( $check_image ); ?>" alt="<?php echo esc_attr__( 'Check', 'block-slider' ); ?>" ></td>
        </tr>
    </tbody>
    <?php // phpcs:enable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
</table>

<div class="bs-message">
    <h3><?php echo esc_html__( 'Upgrade to Pro Version', 'block-slider' ); ?></h3>
    <p>
        <?php echo esc_html__( 'Unlock all premium features including thumbnail gallery, scrollbar, grid layout, and much more!', 'block-slider' ); ?>
    </p>
</div

