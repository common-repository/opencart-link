<?php   
        if($_POST['opclnk_hidden'] == 'Y') {  
         
        $dbhost = $_POST['opclnk_dbhost'];  
        update_option('opclnk_dbhost', $dbhost);  
          
        $dbname = $_POST['opclnk_dbname'];  
        update_option('opclnk_dbname', $dbname);  
          
        $dbuser = $_POST['opclnk_dbuser'];  
        update_option('opclnk_dbuser', $dbuser);  
          
        $dbpwd = $_POST['opclnk_dbpwd'];  
        update_option('opclnk_dbpwd', $dbpwd);  
		
		$dbpre = $_POST['opclnk_dbpre'];  
        update_option('opclnk_dbpre', $dbpre);  
  
        $store_url = $_POST['opclnk_store_url'];  
        update_option('opclnk_store_url', $store_url);  
		
		$opc_imgwd = $_POST['oplnk_imgwd'];
		update_option ('oplnk_imgwd', $opc_imgwd);
		
		$opc_imght = $_POST['oplnk_imght'];
		update_option ('oplnk_imght', $opc_imght);		$opc_price = $_POST['oplnk_price'];		update_option ('oplnk_price', $opc_price);
		
	
		?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php    
        } else {
        	  
        $dbhost = get_option('opclnk_dbhost');  
        $dbname = get_option('opclnk_dbname');  
        $dbuser = get_option('opclnk_dbuser');  
        $dbpwd = get_option('opclnk_dbpwd');  
		$dbpre = get_option ('opclnk_dbpre');
        $store_url = get_option('opclnk_store_url');  
		$opc_imgwd = get_option ('oplnk_imgwd');
  		$opc_imght = get_option ('oplnk_imght');
		$opc_price = get_option ('oplnk_price');
        }
   
?>  