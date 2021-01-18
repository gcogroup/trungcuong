<?
class page_nav{
	var $results;  // entitys array
	var $pageSize;  // result per page
	var $page;
	var $row;
	var $output;
		
	function page_nav($name1,$value1,$name2,$value2,$resultpage=1,$results,$pageSize){
		$this->results=$results;
		$this->pageSize = $pageSize;
		if((int)$resultpage <= 0) $resultpage = 1;
		if($resultpage > $this->getTotalPages()){
			$resultpage = $this->getTotalPages();
		}
		$this->setPageNum($resultpage);
    		$this->output=$this->getPageNav($name1,$value1,$name2,$value2);
    	
	}
	
	function getTotalPages(){
		if (!$this->results) return FALSE;
    		return ceil($this->results/$this->pageSize);
	}
	
	function setPageNum($pageNum){
		if ($pageNum > $this->getTotalPages() or $pageNum <= 0) return FALSE;
 		$this->page = $pageNum;
	}
	
	function getPageNum(){
		return $this->page;
	}
 	
 	function isLastPage(){
		return ($this->page >= $this->getTotalPages());
	}

	function isFirstPage(){
		return ($this->page <= 1);
	}

	function getPageNav($name1,$value1,$name2,$value2){

		$str=urlencode($str);
		$nav.='<center>';
		if (!$this->isFirstPage()){
			$nav .= '<a href="?'.$name1.'='.$value1.'&'.$name2.'='.$value2.'&resultpage='.
			($this->getPageNum()-1).'">Prev</a> ';
		}
		if ($this->getTotalPages() > 1){
			for ($i=1; $i<=$this->getTotalPages(); $i++){
				if ($i==$this->page){
					$nav .= "$i ";
				}else{
					$nav .= '<a href="?'.$name1.'='.$value1.'&'.$name2.'='.$value2.'&resultpage='.$i.'">'.$i.'</a> ';
				
				}
			}
		}
		if (!$this->isLastPage()){
			$nav .= '<a href="?'.$name1.'='.$value1.'&'.$name2.'='.$value2.'&resultpage='.
			($this->getPageNum()+1).'">Next</a> ';
		}
		$nav.='<center>';
		return $nav;
	}
	
}
?>