<?php

/**
 * @copyright     Copyright (c) 2009-2022 Ryan Demmer. All rights reserved
 * @license       GNU/GPL 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * JCE is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses
 */
class WFMediaPluginConfig
{
    public static function getConfig(&$settings)
    {
        $wf = WFApplication::getInstance();

        $tags = array();

        $allow_iframes = (int) $wf->getParam('media.iframes', 0);

        if ($allow_iframes) {
            $tags[] = 'iframe';

            // may be overwritten by mediamanager config - ../mediamanager/config.php
            if ($allow_iframes == 2) {
                $settings['iframes_allow_local'] = true;
            }

            if ($allow_iframes == 3) {
                $settings['iframes_supported_media'] = array();
                
                $settings['iframes_allow_supported'] = true;
                $iframes_supported_media = $wf->getParam('media.iframes_supported_media', array());

                // get values only
                $iframes_supported_media = array_values($iframes_supported_media);

                $iframes_supported_media_custom = $wf->getParam('media.iframes_supported_media_custom', array());

                // get values only
                if (!empty($iframes_supported_media_custom)) {
                    $iframes_supported_media_custom = array_values($iframes_supported_media_custom);
                }

                $settings['iframes_supported_media'] = array_merge($iframes_supported_media, $iframes_supported_media_custom);
            }
        }

        if ($wf->getParam('media.audio', 1)) {
            $tags[] = 'audio';
        }

        if ($wf->getParam('media.video', 1)) {
            $tags[] = 'video';
        }

        if (in_array('audio', $tags) || in_array('video', $tags)) {
            $tags[] = 'source';
        }

        if ($wf->getParam('media.embed', 1)) {
            $tags[] = 'embed';
        }

        if ($wf->getParam('media.object', 1)) {
            $tags[] = 'object';
            $tags[] = 'param';
        }

        // allow all elements
        $settings['invalid_elements'] = array_diff($settings['invalid_elements'], array('audio', 'video', 'source', 'embed', 'object', 'param', 'iframe'));

        $settings['media_valid_elements'] = array_values($tags);

        $settings['media_live_embed'] = $wf->getParam('media.live_embed', 1);
    }
}
