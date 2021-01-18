<?php
$id = intval($_GET['id']) ;
$idcat = intval($_GET['idcat']) ;
$idroot = intval($_GET['idroot']) ;
$parentid = intval($_GET['parentid']) ;

if($idroot && !$id)
{
$tpl = new TemplatePower("template/product.htm");
$tpl->prepare();

	$nameroot = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd=".$idroot." limit 1"));
	$tpl->assign("nameroot",$nameroot['name']);
	$tpl->assign("linkroot","index.php?act=pro&idroot=".$idroot."&name_en=".stripUnicode($nameroot['name'])) ;
	
	$dk_kw0 = 'idroot='.$idroot.'';
	$dk_link0 = '&idroot='.$idroot.'';
	
	if($parentid && !$idcat)
	{
		$dk_kw = ' AND idroot='.$idroot.' AND parentid='.$parentid.'';
		$dk_link = '&parentid='.$parentid.'';
		
		$query = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd=".$parentid." limit 1"));
		$name = $query['name'];
		$linkparentid = "index.php?act=pro&idroot=".$idroot."&parentid=".$parentid."&name_en=".stripUnicode($query['name']) ;
		$url = '<li><a href="'.$linkparentid.'">'.$name.'</a></li>';
		$tpl->assign("nameparentid",$url);
	}
	elseif($parentid && $idcat)
	{
		$dk_kw = ' AND idroot='.$idroot.' AND parentid='.$parentid.' AND id_catpd='.$idcat.'';
		$dk_link = '&parentid='.$parentid.'&idcat='.$idcat.'';
		
		$query = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd=".$parentid." limit 1"));
		$name = $query['name'];
		$linkparentid = "index.php?act=pro&idroot=".$idroot."&parentid=".$parentid."&name_en=".stripUnicode($query['name']) ;
		$url = '<li><a href="'.$linkparentid.'">'.$name.'</a></li>';
		$tpl->assign("nameparentid",$url);

		
		$query2 = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd=".$idcat." limit 1"));
		$name2 = $query2['name'];
		$linkcat = "index.php?act=pro&idroot=".$idroot."&parentid=".$parentid."&idcat=".$idcat."&name_en=".stripUnicode($query2['name']) ;
		$url2 = '<li><a href="'.$linkcat.'">'.$name2.'</a></li>';
		$tpl->assign("nameidcat",$url2);
	}
	
	$dk_all = $dk_kw0.$dk_kw;
	$dk_link_all = $dk_link0.$dk_link;
	
	$tpl->assign("status",$status);
	
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

   $paging .= '<li><a href="index.php?act=pro'.$dk_link_all.'&p=1">Trang đầu</a></li>';

	for ($i = $start_loop; $i <= $end_loop; $i++) {

		if ($cur_page == $i)
			$paging .= '<li class="active"><a href="javascript:void(0);">'.$i.'</a></li>';
		else
			$paging .= '<li><a href="index.php?act=pro'.$dk_link_all.'&p='.$i.'">'.$i.'</a></li>';
	}

		$paging .= '<li><a href="index.php?act=pro'.$dk_link_all.'&p='.$no_of_paginations.'">Trang cuối</a></li>';
	$paging .= " </ul>";
	if ($no_of_paginations > 1) 
	{
	   $tpl->newBlock("paging");
	   $tpl->assign("paging",$paging) ;
	}

}
else
{
	$tpl = new TemplatePower("template/product_detail.htm");
	$tpl->prepare();
	
	$nameroot = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd=".$idroot." limit 1"));
	$tpl->assign("nameroot",$nameroot['name']);
	$tpl->assign("linkroot","index.php?act=pro&idroot=".$idroot."&name_en=".stripUnicode($nameroot['name'])) ;

	$query = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd=".$parentid." limit 1"));
	$name = $query['name'];
	$linkparentid = "index.php?act=pro&idroot=".$idroot."&parentid=".$parentid."&name_en=".stripUnicode($query['name']) ;
	$url = '<li><a href="'.$linkparentid.'">'.$name.'</a></li>';
	$tpl->assign("nameparentid",$url);
	
	$product =$DB->fetch_row($DB->query("select catpd.name as catname,product.* from product
							JOIN catpd on (catpd.id_catpd = product.id_catpd)
							where product.id_product=$id AND product.active='1' and product.idroot=$idroot and product.parentid=$parentid limit 1"));
					
	$tpl->assign("catname",$product['catname']);
	$tpl->assign("name",$product['name']);
	$tpl->assign("image",$product['image']);
	
	$mobile1 = explode("-", $CONFIG['mobile_maycongcu']);
	$tpl->assign("config1",$mobile1['0']);	
	$tpl->assign("config2",$mobile1['1']);				
	$mobile2 = explode("-", $CONFIG['mobile_maythucpham']);
	$tpl->assign("config3",$mobile2['0']);	
	$tpl->assign("config4",$mobile2['1']);	
	if($product['image1'] || $product['image2'] || $product['image3'] || $product['image4'])
	{
		if($product['image1'])
		{
		$image1 = '<a href="upload/images/'.$product['image1'].'"><img class="xzoom-gallery5" width="80" src="upload/images/'.$product['image1'].'" xpreview="upload/images/'.$product['image1'].'" alt="'.$product['name'].'" title="'.$product['name'].'"></a>';
		$tpl->assign("image1",$image1);
		}
		if($product['image2'])
		{
		$image2 = '<a href="upload/images/'.$product['image2'].'"><img class="xzoom-gallery5" width="80" src="upload/images/'.$product['image2'].'" xpreview="upload/images/'.$product['image2'].'" alt="'.$product['name'].'" title="'.$product['name'].'"></a>';
		$tpl->assign("image2",$image2);
		}
		if($product['image3'])
		{
		$image3 = '<a href="upload/images/'.$product['image3'].'"><img class="xzoom-gallery5" width="80" src="upload/images/'.$product['image3'].'" xpreview="upload/images/'.$product['image3'].'" alt="'.$product['name'].'" title="'.$product['name'].'"></a>';
		$tpl->assign("image3",$image3);
		}
		if($product['image4'])
		{
		$image4 = '<a href="upload/images/'.$product['image4'].'"><img class="xzoom-gallery5" width="80" src="upload/images/'.$product['image4'].'" xpreview="upload/images/'.$product['image4'].'" alt="'.$product['name'].'" title="'.$product['name'].'"></a>';
		$tpl->assign("image4",$image4);
		}
	}
	if($product['noi_dung'])
	{
		$tpl->newBlock("noi_dung_product");
		$tpl->assign("noi_dung",$product['noi_dung']);
	}
	//Sản phẩm cùng danh mục
	
	$sql_cdm = $DB->query("select small_image,image,idroot,parentid,id_catpd,id_product,name from product where id_product!=".$id." AND idroot=".$idroot." AND parentid=".$parentid." AND id_catpd=".$idcat." AND active='1' order by id_product desc limit 0,12");
		while($b_cdm = $DB->fetch_row($sql_cdm))
		{
			$tpl->newBlock("sp_cdm");
			$tpl->assign("name",$b_cdm['name']);
			$tpl->assign("image",$b_cdm['image']);
			$tpl->assign("small_image",$b_cdm['small_image']);
			$tpl->assign("link","index.php?act=pro&idroot=".$b_cdm['idroot']."&parentid=".$b_cdm['parentid']."&idcat=".$b_cdm['id_catpd']."&id=".$b_cdm['id_product']."&name_en=".stripUnicode($b_cdm['name'])) ;
		}
	//Sản phẩm liên quan
	
	$sql_cdm = $DB->query("select small_image,image,idroot,parentid,id_catpd,id_product,name from product where id_product!=".$id." AND idroot=".$idroot." AND active='1' order by id_product desc limit 0,12");
		while($b_cdm = $DB->fetch_row($sql_cdm))
		{
			$tpl->newBlock("sp_lienquan");
			$tpl->assign("name",$b_cdm['name']);
			$tpl->assign("image",$b_cdm['image']);
			$tpl->assign("small_image",$b_cdm['small_image']);
			$tpl->assign("link","index.php?act=pro&idroot=".$b_cdm['idroot']."&parentid=".$b_cdm['parentid']."&idcat=".$b_cdm['id_catpd']."&id=".$b_cdm['id_product']."&name_en=".stripUnicode($b_cdm['name'])) ;
		}	
		
}
$tpl->printToScreen();
?>