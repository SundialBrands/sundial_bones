<?php

/******
	Metaboxes for additional fields in cAc WP Samples post types
******/

add_action( 'admin_init', 'cac_wfs_sample_sm_metabox' );

function cac_wfs_sample_sm_metabox() {

	add_meta_box( 'cac_wfs_sample_sm_fields', 'Sample Page Information', 'cac_wfs_sample_display_sm_metabox', 'cac_wfs_sample', 'normal', 'core' );

}	//end cac_wfs_sample_sm_metabox()


function cac_wfs_sample_display_sm_metabox( $sample ) {

	//get saved data and create nonce field
	wp_nonce_field( 'cac_wfs_sample_sm', 'cac_wfs_sample_sm_nonce' );
	$benefit = esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_benefit', true ) );
	$needstate = esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_needstate', true ) );
	$ingredient_one = array(
		
		'image_url'	=> wp_get_attachment_url( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientone_img', true ) ),
		'img'		=> get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientone_img', true ),
		'name'		=> esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientone_name', true ) ),
		'copy'		=> esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientone_copy', true ) ),
	
	);	//end $ingredient_one
	$ingredient_two = array(
		
		'image_url'	=> wp_get_attachment_url( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredienttwo_img', true ) ),
		'img'		=> get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredienttwo_img', true ),
		'name'		=> esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredienttwo_name', true ) ),
		'copy'		=> esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredienttwo_copy', true ) ),
	
	);	//end $ingredient_two
	$ingredient_three = array(
		
		'image_url'	=> wp_get_attachment_url( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientthree_img', true ) ),
		'img'		=> get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientthree_img', true ),
		'name'		=> esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientthree_name', true ) ),
		'copy'		=> esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_ingredientthree_copy', true ) ),
	
	);	//end $ingredient_three
	$color = get_post_meta( $sample->ID, 'cac_wfs_sample_sm_color', true );
	$item_one = esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_itemone', true ) );
	$item_two = esc_html( get_post_meta( $sample->ID, 'cac_wfs_sample_sm_itemtwo', true ) );
	
	//display fields
	?>
	
	<table>
		<tbody>
			<tr>
				<td>
					<label for="">Need State:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_needstate" name="cac_wfs_sample_sm_needstate" size="50" value="<?php echo $needstate; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_benefit">Benefit:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_benefit" name="cac_wfs_sample_sm_benefit" size="50" value="<?php echo $benefit; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_color">Collection Color:</label>
				</td>
				<td>
					<select id="cac_wfs_sample_sm_color" name="cac_wfs_sample_sm_color" >
						<option value=""></option>
						<option value="darkgray" <?php selected( $color, 'darkgray' ); ?> >Gray</option>
						<option value="sheabrown" <?php selected( $color, 'sheabrown' ); ?> >Brown</option>
						<option value="orange" <?php selected( $color, 'orange' ); ?> >Orange</option>
						<option value="yellow" <?php selected( $color, 'yellow' ); ?> >Yellow</option>
						<option value="limegreen" <?php selected( $color, 'limegreen' ); ?> >Lime</option>
						<option value="salmon" <?php selected( $color, 'salmon' ); ?> >Salmon</option>
						<option value="slate" <?php selected( $color, 'slate' ); ?> >Slate</option>
						<option value="blue" <?php selected( $color, 'blue' ); ?> >Blue</option>
						<option value="magenta" <?php selected( $color, 'magenta' ); ?> >Magenta</option>
						<option value="darkred" <?php selected( $color, 'darkred' ); ?> >Red</option>
						<option value="deeppink" <?php selected( $color, 'deeppink' ); ?> >Pink</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<h2>Items Included in Sample</h2>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_itemone">First Item:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_itemone" name="cac_wfs_sample_sm_itemone" size="50" value="<?php echo $item_one; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_itemtwo">Second Item:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_itemtwo" name="cac_wfs_sample_sm_itemtwo" size="50" value="<?php echo $item_two; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<h2>First Ingredient</h2>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredientone_name">Ingredient Name:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_ingredientone_name" name="cac_wfs_sample_sm_ingredientone_name" size="50" value="<?php echo $ingredient_one['name'] ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredientone_copy">Ingredient Description:</label>
				</td>
				<td>
					<textarea id="cac_wfs_sample_sm_ingredientone_copy" name="cac_wfs_sample_sm_ingredientone_copy" rows="10" cols="40"><?php echo $ingredient_one['copy'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredientone_img">Ingredient Image:</label>
				</td>
				<td>
					<img class="cac_wfs_sample_sm_ingredientone_img" src="<?php echo $ingredient_one['image_url'] ?>" style="max-width: 100%; height: auto;" />
					<input type="hidden" id="cac_wfs_sample_sm_ingredientone_img" name="cac_wfs_sample_sm_ingredientone_img" value="<?php echo $ingredient_one['img'] ?>" />
					<p>
						<a class="set-sundial-cAc_wfs-media-field" title="Set Ingredient One Image" href="#!" id="set-cac_wfs_sample_sm_ingredientone_img">Select Image</a>
					</p>
					<p>
						<a class="remove-sundial-cAc_wfs-media-field" title="Remove Ingredient One Image" href="#!" id="remove-cac_wfs_sample_sm_ingredientone_img" style="<?php echo( empty( $ingredient_one['image_url'] ) ? 'display:none;' : '' ) ?>">Remove Image</a>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<h2>Second Ingredient</h2>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredienttwo_name">Ingredient Name:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_ingredienttwo_name" name="cac_wfs_sample_sm_ingredienttwo_name" size="50" value="<?php echo $ingredient_two['name'] ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredienttwo_copy">Ingredient Description:</label>
				</td>
				<td>
					<textarea id="cac_wfs_sample_sm_ingredienttwo_copy" name="cac_wfs_sample_sm_ingredienttwo_copy" rows="10" cols="40"><?php echo $ingredient_two['copy'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredienttwo_img">Ingredient Image:</label>
				</td>
				<td>
					<img class="cac_wfs_sample_sm_ingredienttwo_img" src="<?php echo $ingredient_two['image_url'] ?>" style="max-width: 100%; height: auto;" />
					<input type="hidden" id="cac_wfs_sample_sm_ingredienttwo_img" name="cac_wfs_sample_sm_ingredienttwo_img" value="<?php echo $ingredient_two['img'] ?>" />
					<p>
						<a class="set-sundial-cAc_wfs-media-field" title="Set Ingredient Two Image" href="#!" id="set-cac_wfs_sample_sm_ingredienttwo_img">Select Image</a>
					</p>
					<p>
						<a class="remove-sundial-cAc_wfs-media-field" title="Remove Ingredient Two Image" href="#!" id="remove-cac_wfs_sample_sm_ingredienttwo_img" style="<?php echo ( empty( $ingredient_two['image_url'] ) ? 'display:none;' : '' ) ?>">Remove Image</a>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<h2>Third Ingredient</h2>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredientthree_name">Ingredient Name:</label>
				</td>
				<td>
					<input type="text" id="cac_wfs_sample_sm_ingredientthree_name" name="cac_wfs_sample_sm_ingredientthree_name" size="50" value="<?php echo $ingredient_three['name'] ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredientthree_copy">Ingredient Description:</label>
				</td>
				<td>
					<textarea id="cac_wfs_sample_sm_ingredientthree_copy" name="cac_wfs_sample_sm_ingredientthree_copy" rows="10" cols="40"><?php echo $ingredient_three['copy'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cac_wfs_sample_sm_ingredientthree_img">Ingredient Image:</label>
				</td>
				<td>
					<img class="cac_wfs_sample_sm_ingredientthree_img" src="<?php echo $ingredient_three['image_url'] ?>" style="max-width: 100%; height: auto;" />
					<input type="hidden" id="cac_wfs_sample_sm_ingredientthree_img" name="cac_wfs_sample_sm_ingredientthree_img" value="<?php echo $ingredient_three['img'] ?>" />
					<p>
						<a class="set-sundial-cAc_wfs-media-field" title="Set Ingredient Three Image" href="#!" id="set-cac_wfs_sample_sm_ingredientthree_img">Select Image</a>
					</p>
					<p>
						<a class="remove-sundial-cAc_wfs-media-field" title="Remove Ingredient Three Image" href="#!" id="remove-cac_wfs_sample_sm_ingredientthree_img" style="<?php echo ( empty( $ingredient_three['image_url'] ) ? 'display:none;' : '' ) ?>">Remove Image</a>
					</p>
				</td>
			</tr>
		</tbody>
	</table>
		
	<?php
	
}	//end cac_wfs_sample_display_sm_metabox( $sample )



add_action( 'save_post', 'cAc_wfs_sample_save_sm_fields', 5, 2 );

function cAc_wfs_sample_save_sm_fields( $sample_id, $sample ) {

	//check security
	if ( ! isset( $_POST['cac_wfs_sample_sm_nonce'] ) ) {
	
    	return $sample_id;
    
    }	//end if ( ! isset( $_POST['cac_wfs_sample_sm_nonce'] ) )
    $nonce = $_POST['cac_wfs_sample_sm_nonce'];
	if ( ! wp_verify_nonce( $nonce, 'cac_wfs_sample_sm' ) ) {
	
	  return $sample_id;
	
	}	//end if ( ! wp_verify_nonce( $nonce, 'cac_wfs_sample_sm' ) )
	
	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	
	  return $sample_id;
	
	}	//end if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	
    // Check post type for 'cac_wfs_sample';
    //if it passes sec checks and is the right type, save any changed vals in $_POST
    if ( $sample->post_type == 'cac_wfs_sample' ) {
    
    	// Store data in post meta table if present in post data
        if ( isset( $_POST['cac_wfs_sample_sm_needstate'] ) && $_POST['cac_wfs_sample_sm_needstate'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_needstate', sanitize_text_field( $_POST['cac_wfs_sample_sm_needstate'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_needstate'] ) && $_POST['cac_wfs_sample_sm_needstate'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_benefit'] ) && $_POST['cac_wfs_sample_sm_benefit'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_benefit', sanitize_text_field( $_POST['cac_wfs_sample_sm_benefit'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_benefit'] ) && $_POST['cac_wfs_sample_sm_benefit'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_color'] ) && $_POST['cac_wfs_sample_sm_color'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_color', $_POST['cac_wfs_sample_sm_color'] );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_color'] ) && $_POST['cac_wfs_sample_sm_color'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_itemone'] ) && $_POST['cac_wfs_sample_sm_itemone'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_itemone', sanitize_text_field( $_POST['cac_wfs_sample_sm_itemone'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_itemone'] ) && $_POST['cac_wfs_sample_sm_itemone'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_itemtwo'] ) && $_POST['cac_wfs_sample_sm_itemtwo'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_itemtwo', sanitize_text_field( $_POST['cac_wfs_sample_sm_itemtwo'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_itemtwo'] ) && $_POST['cac_wfs_sample_sm_itemtwo'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredientone_name'] ) && $_POST['cac_wfs_sample_sm_ingredientone_name'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_name', sanitize_text_field( $_POST['cac_wfs_sample_sm_ingredientone_name'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredientone_name'] ) && $_POST['cac_wfs_sample_sm_ingredientone_name'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredientone_copy'] ) && $_POST['cac_wfs_sample_sm_ingredientone_copy'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_copy', sanitize_text_field( $_POST['cac_wfs_sample_sm_ingredientone_copy'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredientone_copy'] ) && $_POST['cac_wfs_sample_sm_ingredientone_copy'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredientone_img'] ) && $_POST['cac_wfs_sample_sm_ingredientone_img'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_img', intval( $_POST['cac_wfs_sample_sm_ingredientone_img'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredientone_img'] ) && $_POST['cac_wfs_sample_sm_ingredientone_img'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredienttwo_name'] ) && $_POST['cac_wfs_sample_sm_ingredienttwo_name'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_name', sanitize_text_field( $_POST['cac_wfs_sample_sm_ingredienttwo_name'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredienttwo_name'] ) && $_POST['cac_wfs_sample_sm_ingredienttwo_name'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredienttwo_copy'] ) && $_POST['cac_wfs_sample_sm_ingredienttwo_copy'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_copy', sanitize_text_field( $_POST['cac_wfs_sample_sm_ingredienttwo_copy'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredienttwo_copy'] ) && $_POST['cac_wfs_sample_sm_ingredienttwo_copy'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredienttwo_img'] ) && $_POST['cac_wfs_sample_sm_ingredienttwo_img'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_img', intval( $_POST['cac_wfs_sample_sm_ingredienttwo_img'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredienttwo_img'] ) && $_POST['cac_wfs_sample_sm_ingredienttwo_img'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredientthree_name'] ) && $_POST['cac_wfs_sample_sm_ingredientthree_name'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_name', sanitize_text_field( $_POST['cac_wfs_sample_sm_ingredientthree_name'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredientthree_name'] ) && $_POST['cac_wfs_sample_sm_ingredientthree_name'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredientthree_copy'] ) && $_POST['cac_wfs_sample_sm_ingredientthree_copy'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_copy', sanitize_text_field( $_POST['cac_wfs_sample_sm_ingredientthree_copy'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredientthree_copy'] ) && $_POST['cac_wfs_sample_sm_ingredientthree_copy'] != '' )
        
        if ( isset( $_POST['cac_wfs_sample_sm_ingredientthree_img'] ) && $_POST['cac_wfs_sample_sm_ingredientthree_img'] != '' ) {
        
            update_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_img', intval( $_POST['cac_wfs_sample_sm_ingredientthree_img'] ) );
            
        }	//end if ( isset( $_POST['cac_wfs_sample_sm_ingredientthree_img'] ) && $_POST['cac_wfs_sample_sm_ingredientthree_img'] != '' )
    
    }	//end if ( $sample->post_type == 'cac_wfs_sample' )

}	//end cAc_wfs_sample_save_sm_fields( $sample_id, $sample )
