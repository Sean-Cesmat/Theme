<!DOCTYPE html>
<?php
$PAGE_ID = get_the_ID(); 
$layout = get_option(BRANKIC_VAR_PREFIX."boxed_stretched");
if (isset($_GET["layout"])) 
{
    if (htmlspecialchars(strip_tags($_GET["layout"])) == "stretched") $layout = "stretched" ;
    if (htmlspecialchars(strip_tags($_GET["layout"])) == "boxed") $layout = "boxed" ;
} 
$page_template = get_page_template();
$path = pathinfo($page_template);
$page_template = $path['filename'];
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head>

	
	<title><?php brankic_titles(); ?></title>
    <meta name="BRANKIC_VAR_PREFIX" content="<?php echo BRANKIC_VAR_PREFIX; ?>" />
    <meta name="BRANKIC_THEME" content="<?php echo BRANKIC_THEME; ?>" />  
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel='start' href='<?php echo home_url(); ?>'>
    <link rel='alternate' href='<?php echo get_option(BRANKIC_VAR_PREFIX . "logo2"); ?>'>
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="width=device-width" /> 
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo stripslashes(get_option(BRANKIC_VAR_PREFIX.'favicon')); ?>" />	
	<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>
    
    
    <?php echo get_option(BRANKIC_VAR_PREFIX."custom_google_font_href"); ?>
    <style type="text/css">
    <!--
    h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, #primary-menu ul li a, .section-title .title, .section-title .title a, .section-title h1.title span, .section-title p, #footer h3, .services h2, .item-info h3, .item-info-overlay h3, #contact-intro h1.title, #contact-intro p, .widget h3.title, .post-title h2.title, .post-title h2.title a {
        <?php echo get_option(BRANKIC_VAR_PREFIX."custom_google_font")?>
    }
    -->
    </style>
    
    
    
 
   
    
    
    <!-- ==================== Fancy Box =========================== -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/source/jquery.fancybox.js?v=2.1.3"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/source/jquery.fancybox.css?v=2.1.2" media="screen" />
    
	<!-- ======+===================Fancy Box Script=========================--> 			

		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox();
			});
		
		
		</script>
	
	<!-- =================================================================== -->
    
<?php echo get_option(BRANKIC_VAR_PREFIX."ga"); ?>
    

<?php wp_head(); ?>
</head>
<body id="top" <?php body_class('mainBodyClass'); ?>>

<?php
if ($layout == "boxed")
{
?>
<div id="wrapper">    

<div class="content-wrapper clear"> 
<?php
}
?>
    <!-- START HEADER -->
    
    <div id="header-wrapper">
    
        <div class="header clear">
            
            <div id="logo">    
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option(BRANKIC_VAR_PREFIX."logo"); ?>" alt="" /></a>        
            </div><!--END LOGO-->
        
            <div id="primary-menu">
            <?php
            wp_nav_menu( array( 'theme_location' => 'primary-menu' , 
                                'container' => false, 
                                'menu_class' => 'menu', 
                                'menu_id' => '', 
                                'fallback_cb' => 'header_fallback'
                                ) );
            ?>      
            
                     
            </div><!--END PRIMARY MENU-->
                       
        </div><!--END HEADER-->    
<!--<div id="shopTesting"><p>We are currently testing our shopping checkout. To place an order call (509) 881-7688</p></div>-->
<?php 
	if ( is_page('cart')) { 
	}
	
	else{?> 	 
      
<?php global $woocommerce; ?>
<?php if (sizeof($woocommerce->cart->cart_contents)>0) :?>
<div id="headerCartStatus"> 
<a href="/cart/"><img src="<?php bloginfo('template_directory'); ?>/images/cart.png" alt="cart" width="35" /></a>
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a></div>

<?php endif; ?> 
<?php	} 
?> 
        
    </div><!--END HEADER-WRAPPER-->        
    
    <!-- END HEADER -->
<?php
if ($layout == "stretched")
{
    if ($page_template == "page-contact-2") $class = "class='fullwidth clear'"; else $class = "class='clear'";
?>
<div id="wrapper"  <?php echo $class; ?>>    

<?php
if ($page_template != "page-contact-2")
{
?>
<div class="content-wrapper clear">
<?php
}
}
?>