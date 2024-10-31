<?php 
        /* 
        Plugin Name: Link opencart 
        Plugin URI: http://plugins.ezecom.com.au
        Description: Displays the latest products from opencart based E-commerce website.
        Author: N.A.Mohamed
        Version: 1.1 
        Author URI: http://plugins.ezecom.com.au
        */  
    
	    /*  Copyright 2013  N.A.M  (email : nam@plugins.ezecom.com.au)
	
	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License, version 2, as 
	    published by the Free Software Foundation.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
		*/
		
    function opcart_admin(){
    	include ('opcart_admin.php');
    }
    function link_opencart_admin () {
    	add_options_page("Link Opencart - Powered by Ezecom", "Link Opencart", 1, "link_opencart", "opcart_admin");  

    }
	add_action('admin_menu', 'link_opencart_admin'); 

	   function opclnk_getproducts($product_cnt=1) {  
        //Connect to the  database  
		    $opclnkdb = new wpdb(get_option('opclnk_dbuser'),get_option('opclnk_dbpwd'), get_option('opclnk_dbname'), get_option('opclnk_dbhost'));  
			$opclnktbn = get_option('opclnk_dbpre')."product";
			$opclnktbn_des = get_option('opclnk_dbpre')."product_description";
			$opc_imgwd = get_option ('oplnk_imgwd');
		    $opc_imght = get_option ('oplnk_imght');						$opc_price = get_option ('oplnk_price');
	
        $retval = '';  
        for ($i=0; $i<$product_cnt; $i++) {  
            //Get a random product  
            $product_count = 0;  
            while ($product_count == 0) {  
           $product_id = rand(0, 10000);  
           $product_count = $opclnkdb->get_var("SELECT COUNT(*) FROM $opclnktbn WHERE product_id=$product_id AND status=1"); 
		 
            }  
       
            //Get product image, name and URL  
            $product_image = $opclnkdb->get_var("SELECT image FROM $opclnktbn WHERE product_id=$product_id");  
            $product_name = $opclnkdb->get_var("SELECT name FROM $opclnktbn_des WHERE product_id=$product_id");  
			$product_price = $opclnkdb->get_var("SELECT price FROM $opclnktbn WHERE product_id=$product_id"); 
            $store_url = get_option('opclnk_store_url');  
            $image_folder = get_option('opclnk_store_url')."image/";  
      
            //Build the HTML code  
            $retval .= '<div class="opclnk_product" style="margin-bottom:10px; text-align:center;">';  
            $retval .= '<a href="'. $store_url .'index.php?route=product/product&product_id='.$product_id.'">
            <img src="' . $image_folder . $product_image . '" width="' .$opc_imgwd.'" height="' .$opc_imght.'"/></a><br />';  
            $retval .= '<a href="'. $store_url .'index.php?route=product/product&product_id='.$product_id .'">' . $product_name .'</a>'.'<br />';  
            $retval .=  $opc_price . '&nbsp;'. number_format ($product_price,2) .'<br />';  
			$retval .= '<a href="'. $store_url .'index.php?route=product/product&product_id='.$product_id .'"> <input class="button" type="button" value="View Details" >'.'</a>';  
            $retval .= '</div>';  
        }  
        return $retval;  
  	  }  
    
    	//widget here
 	  class wp_opclnk extends WP_Widget {
 
	    // constructor
	    function wp_opclnk() {
	    	 parent::WP_Widget(false, $name = __('Link Opencart', 'wp_widget_plugin')
			 );
	    }
	 
	    // widget form creation
	  // widget form creation
		function form($instance) {
		
		// Check values
		if( $instance) {
		     $title = esc_attr($instance['title']);
		     $prod_num = esc_attr($instance['Number of products']);
		   
		} else {
		     $title = '';
		     $text = '';
		  
		}
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('Number of products'); ?>"><?php _e('Number of products:', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('Number of products'); ?>" name="<?php echo $this->get_field_name('Number of products'); ?>" type="text" value="<?php echo  $prod_num; ?>" />
		</p>
		
		<p>
			Opencart link powered by <a href="http://plugins.ezecom.com.au" target="_blank">Ezecom Plugins </a>
		</p>
		
<?php
}
	 
	    // widget update
	   // update widget
		function update($new_instance, $old_instance) {
		      $instance = $old_instance;
		      // Fields
		      $instance['title'] = strip_tags($new_instance['title']);
		      $instance['Number of products'] = strip_tags($new_instance['Number of products']);
		
		     return $instance;
		}
	 
    	// display widget
		function widget($args, $instance) {
		   extract( $args );
		   // these are the widget options
		   $title = apply_filters('widget_title', $instance['title']);
		    $prod_num = $instance['Number of products'];
		   echo $before_widget;
		   // Display the widget
		   echo '<div class="widget-text wp_widget_plugin_box">';
		
		   // Check if title is set
		   if ( $title ) {
		      echo $before_title . $title . $after_title;
		   }
		   echo opclnk_getproducts($prod_num);	
		   echo '</div>';
		   echo $after_widget;
		 }
		}
		// register widget
		
		
		add_action('widgets_init', create_function('', 'return register_widget("wp_opclnk");'));	
?>