<?php 
class Frd_Paginator
{
	protected $_select=null;
	protected $_page=1;
	protected $_perpage=10;
	protected $_pageInfo=null;
	protected $_data=null;
  protected $_paginator=null;

	function __construct($select=null)
	{
		$this->_select=$select;
	}

	function setPage($number)
	{
		$number=intval($number);
		if($number <=0 )
			$number =1;
		$this->_page=$number;	
	}

	function setPerPage($number)
	{
		$this->_perpage=$number;	
	}

	function getData($select=null)
	{
		if($select == null && $this->_select == null)
			throw new Exception("Paginator:getData need select(Zend_Db_Select)");

		if($select != null)
			$this->_select=$select;

		$paginator = Zend_Paginator::factory($this->_select);  
		$paginator->setCurrentPageNumber($this->_page);
		$paginator->setItemCountPerPage($this->_perpage);

    $this->_paginator=$paginator;
		$this->_pageInfo=$paginator->getPages();
		$this->_data = $paginator->getIterator();  

		return $this->_data;
	}

	function getPageInfo()
	{
		if($this->_pageInfo == null)
			throw new Exception("pageinfo is null,may be you should check getData!");

		return $this->_pageInfo;	
	}

	function getCount()
	{
		if($this->_pageInfo == null)
			throw new Exception("pageinfo is null,may be you should check getCount!");

		return $this->_pageInfo->pageCount;	
	}

  function getItemCount()
  {
		if($this->_paginator == null)
			throw new Exception("pageinfo is null,may be you should check getItemCount!");

    return $this->_paginator->getTotalItemCount();
  }

	//生成分页 html代码
	function toHtml($curpage=1,$jscall="to_page",$class="paginator_div")
	{
		if($this->_pageInfo == null)
			throw new Exception("pageinfo is null ,can toHtml!");

		if($this->_pageInfo->pageCount == 0)
      return "";

		if( !isset($this->_pageInfo->previous) )
			$prev=1;
		else
			$prev=$this->_pageInfo->previous;

		if( !isset($this->_pageInfo->next) )
			$next=$this->_pageInfo->last;
		else
			$next=$this->_pageInfo->next;

		//$html=sprintf('<div class="%s">',$class);
		$html="";
		$html.=sprintf('<a href="#" onclick="%s(%s);return false;">',$jscall,$prev);
		$html.='上一页';
		$html.='</a>';

		for($i=1;$i<= $this->_pageInfo->pageCount;++$i)
		{
			if($i == $curpage)
			{
				$html.=sprintf('<a href="#" onclick="%s(%s);return false;" style="color:black">',$jscall,$i);
				$html.="$i</a>";
			}
			else
			{
				$html.=sprintf('<a href="#" onclick="%s(%s);return false;">',$jscall,$i);
				$html.="$i</a>";
			}
		}

		$html.=sprintf('<a href="#" onclick="%s(%s);return false;">',$jscall,$next);
		$html.='下一页';
		$html.='</a>';
		//$html.='</div>';

		return $html;
	}
}
