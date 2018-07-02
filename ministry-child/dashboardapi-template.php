<?php
/**
 * Template Name: Dashboardapi
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); ?>
<?php
//$url = 'https://api.data.gov.in/resource/e1c37ff8-df5a-43b8-bca2-f77ba6d2ac58?format=xml&api-key=579b464db66ec23bdd000001e2b25f9ed90547e470419c8414f71d21';

$request = wp_remote_get( ' https://api.data.gov.in/resource/48af18bc-257d-4593-8e71-3e0fd18b42af?format=json&api-key=579b464db66ec23bdd000001e2b25f9ed90547e470419c8414f71d21' );
if( is_wp_error( $request ) ) {
	return false; // Bail early
}
$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );


if( ! empty( $data ) ) {
	
	
	foreach( $data->records as $record ) {
		
			//echo ''.$record->us_doller.'';
		//echo '<pre>';
		//echo ''.$record->us_doller.'';
		//echo end($value);
		//echo '<pre>';
	}
	
}
//echo '<pre>';
//print_r($data);
//echo '<pre>';
//exit;
?>

<?php get_footer();
