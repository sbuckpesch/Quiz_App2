<style>
 .generic_dialog {
   height: 0;
   left: 0;
   outline: medium none;
   overflow: visible;
   position: absolute;
   top: 0;
   width: 100%;
   z-index: 250;
 }


 .generic_dialog_popup {
   height: 0;
   margin: auto;
   overflow: visible;
   position: relative;
   width: 465px;
                   }

 .generic_dialog div.dialog_loading {
   background-color: #F2F2F2;
   border: 1px solid #606060;
   font-size: 25px;
   padding: 10px;
         }
   #generic_dialog_overlay {
     background-color: #FFFFFF;
     height: 100%;
     opacity: 0;
     position: fixed;
     top: 0;
     width: 100%;
     z-index: 200;
                               }
 #generic_dialog_overlay.dark {
   background-color: #747474;
   opacity: 0.5;
         }
         #generic_dialog_overlay.white {
           background-color: #FFFFFF;
           opacity: 0.5;
                 }

                 .pop_content {
                       direction: ltr;
                     }
                     .pop_dialog_rtl .pop_content {
                           direction: rtl;
                         }
                         .pop_content h2.dialog_title {
                               background: none repeat scroll 0 0 #6D84B4;
                                   border-color: #3B5998 #3B5998 -moz-use-text-color;
                                       border-style: solid solid none;
                                           border-width: 1px 1px medium;
                                               color: #FFFFFF;
                                                   font-size: 15px;
                                                       font-weight: bold;
                                                           margin: 0;
                                                         }
                                                         .pop_content h2.secure {
                                                               background: url("http://static.ak.fbcdn.net/rsrc.php/v1/zu/r/jp8TzrZb6J1.png") no-repeat scroll 98% 50% #6D84B4;
                                                             }
                                                             .pop_content h2.loading {
                                                                   background: url("http://static.ak.fbcdn.net/rsrc.php/v1/z-/r/AGUNXgX_Wx3.gif") no-repeat scroll 98% 50% #6D84B4;
                                                                 }
                                                                 .pop_content h2.dialog_loading {
                                                                       background: url("http://static.ak.fbcdn.net/rsrc.php/v1/z-/r/AGUNXgX_Wx3.gif") no-repeat scroll 400px 10px #6D84B4;
                                                                           padding-right: 40px;
                                                                         }
                                                                         .pop_content h2 span {
                                                                               display: block;
                                                                                   padding: 5px 10px;
                                                                                 }
                                                                                 .pop_content .dialog_content {
                                                                                       background: none repeat scroll 0 0 #FFFFFF;
                                                                                           border-color: #555555;
                                                                                               border-right: 1px solid #555555;
                                                                                                   border-style: solid;
                                                                                                       border-width: 0 1px 1px;
                                                                                                     }
                                                                                                     .pop_content .dialog_body {
                                                                                                           border-bottom: 1px solid #CCCCCC;
                                                                                                               padding: 10px;
                                                                                                             }
                                                                                                             .omitDialogFooter .pop_content .dialog_body {
                                                                                                                   border-bottom: 0 none;
                                                                                                                 }
                                                                                                                 .pop_content .dialog_summary {
                                                                                                                       background: none repeat scroll 0 0 #F2F2F2;
                                                                                                                           border-bottom: 1px solid #CCCCCC;
                                                                                                                               padding: 8px 10px;
                                                                                                                             }
                                                                                                                             .pop_content .dialog_buttons {
                                                                                                                                   background: none repeat scroll 0 0 #F2F2F2;
                                                                                                                                       padding: 8px 10px;
                                                                                                                                           position: relative;
                                                                                                                                               text-align: right;
                                                                                                                                             }
                                                                                                                                             .pop_content .dialog_buttons_msg {
                                                                                                                                                   float: left;
                                                                                                                                                       line-height: 17px;
                                                                                                                                                           padding-top: 4px;
                                                                                                                                                         }
                                                                                                                                                         .pop_content .dialog_footer {
                                                                                                                                                               background: none repeat scroll 0 50% #F2F2F2;
                                                                                                                                                             }
                                                                                                                                                             .pop_container_advanced {
                                                                                                                                                                   -moz-border-radius: 8px 8px 8px 8px;
                                                                                                                                                                       background: none repeat scroll 0 0 rgba(82, 82, 82, 0.7);
                                                                                                                                                                           padding: 10px;
                                                                                                                                                                         }

                                                                                                                                                                         .uiButtonLarge, .uiButtonLarge .uiButtonText, .uiButtonLarge input {
                                                                                                                                                                               font-size: 14px;
                                                                                                                                                                             }
</style>
<div id="" class="generic_dialog pop_dialog " tabindex="0" role="alertdialog" aria-labelledby="title_dialog_0" style="display:none">
  <div class="generic_dialog_popup" style="top: 253px; width: 467px;">
    <div class="pop_container_advanced">
      <div  class="pop_content">
        <h2 class="dialog_title" id="title_dialog_0">
        <span>Upload Quiz Photo</span>
        </h2>
        <div class="dialog_content">
          <div class="dialog_body">
            <div class="fb_protected_wrapper" fb_protected="true">
              <div>
              </div>
            </div>
          </div>
          <div class="dialog_buttons clearfix">
            <label class="uiButton uiButtonLarge uiButtonConfirm">
              <input type="button" name="button1" value="Save" >
            </label>
            <label class="uiButton uiButtonLarge uiButtonConfirm">
              <input type="button" name="button2" value="Cancel" >
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
