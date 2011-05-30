//file load depends check 

//is FrdPopup exists ?

if(isObject(FrdPopup) == false)
{
  showError('FrdPopup not exists');
}
/*
if(isFunction(FrdPopup.cloneAll) == false)
{
  showError('FrdPopup.cloneAll not function');
}

var FrdWarning=FrdPopup.cloneAll();
*/
var FrdWarning=cloneAll(FrdPopup)

/**
 * create warning object
 */
FrdWarning.create=function(id){

  FrdWarning.init({},id);
  FrdWarning.setOption('showoverlay',false);
  FrdWarning.setOption('type','ajax');
  FrdWarning.setOption('template','/template/frd/warning.phtml');

  FrdWarning.setOption('id','frd_popup'); //default id
  FrdWarning.setOption('selector','#frd_popup');


  //template default value
  FrdWarning.setOption('title','Warning');
  FrdWarning.setOption('content','Content');

};
