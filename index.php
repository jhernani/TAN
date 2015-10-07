<?php
define("TITLE_EXTENSION"	,"SME PAYROLL");
define("COMPANY_NAME"   	,"SOUTHGATE EXPRESS MARKETING INC.");
define("DEFAULT_PAGE"   	,"time"	);
define("DEFAULT_DIRECTORY"  ,"pages"	);
define("DATE_FORMAT"  		,"Y-m-d H:i:s");

define("DB_HOST"  			,"localhost");
define("DB_USERNAME"  		,"root"		);
define("DB_PASSWORD"  		,""	);
define("DB_NAME"  			,"mypayroll");
	
session_start();
ob_start();
date_default_timezone_set('Etc/GMT-8');

require_once('theme/common.template.php');
require_once('config/pdo.php');
require_once('config/functions.php');

$pdo = new oopCrud;
$obj = new _functions;

require_once('config/system.config.php');


