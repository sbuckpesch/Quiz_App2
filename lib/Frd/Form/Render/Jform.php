<?php
class Frd_Form_Render_Jform
{
    protected $_data;
    protected $_form;
    protected $_elements;
    protected $_validate_messages;
    protected $form_params;

    protected $_title='';

    function __construct($data,$form,$elements,$validate_messages,$form_params,$form_title='')
    {
        $this->_data= $data ;
        $this->_form=$form ;
        $this->_elements= $elements ;
        $this->_validate_messages=$validate_messages;

        $this->_form_params=$form_params;

        $this->_title=$form_title;

    }

    /*
    function setTitle($title)
    {
      $this->_title=$title; 
    }
     */

    function render()
    {
        $data=$this->_data;

        $html= $this->_form->tag_start($this->_form_params);
        $html.= "\n";
        $html.='<div class="jform">';
        $html.='<h2 class="title">'.$this->_title.'</h2>';

        foreach($this->_elements as $name=>$params)
        {
          $options=$params[1];
          $selected=$params[2];
          $params=$params[0];

            $type=$params['type'];
            if($type == 'hidden')
              $html.='<div class="wrap" style="display:none">';
            else
              $html.='<div class="wrap">';

            if(isset($params['subtitle']))
                $subtitle=$params['subtitle'];
            else
                $subtitle='';

            if(isset($params['notice']))
                $notice=$params['notice'];
            else
                $notice='';

            unset($params['subtitle']);
            unset($params['notice']);

            //set value ,if need
            if($data!=false && isset($data[$name]))
                $params['value']=$data[$name];

            //add validate
            if(!isset($params['label']))
            {
                $label=$name;
            }
            else
            {
                $label=$params['label'];
            }

            if($type == "submit")
                $label='';

            //left
            //$html.='<div class="highlight" style="width:200px;float:left">';
            $html.='<div  style="float:left">';
            $html.='<div >';

            //$label=new Frd_Html_Element('label',array('for'=>$name,'class'=>'error_label'),$label);
            $label=new Frd_Html_Element('label',array('for'=>$name),$label);
            if(isset($params['required']))
                $label->add('span',array('class'=>'required'),'*');
            $html.=$label->toHtml();


            $html.=$this->_form->$type($params,$options,$selected);

            //left subtitle
            if($subtitle != false)
            {
                $div=new Frd_Html_Div(array('class'=>'subtitle'));
                $div->add('p',null,$subtitle);
                $html.=$div->toHtml();
            }

            $html.='</div>';
            $html.='</div>';


            //right tip
            $tip=new Frd_Html_Div(array('class'=>'tip'));

            $tip->add('span',array('class'=>'tip_arrow'),' ');


            $tip_content=$tip->add('div',array('class'=>'tip_content'));
            $tip_content->add('p',null,$notice);

            if(isset($this->_validate_messages[$name]))
            {
                $ul=new Frd_Html_Element('ul',array('class'=>'validate-error'));
                foreach($this->_validate_messages[$name] as $message)
                {
                    $ul->add('li',null,$message);
                }

                $tip_content->add($ul);
            }

            //if has notice or validate message ,show tip
            if($notice != false || isset($this->_validate_messages[$name]) )
            {
                $html.=$tip->toHtml(); 
            }
            


            $html.='<div style="clear:both;"> </div>';
            $html.='</div>';
        }
        //<input type="submit" class="submit" value="submit"/>
        $html.='</div>';
        $html.= "\n";
        $html.= $this->_form->tag_end();

        return $html;
    }
}
