<?php
/*
 * create tree html ,
 * this need load tree.css
 *
 * Data Format:
 * $data=array(
 *  'person'=>array(
 *    'name',
 *    'age',
 *    'like_fruits'=>array(
 *      'apple',
 *      'pear',
 *      'banana',
 *    )
 *  )
 *);
 */

/*
 * for create tree structure html
 */
class Frd_Html_Tree
{

  public static function create($data,$level=1)
  {
    if($level == 1)
      $ol= new Frd_Html_Element('ol',array('class'=>'tree'));
    else
      $ol= new Frd_Html_Element('ol');

    $level+=1;

    foreach($data as $k=>$v)
    {
      if(is_array($v))
      {
        $list=self::create($v,$level);
        $v='<input type="checkbox" id="subfolder1">'.$list;
        $v='<label >'.$k.'</label>'.$v;
        $li=new Frd_Html_Element('li',null,$v);
        $ol->add($li);
      }
      else
      {
        $v='<label >'.$v.'</label><input type="checkbox" id="subfolder1">';
        $li=new Frd_Html_Element('li',null,$v);
        $ol->add($li);
      }
    }

    return $ol->toHtml();
  }
}
