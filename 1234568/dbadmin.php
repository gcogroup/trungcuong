<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Database Manager</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='100%'>
				<tr>
					<td>
					<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='100%'>
					<tr>
						<td width="100%" align="right">
						<a href="main.php?act=dbadmin&task=dbBackup">Backup DB</a> :: 
						<a href="main.php?act=dbadmin&task=dbRestore">Restore DB</a> :: 
						<a href="main.php?act=dbadmin&task=xquery">Query</a> &nbsp;
						</td>
					</tr>
					</table>
					
					</td>
				</tr>
	
	
	<tr>
		<td align="center">
			<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='100%'>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='90%'>
							<tr>
								<td>					
<?
function tthGetParam( &$arr, $name, $def=null, $mask=0 ) {
	$return = null;
	if (isset( $arr[$name] )) {
	    if (is_string( $arr[$name] )) {
			$arr[$name] = trim( $arr[$name] );
			$arr[$name] = strip_tags( $arr[$name] );
			if (!get_magic_quotes_gpc()) {
				$arr[$name] = addslashes( $arr[$name] );
			}
		}
		return $arr[$name];
	} else {
		return $def;
	}
}
function mosObjectToArray($p_obj)
{
	$retarray = null;
	if(is_object($p_obj))
	{
		$retarray = array();
		foreach (get_object_vars($p_obj) as $k => $v)
		{
			if(is_object($v))
			$retarray[$k] = mosObjectToArray($v);
			else
			$retarray[$k] = $v;
		}
	}
	return $retarray;
}

require_once( "./classes/database.php" );
require ("./dbadmin.html.php");

require_once( "./classes/pclzip.lib.php" );

$database=new database($config['host'],$config['username'],$config['password'],$config['dbname'],'');

$task	= tthGetParam( $_REQUEST, "task", "" );
$file	= tthGetParam( $_POST, "file", null );
$upfile	= tthGetParam($_FILES,"upfile",null);
$local_backup_path=$CONFIG['root_path']."backups";
$mosConfig_db=$config['dbname'];

switch ($task) {
	case "dbBackup":
		dbBackup( $option);
		break;

	case "doBackup":
		doBackup( $_POST['tables'],$_POST['OutType'],$_POST['OutDest'],$_POST['toBackUp'],$_SERVER['HTTP_USER_AGENT'], $local_backup_path);
		break;

	case "dbRestore":
		dbRestore( $local_backup_path);
		break;

	case "doRestore":
		doRestore( $file,$upfile,$local_backup_path);
		break;

	case "xquery":
		xquery( $option );
		break;
}


function dbBackup( $p_option ) {
	global $database;

	$database->setQuery( "SHOW tables" );
	
	$tables = $database->loadResultArray();
	$tables2 = array( mosHTML::makeOption( 'all', 'T&#7845;t c&#7843; c&#225;c b&#7843;ng' ) );
	foreach ($tables as $table) {
		$tables2[] = mosHTML::makeOption( $table );
	}

	$tablelist = mosHTML::selectList( $tables2, 'tables[]', 'class="inputbox" size="5" multiple="multiple"',
	'value', 'text', 'all' );

	HTML_dbadmin::backupIntro( $tablelist, $p_option );
}

function doBackup( $tables, $OutType, $OutDest, $toBackUp, $UserAgent, $local_backup_path) {
	global $database;
	global $mosConfig_db, $mosConfig_sitename, $version,$option,$task;

	if (!$tables[0])
	{
		HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i ! Kh&#244;ng x&#225;c &#273;&#7883;nh b&#7843;ng n&#224;o, h&#227;y x&#225;c &#273;&#7883;nh &#237;t nh&#7845;t m&#7897;t b&#7843;ng v&#224; th&#7917; l&#7841;i.</p>", "DB Admin",$option,$task);
		return;
	}

	/* Need to know what browser the user has to accomodate nonstandard headers */

	if (ereg('Opera(/| )([0-9].[0-9]{1,2})', $UserAgent)) {
		$UserBrowser = "Opera";
	}
	elseif (ereg('MSIE ([0-9].[0-9]{1,2})', $UserAgent)) {
		$UserBrowser = "IE";
	} else {
		$UserBrowser = '';
	}

	/* Determine the mime type and file extension for the output file */

	if ($OutType == "bzip") {
		$filename = $mosConfig_db . "_" . date("jmYHis") . ".bz2";
		$mime_type = 'application/x-bzip';
	} elseif ($OutType == "gzip") {
		$filename = $mosConfig_db . "_" . date("jmYHis") . ".sql.gz";
		$mime_type = 'application/x-gzip';
	} elseif ($OutType == "zip") {
		$filename = $mosConfig_db . "_" . date("jmYHis") . ".zip";
		$mime_type = 'application/x-zip';
	} elseif ($OutType == "html") {
		$filename = $mosConfig_db . "_" . date("jmYHis") . ".html";
		$mime_type = ($UserBrowser == 'IE' || $UserBrowser == 'Opera') ? 'application/octetstream' : 'application/octet-stream';
	} else {
		$filename = $mosConfig_db . "_" . date("jmYHis") . ".sql";
		$mime_type = ($UserBrowser == 'IE' || $UserBrowser == 'Opera') ? 'application/octetstream' : 'application/octet-stream';
	};

	/* Store all the tables we want to back-up in variable $tables[] */

	if ($tables[0] == "all") {
		array_pop($tables);
		$database->setQuery("SHOW tables");
		$database->query();
		$tables = array_merge($tables, $database->loadResultArray());
	}

	/* Store the "Create Tables" SQL in variable $CreateTable[$tblval] */
	if ($toBackUp!="data")
	{
		foreach ($tables as $tblval)
		{
			$database->setQuery("SHOW CREATE table $tblval");
			$database->query();
			$CreateTable[$tblval] = $database->loadResultArray(1);
		}
	}

	/* Store all the FIELD TYPES being backed-up (text fields need to be delimited) in variable $FieldType*/
	if ($toBackUp!="structure")
	{
		foreach ($tables as $tblval)
		{
			$database->setQuery("SHOW FIELDS FROM $tblval");
			$database->query();
			$fields = $database->loadObjectList();
			foreach($fields as $field)
			{
				$FieldType[$tblval][$field->Field] = preg_replace("/[(0-9)]/",'', $field->Type);
			}
		}
	}

	/* Build the fancy header on the dump file */
	$OutBuffer = "";
	if ($OutType == 'html') {
	} else {
		$OutBuffer .= "# TTH CMS MySQL-Dump\n";
		$OutBuffer .= "# Generation Time: " . date("M j, Y \a\\t H:i") . "\n";
		$OutBuffer .= "# Server version: " . $database->getVersion() . "\n";
		$OutBuffer .= "# PHP Version: " . phpversion() . "\n";
		$OutBuffer .= "# Database : `" . $mosConfig_db . "`\n# --------------------------------------------------------\n";
	}

	/* Okay, here's the meat & potatoes */
	foreach ($tables as $tblval) {
		if ($toBackUp != "data") {
			if ($OutType == 'html') {
			} else {
				$OutBuffer .= "#\n# Table structure for table `$tblval`\n";
				$OutBuffer .= "#\nDROP table IF EXISTS $tblval;\n";
				$OutBuffer .= $CreateTable[$tblval][0].";\r\n";
			}
		}
		if ($toBackUp != "structure") {
			if ($OutType == 'html') {
				$OutBuffer .= "<div align=\"left\">";
				$OutBuffer .= "<table cellspacing=\"0\" cellpadding=\"2\" border=\"1\">";
				$database->setQuery("SELECT * FROM $tblval");
				$rows = $database->loadObjectList();

				$OutBuffer .= "<tr><th colspan=\"".count( @array_keys( @$rows[0] ) )."\">`$tblval`</th></tr>";
				if (count( $rows )) {
					$OutBuffer .= "<tr>";
					foreach($rows[0] as $key => $value) {
						$OutBuffer .= "<th>$key</th>";
					}
					$OutBuffer .= "</tr>";
				}

				foreach($rows as $row)
				{
					$OutBuffer .= "<tr>";
					$arr = mosObjectToArray($row);
					foreach($arr as $key => $value)
					{
						$value = addslashes( $value );
						$value = str_replace( "\n", '\r\n', $value );
						$value = str_replace( "\r", '', $value );

						$value = htmlspecialchars( $value );

						if (preg_match ("/\b" . $FieldType[$tblval][$key] . "\b/i", "DATE TIME DATETIME CHAR VARCHAR TEXT TINYTEXT MEDIUMTEXT LONGTEXT BLOB TINYBLOB MEDIUMBLOB LONGBLOB ENUM SET"))
						{
							$OutBuffer .= "<td>'$value'</td>";
						}
						else
						{
							$OutBuffer .= "<td>$value</td>";
						}
					}
					$OutBuffer .= "</tr>";
				}
				$OutBuffer .= "</table></div><br />";
			} else {
				$OutBuffer .= "#\n# Dumping data for table `$tblval`\n#\n";
				$database->setQuery("SELECT * FROM $tblval");
				$rows = $database->loadObjectList();
				foreach($rows as $row)
				{
					$InsertDump = "INSERT INTO $tblval VALUES (";
					$arr = mosObjectToArray($row);
					foreach($arr as $key => $value)
					{
						$value = addslashes( $value );
						$value = str_replace( "\n", '\r\n', $value );
						$value = str_replace( "\r", '', $value );
						if (preg_match ("/\b" . $FieldType[$tblval][$key] . "\b/i", "DATE TIME DATETIME CHAR VARCHAR TEXT TINYTEXT MEDIUMTEXT LONGTEXT BLOB TINYBLOB MEDIUMBLOB LONGBLOB ENUM SET"))
						{
							$InsertDump .= "'$value',";
						}
						else
						{
							$InsertDump .= "$value,";
						}
					}
					$OutBuffer .= rtrim($InsertDump,',') . ");\n";
				}
			}
		}
	}

	/* Send the HTML headers */
	if ($OutDest == "remote") {
		// dump anything in the buffer
		@ob_end_clean();
		ob_start();
		header('Content-Type: ' . $mime_type);
		header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');

		if ($UserBrowser == 'IE') {
			header('Content-Disposition: inline; filename="' . $filename . '"');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
		} else {
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Pragma: no-cache');
		}
	}

	if ($OutDest == "screen" || $OutType == "html" ) {
		if ($OutType == "html") {
				echo $OutBuffer;
		} else {
			$OutBuffer = str_replace("<","&lt;",$OutBuffer);
			$OutBuffer = str_replace(">","&gt;",$OutBuffer);
			?>
			<form>
				<textarea rows="20" cols="80" name="sqldump"  style="background-color:#e0e0e0"><?php echo $OutBuffer;?></textarea>
				<br />
				<input type="button" onclick="javascript:this.form.sqldump.focus();this.form.sqldump.select();" class="button" value="Ch&#7885;n T&#7845;t c&#7843;" />
			</form>
			<?php
		}
		exit();
	}
			
	switch ($OutType) {
		case "sql" :
			if ($OutDest == "local") {
				$fp = fopen("$local_backup_path/$filename", "w");
				if (!$fp) {
					HTML_dbadmin::showDbAdminMessage("Backup kh&#244;ng th&#224;nh c&#244;ng!!<br />File $local_backup_path/$filename kh&#244;ng ghi &#273;&#432;&#7907;c<br />H&#227;y li&#234;n h&#7879; v&#7899;i admin/webmaster!</p>","DB Admin",$option,$task);
					return;
				} else {
					fwrite($fp, $OutBuffer);
					fclose($fp);
					HTML_dbadmin::showDbAdminMessage("Backup th&#224;nh c&#244;ng! File backup &#273;&#432;&#7907;c l&#432;u tr&#234;n server :<br />$local_backup_path/$filename</p>","DB Admin",$option,$task);
					return;
				}
			} else {
				echo $OutBuffer;
				ob_end_flush();
				ob_start();
				// do no more
				exit();
			}
			break;
		case "bzip" :
			if (function_exists('bzcompress')) {
				if ($OutDest == "local") {
					$fp = fopen("$local_backup_path/$filename", "wb");
					if (!$fp) {
						echo "<p align=\"center\"  class=\"error\">Backup kh&#244;ng th&#224;nh c&#244;ng!!<br />File $local_backup_path/$filename kh&#244;ng ghi &#273;&#432;&#7907;c<br />H&#227;y li&#234;n h&#7879; v&#7899;i admin/webmaster!</p>";
					} else {
						fwrite($fp, bzcompress($OutBuffer));
						fclose($fp);
						HTML_dbadmin::showDbAdminMessage("Backup th&#224;nh c&#244;ng! File &#273;&#432;&#7907;c l&#432;u tr&#234;n server :<br />$local_backup_path/$filename</p>","DB Admin", $option,$task);
						return;
					}
				} else {
					echo bzcompress($OutBuffer);
					ob_end_flush();
					ob_start();
					// do no more
					exit();
				}
			} else {
				echo $OutBuffer;
			}
			break;
		case "gzip" :
			if (function_exists('gzencode')) {
				if ($OutDest == "local") {
					$fp = gzopen("$local_backup_path/$filename", "wb");
					if (!$fp) {
						HTML_dbadmin::showDbAdminMessage("Backup kh&#244;ng th&#224;nh c&#244;ng!!<br />File $local_backup_path/$filename kh&#244;ng ghi &#273;&#432;&#7907;c<br />H&#227;y li&#234;n h&#7879; v&#7899;i admin/webmaster!</p>","DB Admin",$option,$task);
						return;
					} else {
						gzwrite($fp,$OutBuffer);
						gzclose($fp);
						HTML_dbadmin::showDbAdminMessage("Backup th&#224;nh c&#244;ng! File &#273;&#432;&#7907;c l&#432;u tr&#234;n server :<br />$local_backup_path/$filename</p>","DB Admin",$option,$task);
						return;
					}
				} else {
					echo gzencode($OutBuffer);
					ob_end_flush();
					ob_start();
					// do no more
					exit();
				}
			} else {
				echo $OutBuffer;
			}
			break;
		case "zip" :
			if (function_exists('gzcompress')) {
				include "classes/zip.lib.php";
				$zipfile = new zipfile();
				$zipfile -> addFile($OutBuffer, $filename . ".sql");
				}
			switch ($OutDest) {
				case "local" :
					$fp = fopen("$local_backup_path/$filename", "wb");
					if (!$fp) {
						HTML_dbadmin::showDbAdminMessage("Backup kh&#244;ng th&#224;nh c&#244;ng!!<br />File $local_backup_path/$filename kh&#244;ng ghi &#273;&#432;&#7907;c<br />H&#227;y li&#234;n h&#7879; v&#7899;i admin/webmaster!</p>","DB Admin",$option,$task);
						return;
					} else {
						fwrite($fp, $zipfile->file());
						fclose($fp);
						HTML_dbadmin::showDbAdminMessage("Backup th&#224;nh c&#244;ng! File &#273;&#432;&#7907;c l&#432;u tr&#234;n server :<br />$local_backup_path/$filename</p>","DB Admin",$option,$task);
						return;
					}
					break;
				case "remote" :
					echo $zipfile->file();
					ob_end_flush();
					ob_start();
					// do no more
					exit();
					break;
				default :
					echo $OutBuffer;
					break;
			}
			break;
	}
}

function dbRestore( $local_backup_path) {
	global $database;

	$uploads_okay = (function_exists('ini_get')) ? ((strtolower(ini_get('file_uploads')) == 'on' || ini_get('file_uploads') == 1) && intval(ini_get('upload_max_filesize'))) : (intval(@get_cfg_var('upload_max_filesize')));
	if ($uploads_okay)
	{
		$enctype = " enctype=\"multipart/form-data\"";
	}
	else
	{
		$enctype = '';
	}

	HTML_dbadmin::restoreIntro($enctype,$uploads_okay,$local_backup_path);
}

function doRestore( $file, $uploadedFile, $local_backup_path ) {
	global $database, $option,$task,$mosConfig_absolute_path,$CONFIG;

	if(!is_null($uploadedFile) && is_array($uploadedFile) && $uploadedFile["name"] != "")
	{
		$base_Dir = $CONFIG['root_path'] . $CONFIG['upload_media_path'];
		if (!move_uploaded_file($uploadedFile['tmp_name'], $base_Dir . $uploadedFile['name']))
		{
			HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Kh&#244;ng th&#7875; chuy&#7875;n file.</p>","DB Admin - Restore",$option,$task);
			return false;
		}

	}
	if ((!$file) && (!$uploadedFile['name']))
	{
		HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Kh&#244;ng x&#225;c &#273;&#7883;nh file restore.</p>","DB Admin - Restore",$option,$task);
		return;
	}

	if ($file)
	{
		if (isset($local_backup_path))
		{
			$infile		= $local_backup_path . "/" . $file;
			$upfileFull	= $file;
			$destfile = $CONFIG['root_path'] . $CONFIG['upload_media_path']. "$file";

			// If it's a zip file, we copy it so we can extract it
			if(eregi(".\.zip$",$upfileFull))
			{
				copy($infile,$destfile);
			}
		}
		else
		{
			HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! &#272;&#432;&#7901;ng d&#7851;n th&#432; m&#7909;c backup ch&#432;a &#273;&#7863;t.</p>","DB Admin - Restore",$option,$task);
			return;
		}
	}
	else
	{

		$upfileFull	= $uploadedFile['name'];
		$infile	= $base_Dir . $uploadedFile['name']; 
		
	}

	if (!eregi(".\.sql$",$upfileFull) && !eregi(".\.bz2$",$upfileFull) && !eregi(".\.gz$",$upfileFull) && !eregi(".\.zip$",$upfileFull))
	{
		HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Ki&#7875;u file v&#224;o kh&#244;ng h&#7907;p l&#7879; ($upfileFull).<br />Ki&#7875;u cho ph&#233;p: *.sql, *.bz2, or *.gz </p>","DB Admin - Restore",$option,$task);
		return;
	}
	
	if (substr($upfileFull,-3)==".gz")
	{
		if (function_exists('gzinflate'))
		{
			$fp=fopen("$infile","rb");
			if ((!$fp) || filesize("$infile")==0)
			{
				HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Kh&#244;ng m&#7903; &#273;&#432;&#7907;c ($infile) khi &#273;&#7885;c ho&#7863;c file r&#7895;ng.</p>","DB Admin - Restore",$option,$task);
				return;
			}
			else
			{
				$content = fread($fp,filesize("$infile"));
				fclose($fp);
				$content = gzinflate(substr($content,10));
			}
		}
		else
		{
			HTML_dbadmin::showDbAdminMessage("C&#245; l&#7895;i! Kh&#244;ng th&#7875; th&#7921;c hi&#7879;n gzip file do h&#224;m gzinflate kh&#244;ng &#273;&#432;&#7907;c d&#249;ng.</p>","DB Admin - Restore",$option,$task);
			return;
		}
	}
	elseif (substr($upfileFull,-4)==".bz2")
	{
		if (function_exists('bzdecompress'))
		{
			$fp=fopen("$infile","rb");
			if ((!$fp) || filesize("$infile")==0)
			{
				HTML_dbadmin::showDbAdminMessage("C&#245; l&#7895;i! Kh&#244;ng m&#7903; &#273;&#432;&#7907;c file ($infile) khi &#273;&#7885;c ho&#7863;c file r&#7895;ng.</p>","DB Admin - Restore",$option,$task);
				return;
			}
			else
			{
				$content=fread($fp,filesize("$infile"));
				fclose($fp);
				$content=bzdecompress($content);
			}
		}
		else
		{
			HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Kh&#244;ng ti&#7871;n h&#224;nh bzip file &#273;&#432;p&#432;ck do h&#224;m bzdecompress kh&#244;ng d&#249;ng &#273;&#432;&#7907;c.</p>","DB Admin - Restore",$option,$task);
			return;
		}
	}
	elseif (substr($upfileFull,-4)==".sql")
	{
echo "trying to access $infile";
		$fp=fopen("$infile","r");
		if ((!$fp) || filesize("$infile")==0)
		{
			HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Kh&#244;ng m&#7903; &#273;&#432;&#7907;c ($infile) khi &#273;&#7885;c ho&#7863;c file r&#7895;ng.</p>","DB Admin - Restore",$option,$task);
			return;
		}
		else
		{
			$content=fread($fp,filesize("$infile"));
			fclose($fp);
		}
	}
	elseif (substr($upfileFull,-4)==".zip")
	{
		// unzip the file
		$base_Dir		= $CONFIG['root_path'] . $CONFIG['upload_media_path'];
		$archivename	= $base_Dir . $upfileFull;
		$tmpdir			= uniqid("dbrestore_");

		$isWindows = (substr(PHP_OS, 0, 3) == 'WIN' && stristr ( $_SERVER["SERVER_SOFTWARE"], "microsoft"));
		if($isWindows)
		{
			$extractdir	= str_replace('/','\\',$base_Dir . "$tmpdir/");
			$archivename = str_replace('/','\\',$archivename);
		}
		else
		{
			$extractdir	= str_replace('\\','/',$base_Dir . "$tmpdir/");
			$archivename = str_replace('\\','/',$archivename);
		}

		$zipfile	= new PclZip($archivename);
		if($isWindows)
			define('OS_WINDOWS',1);

		$ret = $zipfile->extract(PCLZIP_OPT_PATH,$extractdir);
		if($ret == 0)
		{
			HTML_dbadmin::showDbAdminMessage("L&#7895;i '".$zipfile->errorName(true)."'","DB Admin - Restore",$option,$task);
			return false;
		}
		$filesinzip = $zipfile->listContent();
		if(is_array($filesinzip) && count($filesinzip) > 0)
		{
			$fp			= fopen($extractdir . $filesinzip[0]["filename"],"r");
			$content	= fread($fp,filesize($extractdir . $filesinzip[0]["filename"]));
			fclose($fp);

			// Cleanup
			deldir($extractdir);
			@unlink($CONFIG['root_path'] . $CONFIG['upload_media_path'] . "$file");

		}
		else
		{
			HTML_dbadmin::showDbAdminMessage("Kh&#244;ng t&#236;m th&#7845;y file SQL $upfileFull","DB Admin - Restore",$option,$task);
			return;
		}
	}
	else
	{
		HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i! Kh&#244;ng nh&#7853;n d&#7841;ng &#273;&#432;&#7907;c ki&#7875;u file. ($infile : $upfileFull)</p>","DB Admin - Restore",$option,$task);
		return;
	}


	$decodedIn	= explode(chr(10),$content);
	$decodedOut	= "";
	$queries	= 0;

	foreach ($decodedIn as $rawdata)
	{
		$rawdata=trim($rawdata);
		if (($rawdata!="") && ($rawdata{0}!="#"))
		{
			$decodedOut .= $rawdata;
			if (substr($rawdata,-1)==";")
			{
				if  ((substr($rawdata,-2)==");") || (strtoupper(substr($decodedOut,0,6))!="INSERT"))
				{
					if (eregi('^(DROP|CREATE)[[:space:]]+(IF EXISTS[[:space:]]+)?(DATABASE)[[:space:]]+(.+)', $decodedOut))
					{
						HTML_dbadmin::showDbAdminMessage("C&#243; l&#7895;i ! File &#273;&#7847;u v&#224;o ch&#7913;a l&#7879;nh DROP ho&#7863;c CREATE DATABASE. H&#227;y x&#243;a c&#225;c l&#7879;nh &#273;&#243; tr&#432;&#7899;c khi restore v&#7899;i file n&#224;y.</p>","DB Admin - Restore",$option,$task);
						return;
					}
					$database->setQuery($decodedOut);
					$database->query();
					$decodedOut="";
					$queries++;
				}
			}
		}
	}
	HTML_dbadmin::showDbAdminMessage("Th&#224;nh c&#244;ng! Database &#273;&#432;&#7907;c restore t&#7915; d&#7919; li&#7879;u backup b&#7841;n &#273;&#227; ch&#7881; &#273;&#7883;nh (th&#7921;c hi&#7879;n $queries l&#7879;nh SQL).</p>","DB Admin - Restore",$option,$task);
	return;
}

function deldir($dir)
{
	$current_dir = opendir($dir);
	while($entryname = readdir($current_dir))
	{
    	if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!=".."))
    	{
			deldir("${dir}/${entryname}");
		}
		elseif($entryname != "." and $entryname!="..")
		{
			unlink("${dir}/${entryname}");
		}
	}
	closedir($current_dir);
	rmdir($dir);
}

function xquery( $option ) {
	global $database;

	$rows = null;
	$msg = '';
	$sql = trim( tthGetParam( $_POST, 'sql', '' ) );
	$batch = intval( tthGetParam( $_POST, 'batch', 0 ) );

	$allowed = array( "CREATE", "SELECT", "INSERT", "UPDATE", "DROP", "ALTER" );
	$words = preg_split( "/\s+/", $sql );
	$cmd = strtoupper( $words[0] );

	if ($sql == "") {
		$msg = "Query r&#7895;ng.";
	} else if (!in_array( $cmd, $allowed)) {
		$msg = "B&#7841;n kh&#244;ng &#273;&#7911; quy&#7873;n &#273;&#7875; th&#7921;c hi&#7879;n query <strong>$cmd</strong>";
	} else {
		$database->setQuery( $sql );
		if ($batch) {
			// run batch, don't abort on error
			$r = $database->query_batch( false );
		} else {
			$r = $database->query();
		}
		if ($r) {
			$msg = "Query &#273;&#432;&#7907;c thi h&#224;nh th&#224;nh c&#244;ng.";
			$msg .= "<br />T&#225;c &#273;&#7897;ng " . intval( @$database->getNumRows() ). " h&#224;ng.";

			if ($cmd == "SELECT") {
				$rows = $database->loadObjectList();
			}
		} else {
			$msg = "Query thi h&#224;nh kh&#244;ng th&#224;nh c&#244;ng.  M&#227; l&#7895;i: " . $database->getErrorNum();
			$msg .= "<br />" . $database->getErrorMsg() . "";
		}
	}

	HTML_dbadmin::xquery( $sql, $msg, $rows, $option );
}
?>
								<br><br>
								</td>
							</tr>
						</table>		
					</td>
				</tr>
			</table>		
		</td>
	</tr>
</table>