<?php
/**
 * @link       https://tiekuasare.com
 * @since      1.0.0
 *
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/public/partials
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc_html( get_option('ccs_heading', 'Coming Soon') ); ?></title>
     <?php wp_head(); ?>
    </head>
<body style="background-color: <?php echo esc_attr(get_option('ccs_bg_color', '#ffffff')); ?>;">

    <div class="ccs-wrapper">
        <?php if ( $logo = get_option('ccs_logo') ): ?>
            <img src="<?php echo esc_url($logo); ?>" alt="Logo">
        <?php endif; ?>

        <h1><?php echo esc_html( get_option('ccs_heading', 'Coming Soon') ); ?></h1>
        <p><?php echo esc_html( get_option('ccs_message', 'Our website is under construction.') ); ?></p>

        <div class="ccs-social-links">
            <?php if ( $facebook = get_option('ccs_facebook_url') ): ?>
                <a href="<?php echo esc_url($facebook); ?>" target="_blank" class="ccs-social-button">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            <?php endif; ?>
            <?php if ( $instagram = get_option('ccs_instagram_url') ): ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank" class="ccs-social-button">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            <?php endif; ?>
            <?php if ( $tiktok = get_option('ccs_tiktok_url') ): ?>
                <a href="<?php echo esc_url($tiktok); ?>" target="_blank" class="ccs-social-button">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>