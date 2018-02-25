<?php

if (!defined("TYPO3_MODE")) {
    die("Access denied.");
}

// $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output']
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output']['tx_htmlcompressor']
    = 'EXT:cwhtmlcompressor/Classes/HtmlCompressor.php:&CarstenWindler\\Cwhtmlcompressor\\HtmlCompressor->contentCompressHook';

