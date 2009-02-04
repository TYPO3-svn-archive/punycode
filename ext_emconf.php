<?php

########################################################################
# Extension Manager/Repository config file for ext: "punycode"
#
# Auto generated 04-09-2007 10:52
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Extended domains',
	'description' => 'This extension allows TYPO3 to use letters with umlauts in domain records (implements feature request #689 in TYPO3 core)',
	'category' => 'misc',
	'author' => 'Dmitry Dulepov',
	'author_email' => 'dmitry@typo3.org',
	'shy' => '',
	'dependencies' => 'cms,lang',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => 'SIA "ACCIO"',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'lang' => '',
			'typo3' => '4.1.2-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:12:{s:26:"class.tx_punycode_eval.php";s:4:"1115";s:27:"class.ux_t3lib_tceforms.php";s:4:"a913";s:12:"ext_icon.gif";s:4:"1bdc";s:17:"ext_localconf.php";s:4:"74d4";s:14:"ext_tables.php";s:4:"7a3f";s:14:"doc/manual.sxw";s:4:"dabd";s:16:"lib/idna/LICENCE";s:4:"8d67";s:19:"lib/idna/ReadMe.txt";s:4:"026b";s:21:"lib/idna/example.php_";s:4:"b3f7";s:31:"lib/idna/idna_convert.class.php";s:4:"138e";s:40:"lib/idna/idna_convert.create.npdata.php_";s:4:"d974";s:19:"lib/idna/npdata.ser";s:4:"e844";}',
	'suggests' => array(
	),
);

?>