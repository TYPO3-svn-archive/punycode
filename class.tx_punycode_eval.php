<?
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Dmitry Dulepov (dmitry@typo3.org)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Contains a class to evaluate domain names with puny code
 *
 * @author	Dmitry Dulepov <dmitry@typo3.org>
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   53: class tx_punycode_eval
 *   60:     function evaluateFieldValue($value, $is_in, $set)
 *   78:     function decode($value)
 *  105:     function t3lib_BEfunc_getRecordTitle(&$params, &$pObj)
 *
 * TOTAL FUNCTIONS: 3
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

require_once(t3lib_extMgm::extPath('punycode') . '/lib/idna/idna_convert.class.php');

/**
 * This class provides a function to evaluate domain names in punycode.
 *
 */
class tx_punycode_eval {

	var $IDN = false;

	/**
	 * @see t3lib_TCEmain::checkValue_input_Eval()
	 */
	function evaluateFieldValue($value, $is_in, $set) {
		// Convert IDNA-like domain (if any)
		if (!preg_match('/^[a-z0-9\.\-]*$/i', $value)) {
			if (!$this->IDN) {
				$this->IDN = new idna_convert();
			}
			$value = $GLOBALS['LANG']->csConvObj->utf8_encode($value, $GLOBALS['LANG']->charSet);
			$value = $this->IDN->encode($value);
		}
		return $value;
	}

	function deevaluateFieldValue(&$params) {
		return $this->decode($params['value']);
	}

	/**
	 * Decodes punycode-based value
	 *
	 * @param	string	$value: Value to decode
	 * @return	string		Decoded value
	 */
	function decode($value) {
		if (preg_match('/(^|\.)xn--/', $value)) {
			if (!$this->IDN) {
				$this->IDN = new idna_convert();
			}
			$value = $this->IDN->decode($value);
			if (strcasecmp($GLOBALS['LANG']->charSet, 'utf-8')) {
				$value = $GLOBALS['LANG']->csConvObj->utf8_decode($value, $GLOBALS['LANG']->charSet);
			}
		}
		return $value;
	}

	/**
	 * @see t3lib_BEfunc::getRecordTitle
	 *
	 * @param	array		$params: Callback parameters
	 * @param	object		$pObj: Reference to parent object (null)
	 */
	function t3lib_BEfunc_getRecordTitle(&$params, &$pObj) {
		$params['title'] = $this->decode($params['row']['domainName']);
		if ($params['title'] != $params['row']['domainName'] && $GLOBALS['SOBE'] && is_a($GLOBALS['SOBE'], 'SC_db_list') && $GLOBALS['SOBE']->MOD_SETTINGS['bigControlPanel']) {
			$params['title'] .= ' (' . $params['row']['domainName'] . ')';
		}
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/punycode/class.tx_punycode_eval.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/punycode/class.tx_punycode_eval.php']);
}

?>