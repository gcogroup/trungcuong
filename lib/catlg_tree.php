<?php
class catlg_tree{
	var $n;
	var $current_idcatlg;
	function catlg_tree($current_idcatlg=0)
	{
		$this->current_idcatlg=$current_idcatlg;
	}
	function get_catlg_tree($parent = 0)
	{
		global $DB,$tree; // add $catlg_old
		$raw = $DB->query("select * from catlg where parentid='$parent' order by id_catlg asc");
		// add -- if it has childs
		if ($DB->get_affected_rows() > 0) {
			$this->n++;
		} else {
			return;
		} while ($result = mysql_fetch_array($raw)) {
		/*
			if ($result['pcatlgid'] == $childcatlg_old['pcatlgid']) {
				continue; // remove  catlgs from list
			}
			*/
			for($i = 0;$i < $this->n;$i++) {
				$tree[$result['id_catlg']]['name'] .= '-- ';
			}
			$tree[$result['id_catlg']]['name'] .= $result['name'];
			$this->get_catlg_tree($result['id_catlg']);
		}
		// all childs listed, remove --
		$this->n--;
	}
	function get_catlg_string($id_catlg)
	{
		global $DB,$catlgstring;
		if ($id_catlg==0)
			return;
		else
		{
			$sql="select * from catlg where id_catlg=".$id_catlg;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$catlgstring = $b['name']." > ".$catlgstring;
				$this->get_catlg_string($b['parentid']);
			}
		}
	
	}
	function get_catlg_string_admin($id_catlg)
	{
		global $DB,$catlgstring2;
		if ($id_catlg==0)
			return;
		else
		{
			if ($this->current_idcatlg==$id_catlg)
			{
				$showclass="class='currentcat'";
			}
			else
			{
				$showclass="";
			}
			$sql="select * from catlg where id_catlg=".$id_catlg;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$catlgstring2 = "<a href='main.php?act=catlg&pid=".$id_catlg."' $showclass>".$b['name']."</a> > ".$catlgstring2;
				$this->get_catlg_string_admin($b['parentid']);
			}
		}
	
	}	


}
?>