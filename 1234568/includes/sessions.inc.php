<?
$ip = $REMOTE_ADDR;
$browser = $HTTP_USER_AGENT;
$referer = $HTTP_REFERER;

$DBH = "";
$sess_life = get_cfg_var("session.gc_maxlifetime");

function sess_open($save_path, $session_name) {
	global $DB, $DBH;

	if (! $DBH = mysql_pconnect($DB[host], $DB[user], $DB[pass])) {
		echo "<li>Can't connect to $DBHost as $DBUser";
		echo "<li>MySQL Error: ", mysql_error();
		die;
	}

	if (! mysql_select_db($DB[dbName], $DBH)) {
		echo "<li>Unable to select database $DBName";
		die;
	}

	return true;
}

function sess_close() {
	return true;
}

function sess_read($key) {
	global $DBH, $sess_life;

	$query = "SELECT sess_value FROM sessions WHERE sess_key = '$key' AND sess_expiration > " . time();
	$result = mysql_query($query, $DBH);

	if (list($value) = mysql_fetch_row($result)) {
		return $value;
	}

	return false;
}

function sess_write($key, $val) {
	global $DBH, $sess_life, $user, $browser, $ip, $referer;

	$timeOfVisit = time();
	$expiration = time() + $sess_life;
	$value = addslashes($val);
	
	if ($user == null) $user = 'Guest';

	$query = "INSERT INTO sessions VALUES ('$key', '$expiration', '$value', '$user', '$browser', '$ip', '$referer', '$timeOfVisit')";
	$result = mysql_query($query, $DBH);
	
	if ($result) {
	$query1 = mysql_query("SELECT value FROM config WHERE id = 14");
	$result1 = mysql_fetch_array($query1);
	$hits = 1 + "$result1[value]";
    $query2 = "UPDATE config SET value = '$hits' WHERE id = 14";
    $result2 = mysql_query($query2);
    }

	if (! $result) {
		$query = "UPDATE sessions SET sess_expiration = '$expiration', sess_value = '$value', user='$user', timeOfVisit = '$timeOfVisit' WHERE sess_key = '$key' AND sess_expiration > " . time();
		$result = mysql_query($query, $DBH);
	}

	return $result;
}

function sess_destroy($key) {
	global $DBH;

	$query = "DELETE FROM sessions WHERE sess_key = '$key'";
	$result = mysql_query($query, $DBH);

	return $result;
}

function sess_gc($maxlifetime) {
	global $DBH;

	$query = "DELETE FROM sessions WHERE sess_expiration < " . time();
	$result = mysql_query($query, $DBH);

	return mysql_affected_rows($DBH);
}

session_set_save_handler(
	"sess_open",
	"sess_close",
	"sess_read",
	"sess_write",
	"sess_destroy",
	"sess_gc");
?>
