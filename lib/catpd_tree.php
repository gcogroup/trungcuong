<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
class catpd_tree{
	var $n;
	var $current_idcatpd;
	function catpd_tree($current_idcatpd=0)
	{
		$this->current_idcatpd=$current_idcatpd;
	}
	function get_catpd_tree($parent = 0)
	{
		global $DB,$tree; // add $catpd_old
		$raw = $DB->query("select * from catpd where parentid='$parent' order by id_catpd asc");
		// add -- if it has childs
		if ($DB->get_affected_rows() > 0) {
			$this->n++;
		} else {
			return;
		} while ($result = mysql_fetch_array($raw)) {
		/*
			if ($result['pcatpdid'] == $childcatpd_old['pcatpdid']) {
				continue; // remove  catpds from list
			}
			*/
			for($i = 0;$i < $this->n;$i++) {
				$tree[$result['id_catpd']]['name'] .= '-- ';
			}
			$tree[$result['id_catpd']]['name'] .= $result['name'];
			$this->get_catpd_tree($result['id_catpd']);
		}
		// all childs listed, remove --
		$this->n--;
	}
	function get_catpd_string($id_catpd)
	{
		global $DB,$catpdstring;
		if ($id_catpd==0)
			return;
		else
		{
			$sql="select * from catpd where id_catpd=".$id_catpd;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$catpdstring = $b['name']." > ".$catpdstring;
				$this->get_catpd_string($b['parentid']);
			}
		}
	
	}
	function get_catpd_string_admin($id_catpd)
	{
		global $DB,$catpdstring2;
		if ($id_catpd==0)
			return;
		else
		{
			if ($this->current_idcatpd==$id_catpd)
			{
				$showclass="class='currentcat'";
			}
			else
			{
				$showclass="";
			}
			$sql="select * from catpd where id_catpd=".$id_catpd;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$catpdstring2 = "<a href='main.php?act=catpd&pid=".$id_catpd."' $showclass>".$b['name']."</a> > ".$catpdstring2;
				$this->get_catpd_string_admin($b['parentid']);
			}
		}
	
	}	


}

?>