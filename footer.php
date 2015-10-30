<?php
$layout = get_option(BRANKIC_VAR_PREFIX."boxed_stretched");
if (isset($_GET["layout"])) 
{
    if (htmlspecialchars(strip_tags($_GET["layout"])) == "stretched") $layout = "stretched" ;
    if (htmlspecialchars(strip_tags($_GET["layout"])) == "boxed") $layout = "boxed" ; 
}

if ($layout == "stretched")
{
$page_template = get_page_template();
$path = pathinfo($page_template);
$page_template = $path['filename'];

if ($page_template != "page-contact-2")
{
?>
</div><!-- END CONTENT-WRAPPER --> 
<?php
}
?>
</div><!-- END WRAPPER --> 
<?php
}
?> 
    
    
    <!-- START FOOTER -->
   
   	
    <div id="footer">
    	<div id="footerMountains">
    	</div> 
    	<div id="footerMountDivider"></div>

        <div id="footer-content">
<?php
$all_sidebars = wp_get_sidebars_widgets();
if (count($all_sidebars["Footer_1st_box"]) > 0 || count($all_sidebars["Footer_2nd_box"]) > 0 || count($all_sidebars["Footer_3rd_box"]) > 0 || count($all_sidebars["Footer_4th_box"]) > 0)
{
?>                    
                <div id="footer-top" class="clear">
                    
                <div class="one-fourth">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_1st_box") ) : endif; ?>
                </div><!--END one-fourth-->
                
                <div class="one-fourth">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_2nd_box") ) : endif; ?>
                </div><!--END one-fourth-->
                
                <div class="one-fourth">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_3rd_box") ) : endif;  ?>
                </div><!--END one-fourth-->
                
                <div class="one-fourth last">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_4th_box") ) : endif;  ?>
                </div><!--END one-fourth last-->
                    
                </div><!--END FOOTER-TOP-->
<?php
}
?>         
            
                <div id="footer-bottom" class="clear">
                            
                    <div class="one-half">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_left") ) : endif;  ?>
                    </div><!--END ONE-HALF-->    
                            
                    <div class="one-half text-align-right last">            
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_right") ) : endif;  ?>
                    </div><!--END ONE-HALF LAST-->
                    
                </div><!--END FOOTER-BOTTOM-->    
            
        </div><!--END FOOTER-CONTENT-->        
    
    	<div id="verisign">
    		<img src="<?php bloginfo('template_directory'); ?>/images/verisign.png" alt="verisign" width="" height="" />
    	</div>
    	<div id="paypalLogo">
    		<img src="<?php bloginfo('template_directory'); ?>/images/paypal.png" alt="verisign" width="" height="" />
    	</div>
    
    
    </div><!--END FOOTER-->
    
    <!-- END FOOTER -->    
<?php
if ($layout == "boxed")
{
?>
</div><!-- END CONTENT-WRAPPER --> 

</div><!-- END WRAPPER --> 
<?php
}
?> 

          



<script type='text/javascript'>
jQuery(document).ready(function($){
<?php
$bg_image_global = get_option(BRANKIC_VAR_PREFIX."background_image");
$tile_background_global = get_option(BRANKIC_VAR_PREFIX."tile_background");
$bg_image_local = get_post_meta(get_the_ID(), BRANKIC_VAR_PREFIX."background_image", true);

if ($bg_image_local != "")
{ 
    $bg_image = $bg_image_local;
    $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'page', $bg_image, get_the_ID() );
    $page_bg_image = wp_get_attachment_image_src( $image_id, "page_" . $bg_image );
    $bg_image = $page_bg_image[0];
    $tile_background = get_post_meta(get_the_ID(), BRANKIC_VAR_PREFIX."tile_background", true);
}
else
{
    $bg_image = $bg_image_global;
    $tile_background = $tile_background_global;
}

if ($bg_image != "" && $tile_background == "yes")
{
?>
    $("body").css("background", "url(<?php echo $bg_image; ?>) repeat");
<?php
}
if ($bg_image != "" && $tile_background != "yes") 
{
?> 
    $.backstretch("<?php echo $bg_image; ?>");
<?php
}
 
?>
})
<?php echo get_option(BRANKIC_VAR_PREFIX."extra_javascript"); ?> 
<?php 
if (is_single()) {
?>
/*--------------------------------------------------
         COMMENT FORM CODE
---------------------------------------------------*/
jQuery(document).ready(function($){
    $(".comment-list li").addClass("comment");
    $("#comment-form").addClass("form");
    $("#comment-form #submit").addClass("submit");
    $("#reply-title").addClass("title");
    $("#reply-title").after("<p><?php _e('Make sure you fill in all mandatory fields.', BRANKIC_THEME_SHORT); ?></p>")
});
<?php
}  
?>
</script>
<?php
if (get_option(BRANKIC_VAR_PREFIX."show_panel") == "yes")
{
?>
<!-- Theme Option --> 
<script type="text/javascript" src="<?php echo BRANKIC_ROOT."/javascript/theme-option.js" ; ?>"></script>

<div id="panel" style="margin-left:-210px;">
        
    <div id="panel-admin">
        <strong>Background pattern</strong> <br />    
        <select id="background">
          <option value="">--</option>
          <option value="">Blank</option>
          <option value="bg-1.png">Pattern 1</option>
          <option value="bg-4.png">Pattern 2</option>
          <option value="bg-6.png">Pattern 3</option>
          <option value="bg-2.png">Pattern 4</option>
          <option value="bg-5.png">Pattern 5</option>
          <option value="bg-7.png">Pattern 6</option>
          <option value="bg-3.png">Pattern 7</option>
          <option value="bg-8.png">Pattern 8</option>
          <option value="bg-9.png">Pattern 9</option>
          <option value="bg-10.png">Pattern 10</option>
          <option value="bg1.jpg">Backstreach photography</option>
        </select>
        
        <strong>Colors</strong> <br />
        <select id="colors">
          <option value="">--</option>
          <option value="color-blue.css">Blue</option>
          <option value="color-navyblue.css">Navyblue</option>
          <option value="color-orange.css">Orange</option>
          <option value="color-yellow.css">Yellow</option>
          <option value="color-green.css">Green</option>
          <option value="color-tealgreen.css">Tealgreen</option>
          <option value="color-red.css">Red</option>
          <option value="color-pink.css">Pink</option>
          <option value="color-purple.css">Purple</option>
          <option value="color-magenta.css">Magenta</option>
          <option value="color-cream.css">Cream</option>
        </select>
        
        <strong>Layout style</strong> <br />
        <select id="layout">
          <option value="">--</option>
          <option value="streched">Stretched</option>
          <option value="boxed">Boxed</option>
        </select>
<br /><br /><br />

    </div><!--PANEL-ADMIN-->    
    
    <a class="open" href="#"></a>

</div><!--PANEL-->
<?php
}
?>
<?php if (get_option(BRANKIC_VAR_PREFIX."extra_css") != "")
{
?> 
<style type="text/css">
<!--
<?php echo get_option(BRANKIC_VAR_PREFIX."extra_css"); ?>
-->
</style>
<?php
}
?>
<?php wp_footer(); ?>




		


</body>
</html>