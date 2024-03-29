<?php

/**
 * @copyright     Copyright (c) 2009-2022 Ryan Demmer. All rights reserved
 * @license       GNU/GPL 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * JCE is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses
 */
class WFIframePluginConfig
{
    public static function getConfig(&$settings)
    {
        $wf = WFApplication::getInstance();
        
        $elements = array('iframe');

        // remove iframe
        $settings['invalid_elements'] = array_diff($settings['invalid_elements'], $elements);

        // add the media plugin if needed
        if (!in_array('media', $settings['plugins'])) {
            $settings['plugins'][] = 'media';

            if (empty($settings['media_valid_elements'])) {
                $settings['media_valid_elements'] = $elements;
            }

            $settings['media_valid_elements'] = array_intersect($settings['media_valid_elements'], $elements);
        }
    }
}
