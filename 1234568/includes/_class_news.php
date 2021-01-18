<?php
class news {
	var $out;
	
	var $path = array();
	var $item = array();
	var $n_id;
	var $n;
	var $ncat_id;
	var $parentid;
	var $result;
	var $n;
	var $site = array();
	
	function news_info($catid, $resultpage = 1, $limit_news){
		
		$rowz = new TemplatePower( "template/news/content.htm" );
		
		$rowz->prepare();
		$rowz->assign("cat_name" , $this->get_ncat_name($catid));
		
		$query_cat = '';
		
		if ($resultpage == null || $resultpage == '0') $resultpage = '1';
		if ($catid == null || $catid == '0') $query_cat = "";
		else 
		{
			@$sql = mysql_query("SELECT ncat_id FROM news_cat WHERE parentid = '$catid'");
			if (@mysql_num_rows($sql) > 0)
			{
				$query_cat = "AND ( n2c.ncat_id = '$catid'";
				while ($result = mysql_fetch_array($sql))
				{
					$query_cat .= " OR n2c.ncat_id = '$result[ncat_id]'";
				}
				$query_cat .= ")";
			}
			else {
				$query_cat = "AND n2c.ncat_id = '$catid'";
			}
		}
		
		$page=($resultpage-1)*$limit_news;
		
		@$raw = mysql_query("SELECT n.n_id FROM news as n LEFT JOIN news_to_cat as n2c ON n.n_id = n2c.n_id WHERE n.active = 'yes' AND n.is_content = 'no' $query_cat ORDER BY n.n_id DESC LIMIT $page,$limit_news");
		
		$id_more = 0;
		
		while (@$result0 = mysql_fetch_array($raw)) {
			$id_more = $result0[n_id];
		}
		$news_more = $this->get_more_news($id_more,$catid);
		
		$rowz->assign("news_more" , $news_more);
		
		@$raw = mysql_query("SELECT n.n_id,n.n_name,n.n_info,n.n_image,n.time,n2c.ncat_id FROM news as n LEFT JOIN news_to_cat as n2c ON n.n_id = n2c.n_id WHERE n.active = 'yes' AND n.is_content = 'no' $query_cat ORDER BY n.n_id DESC LIMIT $page,$limit_news");
		
		$image_space = 'right';
		while (@$result = mysql_fetch_array($raw)) {
			$result[n_name] = stripslashes($result[n_name]);
			$result[n_info] = stripslashes($result[n_info]);
			$result[n_image] = stripslashes($result[n_image]);
			$result[n_time] = $result[n_time];
			if ($image_space == 'left') {
				$image_space = 'right';
			}
			else {
				$image_space = 'left';
			}
			if($result[n_image] == '' || $result[n_image] == 'none.gif') {
				$image = '';
			}
			else {
				$image = '<img src="images/news/' . $result[n_image] . '" align="' . $image_space . '" vspace="7" hspace="7" border="1" width="130">';
			}
			
			$rowz->newBlock("news_cat");
			$rowz->assign("news_id" , $result[n_id]);
			$rowz->assign("news_name" , $result[n_name]);
			$rowz->assign("news_info" , $result[n_info]);
			$rowz->assign("news_time" , $result[time]);
			$rowz->assign("news_image" , $image);
		}
				
		$out = $rowz->getOutputContent();
		
		return $out;
	}
	
	function news_detail($n_id){
		
		$rowz = new TemplatePower( "template/news/content_info.htm" );
		
		$rowz->prepare();
		
		@$raw = mysql_query("SELECT n.n_id,n.n_name,n.n_info,n.n_body,n.n_image,n2c.ncat_id,nc.ncat_name,nc.ncat_id FROM news as n LEFT JOIN news_to_cat as n2c ON n.n_id = n2c.n_id LEFT JOIN news_cat as nc ON nc.ncat_id = n2c.ncat_id WHERE n.active = 'yes' AND n.n_id = '$n_id'");
		
		$result = mysql_fetch_array($raw);
		$result[n_name] = stripslashes($result[n_name]);
		$result[n_info] = stripslashes($result[n_info]);
		//$result[n_body] = nl2br(stripslashes($result[n_body]));
		$result[n_image] = stripslashes($result[n_image]);
		$result[time] = stripslashes($result[time]);
		if($result[n_image] == '' || $result[n_image] == 'none.gif') {
			$image = '';
		}
		else {
			$image = '<img src="images/news/' . $result[n_image] . '" align="left" vspace="7" hspace="7" border="1">';
		}
		$rowz->assign("cat_name" , $result[ncat_name]);
		$rowz->assign("news_id" , $n_id);
		$rowz->assign("news_name" , $result[n_name]);
		$rowz->assign("news_info" , $result[n_info]);
		$rowz->assign("news_body" , $result[n_body]);
		$rowz->assign("news_time" , $result[time]);
		$rowz->assign("image" , $image);
		
		@$raw = mysql_query("SELECT t.topic_id FROM news_topic as t LEFT JOIN news_to_topic as n2t ON t.topic_id = n2t.topic_id WHERE t.active = 'yes' AND n2t.n_id = '$n_id'");
		if (mysql_affected_rows() > 0) {
		$result0 = mysql_fetch_array($raw);
		}
		$topic_more = $this->get_news_from_topic($n_id);
		$news_more = $this->get_more_news($n_id,$result[ncat_id]);
		
		$rowz->assign("topic_more" , $topic_more);
		$rowz->assign("news_more" , $news_more);
		
		$out = $rowz->getOutputContent();
		@$this->update_news($n_id);
		
		return $out;
	}
	
	function news_print($n_id){
		
		$rowz = new TemplatePower( "template/news/content_print.htm" );
		
		$rowz->prepare();
		
		@$raw = mysql_query("SELECT n.n_id,n.n_name,n.n_info,n.n_body,n.n_image,n2c.ncat_id,nc.ncat_name,nc.ncat_id FROM news as n LEFT JOIN news_to_cat as n2c ON n.n_id = n2c.n_id LEFT JOIN news_cat as nc ON nc.ncat_id = n2c.ncat_id WHERE n.active = 'yes' AND n.n_id = '$n_id'");
		
		$result = mysql_fetch_array($raw);
		$result[n_name] = stripslashes($result[n_name]);
		$result[n_info] = stripslashes($result[n_info]);
		$result[n_body] = stripslashes($result[n_body]);
		$result[n_image] = stripslashes($result[n_image]);
		$result[time] = stripslashes($result[time]);
		if($result[n_image] == '' || $result[n_image] == 'none.gif') {
			$image = '';
		}
		else {
			$image = '<img src="images/news/' . $result[n_image] . '" align="left" vspace="7" hspace="7" border="1">';
		}
		$rowz->assign("cat_name" , $result[ncat_name]);
		$rowz->assign("news_id" , $n_id);
		$rowz->assign("news_name" , $result[n_name]);
		$rowz->assign("news_info" , $result[n_info]);
		$rowz->assign("news_body" , $result[n_body]);
		$rowz->assign("news_time" , $result[time]);
		$rowz->assign("image" , $image);
		
		$out = $rowz->getOutputContent();
		@$this->update_news($n_id);
		
		return $out;
	}
	
	function update_news($n_id)
	{
		$result = mysql_query("update news set count = count + 1 where n_id = '$n_id'");
		if (mysql_affected_rows() == 1){
			return true;
		} else {
			return false;
		}
	}
	
	function get_more_news($n_id,$ncat_id){
		@$sql = mysql_query("SELECT n.n_id,n.n_name,n2c.ncat_id FROM news as n LEFT JOIN news_to_cat as n2c ON n.n_id = n2c.n_id WHERE n.active = 'yes' AND n.is_content = 'no' AND n2c.ncat_id = '$ncat_id' AND n.n_id < $n_id ORDER BY n.n_id DESC LIMIT 0,10");
		
		if (mysql_affected_rows() > 0) {
		$out = '<tr><td width="37" valign="top"><img border="0" src="images/3tren.gif" width="37" height="243"></td><td width="50%" valign="top" bgcolor="#F3F5F8">&nbsp; <b><font color="#215969">Các tin khác:</font></b><p style="margin-left: 10">';

		While($result = mysql_fetch_array($sql)){
			$result[n_name] = stripslashes($result[n_name]);
			
			$out .= '<a href="?mod=news&id=' . $result[n_id] . '" class="link">' . $result[n_name] . '</a><br>';	
		}
		$out .= '</p></td></tr>';
		} else $out = '';
		return $out;
	}
	
	function get_news_from_topic($n_id){
		@$raw = mysql_query("SELECT t.topic_id FROM news_topic as t LEFT JOIN news_to_topic as n2t ON t.topic_id = n2t.topic_id WHERE t.active = 'yes' AND n2t.n_id = '$n_id'");
		if (mysql_affected_rows() > 0) {
		$result0 = mysql_fetch_array($raw);
		
		$sql = mysql_query("SELECT n.n_id,n.n_name,n2t.n_id FROM news as n LEFT JOIN news_to_topic as n2t ON n.n_id = n2t.n_id WHERE n.active = 'yes' AND n2t.topic_id = '$result0[topic_id]' AND n2t.n_id != '$n_id' ORDER BY n.n_id DESC");
		
		//if (mysql_affected_rows() > 0) {
		$out = '<tr><td width="37" valign="top"><img border="0" src="images/3tren.gif" width="37" height="243"></td><td width="50%" valign="top" bgcolor="#F3F5F8">&nbsp; <b><font color="#215969">Các tin liên quan:</font></b><p style="margin-left: 10">';
		While($result = mysql_fetch_array($sql)){
			$result[n_name] = stripslashes($result[n_name]);
			
			$out .= '<a href="?mod=news&id=' . $result[n_id] . '" class="link">' . $result[n_name] . '</a><br>';	
		}
		$out .= '</p></td></tr>';
		//} else $out = '';
		} else $out = '';
		return $out;
	}
	
	function get_ncat_id($n_id)
	{
		$result = mysql_fetch_array(mysql_query("select g.n_id,g2c.ncat_id from news as g left join news_to_cat as g2c on g.n_id = g2c.n_id where g.n_id='$n_id' limit 1"));
		return $result[ncat_id];
	}
	
	function get_ncat_name($ncat_id)
	{
		$result = mysql_fetch_array(mysql_query("select ncat_name from news_cat where ncat_id='$ncat_id' limit 1"));
		return $result[ncat_name];
	}
	
	function get_path($catid = 0)
	{
		$i = 0;
		do {
			@$cat = mysql_fetch_array(mysql_query("select ncat_id,parentid,ncat_name as name from news_cat where ncat_id='$catid' limit 1"));
			$this->path[$i][name] = $cat['name'];
			$this->path[$i][catid] = $cat['ncat_id'];
			$catid = $cat['parentid'];
			$i++;
		} while ($catid != 0);
		
		return $this->path;
	}
	
	function get_root_catid($catid = 0)
	{
		$i = 0;
		do {
			@$cat = mysql_fetch_array(mysql_query("select parentid from news_cat where ncat_id='$catid' limit 1"));
			$this->parentid = $catid;
			$catid = $cat['parentid'];
			$i++;
		} while ($catid != 0);
		
		return $this->parentid;
	}
	
	function get_path_item($n_id = 0)
	{
		@$this->item = mysql_fetch_array(mysql_query("select gc.n_name as name,g2c.ncat_id from news as g,news_to_cat as g2c left join news_cat as gc at g2c.ncat_id=gc.ncat_id where g2c.ncat_id=gc.ncat_id and g2c.n_id='$n_id' limit 1"));
		
		return $this->item;
	}
	
	function print_path($path, $n_id, $catid, $type = 'user')
	{
		$path = array_reverse($path);
		if ($n_id != 0)$this->get_path_item($n_id);
		
		if ($this->mod == 'news') {
			$this->lann_news = 'news';
			$this->site[path] = 'list/';
			if ($catid == 0) $this->site[link] = " > List";
			else $this->site[link] = ' > <a href="' . $this->modurl . '/list" class="orange">List</a>';
		}
		$path_output = '<b><a href="' . $this->modurl . '" class="orange">' . $this->lann_news . '</a>' . $this->site[link];
		if ($catid == 0) return $path_output . '</b>';
		foreach($path as $i => $j) {
			if ($j['catid'] == $catid &$n_id == 0) {
				$path_output .= ' > ' . $j['name'];
			} else {
				$path_output .= ' > <a href="?mod=news&ncat_id='. $j['catid'] . '" class="orange"><b>' . $j['name'] . '</b></a>';
			}
		}
		$path_output .= '</b>';
		return $path_output;
	}
	
	function get_cat_tree($parent = 0)
	{
		global $tree, $cat_old; // add $cat_old
		@$raw = mysql_query("select ncat_id,ncat_name,sort_id from news_cat where parentid='$parent' order by sort_id");
		// add -- if it has childs
		if (@mysql_affected_rows() > 0) {
			$this->n++;
		} else {
			return;
		} while (@$result = mysql_fetch_array($raw)) {
			if ($result['ncat_id'] == $cat_old['ncat_id']) {
				continue; // remove child cats from list
			}
			for($i = 0;$i < $this->n;$i++) {
				$tree[$result['ncat_id']][ncat_name] .= '-- ';
			}
			$tree[$result['ncat_id']][ncat_name] .= $result['ncat_name'];
			$this->get_cat_tree($result['ncat_id']);
		}
		// all childs listed, remove --
		$this->n--;
	}
	
	function filter($sstring)
	{
		/**
		* for ($i = 0; $i < strlen($sstring); $i++)
		* if (!ereg("'", $sstring[$i])) ;
		* }
		*/
		
		$search = array ("'<'", // Strip out javascript
		"'>'",
		"'[\/\!]*?[^<>]*?>'si", // Strip out html tags
		"'([\r\n])[\s]+'", // Strip out white space
		"'&(quote|#34);'i", // Replace html entities
		"'&(amp|#38);'i",
		"'&(lt|#60);'i",
		"'&(gt|#62);'i",
		"'&(nbsp|#160);'i",
		"'&(iexcl|#161);'i",
		"'&(cent|#162);'i",
		"'&(pound|#163);'i",
		"'&(copy|#169);'i",
		"'&#(\d+);'e"); // evaluate as php
		
		$replace = array ("",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"");
		$text = preg_replace ($search, $replace, $sstring);
		$text = ereg_replace("'", "", $text);
		// $text=ereg_replace("\\", "", $text);
		return $text;
	}
	
	function datetime2Str($date){
		global $site;
		
		$d = split(' ', $date);
		$y = split('-', $d[0]);
		if($site[sdate]=='mdy')
		return "$y[1]$site[dsep]$y[2]$site[dsep]$y[0] $d[1]";
		elseif($site[sdate]=='dmy')
		return "$y[2]$site[dsep]$y[1]$site[dsep]$y[0] $d[1]";
		elseif($site[sdate]=='ymd')
		return "$y[0]$site[dsep]$y[1]$site[dsep]$y[2] $d[1]";
	}
	
	function redir($to) {
		echo "<SCRIPT LANGUAGE=\"JavaScript\">\n";
		echo "window.location = '$to'\n";
		echo "</SCRIPT>";
	}
	
	function error($message)
	{
		$error = '<table width=80%><tr><td>';
		$error .= "Date        : " . date("D, F j, Y H:i:s") . "<br>";
		$error .= "IP          : " . getenv("REMOTE_ADDR") . "<br>";
		$error .= "Browser     : " . getenv("HTTP_USER_AGENT") . "<br>";
		echo "<br><span class=newsheader>$message</span><hr>";
		echo "<pre>$error</pre>";
		echo '<center><br><br><span class="smallred"><a href="javascript:history.back(1)">Go back.</a>';
		echo "</td></tr></table>";
		return;
	}
}

?>