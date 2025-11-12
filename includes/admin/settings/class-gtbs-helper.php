<?php
/**
 * Helper functions
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GTBS_Helper' ) ) :

    /**
     * Class GTBS_Helper
     *
     */
    class GTBS_Helper {

        /**
         * Get slide preview data
         *
         */
		public static function get_slide_preview_data( $post ) {

            $preview = ['type' => 'text', 'thumb' => null];

            if ($thumb_id = get_post_thumbnail_id($post->ID)) :
                if ($url = wp_get_attachment_image_url($thumb_id, 'gtbs_slideshow_thumbnail')) :        
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
        
                if ($img_id && ($url = wp_get_attachment_image_url((int) $img_id, 'gtbs_slideshow_thumbnail'))) :
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
    }

endif;
