/**
 * check if the selector can get element
 *
 * return true or false
 */
function check_selector(selector)
{
  if(typeof(jQuery(selector).val()) == 'undefined')
  {
    alert(selector+'  not exists' );
    return false;
  }
  else
  {
    return true; 
  }
}

/**
 * count how number has input 
 */
function input_number(selector)
{
  check_selector(selector);

  return jQuery(selector).val().length;
}

/**
 * clear the input field's value
 */
function input_clear(selector)
{
  check_selector(selector);
  jQuery(selector).val('');
}

/**
 * sethtml
 */
function sethtml(selector,html)
{
  check_selector(selector);

  return jQuery(selector).html(html);
}
function getvalue(selector)
{
  check_selector(selector);

  return jQuery(selector).val();
}
function setvalue(selector,value)
{
  check_selector(selector,value);

  return jQuery(selector).val(value);
}
