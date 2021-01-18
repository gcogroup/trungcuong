<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
class HTML_dbadmin
{
	function backupIntro( $tablelist, $p_option )
	{
	?>
		<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr>
			<td width="100%" class="sectionname"><font color="#3366FF"><b>Database Backup</b></font></td>
		</tr>
		</table>
		<form action="main2.php?act=dbadmin&task=doBackup" method="post" target="_blank">
		<table border="0" align="center" cellspacing="0" cellpadding="2" width="100%" class="adminform">
		</tr>
		<tr>
			<td>Backup c&#225;c b&#7843;ng c&#7911;a DB t&#7899;i:<br /> <br />
				<input class="noborder" type="radio" name="OutDest" value="screen" />
					Hi&#7875;n th&#7883; k&#7871;t qu&#7843; tr&#234;n trang<br /> 
				<input class="noborder" type="radio" name="OutDest" value="remote" checked="checked" />
					Download d&#7841;ng file v&#7873; m&#225;y<br /> 
				<input class="noborder" type="radio" name="OutDest" value="local" />
					L&#432;u file trong th&#432; m&#7909;c backup tr&#234;n server
			</td>
			<td>&nbsp;</td>
			<td>&#272;&#7883;nh d&#7841;ng file:<br /> <br />
			<?php if (function_exists('gzcompress'))
			{
			?>
			<input class="noborder" type="radio" name="OutType" value="zip" />File Zip<br />
			<?php
			}
			if (function_exists('bzcompress'))
			{
			?>
			<input class="noborder" type="radio" name="OutType" value="bzip" />File BZip<br />
			<?php
			}
			if (function_exists('gzencode'))
			{
			?>
			<input class="noborder" type="radio" name="OutType" value="gzip" />File GZip<br />
			<?php
			}
			?>
			<input class="noborder" type="radio" name="OutType" value="sql" checked="checked" />File SQL (plain text)
			<br />
			<input class="noborder" type="radio" name="OutType" value="html" /> &#272;&#7883;nh d&#7841;ng HTML </td>
		</tr>
		<tr>
		<td> <p>D&#7841;ng backup:<br /><br />
			<input class="noborder" type="radio" name="toBackUp" value="data" />Ch&#7881; d&#7919; li&#7879;u<br />
			<input class="noborder" type="radio" name="toBackUp" value="structure" />Ch&#7881; c&#7845;u tr&#250;c<br />
			<input class="noborder" type="radio" name="toBackUp" value="both" checked="checked" />D&#7919; li&#7879;u v&#224; c&#7845;u tr&#250;c </p>
		</td>
		<td>&nbsp;</td>
		<td> <p align="left">Backup nh&#7919;ng b&#7843;ng n&#224;o?<br />
          N&#234;n ch&#7885;n T&#7845;t c&#7843; c&#225;c b&#7843;ng.</p>
		  <?php echo $tablelist; ?>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;<br /> <input type="submit" value="Backup c&#225;c b&#7843;ng &#273;&#432;&#7907;c ch&#7885;n" class="button" /></td>
		</tr>
	</table>
	</form>
	<?php
	}
	
	function restoreIntro($enctype,$uploads_okay,$local_backup_path)
	{
	?>
		<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr>
			<td width="100%" class="sectionname"><font color="#3366FF"><b>Database Restore</b></font></td>
		</tr>
		</table>
		<table border="0" align="center" cellspacing="0" cellpadding="2" width="100%" class="adminform">
		<form action="main.php?act=dbadmin&task=doRestore" method="post" <?php echo $enctype;?>>
		<tr>
			<th class="title" colspan="3">C&#225;c backup hi&#7879;n c&#243; tr&#234;n server</th>
		</tr>
		<?php
	if (isset($local_backup_path))
	{
		if ($handle = @opendir($local_backup_path))
		{
		?>
		<tr><td>&nbsp;</td><td><b>T&#234;n file backup</b></td><td><b>Ng&#224;y/Gi&#7901; t&#7841;o</b></td></tr>
		<?php
		while ($file = @readdir($handle))
		{
			if (is_file($local_backup_path . "/" . $file))
			{
				if (eregi(".\.sql$",$file) || eregi(".\.bz2$",$file) || eregi(".\.gz$",$file) || eregi(".\.zip$",$file))
				{
					echo "\t\t<tr><td align=\"center\"><input class=\"noborder\" type=\"radio\" name=\"file\" value=\"$file\" class=\"noborder\"></td><td>$file</td><td>" . date("m/d/y H:i:sa", filemtime($local_backup_path . "/" . $file)) . "</td></tr>\n";
				}
			}
		}
		}
		else
		{
			echo "\t\t<tr><td colspan=\"3\" class=\"error\">Th&#244;ng b&#225;o:<br />Hi&#7879;n kh&#244;ng c&#243; file backup n&#224;o tr&#234;n server : <br />" . $local_backup_path . "/" . $file . "</td></tr>\n";
		}
		@closedir($handle);
	}
	else
	{
		echo "\t\t<tr><td colspan=\"3\" class=\"error\">Th&#244;ng b&#225;o:<br />Ch&#432;a c&#7845;u h&#236;nh th&#432; m&#7909;c backup!</td></tr>\n";
	}
	if ($uploads_okay)
	{
		?>
		<tr>
			<td colspan="3"><br />Ho&#7863;c c&#243; th&#7875; restore t&#7915; file tr&#234;n m&#225;y local :</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><br /><input type="file" name="upfile" class="button"></td>
			<td>&nbsp;</td>
		</tr>
		<?php
	}
		?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;<br />
			<input type="submit" class="button" value="Th&#7921;c hi&#7879;n restore" />&nbsp;&nbsp; <input type="reset" class="button" value="L&#224;m l&#7841;i" /></td>
			<td>&nbsp;</td>
		</tr>
		</form>
	</table>
	<?php
	}
	function showDbAdminMessage($message,$title,$option,$task)
	{
		global $PHP_SELF;
		?>
			<table border="0" cellpadding="4" cellspacing="0" width="100%" class="adminlist">
		<tr>
			<th width="55%" class="title"><?php echo $title; ?></th>
		</tr>
		<tr>
			<td align="left"><b><?php echo $message; ?></td>
		</tr>
		</table>
		<?php
	}

	function xquery( $sql='', $msg='', $rows=null, $option ) {
?>
<form action="main.php?act=dbadmin" method="post" name="adminForm">
  <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%" class="sectionname"><font color="#3366FF"><b>Th&#7921;c thi Query</b></font></td> 
      <td nowrap="nowrap">&nbsp;</td>
    </tr>
  </table>
 <table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
	<tr>
		<td>SQL:</td>
	</tr>
	<tr>
		<td><textarea name="sql" rows="10" cols="80" class="inputbox"><?php echo $sql;?></textarea></td>
	</tr>
	<tr>
		<td>
			<input type="submit" value="Th&#7921;c thi Query" class="button" />
			<input type="button" value="X&#243;a Query" class="button" onclick="document.adminForm.sql.value=''" />
			<input class="noborder" type="checkbox" name="batch" value="1" /> Ch&#7871; &#273;&#7897; Batch
		</td>
	</tr>
<?php	if ($msg) { ?>
	<tr>
		<td><?php echo $msg;?></td>
	</tr>
<?php	} ?>
<?php	
		if (is_array( $rows ) && count( $rows ) > 0) {
			$n = count( $rows );
?>
	<tr>
		<td>
			<table cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th>#</th>
<?php		foreach($rows[0] as $key => $value) { ?>
					<th><?php echo $key;?></th>
<?php 		} ?>
				<tr>
<?php		for ($i=0; $i < $n; $i++) {
				echo "\n	<tr>";
				echo "\n		<td>$i</td>";
				foreach($rows[$i] as $key => $value) {
					echo "\n		<td>$value</td>";
				}
				echo "\n	</tr>";
			}
?>
			</table>
		</td>
	</tr>
<?php	} ?>
 </table>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="task" value="xquery" />
</form>
<?php
	}
}

/**
* Utility class for all HTML drawing classes
*/
class mosHTML {
	function makeOption( $value, $text='' ) {
		$obj = new stdClass;
		$obj->value = $value;
		$obj->text = $text ? $text : $value;
		return $obj;
	}
	/**
	* Generates an HTML select list
	* @param array An array of objects
	* @param string The value of the HTML name attribute
	* @param string Additional HTML attributes for the <select> tag
	* @param string The name of the object varible for the option value
	* @param string The name of the object varible for the option text
	* @param mixed The key that is selected
	* @returns string HTML for the select list
	*/
	function selectList( &$arr, $tag_name, $tag_attribs, $key, $text, $selected ) {
		reset( $arr );
		$html = "\n<select name=\"$tag_name\" $tag_attribs>";
		for ($i=0, $n=count( $arr ); $i < $n; $i++ ) {
			$k = $arr[$i]->$key;
			$t = $arr[$i]->$text;
			$id = @$arr[$i]->id;

			$extra = '';
			$extra .= $id ? " id=\"" . $arr[$i]->id . "\"" : '';
			if (is_array( $selected )) {
				foreach ($selected as $obj) {
					$k2 = $obj->$key;
					if ($k == $k2) {
						$extra .= " selected=\"selected\"";
						break;
					}
				}
			} else {
				$extra .= ($k == $selected ? " selected=\"selected\"" : '');
			}
			$html .= "\n\t<option value=\"".$k."\"$extra>" . $t . "</option>";
		}
		$html .= "\n</select>\n";
		return $html;
	}
	/**
	* Writes a select list of integers
	* @param int The start integer
	* @param int The end integer
	* @param int The increment
	* @param string The value of the HTML name attribute
	* @param string Additional HTML attributes for the <select> tag
	* @param mixed The key that is selected
	* @param string The printf format to be applied to the number
	* @returns string HTML for the select list
	*/
	function integerSelectList( $start, $end, $inc, $tag_name, $tag_attribs, $selected, $format="" ) {
		$start = intval( $start );
		$end = intval( $end );
		$inc = intval( $inc );
		$arr = array();
		for ($i=$start; $i <= $end; $i+=$inc) {
			$fi = $format ? sprintf( "$format", $i ) : "$i";
			$arr[] = mosHTML::makeOption( $fi, $fi );
		}

		return mosHTML::selectList( $arr, $tag_name, $tag_attribs, 'value', 'text', $selected );
	}
	/**
	* Writes a select list of month names based on Language settings
	* @param string The value of the HTML name attribute
	* @param string Additional HTML attributes for the <select> tag
	* @param mixed The key that is selected
	* @returns string HTML for the select list values
	*/
	function monthSelectList( $tag_name, $tag_attribs, $selected ) {
		$arr = array(
		mosHTML::makeOption( '01', _JAN ),
		mosHTML::makeOption( '02', _FEB ),
		mosHTML::makeOption( '03', _MAR ),
		mosHTML::makeOption( '04', _APR ),
		mosHTML::makeOption( '05', _MAY ),
		mosHTML::makeOption( '06', _JUN ),
		mosHTML::makeOption( '07', _JUL ),
		mosHTML::makeOption( '08', _AUG ),
		mosHTML::makeOption( '09', _SEP ),
		mosHTML::makeOption( '10', _OCT ),
		mosHTML::makeOption( '11', _NOV ),
		mosHTML::makeOption( '12', _DEC )
		);

		return mosHTML::selectList( $arr, $tag_name, $tag_attribs, 'value', 'text', $selected );
	}
	/**
	* Generates an HTML select list from a tree based query list
	* @param array Source array with id and parent fields
	* @param array The id of the current list item
	* @param array Target array.  May be an empty array.
	* @param array An array of objects
	* @param string The value of the HTML name attribute
	* @param string Additional HTML attributes for the <select> tag
	* @param string The name of the object varible for the option value
	* @param string The name of the object varible for the option text
	* @param mixed The key that is selected
	* @returns string HTML for the select list
	*/
	function treeSelectList( &$src_list, $src_id, $tgt_list, $tag_name, $tag_attribs, $key, $text, $selected ) {

		// establish the hierarchy of the menu
		$children = array();
		// first pass - collect children
		foreach ($src_list as $v ) {
			$pt = $v->parent;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push( $list, $v );
			$children[$pt] = $list;
		}
		// second pass - get an indent list of the items
		$ilist = mosTreeRecurse( 0, '', array(), $children );

		// assemble menu items to the array
		$this_treename = '';
		foreach ($ilist as $item) {
			if ($this_treename) {
				if ($item->id != $src_id && strpos( $item->treename, $this_treename ) === false) {
					$tgt_list[] = mosHTML::makeOption( $item->id, $item->treename );
				}
			} else {
				if ($item->id != $src_id) {
					$tgt_list[] = mosHTML::makeOption( $item->id, $item->treename );
				} else {
					$this_treename = "$item->treename/";
				}
			}
		}
		// build the html select list
		return mosHTML::selectList( $tgt_list, $tag_name, $tag_attribs, $key, $text, $selected );
	}

}

?>
