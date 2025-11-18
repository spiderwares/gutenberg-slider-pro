<?php 

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Thumbnail gallery template.
 *
 */
if ( empty( $thumb_gallery ) ) :
    ?>
    <div class="wpsbs-swiper-thumbs-gallery swiper">
        <div class="swiper-wrapper">
            <?php if ( $hasSlides ) :
                foreach ( $slides as $slide_id => $html ) :
                    $thumb_image_id = get_post_thumbnail_id( $slide_id );
                    $thumb_url = $thumb_image_id ? wp_get_attachment_image_url( $thumb_image_id, array( $thumb_width, $thumb_height ) ) : '';
                    if ( ! $thumb_url ) :
                        $blocks = parse_blocks( $html );
                        foreach ( $blocks as $block ) :
                            if ( isset( $block['attrs']['id'] ) ) :
                                $thumb_url = wp_get_attachment_image_url( $block['attrs']['id'], array( $thumb_width, $thumb_height ) );
                                if ( $thumb_url ) break;
                            endif;
                        endforeach;
                    endif;
                    if ( $thumb_url ) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="" style="width: <?php echo esc_attr( $thumb_width ); ?>px; height: <?php echo esc_attr( $thumb_height ); ?>px; object-fit: cover;">
                        </div>
                    <?php endif;
                endforeach;
            elseif ( $hasImages ) :
                foreach( $imageIDs as $imageID ) : ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url( wp_get_attachment_image_url( $imageID, array( $thumb_width, $thumb_height ) ) ); ?>" alt="" style="width: <?php echo esc_attr( $thumb_width ); ?>px; height: <?php echo esc_attr( $thumb_height ); ?>px; object-fit: cover;">
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
    <?php
endif;
