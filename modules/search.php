<?php

#author Do Chi Cuong
#Email : workandrelax@gmail.com
#yahoo :cuongdecheiitmbkav

$tpl = new TemplatePower("template/search.htm");
$tpl->prepare();
$value = clean_value($_GET["txtsearch"]);
if($value)
{

	$dk_all = 'active=1 AND name LIKE "%'.$value.'%"';
	$dk_link_all = '&txtsearch='.$value.'';
	
	$query_pag_num = "SELECT COUNT(id_product) AS count from product where $dk_all";
	$result_pag_num = $DB->query($query_pag_num);
	$row = $DB->fetch_row($result_pag_num);
	$count = $row['count'];
	$tpl->assign("count",$count);
	
	$page = intval($_GET['p']);
	$cur_page = $page;
	if(!$page)
	{
		$page = 0;
	}
	else
	{
		$page -= 1;
	}	
	$per_page = 16;
	$previous_btn = true;
	$next_btn = true;
	$first_btn = true;
	$last_btn = true;
	$start = $page * $per_page;
	
	$c = $DB->query("select * from product where $dk_all order by id_product desc limit $start, $per_page");
	while($b_dv = mysql_fetch_array($c))
	{
		$tpl->newBlock("list_product");
		$tpl->assign("name",$b_dv['name']);
		$tpl->assign("image",$b_dv['image']);
		$tpl->assign("small_image",$b_dv['small_image']);
		$tpl->assign("link","index.php?act=pro&idroot=".$b_dv['idroot']."&parentid=".$b_dv['parentid']."&idcat=".$b_dv['id_catpd']."&id=".$b_dv['id_product']."&name_en=".stripUnicode($b_dv['name'])) ;
		
	}	
	

	$no_of_paginations = ceil($count / $per_page);
	if ($cur_page >= 5) {
		$start_loop = $cur_page - 3;
		if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 4) {
			$start_loop = $no_of_paginations - 4;
			$end_loop = $no_of_paginations;
		} else {
			$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations > 7)
			$end_loop = 7;
		else
			$end_loop = $no_of_paginations;
	}
	/* ----------------------------------------------------------------------------------------------------------- */
	
   $paging .= '<ul>';

   $paging .= '<li><a href="index.php?act=search'.$dk_link_all.'&p=1">Trang đầu</a></li>';

	for ($i = $start_loop; $i <= $end_loop; $i++) {

		if ($cur_page == $i)
			$paging .= '<li class="active"><a href="javascript:void(0);">'.$i.'</a></li>';
		else
			$paging .= '<li><a href="index.php?act=search'.$dk_link_all.'&p='.$i.'">'.$i.'</a></li>';
	}

		$paging .= '<li><a href="index.php?act=search'.$dk_link_all.'&p='.$no_of_paginations.'">Trang cuối</a></li>';
	$paging .= " </ul>";
	if ($no_of_paginations > 1) 
	{
	   $tpl->newBlock("paging");
	   $tpl->assign("paging",$paging) ;
	}
}


$tpl->printToScreen();
?>
