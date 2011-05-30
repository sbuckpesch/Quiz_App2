<?php
/* jquery 语法
 * 
 * 绑定动作
 * 动作执行
 * 添加绑定,
 * 删除绑定
 */
class Frd_Html_Grid_Js
{
  //执行的动作有三种:
  //还有其它, to_page (默认存在)
  const LINK_ONLY=1;// 1, 只有链接 (add)
  const LINK_ID=2;  // 2, 链接+id={id} (edit)
  const LINK_IDS=4; // 3, 链接+ids={ids} (del)

  protected $_baseurl='';
  protected $_functions=array();
  protected $_func_prefix="frd_grid_func_"; //函数前缀,页面冲突
  protected $_other_functions=array(); //操作以外的独立函数


  function __construct($baseurl)
  {
    $this->_baseurl=$baseurl;
    $this->addToPage();
    $this->bindAction("add",self::LINK_ONLY);
    $this->bindAction("edit",self::LINK_ID);
    $this->bindAction("del",self::LINK_IDS);
    $this->bindAction("show",self::LINK_ID);
  }

  function addToPage()
  {
    $js_func='function to_page(page)'."\n";
    $js_func.='{'."\n";
    $js_func.='location.href="'.$this->_baseurl.'/list/page/"+page;'."\n";
    $js_func.='}'."\n";

    $this->_other_functions['to_page']=$js_func;

    //$this->bindAction("to_page",$js_func);
  }


  //bindAction("add",LINK_ONLY)
  //bindAction("edit",LINK_ID)
  //bindAction("del",LINK_IDS);
  function bindAction($action,$type)
  {
    if(isset($this->_functions[$action]))
      throw new Exception("Action Has Exist!");

      $this->_functions[$action]=$this->_createAction($action,$type); 
  }

  //_createAction($action,LINK_ONLY|LINK_ID|LINK_IDS)
  // return js function
  function _createAction($action,$type)
  {
    $func='';
    switch($type)
    {
    case self::LINK_ONLY:
      $func.="function {$this->_func_prefix}{$action}()";
      $func.='{';
      $func.=sprintf('location.href="%s/%s";',$this->_baseurl,$action);
      $func.='}';
      break; 
    case self::LINK_ID:
      $func.=<<<JS
      function {$this->_func_prefix}{$action}()
      {
        /*获取第一个选择的记录*/
        var id=0;
        $("input[type=checkbox][name^=\'frd_grid_select\']").each(function(i)
        {
          if( $(this).attr('checked') == true && id == 0)
          {
            id=$(this).attr('id'); 
          }
        });

        if(id == 0)
        {
          alert('请选择');
        }
        else
        {
          location.href="{$this->_baseurl}/{$action}/id/"+id;
        }
      }
JS;
      break; 
    case self::LINK_IDS:
      $func.=<<<JS
      function {$this->_func_prefix}{$action}()
      {
        //获取第一个选择的记录
        var id='';
        $("input[type=checkbox][name^='frd_grid_select']").each(function(i)
        {
          if( $(this).attr('checked') == true )
          {
            id=$(this).attr('id')+","+id; 
          }
        });

        if(id == '')
        {
          alert('请选择');
        }
        else
        {
          location.href="{$this->_baseurl}/{$action}/ids/"+id;
        }
      }
JS;
      break; 
    }

    return $func;
  }

  //unbindAction($action);
  function unbindAction($action)
  {
    if(!isset($this->_functions[$action]))
      throw new Exception("Action Has Not Exist!");

      unset($this->_functions[$action]);
  }


  //生成grid js代码
  function toHtml()
  {
    $html='';
    foreach($this->_other_functions as $action=>$js)
    {
      $html.=$js;
    }

    foreach($this->_functions as $func)
    {
      $html.=$func;
      $html.="\n";
    }

    $html.="$(document).ready(function(){\n";

    foreach($this->_functions as $action=>$js)
    {
      $id="#grid_{$action}";
      $func=$this->_func_prefix.$action;

      $html.=sprintf('$("%s").click(function(){%s();return false;});',$id,$func);
      $html.="\n";
    }
    $html.="\n});";

    return $html;
  }

}
