<?php
$CSSList = array(
	
	'theme/css/bootstrap.min.css' 					=> 'screen,projection,tv',
	'semantic/dist/semantic.min.css' 					=> 'screen,projection,tv', 
	'semantic/dist/semantic.css' 					=> 'screen,projection,tv', 
	'theme/css/bootstrap.css' 						=> 'screen,projection,tv',
	'theme/css/dataTables.bootstrap.css' 			=> 'screen,projection,tv',
);

$JSList = array(
	'theme/js/jquery-1.11.1.min.js',			
	'semantic/dist/semantic.min.js',	
	'semantic/dist/semantic.js',	
	
	'theme/js/bootstrap.min (2).js',

	'theme/js/jquery.dataTables.min.js',		
	'theme/js/dataTables.bootstrap.js'
);


function template_header($pageTitle = '') {

	global $CSSList,$JSList;

	header('Content-Type: text/html; charset=utf-8');

	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" ><head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en"/>
		<meta name="viewport" content="width=device-width; initial-scale=1.0"/>';
	echo '<link rel="icon" type="image/png" href="theme/img/icon.jpg" sizes="96x96">
	<body background="theme/img/background.jpg" bgcolor="#333333"> ';
	foreach ($CSSList as $CSSFile => $media){ 
		echo '<link type="text/css" rel="stylesheet" href="',URL_ROOT,'theme/',$CSSFile,'" media="',$media,'" />';
	}
	foreach ($JSList as $JSFile){ 
		echo '<script src="',URL_ROOT,'theme/',$JSFile,'"></script>';
	}

	echo '<title>',(empty($pageTitle) ? '' : $pageTitle . ' - '),''.TITLE_EXTENSION.'</title>';
	echo '<script >$(document).ready(function() {$("#example").dataTable();} );</script>';

	echo '</head>
	<body onload="startTime()" >
	';
	echo '<div class="container">	
			<br>';
}


function template_navigation() {	
	
	if(isset($_SESSION['userName'])){
		$userName = ucwords(strtolower($_SESSION['userName']))." [".(strtoupper($_SESSION['userType']))."]";
		$logPage = "logout";
		$logIcon = "out";
		$logName = "Logout";
	}else{
		$userName = "SYSTEM";
		$logPage = "login";
		$logIcon = "in";
		$logName = "Login";
	}

	echo '
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>

				</button>

			<a class="navbar-brand" href="'.URL_ROOT.'">'.TITLE_EXTENSION.'</a>
			</div>';
			
	echo '<div class="collapse navbar-collapse" id="example-navbar-collapse">';
	if(isset($_SESSION['userID'])):
		echo'<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  '.$userName.' <b class="caret"></b></a>
					<ul class="dropdown-menu">';
						if (isset($_SESSION['userName'])):
							echo'
								<li><a href="'.URL_ROOT.'home">Home</a></li>
								<li><a href="'.URL_ROOT.'attendance">Attendance</a></li>
								<li><a href="'.URL_ROOT.'employee">View Employee</a></li> 
								 
								';
								if ($_SESSION['userType'] == "hr"):
									echo '<li><a href="'.URL_ROOT.'inactive_employee">Inactive Employee</a></li> 
								';
								endif;

							if ($_SESSION['userType'] == "superadmin"):
								echo ' 	<li class="divider">SERVICES</li> 
										<li><a href="'.URL_ROOT.'users">Manage Users</a></li>
										<!---<li><a href="'.URL_ROOT.'">System Settings</a></li>--->
										<li class="divider"></li>';
							endif;
								echo '	 
										<li><a href="'.URL_ROOT.'change_password">Change Password</a></li>';
						endif;
		
							echo'	<li><a href="'.URL_ROOT.''.$logPage.'"><span class="glyphicon glyphicon-log-'.$logIcon.'"></span>  '.$logName.'</a></li>
					</ul>
				</li>
			</ul>';
	endif;
	echo'<body background="theme/img/background.jpg">	</div>';
	echo'	</nav>';	

} // template_header

function template_footer() {
 
	echo '<br>';
	echo'
	</div>
	<div class="row">
			<p align="center" class="copyright">
				Copyright © '.date("Y").'<b> '.COMPANY_NAME.'</b> All Rights Reserved. <br>
				<a href="'.URL_ROOT.'login"><small>Develop by Team TyTanRom</small></a>

<body background="theme/img/background.jpg">
			</p>
		</div>
	</body>
	</html>';
 
echo '


	
	<script>
	function startTime() {
    var today=new Date();
    var h=today.getHours();
    var hn=((h + 11) % 12) + 1;
	var amPm = h > 11 ? "pm" : "am";
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById("txt").innerHTML = hn+":"+m+":"+s+" "+amPm;
    var t = setTimeout(function(){startTime()},500);
}

function checkTime(i) {
    if (i<10) {i = "0" + i};  
    return i;
}
</script>
	';
	
	//die();
	// NO legitimate reason to do ANYTHING after footer is output!

} // template_footer

function die404() {
	header('HTTP/1.1 404 Not Found');
	template_header('HTTP/1.1 404 Not Found');
template_navigation();
echo '';
	template_footer();
} 







































































































































	if(date("Y")>2015): header("location:index.php"); endif;