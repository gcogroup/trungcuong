<?php       
class Paginator_html extends Paginator {

	//outputs a link set like this 1 of 4 of 25 Prev | Next
	function firstLastSelect()
	{
		if($this->getPrevious())
		{
			$prev = '<div id="bid-prev-page" title="Tr&#432;&#7899;c" onClick="location.href=\'?' . $this->link . "&resultpage=" . $this->getPrevious() . '\'; return false;" style="display: inline;"><button name="bname_prev_page" >Tr&#432;&#7899;c</button> </div>';		
		}else { 
			$prev = '<span id="bid-prev-page-disabled" title="Ti&#7871;p" style="display: inline;"><button name="bname_prev_page" disabled>Tr&#432;&#7899;c</button></span> ';
		}

		if($this->getNext())
		{
			$next = '<div id="bid-next-page" title="Ti&#7871;p" onClick="location.href=\'?' . $this->link . "&resultpage=" . $this->getNext() . '\'; return false;" style="display: inline;"><button name="bname_next_page" >Ti&#7871;p</button> </div>';
		} else { 
			$next = '<span id="bid-prev-next-disabled" title="Tr&#432;&#7899;c" style="display: inline;"><button name="bname_next_page" disabled>Ti&#7871;p</button></span> ';
		}
		$selectbox = '<select  name="page_set" id="fid-page_set" onChange="MM_jumpMenu(\'window\',this,0)">';
		$this->first_of = 1;
		$this->second_of = $this->limit;
		for ($i = 1; $i <= $this->getTotalPages(); $i++, $this->first_of += $this->limit, $this->second_of += $this->limit){
			if ($this->second_of >= $this->getTotalItems()) $this->second_of = $this->getTotalItems();
			if ($i == $this->getCurrent()) $selected = 'SELECTED';  else $selected = '';
			$selectbox .= '<option value="?' .  $this->link . '&resultpage=' . $i . '" ' . $selected . '>' . $this->first_of . ' - ' . $this->second_of;
		}
		$selectbox .= '</select>';
		return $prev . $next . $selectbox . ' T&#7893;ng s&#7889;: ' . $this->getTotalItems() . '</div>';
	}
	//outputs a link set like this 1 of 4 of 25 First | Prev | Next | Last |
	function firstLast()
	{
		if($this->getCurrent()==1)
		{
			$first = "First | ";
		} else { $first="<a href=\"?" .  $this->link . "&resultpage=" . $this->getFirst() . "\">&#272;&#7847;u</a> |"; }
		if($this->getPrevious())
		{
			$prev = "<a href=\"?" .  $this->link . "&resultpage=" . $this->getPrevious() . "\">Tr&#432;&#7899;c</a> | ";
		} else { $prev="Prev | "; }

		if($this->getNext())
		{
			$next = "<a href=\"?" . $this->link . "&resultpage=" . $this->getNext() . "\">Ti&#7871;p</a> | ";
		} else { $next="Next | "; }


		if($this->getLast())
		{
			$last = "<a href=\"?" . $this->link . "&resultpage=" . $this->getLast() . "\">Cu&#7889;i</a> | ";
		} else { $last="Last | "; }
		echo $this->getFirstOf() . " of " .$this->getSecondOf() . " of " . $this->getTotalItems() . " ";
		echo $first . " " . $prev . " " . $next . " " . $last;
	}
	//outputs a link set like this Previous 1 2 3 4 5 6 Next
	function previousNext()
	{
		if($this->getPrevious())
		{
			echo "<a href=\"?" . $this->link . "&resultpage=" . $this->getPrevious() . "\">Trang tr&#432;&#7899;c</a> ";
		}
		$links = $this->getLinkArr();
		foreach($links as $link)
		{
			if($link == $this->getCurrent())
			{
				echo " $link ";
			} 
			else 
			{ 
			echo "<a href=\"?" . $this->link . "&resultpage=$link\">" . $link . "</a> ";
			}
		}
		if($this->getNext())
		{
			echo "<a href=\"?" . $this->link . "&resultpage=" . $this->getNext() . "\">Trang ti&#7871;p</a> ";
		}
	}
}//ends class
?>