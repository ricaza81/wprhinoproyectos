<?php
/**
 * Masonry Gallery Template Style One
 *
 * @package Radiantthemes
 */
 
foreach ( $image_ids as $img_id ) {
    $images_src          = wp_get_attachment_image_src( $img_id, 'full' );
    $images_title        = get_post( $img_id )->post_title;
    $images_description  = get_post( $img_id )->post_content;
    $images_alt          = get_post_meta($img_id, '_wp_attachment_image_alt', true);
    $image_attributes    = wp_get_attachment_image_src( $img_id, 'full' );
    $output .= '<div class="rt-masonry-gallery-item col-lg-4 col-md-4 col-sm-6 col-xs-12 ' . $animation_classes . '">';
    $output .= '<div class="holder">';
    $output .= '<div class="pic">';
    $output .= '<div class="holder">';
    $output .= '<img src="'. $images_src[0] .'" alt="' . $images_alt . '" width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '">';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<a class="data fancybox ' . esc_attr( $masonry_gallery_css ) . '" href="' . $images_src[0] . '">';
    $output .= '<div class="table">';
    $output .= '<div class="table-cell">';
    $output .= '<h5>' . $images_title . '</h5>';
    $output .= '<p>' . $images_description . '</p>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</a>';
    $output .= '</div>';
    $output .= '</div>';
}
