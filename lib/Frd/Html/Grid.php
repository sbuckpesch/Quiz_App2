<?php
/* 
 * 表格
 * 
 */

class Frd_Html_Grid
{
  protected $_title='Grid'; //标题
  protected $_total=0;
  protected $_pagelist='PAGE LIST';
  protected $_perpage=0;
  protected $_col_num=3;


  protected $table='';
  protected $head='';
  protected $body='';
  protected $foot='';

  //数据查询对象
  protected $db;
  protected $select;


  //样式
  protected $colgroup='';

  //变量
  protected $page=1;
  protected $perpage=20;
  protected $baseurl='';

  //表的主键,用来作为 edit,delete 选择id
  protected $primary_key='id';


  //其它对象
  protected $_js=null;
  protected $_operate=null;

  function __construct()
  {
    $table=$this->initTable();
    $this->head=$table->add('thead');
    $this->body=$table->add('tbody');
    $this->foot=$table->add('tfoot');

    $this->table=$table;

    $this->initTitle();
    $this->initResource($db);
    $this->initColumns();


    $this->_js=new Frd_Html_Grid_Js($baseurl);
    $this->_operate=new Frd_Html_Grid_Operate();
  }
  
  function setBaseurl($url)
  {
    $this->baseurl=$baseurl;
  }


  function setPage($page)
  {
    $this->page=$page; 
  }

  //初始化资源
  //需要被重载
  function initTable()
  {
    $table=new Frd_Html('table'); 
    return $table;
  }
  function initResource($db)
  {
    //$this->select=$this->db->select();
    //$this->select->from('admin_user');
  }

  function initTitle()
  {
    $this->title=array(); 
  }

  function initColumns()
  {
    $this->cols=array(); 
  }

  function getOperate()
  {
    return $this->_operate->toHtml();
  }

  function afterLoad($rows)
  {
    foreach($rows as $k=>$row)
    {
      $rows[$k]['password']="****";
    }

    return $rows;
  }
  //样式各浏览器支持不一直,建议js操作样式
  /*
  function initStyle()
  {
    $attrs=array(
     array() ,
     array('style'=>'color:red') ,
     array() ,
     array() ,
      );
    if(is_array($attrs))
    {
      $colgroup=$this->table->add('colgroup');
      foreach($attrs as $attr)
      {
        $colgroup->add('col',$attr);
      }
    }
  }
   */

  ////
  function load($page=1)
  {
    $paginator=new Frd_Paginator($this->select);
    $paginator->setPage($page);
    $paginator->setPerPage($this->perpage);


    $data=$paginator->getData();

    $this->_pagelist= $paginator->toHtml($page,"to_page");

    //$this->_total=$paginator->getCount();
    $this->_total=$paginator->getItemCount();

    $data=$this->afterLoad($data);
    return $data;
  }
  //标题
  function addTitle()
  {
    $row=$this->title;
    $tr=$this->body->add('tr'); 

    $tr->add('th')->addText('');
    $this->_col_num=count($row)+1;
    foreach($row as $value)
    {
      $tr->add('th')->addText($value);
    }
  }

  function addRow($row)
  {
    $tr=$this->body->add('tr'); 

    foreach($row as $value)
    {
      $tr->add('td')->addText($value);
    }
  }

  function toHtml()
  {
    /*
    $this->head->add('tr')
      ->add('td',array('colspan'=>$this->_col_num))
      ->addText($this->_title);
     */
    //标题
    $this->table->add('caption',array('style'=>'text-align:center'))->addText($this->_title);

    //样式
    //$this->initStyle();

    //头部操作
    //
    $operate=$this->getOperate();

    $this->head->add('tr')
      ->add('td',array('colspan'=>$this->_col_num+1))
      ->addText($operate);

    //数据
    $this->addTitle();
    $rows=$this->load($this->page);

    foreach($rows as $row)
    {
      $tr=$this->body->add('tr') ;


      $form=new Frd_Form();

      $checkbox=$form->checkbox(array(
        'name'=>'frd_grid_select',
        'id'=>$row[$this->primary_key],
      ));

      $tr->add('td')->addText($checkbox);

      foreach($this->cols as $col)
      {
        $tr->add('td')->addText($row[$col]); 
      }
    }

    $this->foot->add('tr')
      ->add('td',array('colspan'=>$this->_col_num))
      ->addText("ALL   Total:".$this->_total);

    $this->foot->add('tr')
      ->add('td',array('colspan'=>$this->_col_num))
      ->addText($this->_pagelist);

    return $this->table->toHtml();
  }

  function renderJs()
  {
    return $this->_js->toHtml();
  }

  function getJs()
  {
    return $this->_js;
  }
}
