/**
 * a global object, so can store variables
 */

var FrdGlobal=new Object();
FrdGlobal.set=function(key,value){

  FrdGlobal[key]=value;
};

FrdGlobal.get=function(key){

  if( exists(FrdGlobal[key]) )
    return FrdGlobal[key];
  else
    return null;
};

/**
 * check if a variable exists,
 * this is for check in development, 
 * so you do not need alert(FrdGlobal.get('baseurl'));
 */
FrdGlobal.check=function(key){

  if( exists(FrdGlobal[key]) )
    alert(FrdGlobal[key]);
  else
    alert(key+' not exists');
};

FrdGlobal.display=function(){

  if( isFunction(var_dump) )
    var_dump(FrdGlobal);
  else
  {
    showError('Sorry ,without function var_dump, i can not display'); 
  }
};
