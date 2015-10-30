
<div id="brankic_shortcode_form_wrapper">
<form id="brankic_shortcode_form" name="brankic_shortcode_form" method="post" action="">
<script type="text/javascript">
jQuery(document).ready(function($){
	var theme_folder = $("#bra_admin_style-css").attr("href");
	theme_folder = theme_folder.substr(0, theme_folder.indexOf("includes/bra_admin_style.css"));
	$("#icon_4 option, #icon_1 option, #icon_2 option, #icon_3 option").each(function(){
		var old_value = $(this).attr("value")
		var new_value = theme_folder + old_value.substr(3);
		$(this).attr("value", new_value);
		$(this).html(old_value.substr(16));
	})
})
</script>
  <p>
    <label>Caption 1</label>
      <input type="text" name="caption_1" id="caption_1" value="Branding" size="50"/>
    
  </p>
  <p>
    <label>URL 1</label>
      <input type="text" name="url_1" id="url_1" value="http://www.brankic1979.com" size="50"/>
    
  </p>
  <p>
    <label>Icon 1</label>
      <select name="icon_1" id="icon_1">
          <?php
          $icons_urls = glob("../images/icons/*.*");
          foreach ($icons_urls as $icon_url)
          {
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url; ?></option>
          <?php
          }
          ?>
      </select>
  </p>
  
  <p>
    <label>Target 1</label>
      <select name="target_1" id="target_1">
        <option value="_self">Same window/tab</option>
        <option value="_blank">New window/tab</option>
      </select>
  </p>
  
  <p>
    <label>About 1</label>
    <textarea name="about_1" cols="50" id="about_1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
    
  </p>
  
  <hr />
  
   <p>
    <label>Caption 2</label>
      <input type="text" name="caption_2" id="caption_2" value="Logo" size="50"/>
    
  </p>
  <p>
    <label>URL 2</label>
      <input type="text" name="url_2" id="url_2" value="http://www.brankic1979.com" size="50"/>
    
  </p>
  <p>
    <label>Icon 2</label>
      <select name="icon_2" id="icon_2">
          <?php
          $icons_urls = glob("../images/icons/*.*");
          foreach ($icons_urls as $icon_url)
          {
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url; ?></option>
          <?php
          }
          ?>
      </select>
  </p>
  
  <p>
    <label>Target 2</label>
      <select name="target_2" id="target_2">
        <option value="_self">Same window/tab</option>
        <option value="_blank">New window/tab</option>
      </select>
  </p>
  
  <p>
    <label>About 2</label>
    <textarea name="about_2" cols="50" id="about_2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
    
  </p>
  
  <hr />
  
   <p>
    <label>Caption 3</label>
      <input type="text" name="caption_3" id="caption_3" value="Design" size="50"/>
    
  </p>
  <p>
    <label>URL 3</label>
      <input type="text" name="url_3" id="url_3" value="http://www.brankic1979.com" size="50"/>
    
  </p>
  <p>
    <label>Icon 3</label>
      <select name="icon_3" id="icon_3">
          <?php
          $icons_urls = glob("../images/icons/*.*");
          foreach ($icons_urls as $icon_url)
          {
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url; ?></option>
          <?php
          }
          ?>
      </select>
  </p>
  
  <p>
    <label>Target 3</label>
      <select name="target_3" id="target_3">
        <option value="_self">Same window/tab</option>
        <option value="_blank">New window/tab</option>
      </select>
  </p>
  
  <p>
    <label>About 3</label>
    <textarea name="about_3" cols="50" id="about_3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
    
  </p>
  
  <hr />
  
   <p>
    <label>Caption 4</label>
      <input type="text" name="caption_4" id="caption_4" value="Print" size="50"/>
    
  </p>
  <p>
    <label>URL 4</label>
      <input type="text" name="url_4" id="url_4" value="http://www.brankic1979.com" size="50"/>
    
  </p>
  <p>
    <label>Icon 4</label>
      <select name="icon_4" id="icon_4">
          <?php
          $icons_urls = glob("../images/icons/*.*");
          foreach ($icons_urls as $icon_url)
          {
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url; ?></option>
          <?php
          }
          ?>
      </select>
  </p>
  
  <p>
    <label>Target 4</label>
      <select name="target_4" id="target_4">
        <option value="_self">Same window/tab</option>
        <option value="_blank">New window/tab</option>
      </select>
  </p>
  
  <p>
    <label>About 4</label>
    <textarea name="about_4" cols="50" id="about_4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
    
  </p>
  
  <hr />
  

  
  <p>
      <input type="submit" name="Insert" id="bra_insert_shortcode_button" value="Submit" />
  </p>
</form>
</div>
