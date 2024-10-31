 <?php include ('opc_link_config.php');?>

 <div class="wrap"> 
    	<div id="icon-options-general" class="icon32"> <br /></div>
    	<?php    echo "<h2>" . __( 'Link Opencart options', 'opclnk_trdom' ) . "</h2>"; ?>  
          
        <form name="opclnk_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
            <input type="hidden" name="opclnk_hidden" value="Y">  
            <?php    echo "<h4>" . __( 'Opencart Database Settings', 'oscimp_trdom' ) . "</h4>"; ?>  
         <table class="form-table">
		  <tr>
		    <th scope="row"><?php _e("Database host: " ); ?></th>
		    <td><input type="text" name="opclnk_dbhost" value="<?php echo $dbhost; ?>" size="20"><?php _e(" ex: localhost" ); ?></td>
		  </tr>
		  <tr>
		    <td><?php _e("Database name: " ); ?></td>
		    <td><input type="text" name="opclnk_dbname" value="<?php echo $dbname; ?>" size="20"><?php _e(" ex: oscommerce_shop" ); ?></td>
		  </tr>
		   <tr>
		    <td><?php _e("Database prefix: " ); ?></td>
		    <td><input type="text" name="opclnk_dbpre" value="<?php echo $dbpre; ?>" size="20"><?php _e(" ex: database prefix, you can find this in the opencart config.php file." ); ?></td>
		  </tr>
		  <tr>
		    <td><?php _e("Database user: " ); ?></td>
		    <td><input type="text" name="opclnk_dbuser" value="<?php echo $dbuser; ?>" size="20"><?php _e(" ex: root" ); ?></td>
		  </tr>
		  <tr>
		    <td><?php _e("Database password: " ); ?></td>
		    <td><input type="text" name="opclnk_dbpwd" value="<?php echo $dbpwd; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></td>
		  </tr>
		</table> 
            <hr />  
            <?php    echo "<h4>" . __( 'Opencart Store Settings', 'oscimp_trdom' ) . "</h4>"; ?>  
             <table class="form-table">
		  <tr>
		    <th scope="row">
            <?php _e("Store URL: " ); ?></th>
            <td>
            <input type="text" name="opclnk_store_url" value="<?php echo $store_url; ?>" size="20"><?php _e(" ex: http://www.yourstore.com/" ); ?>
            </td>
          </tr>
          </table>  
          
            <hr />  
            <?php    echo "<h4>" . __( 'Wordpress Display Settings', 'oscimp_trdom' ) . "</h4>"; ?>  
             <table class="form-table">
		  <tr>
		    <th scope="row">
            <?php _e("Image Width: " ); ?></th>
            <td>
            <input type="text" name="oplnk_imgwd" value="<?php echo $opc_imgwd; ?>" size="20"><?php _e(" ex: 200" ); ?>
            </td>
          </tr>
          <tr>
          	<th scope="row">
          	<?php _e("Image Height: " ); ?>
          	</th>
          	<td>
          	<input type="text" name="oplnk_imght" value="<?php echo $opc_imght; ?>" size="20"><?php _e(" ex: 200" ); ?>
          	</td>
          </tr>                       <tr>          	<th scope="row">          	<?php _e("Price prefix: " ); ?>          	</th>          	<td>          	<input type="text" name="oplnk_price" value="<?php echo $opc_price; ?>" size="20"><?php _e(" ex: $, Rs GBP" ); ?>          	</td>          </tr>  
          </table>                  
            <p class="submit">  
            <input type="submit" class="button button-primary"" name="Submit" value="<?php _e('Update Options', 'opclnk_trdom' ) ?>" />  
            </p>  
        </form>  
        <a href="http://plugins.ezecom.com.au" style="margin-right:30px;" target="_blank">Plugin Homepage</a>  <a href="http://plugins.ezecom.com.au" style="margin-right:30px;" target="_blank">Suggest a feature</a>
        <a href="http://plugins.ezecom.com.au" style="margin-right:30px;" target="_blank">Report a bug</a>   <a href="http://plugins.ezecom.com.au" target="_blank">Donate with paypal</a>
    </div>  
