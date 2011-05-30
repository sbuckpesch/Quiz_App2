<?php
class Frd_Html_Tr extends Frd_Html_Element
{
    private $tds=array();

    function __construct($attrs=array())
    {
        parent::__construct('tr',$attrs);
    }

    //function addTd($attrs=array())
    function addTd($td=null)
    {
        if($td==false || get_class($td) != 'Frd_Html_Td')
            $td=new Frd_Html_Td();
        /*
        if(is_string($attrs))
            $attrs=array($attrs);
        else if(is_array($attrs))
            $attrs=$attrs;
         */


        $this->tds[]=$td;
    }

    function deleteTd($index)
    {
        unset($this->tds[$index]);
    }

    function addTdAttr($cols,$key,$value)
    {
        if(is_numeric($cols))
            $cols=array($cols);

        if($cols=="ALL")
        {
            $cols=array_keys($this->tds);
            foreach($cols as $col)
            {
                $this->tds[$col]->addAttr($key,$value); 
            } $cols=array_keys($this->tds);
        }
        else
        {
            foreach($cols as $col)
            {
                $col=$col-1;
                $this->tds[$col]->addAttr($key,$value); 
            }
        }
    }

    function toHtml()
    {
        $tds='';
        foreach($this->tds as $td)
            $tds.=$td->toHtml();
        $this->appendText($tds);

        return "\n".parent::toHtml()."\n";
    }
}
