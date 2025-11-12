<?php 

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! empty( $image_ids ) && is_array( $image_ids ) ) : 
?>

<div class="gtbs-swiper swiper gtbs-swiper-thumbs-gallery">
    <div class="swiper-wrapper">
        <?php foreach ( $image_ids as $image_id ) : ?>
            <div class="swiper-slide">
                <img 
                    src="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'thumbnail' ) ); ?>" 
                    alt="<?php echo esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ); ?>"
                    style="width: <?php echo esc_attr( $thumb_width ); ?>px; height: <?php echo esc_attr( $thumb_height ); ?>px; object-fit: cover;"
                />
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif;
