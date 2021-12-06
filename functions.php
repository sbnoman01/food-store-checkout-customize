<?php



// Hey there, if you want to customize the wordpress food store plugin checkout page, please feel free to use this code to customize separetly.


// get the current url of your website
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$url = "https://";
else
$url = "http://";
$url.= $_SERVER['HTTP_HOST'];

$url.= $_SERVER['REQUEST_URI'];

$checkout_url = wc_get_checkout_url();
// if your chekout page has a diff name just change the '/checkout' from here.
$checkout_url___ = $url . '/checkout';

$pickup_page = $checkout_url . '?type=pickup';
if($url == $pickup_page){

add_filter( 'woocommerce_checkout_fields' , 'noman_wc_checkout_func', 99 );
function noman_wc_checkout_func( $fields ) {
  
//   you i just hide the follwoing section you can also hide others filed i just left the most important filed 
unset($fields['billing']['billing_company']);
unset($fields['billing']['billing_address_1']);
unset($fields['billing']['billing_postcode']);
unset($fields['billing']['billing_state']);
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_country']);
unset($fields['billing']['billing_city']);
return $fields;
}
// remove the aditional note
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
}

if($url == $checkout_url or $url == $checkout_url___){
header('Location: ' . $pickup_page);
}?>
