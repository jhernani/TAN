<?php

$URL = str_replace(
	array( '\\', '../' ),
	array( '/',  '' ),
	$_SERVER['REQUEST_URI']
);

if ($offset = strpos($URL,'?')) {

	$URL = substr($URL,0,$offset);
} else if ($offset = strpos($URL,'#')) {
	
	$URL = substr($URL,0,$offset);
}


$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));
 

if (URL_ROOT != '/') $URL=substr($URL,strlen(URL_ROOT));


$URL = trim($URL,'/');

if (
	file_exists(DOC_ROOT.'/'.$URL) &&
	($_SERVER['SCRIPT_FILENAME'] != DOC_ROOT.$URL) &&
 	($URL != '') &&
 	($URL != 'index.php')
) die404();


$ACTION = (
	($URL == '') ||
	($URL == 'index.php') ||
	($URL == 'index.html')
) ? array(DEFAULT_PAGE) : explode('/',html_entity_decode($URL));


$includeFile = DEFAULT_DIRECTORY.'/'.preg_replace('/[^\w]/','',$ACTION[0]).'.php';

if (is_file($includeFile)) {

	include($includeFile);
	
} else die404();
