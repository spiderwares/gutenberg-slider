<?php
/**
 * Helper functions
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPSBS_Helper' ) ) :

    /**
     * Class WPSBS_Helper
     *
     */
    class WPSBS_Helper {

        /**
         * Get slide preview data
         *
         */
		public static function get_slide_preview_data( $post ) {

            $preview = ['type' => 'text', 'thumb' => null];

            if ($thumb_id = get_post_thumbnail_id($post->ID)) :
                if ($url = wp_get_attachment_image_url($thumb_id, 'wpsbs_slideshow_thumbnail')) :        
                    return ['type' => 'image', 'thumb' => $url];
                endif;
            endif;
        
            $blocks = function_exists('parse_blocks') ? parse_blocks($post->post_content) : [];
        
            $find_block = function($blocks) use (&$find_block) {
                foreach ((array) $blocks as $block) :   
                    $name = isset($block['blockName']) ? $block['blockName'] : '';
                    if (in_array($name, 
                        array(
                        'core/image', 'core/cover', 'core/media-text', 'core/gallery',
                        'core/video', 'core/embed', 'core/list', 'core/paragraph', 'core/heading'
                        ), true
                    ) ) 

                    return $block;
        
                    if (!empty($block['innerBlocks']) && ($found = $find_block($block['innerBlocks']))) :   
                        return $found;
                    endif;
                endforeach;
                return null;
            };
        
            if ($block = $find_block($blocks)) :
                $name   = $block['blockName'];
                $attrs  = isset($block['attrs']) ? $block['attrs'] : [];
                $img_id = isset($attrs['id']) ? $attrs['id'] : (isset($attrs['mediaId']) ? $attrs['mediaId'] : (isset($attrs['ids'][0]) ? $attrs['ids'][0] : 0));
        
                if ($img_id && ($url = wp_get_attachment_image_url((int) $img_id, 'wpsbs_slideshow_thumbnail'))) :
                    return ['type' => 'image', 'thumb' => $url];
                endif;
        
                if (in_array($name, ['core/video', 'core/embed'], true)) :
                    return ['type' => 'video', 'thumb' => null];
                endif;
        
                if ($name === 'core/list') :
                    return ['type' => 'list', 'thumb' => null];
                endif;
        
                if (in_array($name, ['core/paragraph', 'core/heading'], true)) :
                    return ['type' => 'text', 'thumb' => null];
                endif;
            endif;
        
            return $preview;
        }

        public static function wpsbs_get_background_settings( $post_id ) {
            if ( empty( $post_id ) ) return array();
    
            $background_size     = get_post_meta( $post_id, 'wpsbs_background_size', true );
            $background_position = get_post_meta( $post_id, 'wpsbs_background_position', true );
            $background_repeat   = get_post_meta( $post_id, 'wpsbs_background_repeat', true );
            $background_color    = get_post_meta( $post_id, 'wpsbs_background_color', true );
    
            // Get featured image URL
            $background_id   = get_post_thumbnail_id( $post_id );
            $background_url  = $background_id ? wp_get_attachment_image_url( $background_id, 'full' ) : '';
    
            // Default values
            $background_size     = $background_size ?: 'cover';
            $background_position = $background_position ?: 'center';
            $background_repeat   = $background_repeat ?: 'no-repeat';
    
            if ( $background_size === 'original' ) :
                $background_size = 'auto';
            endif;
    
            return array(
                'background_size'     => $background_size,
                'background_position' => $background_position,
                'background_repeat'   => $background_repeat,
                'background_color'    => $background_color,
                'background_url'      => $background_url,
                'background_id'       => $background_id,
            );
        }
    }

endif;
