/**
 * this file contain some useful function ,
 * it should load before other frd js, 
 * and other will sometimes depend on functions int this file
 */

/**
 * check if a variables exists
 */
function exists(obj)
{
  if(typeof(obj) == 'undefined')
  return false;
  else
  return true;
}

/**
 * check a variable is object
 */
function isObject(obj)
{
  if(typeof(obj) == 'undefined')
  return false;

  if(typeof(obj) != 'object')
  return false;

  if(obj == null)
  return false;

  if(obj == false)
  return false;

  return true;
}
/**
 * check a variable is function
 */
function isFunction(obj)
{
  if(typeof(obj) == 'undefined')
  return false;

  if(typeof(obj) != 'function')
  return false;

  if(obj == null)
  return false;

  if(obj == false)
  return false;

  return true;
}
/**
 * show error message
 */
function showError(msg)
{
  alert(msg);
}

/**
 * display object 's value,it's only print first leavel's value,
 * for simple object
 */
function displayObject(obj)
{
  if(isObject(obj) == false)
  {
    alert('not object, can not display it'); 
    return false;
  }

  var str='';
  for(var key in obj)
  {
    str+=key + '=>' + obj[key] + '\n'; 
  }

  alert(str);
}

/**
 * get html from ajax
 */
function getajaxhtml(url,params)
{
  if(isObject(params) == false)
    params=new Object();

  var response = jQuery.ajax({url:url,data:params,type:'POST', async:false});

  var html = response.responseText;    

  if(exists(response.status) == true && response.status != 200)
  {
    showError("Ajax Status:"+response.status); 
    showError("Ajax Result:"+html);
  }

  return html;
}

/**
 * Object's clone, this only clone object's first level prototype
 */
function clone(cloneobj)
{
  var newObj = new Object();
  for(elements in cloneobj)
  {
    newObj[elements] = this[elements];
  }
  return newObj;
}

/**
 * Object's clone, this only clone all object's prototype by recursion
 */
function cloneAll(cloneobj)
{
  function clonePrototype(){}
  clonePrototype.prototype = cloneobj;
  var obj = new clonePrototype();
  for(var ele in obj)
  {
    if(typeof(obj[ele])=="object") obj[ele] = cloneAll(obj[ele]);
  }
  return obj;
}

/** cookie functions */
/**
 * set cookie
 *
 * @param integer days default 1
 */
function setCookie(name,value,days,path)
{
  if(exists(days) == false)
    var days = 1;

  if(exists(path) == false)
    var path = '/';

  var exp  = new Date();    //new Date("December 31, 9998");
  exp.setTime(exp.getTime() + days*24*60*60*1000);

  document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString() +";path="+path+";";
}


/**
 * get cookie ,if not exists , return null
 */
function getCookie(name)      
{
  var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
  if(arr != null)
    return unescape(arr[2]);
  else
  return null;

}
//delete cookie 
function clearCookie(name)
{
  var exp = new Date();
  exp.setTime(exp.getTime() - 1);
  var cval=getCookie(name);
  if(cval!=null)
    document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

/**
 * get cookies 
 */
function getAllCookie()
{
  var result=new Object();
  var strCookie=document.cookie;

  var arrCookie=strCookie.split("; ");
  for(var i=0;i<arrCookie.length;i++)
  {
    var arr=arrCookie[i].split("=");

    result[arr[0]]=arr[1];
  }

  return result;
}
