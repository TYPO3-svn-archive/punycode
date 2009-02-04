<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

t3lib_div::loadTCA('sys_domain');
$GLOBALS['TCA']['sys_domain']['columns']['domainName']['config']['eval'] = 'required,unique,lower,trim,tx_punycode_eval';
$GLOBALS['TCA']['sys_domain']['ctrl']['label_userFunc'] = 'EXT:punycode/class.tx_punycode_eval.php:&tx_punycode_eval->t3lib_BEfunc_getRecordTitle';

?>