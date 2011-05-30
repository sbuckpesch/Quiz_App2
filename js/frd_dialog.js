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

var FrdDialog=FrdPopup.cloneAll();
*/
var FrdDialog=cloneAll(FrdPopup);
//var FrdDialog=FrdPopup.cloneAll2();
/**
 * create warning object
 */
FrdDialog.create=function(id){

  FrdDialog.init({},id);
  FrdDialog.setOption('showoverlay',false);
  FrdDialog.setOption('type','ajax');
  FrdDialog.setOption('template','/template/frd/dialog.phtml');

  FrdDialog.setOption('id','frd_popup'); //default id
  FrdDialog.setOption('selector','#frd_popup');


  //template default value
  FrdDialog.setOption('title','Dialog');
  FrdDialog.setOption('content','Content');

};
