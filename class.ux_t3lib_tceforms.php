<?php
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
 *   47: class ux_t3lib_TCEforms extends t3lib_TCEforms
 *   52:     function getSingleField_typeInput($table,$field,$row,&$PA)
 *
 * TOTAL FUNCTIONS: 1
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

require_once(PATH_t3lib . '/class.t3lib_tceforms.php');

class ux_t3lib_TCEforms extends t3lib_TCEforms {

	/**
	 * @see t3lib_TCEForms::getSingleField_typeInput()
	 */
	function getSingleField_typeInput($table,$field,$row,&$PA)	{
		$config = $PA['fieldConf']['config'];
		$evalList = t3lib_div::trimExplode(',', $config['eval'], 1);

		if ($PA['itemFormElValue'] && in_array('tx_punycode_eval',$evalList)) {
			$obj = t3lib_div::getUserObj('EXT:punycode/class.tx_punycode_eval.php:&tx_punycode_eval');
			$PA['itemFormElValue'] = $obj->decode($PA['itemFormElValue']);
		}

		return parent::getSingleField_typeInput($table, $field, $row, $PA);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/punycode/class.ux_t3lib_tceforms.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/punycode/class.ux_t3lib_tceforms.php']);
}

?>