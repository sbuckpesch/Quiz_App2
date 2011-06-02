/* Frd Popup */
var FrdPopup=new Object();
FrdPopup.checked=false;
FrdPopup._options=new Object();
FrdPopup.getId=function(id){
  if(typeof(id) == 'number')
    return id;
  else if(typeof(id) == 'string')
    return parseInt(number);
  else
    return 0;
};

//check if init success
// 1, the css is loaded
FrdPopup.setup=function()
{
  var setupid='frd_popup_setup';

  jQuery("body").append('<div id="'+setupid+'" ></div>');
  var width=jQuery("#"+setupid+"").width();

  if(width < 90 || width > 110)
  {

    var msg='FrdPopup: Have you load class of fred_popup? \n';
    msg+='setup class and id =  '+setupid;

    alert(msg);
    return false;
  }

  FrdPopup.checked=true;;
  return true;
};

FrdPopup.init=function(options,id){
  //setup check
  if(FrdPopup.checked= false)
    FrdPopup.setup();



  id=FrdPopup.getId(id);

  FrdPopup._options[id]=new Object();
  //default value
  FrdPopup._options[id]['type']='html';

  if(typeof(options) == 'object')
  {
    FrdPopup._options[id]=options;
  }

  FrdPopup._options[id]['current_id']=id;
  FrdPopup._options[id]['showoverlay']=true;

};

FrdPopup.setOption=function(key,value,id){
  id=FrdPopup.getId(id);

  if(isObject(FrdPopup._options[id]) == false)
  {
    throw new Error("options "+id+" not object");
  }

  FrdPopup._options[id][key]=value ;
};
FrdPopup.help=function()
{
  var html="Options :\n \
  array( \n \
    0=>array( \n\
      current_id:0|1|2|3 ... \n\
      id:#popup_1 \n\
      selector:#popup_1 \n\
      type:  html|ajax \n\
      title:  title html \n\
      content: content html \n\
      bottom:  bottom html \n\
      template: template \n\
      openopen: function call \n\
      openclose: function call \n\
      showoverlay:true \n\
    ) , \n\
    1=>array( \n\
    ) , \n\
  ) \n\
  ";
  alert(html);
};

FrdPopup.render=function(id){
  var id=FrdPopup.getId(id);

  if(FrdPopup._options[id]['type'] == 'ajax')
  {
    var file=FrdPopup._options[id]['template'];
    var response = jQuery.ajax({url:file, async:false});

    var html = response.responseText;    

    if(exists(response.status) == true && response.status != 200)
    {
      showError("Ajax Status:"+response.status); 
      showError("Ajax Result:"+html);
    }

    //var_dump(response);

    //parse variables 
    var pattern=/{[^}]*}/ig;

  var matches=html.match(pattern);

  if(exists(matches) == true)
  {
    //alert(matches.length);
    for(var i=0; i<matches.length; i++)
    {
      var match=matches[i];

      match=match.replace('{','');
        var key=match.replace('}','');

        if(exists(FrdPopup._options[id][key]) == true)
        {
          html=html.replace(matches[i],FrdPopup._options[id][key]);
        }
    }
  }

  jQuery("body").append(html);
}
  };
  FrdPopup.setPos=function(id)
  {
    var id=FrdPopup.getId(id); 
    var selector=FrdPopup._options[id]['selector'];

    var top=FrdPopup.getPageScroll()[1] + (FrdPopup.getPageHeight() / 10);
    //var left=jQuery(window).width() / 2 - 205;
    alert(FrdPopup.getPageScroll()[1]);
    alert(FrdPopup.getPageHeight());
    alert(top);

    jQuery(selector).css('margin','auto'); //make it in center

    jQuery(selector).css('top',top);
    //jQuery(selector).css('left',left);

    FrdPopup.showOverlay();
  };
  FrdPopup.open=function(id){
    id=FrdPopup.getId(id); 
    if(exists(FrdPopup._options[id]) == false  )
    {
      alert('Seems You do not init by call FrdPopup.init(...)');    
    }

    FrdPopup.render(id);

    var selector=FrdPopup._options[id]['selector'];

    if(jQuery(selector).html() == null)
    {
      alert("invalid selector: "+selector);
      return false;
    }

    FrdPopup.setPos(id);
    jQuery(selector).show(600);

  };

  FrdPopup.close=function(id){
    id=FrdPopup.getId(id); 

    if(exists(FrdPopup._options[id]) == false)
    {
      return false; 
    }

    var selector=FrdPopup._options[id]['selector'];

    jQuery(selector).remove();
    FrdPopup.hideOverlay();
  }
  //showOverlay()
  FrdPopup.showOverlay=function(id) 
  {
    var id=FrdPopup.getId(id);
    if(FrdPopup._options[id]['showoverlay']==false)
      return ;


    jQuery('#frd_popup_overlay').remove();
    jQuery("body").append('<div id="frd_popup_overlay" class="frd_popup_hide"></div>')

    jQuery('#frd_popup_overlay').hide().addClass("frd_popup_overlaybg")
    .click(function() {FrdPopup.close(id)})
    .fadeIn(200)
    return false;
  }
  FrdPopup.hideOverlay=function() 
  {
    var id=FrdPopup.getId(id);

    if(FrdPopup._options[id]['showoverlay']==false)
      return ;

    jQuery('#frd_popup_overlay').fadeOut(200, function(){
        jQuery("#frd_popup_overlay").removeClass("frd_popup_overlaybg")
        jQuery("#frd_popup_overlay").addClass("frd_popup_hide")
        jQuery("#frd_popup_overlay").remove()
      })

    return false
  }

  // getPageScroll() by quirksmode.com
  FrdPopup.getPageScroll=function()
  {
    var xScroll, yScroll;
    if (self.pageYOffset) {
      yScroll = self.pageYOffset;
      xScroll = self.pageXOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
      yScroll = document.documentElement.scrollTop;
      xScroll = document.documentElement.scrollLeft;
    } else if (document.body) {// all other Explorers
      yScroll = document.body.scrollTop;
      xScroll = document.body.scrollLeft;
    }
    return new Array(xScroll,yScroll)
  }

  // Adapted from getPageSize() by quirksmode.com
  FrdPopup.getPageHeight=function() {
    var windowHeight
    if (self.innerHeight) {	// all except Explorer
      windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
      windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
      windowHeight = document.body.clientHeight;
    }
    return windowHeight
  }

