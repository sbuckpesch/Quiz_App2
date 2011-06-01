//file load depends check 

//is FrdPopup exists ?

if(isObject(FrdPopup) == false)
{
  showError('FrdPopup not exists');
}
var FrdLoading=cloneAll(FrdPopup)

/**
 * create warning object
 */
FrdLoading.create=function(id){

  FrdLoading.init({},id);
  FrdLoading.setOption('showoverlay',true);
  FrdLoading.setOption('type','ajax');
  FrdLoading.setOption('template','template/frd/loading.phtml');

  FrdLoading.setOption('id','frd_popup'); //default id
  FrdLoading.setOption('selector','#frd_popup');

  FrdLoading.setOption('title','Loading...');
};
