<?php
/*

=============================================================================
ADD EVENT HIGHLIGHTER METABOX TO EVENT CUSTOM POST (EVENT HIGHLIGHTER 1.1)
=============================================================================

*/
add_action( 'add_meta_boxes', 'event_highlighter_add_meta_box' );
function event_highlighter_add_meta_box() {
	add_meta_box( 'event_highlight', 'Highlight Event', 'event_highlight_callback', 'event', 'side', 'core' );
}

function event_highlight_callback( $post ) {
	wp_nonce_field( 'event_highlighter_save_data', 'event_highlight_meta_box_nonce' );
	
	$checkbox_value = get_post_meta( $post->ID, '_event_highlight_value_key', true );
   
    if ( $checkbox_value ) {
        if ( checked( '1', $checkbox_value, false ) )
            $active = checked( '1', $checkbox_value, false );
    }
                   
	echo '<label for="eventhighlight">Highlight this Event </label>';
    echo '<input value="0" name="eventhighlight" type="hidden">';
	echo '<input type="checkbox" id="eventhighlight" name="eventhighlight" value="1"  '.$active.' />';
}

/*

======================================================================
SAVING AND UPDATING EVENT HIGHLIGHTER DATA (EVENT HIGHLIGHTER 1.2)
======================================================================

*/

add_action( 'save_post', 'event_highlighter_save_data' );
function event_highlighter_save_data( $post_id ) {
	
	if( ! isset( $_POST['event_highlight_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['event_highlight_meta_box_nonce'], 'event_highlighter_save_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['eventhighlight'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['eventhighlight'] );
	
	update_post_meta( $post_id, '_event_highlight_value_key', $my_data );
	
}

/*

=============================================================================
ADD EVENT ALERT METABOX TO EVENT CUSTOM POST (EVENT ALERT 2.1)
=============================================================================

*/

add_action( 'add_meta_boxes', 'event_alert_add_meta_box' );
function event_alert_add_meta_box() {
	add_meta_box( 'event_alert', 'Event Alert', 'event_alert_callback', 'event', 'side', 'core' );
}

function event_alert_callback( $post ) {
	wp_nonce_field( 'event_alert_save_data', 'event_alert_meta_box_nonce' );
	
	$checkbox_value = get_post_meta( $post->ID, '_event_alert_value_key', true );
   
    if ( $checkbox_value ) {
        if ( checked( '1', $checkbox_value, false ) )
            $active = checked( '1', $checkbox_value, false );
    }
                   
	echo '<label for="eventalert">Event Alert </label>';
    echo '<input value="0" name="eventalert" type="hidden">';
	echo '<input type="checkbox" id="eventalert" name="eventalert" value="1"  '.$active.' />';
}



/*

======================================================================
SAVING AND UPDATING EVENT ALERT DATA (EVENT ALERT 2.2)
======================================================================

*/

add_action( 'save_post', 'event_alert_save_data' );
function event_alert_save_data( $post_id ) {
	
	if( ! isset( $_POST['event_alert_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['event_alert_meta_box_nonce'], 'event_alert_save_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['eventalert'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['eventalert'] );
	
	update_post_meta( $post_id, '_event_alert_value_key', $my_data );
	
}

/*
======================================================================
SAVING AND UPDATING IMAGE (ALL STATES INDIA) 
======================================================================

*/


add_action( 'add_meta_boxes', 'listing_image_add_metabox' );
function listing_image_add_metabox () {
	add_meta_box( 'listingimagediv', __( 'State Image', 'text-domain' ), 'listing_image_metabox', 'state-post', 'side', 'low');
}
function listing_image_metabox ( $post ) {
	global $content_width, $_wp_additional_image_sizes;
	$image_id = get_post_meta( $post->ID, '_listing_image_id', true );
	$old_content_width = $content_width;
	$content_width = 254;
	if ( $image_id && get_post( $image_id ) ) {
		if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
		} else {
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}
		if ( ! empty( $thumbnail_html ) ) {
			$content = $thumbnail_html;
			$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__( 'Remove State image', 'text-domain' ) . '</a></p>';
			$content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr( $image_id ) . '" />';
		}
		$content_width = $old_content_width;
	} else {
		$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
		$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set State image', 'text-domain' ) . '" href="javascript:;" id="upload_listing_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Set listing image', 'text-domain' ) . '">' . esc_html__( 'Set listing image', 'text-domain' ) . '</a></p>';
		$content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
	}
	echo $content;
}
add_action( 'save_post', 'listing_image_save', 10, 1 );
function listing_image_save ( $post_id ) {
	if( isset( $_POST['_listing_cover_image'] ) ) {
		$image_id = (int) $_POST['_listing_cover_image'];
		update_post_meta( $post_id, '_listing_image_id', $image_id );
	}
}

/*
======================================================================
SAVING AND UPDATING COUNTRY POST LINK WITH RELEVANT COUNRTY 
======================================================================

*/


 
function hhs_get_sample_options() {
	$options = array (
		
  'United Arab Emirates' => 'AE',
  'Afghanistan' => 'AF',
  'Albania' => 'AL',
  'Armenia' => 'AM',
  'Angola' => 'AO',
  'Argentina' => 'AR',
  'Austria' => 'AT',
  'Australia' => 'AU',
  'Azerbaijan' => 'AZ',
  'Bosnia and Herzegovina' => 'BA',
  'Bangladesh' => 'BD',
  'Belgium' => 'BE',
  'Burkina Faso' => 'BF',
  'Bulgaria' => 'BG',
  'Burundi' => 'BI',
  'Benin' => 'BJ',
  'Brunei Darussalam' => 'BN',
  'Bolivia' => 'BO',
  'Brazil' => 'BR',
  'Bahamas' => 'BS',
  'Bhutan' => 'BT',
  'Botswana' => 'BW',
  'Belarus' => 'BY',
  'Belize' => 'BZ',
  'Canada' => 'CA',
  'Democratic Republic of Congo' => 'CD',
  'Central African Republic' => 'CF',
  'Republic of Congo' => 'CG',
  'Switzerland' => 'CH',
  'Côte dIvoire' => 'CI',
  'Chile' => 'CL',
  'Cameroon' => 'CM',
  'China' => 'CN',
  'Colombia' => 'CO',
  'Costa Rica' => 'CR',
  'Cuba' => 'CU',
  'Cyprus' => 'CY',
  'Czech Republic' => 'CZ',
  'Germany' => 'DE',
  'Djibouti' => 'DJ',
  'Denmark' => 'DK',
  'Dominican Republic' => 'DO',
  'Algeria' => 'DZ',
  'Ecuador' => 'EC',
  'Estonia' => 'EE',
  'Egypt' => 'EG',
  'Western Sahara' => 'EH',
  'Eritrea' => 'ER',
  'Spain' => 'ES',
  'Ethiopia' => 'ET',
  'Falkland Islands' => 'FK',
  'Finland' => 'FI',
  'Fiji' => 'FJ',
  'France' => 'FR',
  'Gabon' => 'GA',
  'United Kingdom' => 'GB',
  'Georgia' => 'GE',
  'French Guiana' => 'GF',
  'Ghana' => 'GH',
  'Greenland' => 'GL',
  'Gambia' => 'GM',
  'Guinea' => 'GN',
  'Equatorial Guinea' => 'GQ',
  'Greece' => 'GR',
  'Guatemala' => 'GT',
  'Guinea-Bissau' => 'GW',
  'Guyana' => 'GY',
  'Honduras' => 'HN',
  'Croatia' => 'HR',
  'Haiti' => 'HT',
  'Hungary' => 'HU',
  'Indonesia' => 'ID',
  'Ireland' => 'IE',
  'Israel' => 'IL',
  'India' => 'IN',
  'Iraq' => 'IQ',
  'Iran' => 'IR',
  'Iceland' => 'IS',
  'Italy' => 'IT',
  'Jamaica' => 'JM',
  'Jordan' => 'JO',
  'Japan' => 'JP',
  'Kenya' => 'KE',
  'Kyrgyzstan' => 'KG',
  'Cambodia' => 'KH',
  'North Korea' => 'KP',
  'South Korea' => 'KR',
  'Kuwait' => 'KW',
  'Kazakhstan' => 'KZ',
  'Lao Peoples Democratic Republic' => 'LA',
  'Lebanon' => 'LB',
  'Sri Lanka' => 'LK',
  'Liberia' => 'LR',
  'Lesotho' => 'LS',
  'Lithuania' => 'LT',
  'Luxembourg' => 'LU',
  'Latvia' => 'LV',
  'Libya' => 'LY',
  'Morocco' => 'MA',
  'Moldova' => 'MD',
  'Montenegro' => 'ME',
  'Madagascar' => 'MG',
  'Macedonia' => 'MK',
  'Mali' => 'ML',
  'Myanmar' => 'MM',
  'Mongolia' => 'MN',
  'Mauritania' => 'MR',
  'Malawi' => 'MW',
  'Mexico' => 'MX',
  'Malaysia' => 'MY',
  'Mozambique' => 'MZ',
  'Namibia' => 'NA',
  'New Caledonia' => 'NC',
  'Niger' => 'NE',
  'Nigeria' => 'NG',
  'Nicaragua' => 'NI',
  'Netherlands' => 'NL',
  'Norway' => 'NO',
  'Nepal' => 'NP',
  'New Zealand' => 'NZ',
  'Oman' => 'OM',
  'Panama' => 'PA',
  'Peru' => 'PE',
  'Papua New Guinea' => 'PG',
  'Philippines' => 'PH',
  'Poland' => 'PL',
  'Pakistan' => 'PK',
  'Puerto Rico' => 'PR',
  'Palestinian Territories' => 'PS',
  'Portugal' => 'PT',
  'Paraguay' => 'PY',
  'Qatar' => 'QA',
  'Romania' => 'RO',
  'Serbia' => 'RS',
  'Russia' => 'RU',
  'Rwanda' => 'RW',
  'Saudi Arabia' => 'SA',
  'Solomon Islands' => 'SB',
  'Sudan' => 'SD',
  'Sweden' => 'SE',
  'Slovenia' => 'SI',
  'Svalbard and Jan Mayen' => 'SJ',
  'Slovakia' => 'SK',
  'Sierra Leone' => 'SL',
  'Senegal' => 'SN',
  'Somalia' => 'SO',
  'Suriname' => 'SR',
  'South Sudan' => 'SS',
  'El Salvador' => 'SV',
  'Syria' => 'SY',
  'Swaziland' => 'SZ',
  'Chad' => 'TD',
  'French Southern and Antarctic Lands' => 'TF',
  'Togo' => 'TG',
  'Thailand' => 'TH',
  'Tajikistan' => 'TJ',
  'Timor-Leste' => 'TL',
  'Turkmenistan' => 'TM',
  'Tunisia' => 'TN',
  'Turkey' => 'TR',
  'Trinidad and Tobago' => 'TT',
  'Taiwan' => 'TW',
  'Tanzania' => 'TZ',
  'Ukraine' => 'UA',
  'Uganda' => 'UG',
  'United States' => 'US',
  'Uruguay' => 'UY',
  'Uzbekistan' => 'UZ',
  'Venezuela' => 'VE',
  'Vietnam' => 'VN',
  'Vanuatu' => 'VU',
  'Yemen' => 'YE',
  'South Africa' => 'ZA',
  'Zambia' => 'ZM',
  'Zimbabwe' => 'ZW',
	);
	
	return $options;
}

add_action('admin_init', 'hhs_add_meta_boxes', 1);
function hhs_add_meta_boxes() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
    if ($template_file == 'tpl-internationalTrade.php')
    {
	add_meta_box( 'repeatable-fields', 'COUNTRY POST LINKING', 'hhs_repeatable_meta_box_display', 'page', 'normal', 'default');
    }
}

function hhs_repeatable_meta_box_display() {
	global $post;

	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
	$options = hhs_get_sample_options();

	wp_nonce_field( 'hhs_repeatable_meta_box_nonce', 'hhs_repeatable_meta_box_nonce' );
	?>
	<script type="text/javascript">
	jQuery(document).ready(function( $ ){
		jQuery( '#add-row' ).on('click', function() {
			var row = jQuery( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		jQuery( '.remove-row' ).on('click', function() {
			jQuery(this).parents('tr').remove();
			return false;
		});
	});
	</script>
  
	<table id="repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="40%">Message</th>
			<th width="12%">Country ID</th>
			<th width="40%">URL</th>
			<th width="8%"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	if ( $repeatable_fields ) :
	
	foreach ( $repeatable_fields as $field ) {
	?>
	<tr>
        <td><textarea class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" ><?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?></textarea></td>
	
		<td>
			<select name="select[]" class="widefat">
			<?php foreach ( $options as $label => $value ) : ?>
			<option value="<?php echo $value; ?>" <?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
	
		<td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); ?>" /></td>
	    
		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	<?php
	}
	else :
	// show a blank one
	?>
	<tr>
        <td><textarea class="widefat" name="name[]"></textarea></td>
	
		<td>
			<select name="select[]" class="widefat">
			<?php foreach ( $options as $label => $value ) : ?>
			<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
	
		<td><input type="text" class="widefat" name="url[]" value="<?php //echo home_url(); ?>" /></td>
	    
		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	<?php endif; ?>
	
	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
        <td><textarea class="widefat" name="name[]" ></textarea></td>
	
		<td>
			<select name="select[]" class="widefat">
			<?php foreach ( $options as $label => $value ) : ?>
			<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
		
		<td><input type="text" class="widefat" name="url[]" value="<?php //echo home_url(); ?>" /></td>
		  
		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	</tbody>
	</table>
	
	<p><a id="add-row" class="button" href="#">Add another</a></p>
	<?php
}

add_action('save_post', 'hhs_repeatable_meta_box_save');
function hhs_repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce'] ) ||
	! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce'], 'hhs_repeatable_meta_box_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'repeatable_fields', true);
	$new = array();
	$options = hhs_get_sample_options();
	
	$names = $_POST['name'];
	$selects = $_POST['select'];
	$urls = $_POST['url'];
	
	$count = count( $names );
	
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
			
			if ( in_array( $selects[$i], $options ) )
				$new[$i]['select'] = $selects[$i];
			else
				$new[$i]['select'] = '';
		
            
        
			if ( $urls[$i] != '' )
				$new[$i]['url'] = stripslashes( $urls[$i] );
			else
				$new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}


