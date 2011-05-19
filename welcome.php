   
    <p>
      <!-- A simple popup trigger link -->
      <a class="popup" href="#popup1">Popup</a>
      <!-- Trigger links can reference the same popup -->
      <a class="popup" href="#popup1">Same Popup</a>
    </p>
    
    <p>
      <!-- An ajax popup is as simple using a real URL -->
      <a class="popup" href="./ajax.html">Ajax</a>
    </p>
    
    <p>
      <a class="popup" href="#search">Input</a>
    </p>
    
    <p>
      <a id="manual" href="javascript:void(0)">Manual</a>
    </p>
    
    <p>
      <a id="alert" href="javascript:void(0)">Alert</a>
    </p>
    
    <p>
      <a id="confirm" href="javascript:void(0)">Confirm</a>
    </p>
    
    <p>
      <a id="dialog" href="javascript:void(0)">Dialog</a>
    </p>
    
    <!-- This window will be shown when the page loads -->
    <!-- Commonly inline popups set their display to "none" and may also specify their width -->
    <div class="popup" id="popup1" style="display: none">
      <div class="popup_title">Popup Window</div>
      <div class="popup_content">
        <p>
          Wow! You just clicked on a link.
        </p>
        <p>
          <!-- Elements with the "close_popup" class will hide the popup -->
          <a class="close_popup" href="javascript:void(0)">Close</a>
        </p>
      </div>
    </div>
    
    <div class="popup" id="search" style="display: none">
      <div class="popup_title">Search</div>
      <div class="popup_content">
        <form>
          <p>
            <!-- The first input element on a form will receive the focus when shown -->
            <input id="query" name="query" type="text" value="" />
          </p>
          <p>
            <!-- Demonstrates using the Element.closePopup() function instead of a "close_link" class -->
            <a href="javascript: Element.closePopup('search')">Close</a>
          </p>
        </form>
      </div>
    </div>
    
    <div class="popup" id="mpopup" style="display: none; width: 24em;">
      <div class="popup_title">Manual Popup Window</div>
      <div class="popup_content">
        <p>This window was created by manually creating a popup window object with:</p>
        <pre style="font-size: 120%"><code>var popup = new Popup.Window('mpopup');
popup.show();</code></pre>
        <p>
          <!-- Elements with the "close_popup" class will hide the popup -->
          <a class="close_popup" href="javascript:void(0)">Close</a>
        </p>
      </div>
    </div>
