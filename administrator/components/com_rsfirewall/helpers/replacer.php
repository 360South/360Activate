<?php
/**
 * @package    RSFirewall!
 * @copyright  (c) 2009 - 2020 RSJoomla!
 * @link       https://www.rsjoomla.com
 * @license    GNU General Public License http://www.gnu.org/licenses/gpl-3.0.en.html
 */

defined('_JEXEC') or die('Restricted access');

abstract class RSFirewallReplacer
{
	protected static $emails = false;

	public static function addCaptcha(&$buffer)
	{
		if (!class_exists('RSFirewallCaptcha'))
		{
			require_once JPATH_ADMINISTRATOR . '/components/com_rsfirewall/helpers/captcha.php';
		}

		try
		{
			$captcha = new RSFirewallCaptcha();
			$data = $captcha->getImage();

			if (!$data)
			{
				throw new Exception(JText::_('COM_RSFIREWALL_CAPTCHA_IMAGE_COULD_NOT_BE_GENERATED'));
			}

			// Load the Text field
			$field = JFormHelper::loadFieldType('text');
			$form = new JForm('rsfirewalldummyform');
			$field->setForm($form);

			// Prepare the XML
			$xml = new SimpleXMLElement('<field name="rsf_backend_captcha" autocomplete="off" type="text" label="COM_RSFIREWALL_CAPTCHA_SECURITY" hint="COM_RSFIREWALL_PLEASE_ENTER_THE_IMAGE_CODE" />');

			// Setup the field
			$field->setup($xml, '');

			// Render the image
			$image = '<img src="data:image/jpeg;base64,' . $data . '" alt="Captcha" />';

			if (version_compare(JVERSION, '4.0', '>='))
			{
				// Joomla! 4
				$find       = '<div class="form-group">';
				$position   = strrpos($buffer, $find);

				if ($position !== false)
				{
					$image = str_replace('<img ', '<img style="height: auto; max-height: auto;" ', $image);

					$html = '<div class="form-group text-center">' . $image . '</div>';
					$html .= str_replace('control-group', 'form-group', $field->renderField());

					$buffer = substr_replace($buffer, $html . $find, $position, strlen($find));
					return true;
				}
			}
			else
			{
				// Joomla! 3
				$find       = '<div class="control-group">';
				$position   = strrpos($buffer, $find);

				if ($position !== false)
				{
					$html = '<div class="control-group center">' . $image . '</div>';
					$html .= $field->renderField(array('class' => 'center'));

					$buffer = substr_replace($buffer, $html . $find, $position, strlen($find));
					return true;
				}
			}
		}
		catch (Exception $e)
		{
			JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
		}

		return false;
	}

	protected static function _getPattern($link, $text)
	{
		$pattern = '~(?:<a ([^>]*)href\s*=\s*"mailto:' . $link . '"([^>]*))>' . $text . '</a>~i';

		return $pattern;
	}

	public static function replaceEmails(&$text)
	{
		if (strpos($text, '{emailcloak=off}') !== false)
		{
			$text = str_ireplace('{emailcloak=off}', '', $text);
			return true;
		}

		// performance check
		if (strpos($text, '@') === false)
		{
			return false;
		}

		// Example: any@example.org
		$searchEmail = '([\w\.\'\-\+]+\@(?:[a-z0-9\.\-]+\.)+(?:[a-zA-Z0-9\-]{2,10}))';

		// Example: any@example.org?subject=anyText
		$searchEmailLink = $searchEmail . '([?&][\x20-\x7f][^"<>]+)';

		// Any Text
		$searchText = '((?:[\x20-\x7f]|[\xA1-\xFF]|[\xC2-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF4][\x80-\xBF]{3})[^<>]+)';

		// Any Image link
		$searchImage = '(<img[^>]+>)';

		// Any Text with <span or <strong
		$searchTextSpan = '(<span[^>]+>|<span>|<strong>|<strong><span[^>]+>|<strong><span>)' . $searchText . '(</span>|</strong>|</span></strong>)';

		// Any address with <span or <strong
		$searchEmailSpan = '(<span[^>]+>|<span>|<strong>|<strong><span[^>]+>|<strong><span>)' . $searchEmail . '(</span>|</strong>|</span></strong>)';

		/*
		 * Search and fix derivatives of link code <a href="http://mce_host/ourdirectory/email@example.org"
		 * >email@example.org</a>. This happens when inserting an email in TinyMCE, cancelling its suggestion to add
		 * the mailto: prefix...
		 */
		$pattern = self::_getPattern($searchEmail, $searchEmail);
		$pattern = str_replace('"mailto:', '"http://mce_host([\x20-\x7f][^<>]+/)', $pattern);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[3][0];
			$mailText = $regs[5][0];

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search and fix derivatives of link code <a href="http://mce_host/ourdirectory/email@example.org"
		 * >anytext</a>. This happens when inserting an email in TinyMCE, cancelling its suggestion to add
		 * the mailto: prefix...
		 */
		$pattern = self::_getPattern($searchEmail, $searchText);
		$pattern = str_replace('"mailto:', '"http://mce_host([\x20-\x7f][^<>]+/)', $pattern);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[3][0];
			$mailText = $regs[5][0];

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org"
		 * >email@example.org</a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchEmail);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = $regs[4][0];

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@amail.com"
		 * ><anyspan >email@amail.com</anyspan></a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchEmailSpan);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = $regs[4][0] . $regs[5][0] . $regs[6][0];

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@amail.com">
		 * <anyspan >anytext</anyspan></a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchTextSpan);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = $regs[4][0] . addslashes($regs[5][0]) . $regs[6][0];

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org">
		 * anytext</a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchText);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = addslashes($regs[4][0]);

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org">
		 * <img anything></a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchImage);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = $regs[4][0];

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org">
		 * <img anything>email@example.org</a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchImage . $searchEmail);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = $regs[4][0] . $regs[5][0];

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org">
		 * <img anything>any text</a>
		 */
		$pattern = self::_getPattern($searchEmail, $searchImage . $searchText);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0];
			$mailText = $regs[4][0] . addslashes($regs[5][0]);

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org?
		 * subject=Text">email@example.org</a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchEmail);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0] . $regs[3][0];
			$mailText = $regs[5][0];

			// Needed for handling of Body parameter
			$mail = str_replace('&amp;', '&', $mail);

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@example.org?
		 * subject=Text">anytext</a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchText);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0] . $regs[3][0];
			$mailText = addslashes($regs[5][0]);

			// Needed for handling of Body parameter
			$mail = str_replace('&amp;', '&', $mail);

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@amail.com?subject= Text"
		 * ><anyspan >email@amail.com</anyspan></a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchEmailSpan);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0] . $regs[3][0];
			$mailText = $regs[5][0] . $regs[6][0] . $regs[7][0];

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code <a href="mailto:email@amail.com?subject= Text">
		 * <anyspan >anytext</anyspan></a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchTextSpan);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[2][0] . $regs[3][0];
			$mailText = $regs[5][0] . addslashes($regs[6][0]) . $regs[7][0];

			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code
		 * <a href="mailto:email@amail.com?subject=Text"><img anything></a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchImage);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[1][0] . $regs[2][0] . $regs[3][0];
			$mailText = $regs[5][0];

			// Needed for handling of Body parameter
			$mail = str_replace('&amp;', '&', $mail);

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code
		 * <a href="mailto:email@amail.com?subject=Text"><img anything>email@amail.com</a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchImage . $searchEmail);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[1][0] . $regs[2][0] . $regs[3][0];
			$mailText = $regs[4][0] . $regs[5][0] . $regs[6][0];

			// Needed for handling of Body parameter
			$mail = str_replace('&amp;', '&', $mail);

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for derivatives of link code
		 * <a href="mailto:email@amail.com?subject=Text"><img anything>any text</a>
		 */
		$pattern = self::_getPattern($searchEmailLink, $searchImage . $searchText);

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[1][0] . $regs[2][0] . $regs[3][0];
			$mailText = $regs[4][0] . $regs[5][0] . addslashes($regs[6][0]);

			// Needed for handling of Body parameter
			$mail = str_replace('&amp;', '&', $mail);

			// Check to see if mail text is different from mail addy
			$replacement = self::_getReplacement($mail, $mailText);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[0][1], strlen($regs[0][0]));
		}

		/*
		 * Search for plain text email addresses, such as email@example.org but not within HTML tags:
		 * <img src="..." title="email@example.org"> or <input type="text" placeholder="email@example.org">
		 * The negative lookahead '(?![^<]*>)' is used to exclude this kind of occurrences
		 */
		$pattern = '~(?![^<>]*>)' . $searchEmail . '~i';

		while (preg_match($pattern, $text, $regs, PREG_OFFSET_CAPTURE))
		{
			$mail = $regs[1][0];
			$replacement = self::_getReplacement($mail);

			// Replace the found address with the js cloaked email
			$text = substr_replace($text, $replacement, $regs[1][1], strlen($mail));
		}

		if (self::$emails)
		{
		    $script = JHtml::_('script', 'com_rsfirewall/mail.js', array('relative' => true, 'version' => 'auto', 'pathOnly' => true));

			$text = str_replace('</body>', '<script type="text/javascript" src="' . $script . '"></script></body>', $text);
		}

		return self::$emails;
	}

	protected static function _getReplacement($mail, $mailText = null)
	{
		self::$emails = true;

		if (!empty($mailText))
		{
			$label = $mailText;
		}
		else
		{
			$label = '<img src="' . htmlentities(self::getImageString($mail), ENT_COMPAT, 'utf-8') . '" style="vertical-align: middle" class="rsfirewall_emails_img" alt="." />';
		}

		$replacement = '<a href="javascript:void(0);" onclick="RSFirewallMail(\'' . base64_encode($mail) . '\')" class="rsfirewall_emails_a">' . $label . '</a>';

		return $replacement;
	}

    protected static function getImageString($mail) {
        if (function_exists('imagecreate')) {
            $length = strlen($mail);
            $size = 15;

            $imagelength = $length*7;
            $imageheight = $size;
            $image       = imagecreate($imagelength, $imageheight);

            $text_color = RSFirewallConfig::getInstance()->get('email_text_color');
            if (strlen($text_color) != 7)
            {
                $text_color = '#FFFFFF';
            }
            $usestrcolor = sscanf($text_color, '#%2x%2x%2x');

            imagealphablending($image, false);
            $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
            imagefill($image, 0, 0, $transparent);
            imagesavealpha($image, true);

            $stringcolor = imagecolorallocate($image, $usestrcolor[0], $usestrcolor[1], $usestrcolor[2]);

            imagestring($image, 3, 0, 0,  $mail, $stringcolor);

            ob_start();
            imagepng($image);
            imagedestroy($image);
            $data = ob_get_contents();
            ob_end_clean();

            return 'data:image/png;base64,'.base64_encode($data);
        } else {
            // disable if image creation doesn't work
            RSFirewallConfig::getInstance()->set('verify_emails', 0);
        }

        return '';
    }
}