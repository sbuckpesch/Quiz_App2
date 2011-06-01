/**
 *
 */
var FrdForm=new Object();

FrdForm.selector=null;

FrdForm.url=null;
FrdForm.method='POST';
FrdForm.dataType='json';
FrdForm.target=null;
FrdForm.success=null;
FrdForm.error=null;

FrdForm.success=function(data){

  //alert(data);
  if(FrdForm.dataType == 'json')
  {
    if(data.error==1)
    {
    }
    else
    {
      showError(data.error_msg);
    }
  }

};

FrdForm.error=function(data)
{
  showError(data);
};

FrdForm.ajaxSubmit=function(callback){

  if(exists(FrdForm.selector) == false)
  {
    showError('form\'s selector not set'); 
  }
  var options=new Object();
  if(exists(FrdForm.url))
    options.url=FrdForm.url;

  if(exists(FrdForm.target))
    options.target=FrdForm.target;

  options.method=FrdForm.method;

  options.dataType=FrdForm.dataType;

  options.success=FrdForm.success;

  //alert(options.success);
  options.error=FrdForm.error;

  //displayObject(options);
  //alert('submit');


  jQuery(FrdForm.selector).ajaxSubmit(options);

  return false;
}; 

