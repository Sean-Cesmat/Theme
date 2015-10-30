<?php
// *****************************************
// * custom fields with predefined values  *
// *****************************************
if ( !class_exists('myCustomFields') ) {

    class myCustomFields {
        /**
        * @var  string  $prefix  The prefix for storing custom fields in the postmeta table
        */
        var $prefix = BRANKIC_VAR_PREFIX;
        /**
        * @var  array  $customFields  Defines the custom fields available
        */
        
        var $customFields =    array(
            
/*            array(
                "name"            => "post_type",
                "title"            => "Select Blog post type",
                "description"    => "Select tag next to post date",
                "type"            => "select-post_type",
                "scope"            =>    array( "post"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "link-text",
                "title"            => "Link Text",
                "description"    => "",
                "type"            =>    "text",
                "scope"            =>    array( "portfolio_item"),
                "capability"    => "manage_options"
            ),
            array(
                "name"            => "link-url",
                "title"            => "Link URL",
                "description"    => "",
                "type"            =>    "text",
                "scope"            =>    array( "portfolio_item", "post"),
                "capability"    => "manage_options"
            ),*/
            array(
                "name"            => "video_link",
                "title"            => "Video URL",
                "description"    => "You Tube, Vimeo, SWF, mov (check the <a href='http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/'>prettyPhoto demo source</a>)",
                "type"            =>    "text",
                "scope"            =>    array( "portfolio_item", "post"),
                "capability"    => "manage_options"
            ),
                    
            array(
                "name"            => "subtitle",
                "title"            => "Text next to page title",
                "description"    => "Additional description next the title",
                "type"            =>    "text",
                "scope"            =>    array( "page", "portfolio_item"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "centered_title",
                "title"            => "Centered title at the top of the page",
                "description"    => "Alternate title (if you want to have different one than a page name)",
                "type"            =>    "text",
                "scope"            =>    array( "page"),
                "capability"    => "manage_options"
            ),
                    
            array(
                "name"            => "select_blog_category",
                "title"            => "Select Blog Category",
                "description"    => "If selected, Blog page template will be used",
                "type"            => "select-cat",
                "scope"            =>    array( "page"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "additional_html",
                "title"            => "Additional HTML",
                "description"    => "Perfect for embeds, or iFrames on portfolio single page below the sliders",
                "type"            => "textarea",
                "scope"            =>    array( "portfolio_item"),
                "capability"    => "manage_options"
            ), 

            array(
                "name"            => "select_sidebar",
                "title"            => "Select Sidebar",
                "description"    => "Select sidebar for this post/page only. If empty, default one wil be used",
                "type"            => "select-sidebar",
                "scope"            =>    array( "post", "page"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "twin_slides",
                "title"            => "Twin slides",
                "description"    => "If your even number of Extra images portrait oriented this option is useful",
                "type"            => "yes-no",
                "scope"            =>    array( "portfolio_item"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "hide_title",
                "title"            => "Hide title from the begining of this page",
                "description"    => "",
                "type"            => "yes-no",
                "scope"            =>    array( "page"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "add_class_title",
                "title"            => "Add class 'title' to all headings",
                "description"    => "",
                "type"            => "yes-no",
                "scope"            =>    array( "page", "portfolio_item"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "parent",
                "title"            => "Select parent page for this item",
                "description"    => "This is where you'll be sent when you click on ALL",
                "type"            => "select-page",
                "scope"            =>    array( "portfolio_item"),
                "capability"    => "manage_options"
            ),
            
           
            
            array(
                "name"            => "background_image",
                "title"            => "Choose background image from Featured / Extra Images",
                "description"    => "",
                "type"            => "featured-20",
                "scope"            =>    array( "page"),
                "capability"    => "manage_options"
            ),
            
            array(
                "name"            => "tile_background",
                "title"            => "Tile background image. If No is selected, image will be stretched.",
                "description"    => "",
                "type"            => "yes-no",
                "scope"            =>    array( "page"),
                "capability"    => "manage_options"
            ),
            
          
            array(
                "name"            => "hide_featured_image",
                "title"            => "Hide featured image",
                "description"    => "Hide featured image above the post content",
                "type"            => "yes-no",
                "scope"            =>    array( "post", "page"),
                "capability"    => "manage_options"
            )
            

            
        );
        /**
        * PHP 4 Compatible Constructor
        */
        function myCustomFields() { $this->__construct(); }
        /**
        * PHP 5 Constructor
        */
        function __construct() {
            add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
            add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
            // Comment this line out if you want to keep default custom fields meta box
            add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
        }
        /**
        * Remove the default Custom Fields meta box
        */
        function removeDefaultCustomFields( $type, $context, $post ) {
            foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
                remove_meta_box( 'postcustom', 'post', $context );
                remove_meta_box( 'postcustom', 'page', $context );
                remove_meta_box( 'postcustom', 'portfolio_item', $context );
                //Use the line below instead of the line above for WP versions older than 2.9.1
                //remove_meta_box( 'pagecustomdiv', 'page', $context );
            }
        }
        /**
        * Create the new Custom Fields meta box
        */
        function createCustomFields() {
            if ( function_exists( 'add_meta_box' ) ) {
                add_meta_box( 'my-custom-fields', 'Brankic Custom Fields', array( &$this, 'displayCustomFields' ), 'page', 'normal', 'high' );
                add_meta_box( 'my-custom-fields', 'Brankic Custom Fields', array( &$this, 'displayCustomFields' ), 'post', 'normal', 'high' );
                add_meta_box( 'my-custom-fields', 'Brankic Custom Fields', array( &$this, 'displayCustomFields' ), 'portfolio_item', 'normal', 'high' ); 
                
                
            }
        }
        /**
        * Display the new Custom Fields meta box
        */
        function displayCustomFields() {
            global $post;
            $all_category_ids = get_all_category_ids();;
            $no_of_categories = count($all_category_ids);
            
            
             $terms = get_terms("portfolio_category");
             $count = count($terms);
             if ( $count > 0 ){
                 foreach ( $terms as $term ) {
                   $all_portfolio_terms[$term->term_id] = $term->name;                   
                 }
             }          
            
            $all_page_names = all_names("page");
            $all_page_titles = all_titles("page");
            $all_page_ids = all_IDs("page");
            $no_of_pages = count($all_page_ids);
            
            $all_post_names = all_names("post");
            $all_post_titles = all_titles("post");
            $all_post_ids = all_IDs("post");
            $no_of_posts = count($all_post_ids);
            ?>
            <div class="form-wrap">
                <?php
                wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
                foreach ( $this->customFields as $customField ) {
 // Check scope
$scope = $customField[ 'scope' ];
$output = false;

foreach ( $scope as $scopeItem ) {
    switch ( $scopeItem ) {

        case "post": {
            // Output on any post screen
            if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" && $post->post_type=="post" || $post->post_type=="post" )
                $output = true;
            break;
        }

        case "page": {
            // Output on any post screen
            if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" && $post->post_type=="page" || $post->post_type=="page" )
                $output = true;
            break;
        }

        case "portfolio_item": {
            // Output on any post screen
            if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" && $post->post_type=="portfolio_item" || $post->post_type=="portfolio_item" )
                $output = true;
            break;
        }

    }
    if ( $output ) break;
}
                    // Check capability
                    if ( !current_user_can( $customField['capability'], $post->ID ) )
                        $output = false;
                    // Output if allowed
                    if ( $output ) { ?>
                        <div class="form-field form-required">
                            <?php
                            switch ( $customField[ 'type' ] ) {
                                case "checkbox": {
                                    // Checkbox
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
                                    echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
                                    if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
                                        echo ' checked="checked"';
                                    echo '" style="width: auto;" />';
                                    break;
                                }
                                case "textarea": {
                                    // Text area
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
                                    echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
                                    break;
                                }
                                
                                case "select-post_type": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "" ) { ?> selected="selected" <?php } ?>>Default</option>
<option value="video" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "video" ) { ?> selected="selected" <?php } ?>>Video</option>
<option value="gallery" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "gallery" ) { ?> selected="selected" <?php } ?>>Gallery</option>
<option value="link" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "link" ) { ?> selected="selected" <?php } ?>>Link</option>
<option value="quote" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "quote" ) { ?> selected="selected" <?php } ?>>Quote</option> 
                                    
                                    <?php 
                                    echo '</select>';
                                    break;
                                }
                                case "select-cat": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" ></option>
<?php

foreach ($all_category_ids as $cat_id) {?>
<option value="<?php echo $cat_id; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $cat_id ) { ?> selected="selected" <?php } ?>><?php echo get_cat_name($cat_id);; ?></option>
                                    
                                    <?php }
                                    echo '</select>';
                                    break;
                                }
                                
                                case "select-portfolio": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" ></option>
<?php

foreach ($all_portfolio_terms as $term_id => $term_name) {?>
<option value="<?php echo $term_id; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $term_id ) { ?> selected="selected" <?php } ?>><?php echo $term_name; ?></option>
                                    
                                    <?php }
                                    echo '</select>';
                                    break;
                                }
                                
                                case "select-post": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';

?>
<option value="" ></option>
<?php
for ($i = 0 ; $i < $no_of_posts ; $i ++) {    ?>
<option value="<?php echo $all_post_ids[$i]; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $all_post_ids[$i] ) { ?> selected="selected" <?php } ?>><?php echo $all_post_titles[$i]." / ".$all_post_names[$i]; ?></option>
                                    
                                    <?php }
                                    echo '</select>';
                                    break;
                                }
                                case "select-page": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" ></option>
<?php

for ($i = 0 ; $i < $no_of_pages ; $i ++) {    ?>
<option value="<?php echo $all_page_ids[$i]; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $all_page_ids[$i] ) { ?> selected="selected" <?php } ?>><?php echo $all_page_titles[$i]." / ".$all_page_names[$i]; ?></option>
                                    
                                    <?php }
                                    echo '</select>';
                                    break;
                                }
                                case "select-sidebar": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" ></option>
<option value="Default" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "Default" ) { ?> selected="selected" <?php } ?>>Default</option>
<option value="1" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "1" ) { ?> selected="selected" <?php } ?>>1</option>
<option value="2" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "2" ) { ?> selected="selected" <?php } ?>>2</option>
<option value="3" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "3" ) { ?> selected="selected" <?php } ?>>3</option>
                                    
                                    <?php 
                                    echo '</select>';
                                    break;
                                }
                                
                                case "featured-20": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" ></option>
<option value="featured" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "featured" ) { ?> selected="selected" <?php } ?>>Featured image</option>
<?php
$extra_images_no = get_option(BRANKIC_VAR_PREFIX."extra_images_no");
if ($extra_images_no == "") $extra_images_no = 20;
for ($k = 1 ; $k <= $extra_images_no ; $k++)
{
?>
<option value="extra-image-<?php echo $k; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "extra-image-" . $k ) { ?> selected="selected" <?php } ?>>Extra Image <?php echo $k; ?></option>
<?php
}
?>                          
                                    <?php 
                                    echo '</select>';
                                    break;
                                }
                                          
                               case "insert-something": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value="" ></option>
<option value="slider" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "slider" ) { ?> selected="selected" <?php } ?>>Slider</option>
<option value="contact_form" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "contact_form" ) { ?> selected="selected" <?php } ?>>Contact Form</option>
                                   
                                    <?php 
                                    echo '</select>';
                                    break;
                                }

                                

                                
                                case "yes-no": {
                                    // Drop Down
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';                        
                                    echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
?>
<option value=""></option>
<option value="no" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "no" ) { ?> selected="selected" <?php } ?>>No</option>
<option value="yes" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "yes" ) { ?> selected="selected" <?php } ?>>Yes</option>


                                    
                                    <?php 
                                    echo '</select>';
                                    break;
                                }
                                
                                case "text-hidden": {
                                    // Plain text hidden field
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
                                    echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
                                    break;
                                }

                                
                                default: {
                                    // Plain text field
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
                                    echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
                                    break;
                                }
                            }
                            ?>
                            <?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
                        </div>
                    <?php
                    }
                } ?>
            </div>
            <?php
        }
        /**
        * Save the new Custom Fields values
        */
        function saveCustomFields( $post_id, $post ) {
            $extra_images_no = get_option(BRANKIC_VAR_PREFIX."extra_images_no");
            if ($extra_images_no == "") $extra_images_no = 20;
            for ($i = 1 ; $i <= $extra_images_no ; $i++)
            {
                $page_url = "page_extra-image-" . $i . "_url";
                $page_caption = "page_extra-image-" . $i . "_caption";  
                $page_description = "page_extra-image-" . $i . "_description";
                  
                if (isset($_POST[$page_url])) { if ($_POST[$page_url] == "") delete_post_meta($post_id, $page_url); else update_post_meta( $post_id, $page_url, $_POST[$page_url] ); } 
                if (isset($_POST[$page_url])) { if ($_POST[$page_caption] == "") delete_post_meta($post_id, $page_caption); else update_post_meta( $post_id, $page_caption, $_POST[$page_caption] ); }
                if (isset($_POST[$page_url])) { if ($_POST[$page_description] == "") delete_post_meta($post_id, $page_description); else update_post_meta( $post_id, $page_description, $_POST[$page_description] ); }
                
                $post_url = "post_extra-image-" . $i . "_url";
                $post_caption = "post_extra-image-" . $i . "_caption";  
                $post_description = "post_extra-image-" . $i . "_description";
                  
                if (isset($_POST[$post_url])) { if ($_POST[$post_url] == "") delete_post_meta($post_id, $post_url); else update_post_meta( $post_id, $post_url, $_POST[$post_url] ); } 
                if (isset($_POST[$post_caption])) { if ($_POST[$post_caption] == "") delete_post_meta($post_id, $post_caption); else update_post_meta( $post_id, $post_caption, $_POST[$post_caption] ); }
                if (isset($_POST[$post_description])) { if ($_POST[$post_description] == "") delete_post_meta($post_id, $post_description); else update_post_meta( $post_id, $post_description, $_POST[$post_description] ); }
                
                $portfolio_item_url = "portfolio_item_extra-image-" . $i . "_url";
                $portfolio_item_caption = "portfolio_item_extra-image-" . $i . "_caption";  
                $portfolio_item_description = "portfolio_item_extra-image-" . $i . "_description";
                  
                if (isset($_POST[$portfolio_item_url])) { if ($_POST[$portfolio_item_url] == "") delete_post_meta($post_id, $portfolio_item_url); else update_post_meta( $post_id, $portfolio_item_url, $_POST[$portfolio_item_url] ); } 
                if (isset($_POST[$portfolio_item_caption])) { if ($_POST[$portfolio_item_caption] == "") delete_post_meta($post_id, $portfolio_item_caption); else update_post_meta( $post_id, $portfolio_item_caption, $_POST[$portfolio_item_caption] ); }
                if (isset($_POST[$portfolio_item_description])) { if ($_POST[$portfolio_item_description] == "") delete_post_meta($post_id, $portfolio_item_description); else update_post_meta( $post_id, $portfolio_item_description, $_POST[$portfolio_item_description] ); }
            }
            
                      
            if (isset($_POST["my-custom-fields_wpnonce"])){
            if ( !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
                return;
            }
            if ( !current_user_can( 'edit_post', $post_id ) )
                return;
            if ( $post->post_type != 'page' && $post->post_type != 'post' && $post->post_type != 'portfolio_item')
                return;
            foreach ( $this->customFields as $customField ) {
                if ( current_user_can( $customField['capability'], $post_id ) ) {
                    if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
                        update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
                    } else {
                        delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
                    }
                }
            }
        }

    } // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('myCustomFields') ) {
    $myCustomFields_var = new myCustomFields();
}
?>