<?php
if (!defined('TYPO3_MODE')) die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['tx_punycode_eval'] = 'EXT:punycode/class.tx_punycode_eval.php';

if (version_compare(TYPO3_version, '4.2') < 0) {
	// Need a XCLASS for old versions
	$GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['t3lib/class.t3lib_tceforms.php'] = t3lib_extMgm::extPath('punycode') . '/class.ux_t3lib_tceforms.php';
}
?>