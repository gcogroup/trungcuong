<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this loinfoion is not allowed.' );
class info_tree{
	var $n;
	var $current_idinfo;
	var $navinfo;
	var $subinfolist;
	function info_tree($current_idinfo=0)
	{
		$this->current_idinfo=$current_idinfo;
		$this->navinfo=array();
		$this->subinfolist=array();
	}
	function get_info_tree($parent = 0)
	{
		global $DB,$tree; // add $info_old
		$raw = $DB->query("select * from info where parentid='$parent' order by thu_tu asc,id_info desc");
		// add -- if it has childs
		if ($DB->get_affected_rows() > 0) {
			$this->n++;
		} else {
			return;
		} while ($result = mysql_fetch_array($raw)) {
		/*
			if ($result['pinfoid'] == $childinfo_old['pinfoid']) {
				continue; // remove  infos from list
			}
			*/
			for($i = 0;$i < $this->n;$i++) {
				$tree[$result['id_info']]['name'] .= '-- ';
			}
			$tree[$result['id_info']]['name'] .= $result['name'];
			$this->get_info_tree($result['id_info']);
		}
		// all childs listed, remove --
		$this->n--;
	}
	function get_info_string($id_info)
	{
		global $DB,$infostring;
		if ($id_info==0)
			return;
		else
		{
			$sql="select * from info where id_info=".$id_info;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$infostring = $b['name']." > ".$infostring;
				$this->get_info_string($b['parentid']);
			}
		}
	
	}
	function get_info_string_admin($id_info)
	{
		global $DB,$infostring2;
		if ($id_info==0)
			return;
		else
		{
			if ($this->current_idinfo==$id_info)
			{
				$showclass="class='currentinfo'";
			}
			else
			{
				$showclass="";
			}
			$sql="select * from info where id_info=".$id_info;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$infostring2 = "<a href='main.php?act=info&pid=".$id_info."' $showclass>".$b['name']."</a> > ".$infostring2;
				$this->get_info_string_admin($b['parentid']);
			}
		}
	
	}
	function get_info_nav($id_info)
	{
		global $DB;
		if ($id_info==0)
		{
			ksort($this->navinfo);
			return;
		}
		else
		{
			$sql="select * from info where id_info=".$id_info;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$this->navinfo[$b['id_info']]['name']=$b['name'];
				$this->get_info_nav($b['parentid']);
			}
		}
	
	}
	function get_sub_info_list($id_info)	
	{
		global $DB;
		$raw = $DB->query("select * from info where parentid='$id_info' order by thu_tu asc,id_info desc");
		if ($DB->get_affected_rows() == 0) {
			return;
		} 
		while ($result = mysql_fetch_array($raw)) {
			$this->subinfolist[$result['id_info']]['name'] = $result['name'];
			$this->get_sub_info_list($result['id_info']);
		}
	}


}

class infopt_tree{
	var $n;
	var $current_idinfopt;
	function infopt_tree($current_idinfopt=0)
	{
		$this->current_idinfopt=$current_idinfopt;
	}
	function get_infopt_tree($parent = 0)
	{
		global $DB,$tree; // add $infopt_old
		$raw = $DB->query("select * from infopt where parentid='$parent' order by id_infopt asc");
		// add -- if it has childs
		if ($DB->get_affected_rows() > 0) {
			$this->n++;
		} else {
			return;
		} while ($result = mysql_fetch_array($raw)) {
		/*
			if ($result['pinfoptid'] == $childinfopt_old['pinfoptid']) {
				continue; // remove  infopts from list
			}
			*/
			for($i = 0;$i < $this->n;$i++) {
				$tree[$result['id_infopt']]['name'] .= '-- ';
			}
			$tree[$result['id_infopt']]['name'] .= $result['name'];
			$this->get_infopt_tree($result['id_infopt']);
		}
		// all childs listed, remove --
		$this->n--;
	}
	function get_infopt_string($id_infopt)
	{
		global $DB,$infoptstring;
		if ($id_infopt==0)
			return;
		else
		{
			$sql="select * from infopt where id_infopt=".$id_infopt;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$infoptstring = $b['name']." > ".$infoptstring;
				$this->get_infopt_string($b['parentid']);
			}
		}
	
	}
	function get_infopt_string_admin($id_infopt)
	{
		global $DB,$infoptstring2;
		if ($id_infopt==0)
			return;
		else
		{
			if ($this->current_idinfopt==$id_infopt)
			{
				$showclass="class='currentinfo'";
			}
			else
			{
				$showclass="";
			}
			$sql="select * from infopt where id_infopt=".$id_infopt;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$infoptstring2 = "<a href='main.php?act=infopt&pid=".$id_infopt."' $showclass>".$b['name']."</a> > ".$infoptstring2;
				$this->get_infopt_string_admin($b['parentid']);
			}
		}
	
	}	


}

?>