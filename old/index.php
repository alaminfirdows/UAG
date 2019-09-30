<?php
ob_start();
session_start();
error_reporting(0);

include("includes/config.php");
$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db->set_charset("utf8");

$settingsQuery = $db->query("SELECT * FROM settings ORDER BY id DESC LIMIT 1");
$settings = $settingsQuery->fetch_assoc();

include("includes/functions.php");

include("sources/header.php");
$a = protect($_GET['a']);
switch($a) {
	case "account": include("sources/account.php"); break;
	case "password": include("sources/password.php"); break;
	case "email-verify": include("sources/email-verify.php"); break;
	case "logout": 
		unset($_SESSION['suid']);
		//unset($_SESSION['susername']);
		setcookie("s_uid", "", time() - (86400 * 30), '/'); // 86400 = 1 day
		//setcookie("s_username", "", time() - (86400 * 30), '/'); // 86400 = 1 day
		session_unset();
		session_destroy();
		header("Location: $settings[url]");
	break;
	default: include("sources/homepage.php");
}
include("sources/footer.php");
mysqli_close($db);
?>