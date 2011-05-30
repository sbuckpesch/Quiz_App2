/*functions */
  var frd_html=function(){
    this.element=function(tagname,attrs,text){
      if(tagname == undefined || tagname == null || attrs == undefined ||  attrs == null)
      {
        alert('invalid parameter: frd_html:element(tagname,attrs,text)' ) ;
      }
       var attr='';
       for(k in attrs)
       {
         attr+=' '+k+'="'+attrs[k]+'"';
       }

       if(text == undefined || text === null)
         var html='<'+tagname+' '+attr+' />';
       else
       {
         if(text == false)
           var html='<'+tagname+' '+attr+'></'+tagname+'>';
         else
           var html='<'+tagname+' '+attr+'>'+text+'</'+tagname+'>';

       }

       return html;
    };
  };

    var frd_form=function(){
      this._html=new frd_html(); /* html class */

      this._current_form=null; /* form element */

      this.element= function(tagname,type,name,param,text){

          if(param == undefined || param == false)
            param={};

          if(type != false)
            param.type=type;
          //set the name attr
          param.name=name;

          //for form ,if do not set attr id's value, the same as name
          if(param.id == undefined || param.id == null)
            param.id=name;

          var r=this._html.element(tagname,param,text);
          return r;
      };

      this.text= function(name,param){
          var r=this.element('input','text',name,param);
          return r;
      };
      this.hidden= function(name,param){
          var r=this.element('input','hidden',name,param);
          return r;
      };
      this.password= function(name,param){
          var r=this.element('input','password',name,param);
          return r;
      };
      this.textarea= function(name,param){
          var r=this.element('textarea',false,name,param,false);
          return r;
      };
      /*
      select: function(name,param){
          var r=this.element('input','password',name,param);
          return r;
      },

      multiselect($params,$options=array(),$selected=null)
      radio($params,$options)
      checkbox($params)
      */
      this.file=function(name,param){
          var r=this.element('input','file',name,param);
          return r;
      };
      this.submit= function(name,param){
          var r=this.element('input','submit',name,param);
          return r;
      };
      this.button=function(name,param){
          var r=this.element('input','button',name,param);
          return r;
      };
      /* set current form */
      this.setForm=function(form_id){
        this._current_form=jQuery("#"+form_id);          

        if( typeof(this._current_form.attr('id')) == 'undefined')
        {
          alert('setForm does not get object, do you give incorrect form id :'+form_id+' ?');
        }
       };
      /*  get form field's  value,by field's name and form id */
      this.getValue= function(name)
      {
        var field=this._current_form.find("[name="+name+"]");

        var val=field.val();

        if(field.attr('type') == 'checkbox')
        {
          if(field.attr('checked') == false ) 
            val='';
        }

        return val;
        //return (field.val());
      };

    };

    var frd_validate=function(){
        /* return true or false */
        this.validate=function(pattern,str)
        {
          str=this.trim(str);
          return pattern.test(str);
        };
        this.trim=function(str)
        {
          str=str.replace(/(^\s*)|(\s*$)/g, '');
          return str;
        };
        this.is_required=function(str)
        {
          if(typeof(str) == 'undefined' || str == null || str == false)
            return false;
          else
            return true;
        };
        this.is_numeric=function(str)
        {
          var pattern=/^\d+$/;

          return this.validate(pattern,str);
        };
        this.is_email=function(str)
        {
          var pattern=/^[\.a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
          return this.validate(pattern,str);
        };
        this.is_ip=function(str)
        {
          var pattern=/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])(\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])){3}$/;
          return this.validate(pattern,str);
        };
        /*todo: support formats;  dd.mm.yy .... */
        this.is_date=function(str)
        {
          var pattern=/^\d{4}-(0?[1-9]|1[0-2])-(0?[1-9]|[1-2]\d|3[0-1])$/;
          return this.validate(pattern,str);
        };
        this.is_url=function(str)
        {
          var pattern=/(http[s]*:\/\/)?([w-]+.)+[w-]+(\/[-w .\/?%&=]*)?/;
          return this.validate(pattern,str);
        };
        /*
         * ajax validate, request a url and post the data,
         * return must be json , if response.error == 0 , mean true
         * else response.error=1, error_msg=ERROR MESSAGE

         * return true if validate, otherwise error msg 
         */
        this.ajax=function(url,data){
          if(typeof(data) == 'undefined')
            data={};

          jQuery.post(url,data,function(data){
            try
            {
              if(data.error == 0)
              {
                return true;
              }
              else
              {
                //if false ,return error msg!
                return data.error_msg;
              }
            }catch(e)
            {
              alert('ajax validate failed, return value must be {error:ERROR,error_msg:ERROR MESSAGE}');
            }
          },'json');
     
       };
    };

    var frd_form_table=function(){
      this.form_select=null;
      this.validates={};
      this.messages={}; //validate errors
      this.form=null; //current form   ,instance of frd_form

      this.setForm=function(form_select){
        this.form=new frd_form();
        this.form_select=form_select;
        this.form.setForm(form_select);
      };

      this.addValidate=function(field,validate_name){
        if(typeof(this.validates[field])  == 'undefined')
          this.validates[field]=new Array();

        this.validates[field].push(validate_name);

      };
      this.addValidateErrors=function()
      {
        var html=new frd_html();

        for(field in this.messages)
        {
          messages=this.messages[field];

          var errors='<ul>';
          for(var i=0; i<messages.length;++i)
          {
            errors+=html.element('li',{},messages[i]);
          }
          errors+='</ul>';

          //render errors
          //jQuery(this.form_select).find("#"+field+'_validate').html('');
          jQuery(this.form_select).find("[name="+field+'_validate]').html('');
          jQuery(this.form_select).find("[name="+field+'_validate]').addClass('validate_error');
          jQuery(this.form_select).find("[name="+field+'_validate]').prepend(errors);
        }
      };

      this.clearValidateErrors=function(fields)
      {
        var html=new frd_html();

        for(k in fields)
        {
          field=fields[k];
          jQuery(this.form_select).find("[name="+field+'_validate]').html('');
          jQuery(this.form_select).find("[name="+field+'_validate]').removeClass('validate_error');
        }
      };

      this.isValid=function(){
        this.messages={};
        var validate=new frd_validate();
        var result = true; //is form valid 

        fields=new Array();
        for(field in this.validates)
        {
          var validate_names=this.validates[field];
          var value=this.form.getValue(field);

          for(var i=0; i<validate_names.length;++i)
          {
            var validate_name=validate_names[i];

            var r=eval('validate.is_'+validate_name+'("'+value+'")');
            if(r == false)
            {
              result=false;  

              if(typeof(this.messages[field]) == 'undefined')
              {
                this.messages[field]=new Array();
              }

              //set messages
              if(validate_name == 'required')
                var msg=field+' required';
              else if(validate_name == 'email')
                var msg='field not email';
              else
                var msg='';

              this.messages[field].push(msg);
            }
          }

          fields.push(field);
        }
        this.clearValidateErrors(fields); 

        //if invalid, output validate-errors
        if(result == false)
        {
          this.addValidateErrors(); 
        }

        return result;
      };
    };
    
