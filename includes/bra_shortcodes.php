<?php
/***************************/
/*  Brankic WP SHORT CODES  */
/***************************/


function register_button( $buttons ) {
   array_push( $buttons, "|", "bra_shortcodes" );
   return $buttons;
}

function add_plugin( $plugin_array ) {
   $plugin_array['bra_shortcodes'] = get_template_directory_uri() . '/includes/bra_shortcodes.js';
   return $plugin_array;
}

function bra_shortcodes_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }

}

add_action('init', 'bra_shortcodes_button');

/*******************************************************************************************************************
* COLUMNS SHORTCODES                                                                                               *
*                                                                                                                  *
*******************************************************************************************************************/
function One( $atts, $content = null ) {
   return '<div class="one">' . do_shortcode($content) . '</div>';
}
add_shortcode('one', 'One'); 

function One_third( $atts, $content = null ) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'One_third');

function One_third_last( $atts, $content = null ) {
   return '<div class="one-third last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_last', 'One_third_last');

function Two_thirds( $atts, $content = null ) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds', 'Two_thirds');

function Two_thirds_last( $atts, $content = null ) {
   return '<div class="two-third last">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds_last', 'Two_thirds_last');

function One_half( $atts, $content = null ) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'One_half');

function One_half_last( $atts, $content = null ) {
   return '<div class="one-half last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half_last', 'One_half_last');

function One_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'One_fourth');

function One_fourth_last( $atts, $content = null ) {
   return '<div class="one-fourth last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth_last', 'One_fourth_last');



function Bra_google_map($atts, $content = null) {
/*******************************************************************************************************************
* GOOGLE MAP                                                                                                     *
*                                                                    *
*******************************************************************************************************************/
    extract(shortcode_atts(array("location" => "Amsterdam", "zoom" => 15), $atts)); 
    $unique_id =  $location . $zoom ;
    $unique_id = preg_replace("/[^A-Za-z0-9]/", '', $unique_id);
    $html = ""; 
    $html .= '<div class="one"><div class="google-map" id="' . $unique_id  .'"></div></div>';
    $html .= '<script type="text/javascript"> jQuery(document).ready(function($){';
    $html .= '$("#' . $unique_id .'").bra_google_map({location: "' . $location . '", zoom:' . $zoom . '})';
    $html .= '}); </script>';
    
    return $html;
}
add_shortcode('bra_google_map', 'Bra_google_map');

function Bra_photostream($atts, $content = null) {
/*******************************************************************************************************************
* PHOTOSTREAM                                                                                                      *
* social_network: dribbble, flickr, instagram or pinterest                                                                    *
*******************************************************************************************************************/
    extract(shortcode_atts(array("user" => "brankic1979", "limit" => 10, "social_network" => "dribbble", "layout" => "small", "shape" => "none"), $atts)); 
    $unique_id =  $social_network .$user . $limit ;
    $unique_id = preg_replace("/[^A-Za-z0-9]/", '', $unique_id);
    $html = "";
    if ($layout == "small")
    { 
        $html .= '<div class="photostream" id="' . $unique_id  .'"></div>';
        $html .= '<script type="text/javascript"> jQuery(document).ready(function(){';
        $html .= 'jQuery("#' . $unique_id .'").bra_photostream({user: "' . $user . '", limit:' . $limit . ', social_network: "' . $social_network . '"});';
        $html .= '}); </script>';
    }
    else 
    {
        $html .= '<div class="photostream" id="' . $unique_id  .'"></div>';
        $html .= '<script type="text/javascript"> jQuery(document).ready(function(){';
        $html .= 'jQuery("#' . $unique_id .'").bra_photostream_large({user: "' . $user . '", limit:' . $limit . ', social_network: "' . $social_network . '", columns: ' . $layout .', shape: "' . $shape .'"});';
        $html .= '}); </script>';        
    }
    return $html;
}
add_shortcode('bra_photostream', 'Bra_photostream');


function Bra_border_divider($atts, $content = null) {
/*******************************************************************************************************************
* BORDER DIVIDER WITH NOTHING                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("top" => "40", "bottom" => "40"), $atts));
   return "<div class='divider-border' style='margin-top: $top" . "px; margin-bottom: $bottom" . "px'></div><div class='clear'></div>";
}
add_shortcode('bra_border_divider', 'Bra_border_divider');

function Bra_center_title($atts, $content = null) {
/*******************************************************************************************************************
* NICE CENTERED TITLE WITH SUBTITLE                                                                                *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => 'Title', "subtitle" => 'Subtitle', 'top_margin' => '0'), $atts));
   return "<div class='section-title text-align-center' style='padding-top:" . $top_margin ."px'><h1 class='title'>$title</h1><p>$subtitle</p></div>";
}
add_shortcode('bra_center_title', 'Bra_center_title');

function Bra_divider($atts, $content = null) {
/*******************************************************************************************************************
* DIVIDER WITH NOTHING - ONLY EMPTY SPACE                                                                          *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("height" => '80'), $atts));
   return "<div class='divider' style='height: $height" . "px;'></div><div class='clear'></div>";
}
add_shortcode('bra_divider', 'Bra_divider');

function Bra_graph_container($atts, $content = null) {
/*******************************************************************************************************************
* GRAPH BARS CONTAINER                                                                                             *
*                                                                                                                  *
*******************************************************************************************************************/
    $rand = rand(0,10000);
    $html = '<ul id="skills-graph-' . $rand . '" class="skills-graph"> ' . parse_shortcode_content($content) .'</ul>'; 
    $html .= '<script type="text/javascript">jQuery(document).ready(function($){$("#skills-graph-' . $rand . '").bra_sliding_graph({speed: 1000});})</script> ';      
    return parse_shortcode_content($html);
}
add_shortcode('bra_graph_container', 'Bra_graph_container');

function Bra_graph($atts, $content = null) {
/*******************************************************************************************************************
* GRAPH BAR SHORTCODE (MUST BE INSIDE THE GRAPH CONTAINER)                                                         *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "Title", "percent" => 50), $atts));   
    $html = ' <li><p>' . $title . ' <strong>' . $percent .'%</strong></p><span class="' . $percent . '"></span></li>';
    return $html;
}
add_shortcode('bra_graph', 'Bra_graph');

function Bra_social_icons($atts, $content = null) {
/*******************************************************************************************************************
* SOCIAL ICONS                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array(), $atts));
    $html = ""; 
    $html .=  "       <ul class='social-bookmarks'>";  
    $social_list_array = explode(",", $content);
    for ($i = 0 ; $i < count($social_list_array) ; $i = $i + 2)
    {
    $html .=  "<li class='" . trim($social_list_array[$i]) . "'><a href='" . trim($social_list_array[$i + 1]) . "'>" . trim($social_list_array[$i]) . "</a></li>";   
    }
     $html .=  "           </ul>";


    return $html;
}
add_shortcode('bra_social_icons', 'Bra_social_icons');


function Bra_list($atts, $content = null) {
/*******************************************************************************************************************
* SOCIAL ICONS                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
    $html =  "<div class='$style'>" . $content . "</div>";  
    return $html;
}
add_shortcode('bra_list', 'Bra_list');


function Bra_team_member($atts, $content = null) {
/*******************************************************************************************************************
* TEAM MEMBER                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("member_name" => "", "member_position" => "", "member_img_src" => "", "member_social_list" => "", "member_columns" => ""), $atts));
    $html = ""; 
    if ($member_img_src == "")
    {
        $member_images = bra_get_images($content);
        if (count($member_images) > 0) $member_img_src = $member_images[0];
    }
    $text = bra_remove_images($content, false);
    if ($member_columns == "2") $class = "one-half"; 
    if ($member_columns == "3") $class = "one-third";
    if ($member_columns == "4") $class = "one-fourth";
    
     $html .=  "<div class='team $class'>";
     if ($member_img_src != "") $html .=  " <img src='" . $member_img_src . "' alt='' /><div class='arrow'></div>";                       
     $html .=  "       <div class='team-member-info'>\n";
     $html .=  "           <ul>\n";
     $html .=  "               <li><h2>" . $member_name . "</h2></li>";
     $html .=  "               <li><h3>" . $member_position . "</h3></li>";        
     $html .=  "           </ul>\n";
     $html .=  "           <p>" . $text ."</p>\n";         
     $html .=  "           <ul class='social-personal'>\n";        
     
     if ($member_social_list != "") 
     {
         $member_social_list_array = explode(",", $member_social_list);
         for ($i = 0 ; $i < count($member_social_list_array) ; $i = $i + 2)
         {
               $html .=  "<li><a href='" . $member_social_list_array[$i + 1] . "'>" . $member_social_list_array[$i] . "</a><span>/</span></li>";   
         }
    
     }
     $html .=  "           </ul>";
     $html .=  "       </div>";
     $html .=  "</div>";

    return $html;
}
add_shortcode('bra_team_member', 'Bra_team_member');

function Bra_icon_boxes_container($atts, $content = null) {
/*******************************************************************************************************************
* ICON BOXES CONTAINER                                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    $html =  "\n<ul class='grid row4 services'>\n" . do_shortcode( no_wpautop($content)) ."\n</ul>\n";
    return no_wpautop($html);
}
add_shortcode('bra_icon_boxes_container', 'Bra_icon_boxes_container');


function Bra_icon_box($atts, $content = null) {
/*******************************************************************************************************************
* ICON BOX                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("icon" => "", "caption" => "", "url" => "", "target" => ""), $atts));
    
    $text = bra_remove_images($content, false);
    $html = ""; 
     $html .=  "\n<li>";
     $html .=  "\n<div>";
     if ($url != "") $html .=  "\n<a href='$url' target='$target'>"; 
     $html .=  "\n<h2>$caption</h2>"; 
     if ($icon != "") $html .=  "\n<img class='check_path' src='$icon' alt='' />";
     $html .=  "\n<p>" . no_wpautop($text) ."</p>";
     if ($url != "") $html .=  "\n</a>"; 
     $html .=  "\n</div>";
     $html .=  "\n</li>\n";
     
     //$html = no_wpautop($html);

    return $html;
}
add_shortcode('bra_icon_box', 'Bra_icon_box');

function Bra_boxed_text($atts, $content = null) {
/*******************************************************************************************************************
* BOXED TEXT                                                                                                    *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "", "description" => ""), $atts));
    $html = ""; 
     $html .=  "<div class='section-title home'>\n";
     $html .=  "   <h2 class='title'>$title</h2>\n";                        
     $html .=  "   <p>$description</p>\n";
     $html .=  " </div><!--END SECTION TITLE-->\n";

    return $html;
}
add_shortcode('bra_boxed_text', 'Bra_boxed_text');





function Bra_button($atts, $content = null) {
/*******************************************************************************************************************
* BUTTONS                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("text" => "Button", "url" => "http://www.brankic1979.com", "target" => "_self", "size" => "small", "style" => "", "color" => "grey"), $atts));
   return "<a target='$target' href='$url' class='button $size $style $color'>$text</a>";
}
add_shortcode('bra_button', 'Bra_button');

function Bra_highlight($atts, $content = null) {
/*******************************************************************************************************************
* HIGHLIGHTS                                                                                                       *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
   return "<span class='$style'>" .no_wpautop($content). "</span>";
}
add_shortcode('bra_highlight', 'Bra_highlight');

function Bra_dropcaps($atts, $content = null) {
/*******************************************************************************************************************
* DROPCAPS                                                                                                         *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
   return "<span class='$style'>" .no_wpautop($content). "</span>";
}
add_shortcode('bra_dropcaps', 'Bra_dropcaps');


function Bra_blockquote($atts, $content = null) {
/*******************************************************************************************************************
* BLOCKQUOTES                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("align" => "left"), $atts));
   return "<blockquote class='$align'>" .no_wpautop($content). "</blockquote>";
}
add_shortcode('bra_blockquote', 'Bra_blockquote');

function Bra_toggle($atts, $content = null) {
/*******************************************************************************************************************
* TOGGLE                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("caption" => "Toggle", "collapsable" => "yes"), $atts));
    $html = ""; 
     if ($collapsable == "yes")
     {
         $html .=  '<div class="trigger-button"><span>' . $caption . '</span></div> <div class="accordion">';
         $html .= no_wpautop($content);                                                             
         $html .= '</div><!--END ACCORDION-->';
     }
     else
     {
         $html .= '<div class="toggle-wrap">';    
         $html .=  '<span class="trigger"><a href="#">' . $caption . '</a></span><div class="toggle-container">';
         $html .= no_wpautop($content);                                                             
         $html .= '</div><!--END TOGGLE-WRAP--></div><!--END TOGGLE-CONTAINER-->';
     }
   return $html;
}
add_shortcode('bra_toggle', 'Bra_toggle');

function Bra_portfolio($atts, $content = null) {
/*******************************************************************************************************************
* PORTFOLIO                                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "", "cat_id" => "", "no" => "-1", "show_filters" => "no", "columns" => "4", "shape" => "", "hover" => "", "height" => ""), $atts));
    // The Query
    
    $fixed_height = "";
    if ($height != "") 
    {
        $height .= "px";
        $fixed_height = " fixed_height";
    }
    
    
    $my_cat_object = get_category($cat_id);
    
    if (!($my_cat_object)) $my_cat_object = get_term($cat_id, "portfolio_category");
    
    $taxonomy = $my_cat_object->taxonomy;
    
    if ($taxonomy ==  "portfolio_category") $post_type = "portfolio_item"; else $post_type = "post";
    
    $args=array(
    'tax_query' => array(
        array(
            'taxonomy' => $taxonomy,
            //'field' => $termID
            'terms' => $cat_id
        )
    ),
    'post_type' => $post_type,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $no
    );
    global $wp_query, $post;
    $taxonomyName = $taxonomy;
    $termchildren = get_term_children( $cat_id, $taxonomyName );
    // to reorder the subcats
    //print_r($termchildren);
    //$temp_array = array();
    //$temp_array[0] = $termchildren[3];
    //$temp_array[1] = $termchildren[2];
    //$temp_array[2] = $termchildren[1];
    //$temp_array[3] = $termchildren[0];
    //$temp_array[4] = $termchildren[4]; 
    //$termchildren = $temp_array;    
    // end of subcats reordering
    $html = "";
    if ($title != "")
    {
    $html .= '<h3 class="title">' . $title . '</h3>';
    }
    if ($show_filters != "no")
    {
    
    $html .=    '<div class="filterable"><ul id="portfolio-nav">';
    $html .=    '<li class="current"><a href="#" data-filter="*">' . __('All', BRANKIC_THEME_SHORT) . '</a><span>/</span></li>';
    $k = 0;
    foreach ($termchildren as $child) 
    {
        $term = get_term_by( 'id', $child, $taxonomyName );
        $k++;
        if ($term->name != "") $html .= '<li><a href="#" data-filter=".' . $term->slug . '">' . $term->name . '</a><span>/</span></li>';
    }
    
    $html .= '</ul><!--END PORTFOLIO-NAV--></div><!--END FILTERABLE-->';
    }
    
    $html .= '<div class="portfolio-grid">';
    if ($shape != "") $html .= '<ul id="thumbs" class="shaped ' . $shape . '">';   
    else $html .= '<ul id="thumbs">';
    
    $temp = $wp_query;
    $wp_query = new WP_Query( $args );

// The Loop
while ( $wp_query->have_posts() ) : $wp_query->the_post();
    $title = get_the_title();
    $permalink = get_permalink();
    $queried_post = get_post(get_the_ID());
    $excerpt = $queried_post->post_excerpt;
    
    $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); //original size
    
    $featured_image_array_large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); //thumb size
    
    $featured_image_array_small = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-square' ); //square size
    
    $large_image = $featured_image_array[0];
    
    if ($excerpt == "") $excerpt = bra_excerpt(20);
    
    if ($shape != "" && $shape != "triangle") 
    {
        $featured_image = $featured_image_array_small[0]; 
    }
    else 
    {
        $featured_image = $featured_image_array_large[0]; 
    }
    
    $video_link = get_post_meta(get_the_ID(), BRANKIC_VAR_PREFIX."video_link", true);
    $subtitle = get_post_meta(get_the_ID(), BRANKIC_VAR_PREFIX."subtitle", true); 
    
    
    // get the portfolio cats
    $terms = get_the_terms( $post->ID, $taxonomy );                           
    if ( $terms && ! is_wp_error( $terms ) ) : 
        $names = array();
        $slugs = array();
        foreach ( $terms as $term ) {
            $names[] = $term->name;
            $slugs[] = $term->slug;
        }                                
        $name_list = join( ", ", $names );
        $slug_list = join( " ", $slugs ); 
    endif;
    if ($shape != "") $html .= '<li class="item ' . $slug_list . '" ><div class="item-container">'; 
    else $html .= '<li class="col' . $columns . ' item ' . $slug_list . $fixed_height . '" style="height:' . $height . '; overflow:hidden">';
    
    if ($hover == "no") 
    {
        $html .= '<a href="' . $permalink . '"><img src="' . $featured_image . '" alt="" /></a>';
        
        if ($shape != "")  
        {
            $html .= '</div>';
            $html .= '<div class="item-info-overlay"><div><h3 class="title"><a href="' . $permalink . '">' . $title . '</a></h3><h4 class="no_title"> ' . $name_list . '</h4>';
            $html .= '<p>' . $excerpt . '</p>';
            $html .= '<a href="' . $permalink . '" class="view">details</a>';
            $html .= '<a title="' . $title . ' / ' . $name_list . '" href="' . $large_image . '" class="preview" data-rel="prettyPhoto[' . $slug_list_ . ']">preview</a>';
            $html .= '</div></div><!--END ITEM-INFO-OVERLAY-->';
        }
        else $html .= '<div class="col' . $columns . ' item-info"><h3 class="title"><a href="' . $permalink . '">' . $title . '</a></h3></div>'; 
        

    }
    else
    {
        $html .= '<img src="' . $featured_image . '" alt="" />';
        
        if ($shape != "")  $html .= '</div>';
        else $html .= '<div class="col' . $columns . ' item-info"><h3 class="title"><a href="' . $permalink . '">' . $title . '</a></h3></div>';
        
        if ($shape != "") $html .= '<div class="item-info-overlay"><div><h3 class="title"><a href="' . $permalink . '">' . $title . '</a></h3><h4 class="no_title"> ' . $name_list . '</h4>';
        else $html .= '<div class="item-info-overlay"><div><h4 class="no_title"> ' . $name_list . '</h4>';   
        
        $html .= '<p>' . $excerpt . '</p>';
        $html .= '<a href="' . $permalink . '" class="view">details</a>';
        
        if ($video_link != "") $large_image = $video_link;
        
        $slug_list_ = "pretty_photo_gallery";
        
        $html .= '<a title="' . $title . ' / ' . $name_list . '" href="' . $large_image . '" class="preview" data-rel="prettyPhoto[' . $slug_list_ . ']">preview</a>';
        $html .= '</div></div><!--END ITEM-INFO-OVERLAY-->';
    }
    
    

    $html .= '</li>';
endwhile;

$wp_query = $temp;  //reset back to original query

// Reset Post Data
//wp_reset_postdata();
    $html .= '</ul>';
    $html .= '</div>';
    return $html;
}
add_shortcode('bra_portfolio', 'Bra_portfolio');

function Bra_grid($atts, $content = null) {
/*******************************************************************************************************************
* GRID CODE WRAPPER                                                                                                *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("grid_columns" => "4"), $atts));
    $html = ""; 
    $html .= "<ul class='grid row$grid_columns clients'>\n<li>\n" .do_shortcode(no_wpautop($content)). "\n</li>\n</ul>";
    $html = str_replace("<br />", "", no_wpautop($html));
    $html = str_replace("<p>", "", no_wpautop($html));
    $html = str_replace("</p>", "", no_wpautop($html));
    $html = str_replace("&nbsp;", "", no_wpautop($html));
    return $html;
}
add_shortcode('bra_grid', 'Bra_grid');






?>