<?php
/*
 * for translate string  to other language
 *
 * @author fred
 * 
 * usage: 
 *   require THIS FILE
 *   $global->translate=new Translate(dirname(__FILE__).'/lang');
 *
 *   in functions.php
 *     function _($str)
 *     {
 *       global $global;
 *       return $global->translate->_($str);
 *     }
 *
 *   so in other file , it can use use the function to tranlsate
 *   _('hello');
 *
 */
class Translate
{
  protected $_translate=null;
  protected $_current_language='en';

  /*
   * init class, set translate adapter , now it only use csv
   * 
   * @param csv_dir  , the dir which contain tranlsate csv files
   */
  function __construct($csv_dir)
  {
    $this->initCsv($csv_dir);
  }

  /*
   * set program 's current  laguange
   */
  function setLanguage($language)
  {
    $language=strtolower($language);
    $this->_current_language=$language;
  }

  /*
   * config csv 
   *
   * csv format is  "AAAA","BBBB","CCCC",
   */
  function initCsv($csv_dir)
  {
    $this->_translate = new Zend_Translate('csv',rtrim($csv_dir,"/").'/de.csv',
      'de',
      array( 'delimiter' => ',')
    );
  }

  /*
   * translate string, return the translated string
   */
  function _($str)
  {
    return  $this->_translate->_($str,$this->_current_language);
  }

  /*
   * translate string, echo the translated string , this is useful in template
   */
  function _p($str)
  {

    echo  $this->_translate->_($str,$this->_current_language);
  }
}
