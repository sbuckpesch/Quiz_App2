<?php
class Frd_Func
{
  public static function today()
  {
    return date("Y-m-d H:i:s"); 
  }

  public static function quoteInto($db,$sql)
  {
    $numArg = func_num_args();
    if($numArg < 3) 
    {
      return $sql;
    }

    $args = func_get_args();

    foreach($args as $arg)
    {
      $sql=str_replace("?",$arg,$sql,1); 
    }
    //eval("$return = sprintf(¡®".str_replace(¡®?¡¯,¡®%s¡¯,$argList[0])."¡¯,".substr(strstr($this->quote($argList),¡®,¡¯),1).");");

    return $sql;
  }

  public static function array_insert(&$arr,$pos,$col)
  {
    if( $pos>count($arr)+1 )
      throw new Exception('Func:array_insert pos is too big!');
    if(is_array($col))
    {
      if(count($col) != count($arr))
        throw new Exception('Func::array_insert Error');

      foreach($arr as $k=>$v)
      {
        $pre=array_slice($v,0,$pos);
        $suff=array_slice($v,$pos);
        $arr[$k]=array_merge($pre,array($col[$k]),$suff);
      }
    }
    else
    {
      if( $pos>count($arr)+1 )
        throw new Exception('Func:array_insert pos is too big!');

      $pre=array_slice($arr,0,$pos);
      $suff=array_slice($arr,$pos);
      $arr=array_merge($pre,array($col),$suff);
    }

    return $arr;
  }

  //´ÓURL²éÑ¯×Ö·û´®ÖĞ£¬É¾³ıÒ»¸ö²éÑ¯²ÎÊı
  //$url='http://www.google.cn/search?search=AA&q=BB';
  //$url=cut_query($url,'search');
  //echo $url;
  //½á¹û£ºhttp://www.google.cn/search?&q=BB';

  public static function cut_query($url,$key)
  {
    $posi=strpos($url,"?");
    $base=substr($url,0,$posi);
    $query=substr($url,$posi+1);

    $query="&".$query."&";
    $pattern="/&$key=[^&]*?&/i";
    $query=preg_replace("/&$key=[^&]*?&/i","&",$query);

    $query=str_replace("&&","&",$query);
    $url= $base.'?'.$query;

    $url=str_replace("?&","?",$url);
    return $url;
  }

  //×Ö·û´®ÊÇ·ñ
  public static function valid($str,$default='')
  {
    if(is_string($str) && trim($str) !='')
      return trim($str);
    else
      return $default;
  }

  //»ñÈ¡µ±Ç°Ê±¼ä
  public static function now($format="Y-m-d H:i:s")
  {
    return date($format); 
  }


  //Êı×éÖĞµÄÔªËØ
  public static function valid_array($array,$key,$default='')
  {
    if(!is_array($array))
      return $default;

    if(!isset($array[$key]))
      return $default;

    $value=$array[$key];

    if(is_string($value) && trim($value) !='')
      return trim($value);
    else
      return $default;
  }

  //¸ù¾İÉúÈÕ,»ñÈ¡ÉúĞ¤
  public static function getZodiac($birthday)
  {
    //0 Êó
    $year=date("Y",strtotime($birthday));
    $zodiac=array(
      0=>'Êó',
      1=>'Å£',
      2=>'»¢',
      3=>'ÍÃ',
      4=>'Áú',
      5=>'Éß',
      6=>'Âí',
      7=>'Ñò',
      8=>'ºï',
      9=>'¼¦',
      10=>'¹·',
      11=>'Öí'
    );

    $year%=12;

    return $zodiac[$year];
  }
  //¸ù¾İÉúÈÕÈ¡ĞÇ×ù
  public static function  getStar($birthday)
  {
  /*
  Ä§ôÉ×ù(12/22 - 1/19)¡¢Ë®Æ¿×ù(1/20 - 2/18)¡¢Ë«Óã×ù(2/19 - 3/20)¡¢ÄµÑò×ù(3/21 - 4/20)¡¢½ğÅ£×ù(4/21 - 5/20)¡¢
  Ë«×Ó×ù(5/21 - 6/21)¡¢¾ŞĞ·×ù(6/22 - 7/22)¡¢Ê¨×Ó×ù(7/23 - 8/22)¡¢´¦Å®×ù(8/23 - 9/22)¡¢Ìì³Ó×ù(9/23 - 10/22)¡¢
  ÌìĞ«×ù(10/23 - 11/21)¡¢ÉäÊÖ×ù(11/22 - 12/21)   
   */

    $stars=array(
      1=>'Ä§ôÉ×ù',
      2=>'Ë®Æ¿×ù',
      3=>'Ë«Óã×ù',
      4=>'ÄµÑò×ù',
      5=>'½ğÅ£×ù',
      6=>'Ë«×Ó×ù',
      7=>'¾ŞĞ·×ù',
      8=>'Ê¨×Ó×ù',
      9=>'´¦Å®×ù',
      10=>'Ìì³Ó×ù',
      11=>'ÌìĞ«×ù',
      12=>'ÉäÊÖ×ù',
      );
    $day=date("md",strtotime($birthday));

    $day=intval($day);

    if($day < 120)
      $key=1;
    else if($day < 218)
      $key=2;
    else if($day < 321)
      $key=3;
    else if($day < 421)
      $key=4;
    else if($day < 521)
      $key=5;
    else if($day < 622)
      $key=6;
    else if($day < 723)
      $key=7;
    else if($day < 823)
      $key=8;
    else if($day < 923)
      $key=9;
    else if($day < 1023)
      $key=10;
    else if($day < 1122)
      $key=11;
    else if($day < 218)
      $key=12;
    else 
      $key=1;

    return $stars[$key];
  }
}
