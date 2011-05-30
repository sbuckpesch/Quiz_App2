<?php
class Frd_Form_Render_Table
{
    protected $_data;
    protected $_form;
    protected $_elements;
    protected $_validate_messages;
    protected $form_params;

    function __construct($data,$form,$elements,$validate_messages,$form_params)
    {
        $this->_data= $data ;
        $this->_form=$form ;
        $this->_elements= $elements ;
        $this->_validate_messages=$validate_messages;

        $this->_form_params=$form_params;

    }

    function render()
    {
        $data=$this->_data;
        $table=new Frd_Html_Table();

        foreach($this->_elements as $name=>$params)
        {
          $options=$params[1];
          $selected=$params[2];
          $params=$params[0];

            $type=$params['type'];

            //set value ,if need
            if($data!=false && isset($data[$name]))
                $params['value']=$data[$name];

            $html=($this->_form->$type($params));
            //add validate

            if(isset($this->_validate_messages[$name]))
            {
                $div=new Frd_Html_Element('div',array('class'=>'validate-errors'));
                $ul=new Frd_Html_Element('ul');
                $text='';

                foreach($this->_validate_messages[$name] as $message)
                {
                    $ul->add('li',null,$message);
                }

                $div->appendText($ul->toHtml());

                $html.=$div->toHtml();
            }

            if(!isset($params['label']))
            {
                $label=$name;
            }
            else
            {
                $label=$params['label'];
            }

            if($type == "submit" || $type == 'button')
                $label='';

            $tr=new Frd_Html_Tr();

            $td=new Frd_Html_Td();
            $td->appendText($label);
            $tr->addTd($td);

            $td=new Frd_Html_Td();
            $td->appendText($html);
            $tr->addTd($td);


            $table->body->addTr($tr);
        }

        $html= $this->_form->tag_start($this->_form_params);
        $html.= "\n";
        $html.= $table->toHtml();
        $html.= "\n";
        $html.= $this->_form->tag_end();

        return $html;
    }
}
