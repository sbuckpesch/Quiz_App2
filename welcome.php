<div id="landing_page_background">
<?php echo $global->content['landing_page_background']; ?>
</div>
<div id="landing_page_top" class="landing_page_top">
<?php echo $global->content['landing_page_top']; ?>
</div>

<div class="submit_button">
<?php 
$config=$global->config;
$link=$global->link->createBaseLink($config['form_type'],array('instid'=>$global->instid,'template'=>'n','page_id'=>$global->page_id)); 

?>
  <a style="border:none"  href="<?php echo $link; ?>"  onclick="return lightbox();">
<?php echo $global->content['submit_button']; ?>
</a>

<!-- form -->
    <div class="popup" id="lightbox" style="display: none"> 
    <div class="popup_header">
      <div class="popup_title">Form</div>
      <a class="close_popup" href="javascript:void(0)">X</a>
    </div>  
      <div class="popup_content">
          <div id="thankyou" style="display: none"><?php echo $global->content['thank_you']; ?></div>      		      
        <p>
        </p>
          <!-- form content -->
          <?php require_once($config['form_type']); ?>             
      </div>          
   </div> 


<?php if($global->isAdmin == true): ?>
<?php $link=$global->link->createLink('admin.php',array('instid'=>$global->instid,'page_id'=>$global->page_id));  ?>
<a href="<?php echo $link; ?>" target="_top">admin</a>
<?php endif; ?>


<script type="text/javascript">
jQuery(document).ready(function(){

  Popup.BorderImage            = 'images/popup_border_background.png';
  Popup.BorderTopLeftImage     = 'images/popup_border_top_left.png';
  Popup.BorderTopRightImage    = 'images/popup_border_top_right.png';
  Popup.BorderBottomLeftImage  = 'images/popup_border_bottom_left.png';
  Popup.BorderBottomRightImage = 'images/popup_border_bottom_right.png';

  // Every popup should be draggable by the tilebar
  Popup.Draggable = true;

  // Focus automatically on first control in popup
  Popup.AutoFocus = true; // here to document feature; true by default


});
//jQuery("#lightbox").facebox();

/*
  * facebox will show lightbox after click,
  * even return false
 */

function lightbox()
{
  FB.ui({
    method: 'permissions.request',
      'perms':  'publish_stream, email',
      'display': 'popup' // iframe or dialog causing problems in some versions of IE7 and IE8
  },
  function(response) {
    if (response.session != null ) {
        //jQuery("#lightbox").clickHandler(document.getElementById('lightbox'));
        var popup = new Popup.Window('lightbox', {draggable: true});
        popup.show();

        return false;
    }
    else
    {
      return false;
    }
  });

      return false;
}

function form_submit()
{
  var options={
    type: 'POST',
    dataType:'json',
    success:function(data){    	  
      if(data.error == 0)
      {
        jQuery("#form_content").hide();
        jQuery("#thankyou").show();   
        //post to user's wall
        var link='<?php $link=$global->link->createLink('welcome.php',array('instid'=>$global->instid)); ?>';
        var photo_url='<?php echo $global->config['share_photo']; ?>';
        var description='<?php echo app_handle_description($global->config['share_desc']); ?>';
        var name=jQuery("#form_content [name=name]").val();
        var message=jQuery("#form_content [name=information]").val();

        fbPostToUserWall(name, '', description, link, photo_url );
      }
      else
      {
        alert(data.err_msg); 
      }
    }
  }; 
  jQuery("#join_form").ajaxSubmit(options);

  return false;
  }
</script>
