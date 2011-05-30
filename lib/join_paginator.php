<?php
/*
 * paginator of join's list
 */
class Join_Paginator
{
    protected $_table='competition_join';
    protected $_curpage=1;
    protected $_pagecount=15;
    protected $_sortname='';
    protected $_sortorder='asc';
    protected $_total=0;

    protected $_param=array();

    /*
     * set current page
     */
    function setPage($page)
    {
        $page=intval($page);
        if($page <= 0)
            $page=1;
        else
            $this->_curpage=$page;
    }

    /*
     * set each page has how many items
     */
    function setPageCount($count)
    {
        $count=intval($count);
        if($count <= 0)
            $count=15;
        else
            $this->_pagecount=$count;
    }

    /*
     * set params which willl used in get list ,as condition of sql
     */
    function setParam($param=array())
    {
        foreach($param as $k=>$v)
        {
            $this->_param[$k]=$v; 
        }
    }

    /*
     * set order
     *
     * @param sortname  sort column's name
     * @param sortorder sort order , must be 'asc' or 'desc','asc' is the default value
     *
     */
    function setOrder($sortname,$sortorder='asc')
    {
        $this->_sortname=$sortname;

        $sortder=strtolower($sortorder);

        if($sortorder == 'desc')
            $this->_sortorder='desc';
        else if($sortorder == 'asc')
            $this->_sortorder='asc';
        else
            $this->_sortorder='asc';

    }

    /*
     * get total items , the sql must the same as get list,but use count()
     *
     *
     */
    protected function _getTotal()
    {
        global $global;

        $select=$global->db->select();

        $select->from($this->_table,'count(*)');
        $select->where('instance_id=?',$global->instid);

        $total=$global->db->fetchOne($select);

        if($total == false)
            $this->_total=0;
        else
            $this->_total=$total;
    }

    /*
     * get recoreds 
     */
    function getList()
    {
        global $global;

        //get total items
        $this->_getTotal();

        //get data
        $select=$global->db->select();

        $select->from($this->_table,'*');
        $select->where('instance_id=?',$global->instid);

        $start=($this->_curpage-1)*$this->_pagecount;
        $select->limit($this->_pagecount,$start);

        if($this->_sortname != false)
            $select->order($this->_sortname.' '.$this->_sortorder);

        //echo $select;
        $rows=$global->db->fetchAll($select);

        return $rows;
    }

    /*
     * get html of page link , like  'newest pre 1 2 3 ...next last'
     */
    function getPageLink()
    {
        global $global;
        $totalpage=ceil($this->_total/$this->_pagecount);
        if($totalpage == false)
            return "";

        $html='';
        //newest
        if($this->_curpage > 1)
        {
            $param=array(
                'instid'=>$global->instid,
                'curpage'=>1,
                'sortname'=>$this->_sortname ,
                'sortorder'=>$this->_sortorder,
            );
            $link=$global->link->createLink('overview.php',$param);
            $html.='&nbsp;&nbsp;<a href="'.$link.'" target="_top">newest</a>';
        }
        else
        {
            $html.='&nbsp;&nbsp;newest';
        }

        //previous
        if($this->_curpage > 1)
        {
            $param=array(
                'instid'=>$global->instid,
                'curpage'=>($this->_curpage-1),
                'sortname'=>$this->_sortname ,
                'sortorder'=>$this->_sortorder,
            );
            $link=$global->link->createLink('overview.php',$param);
            $html.='&nbsp;&nbsp;<a href="'.$link.'" target="_top">previous</a>';
        }
        else
        {
            $html.='&nbsp;&nbsp;previous';
        }

        //curpage
        $param=array(
            'instid'=>$global->instid,
            'curpage'=>$this->_curpage,
            'sortname'=>$this->_sortname ,
            'sortorder'=>$this->_sortorder,
        );

        $link=$global->link->createLink('overview.php',$param);
        $html.='&nbsp;&nbsp;<a class="curpage" href="'.$link.'" target="_top">'.$this->_curpage.'</a>';

        //nextpage
        if($this->_curpage < $totalpage)
        {
            $param=array(
                'instid'=>$global->instid,
                'curpage'=>($this->_curpage+1),
                'sortname'=>$this->_sortname ,
                'sortorder'=>$this->_sortorder,
            );
            $link=$global->link->createLink('overview.php',$param);
            $html.='&nbsp;&nbsp;<a href="'.$link.'" target="_top">next</a>';
        }
        else
        {
            $html.='&nbsp;&nbsp;next';
        }
        //last 
        if($this->_curpage < $totalpage)
        {
            $param=array(
                'instid'=>$global->instid,
                'curpage'=>$totalpage,
                'sortname'=>$this->_sortname ,
                'sortorder'=>$this->_sortorder,
            );
            $link=$global->link->createLink('overview.php',$param);
            $html.='&nbsp;&nbsp;<a href="'.$link.'" target="_top">last</a>';
        }
        else
        {
            $html.='&nbsp;&nbsp;last';
        }

        return $html;
    }
}
