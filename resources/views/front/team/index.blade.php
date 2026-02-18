@extends('front.layouts.master')
@section('content')
  <section class="ke eg mm mn">
<div class="card-container">
  <div class="profile-card">
    <h2 class="profile-title">Profile picture</h2>

    <div class="profile-body">
      <div class="profile-main-content">
        <img class="profile-avatar" src="https://flowbite.com/application-ui/demo/images/users/joseph-mcfall.png" alt="Joseph McFall">
        
        <div class="profile-info">
          <span class="badge-pro">PRO</span>
          <h4 class="profile-name">Joseph McFall</h4>
          <span class="profile-role">Web Developer</span>
        </div>
      </div>

      <div class="profile-stacks">
        <div class="stack-label">Expert Stacks</div>
        <ul style="list-style: none; padding: 0;">
          <li class="stack-item">Laravel / PHP</li>
          <li class="stack-item">Tailwind CSS</li>
          <li class="stack-item">Vue.js / React</li>
          <li class="stack-item">MySQL</li>
        </ul>
      </div>
    </div>   
  </div>
</div>
  </section>


@endsection


<?php
/**
 * Enqueue script and styles for child theme
 */
define('DSK_VERSION', '1.1.4');

$cache_buster = DSK_VERSION;
if ( defined( 'WP_DEBUG' ) && WP_DEBUG) {
  $cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/css/main.css'));
}
function woodmart_child_enqueue_styles() {
  global $cache_buster;
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), $cache_buster );
}
//add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );

function my_scripts_and_styles(){
  global $cache_buster;
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/main.css', array( 'woodmart-style' ), $cache_buster, 'all' );

}
add_action( 'wp_enqueue_scripts', 'my_scripts_and_styles', 99999);

// Make postal code optional
add_filter( 'woocommerce_default_address_fields', 'customize_extra_fields', 1000, 1 );
function customize_extra_fields( $address_fields ) {
    $address_fields['postcode']['required'] = false; //Postcode
    return $address_fields;
}

// Hide checkout fields
function reorder_billing_fields($fields) {
    $billing_order = [
        'billing_first_name',
        'billing_last_name',
		    'billing_email',
        'billing_country',
        'billing_address_1',
        'billing_postcode',
        'billing_phone'
    ];

    foreach ($billing_order as $field) {
		if('billing_phone' == $fields['billing'][$field]){
			
		}
        $ordered_fields[$field] = $fields['billing'][$field];
    }

	$ordered_fields['billing_phone']['required'] = false;


    $fields['billing'] = $ordered_fields;

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'reorder_billing_fields');

add_action('wp_footer', function(){
	
	$output = <<<EOT
<script>
  (function (s, e, n, d, er) {
    s['Sender'] = er;
    s[er] = s[er]  function () {
      (s[er].q = s[er].q  []).push(arguments)
    }, s[er].l = 1 * new Date();
    var a = e.createElement(n),
        m = e.getElementsByTagName(n)[0];
    a.async = 1;
    a.src = d;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://cdn.sender.net/accounts_resources/universal.js', 'sender');
  sender('94004659510774')
</script>
EOT;
	echo $output;
});


add_filter('elementor/image_carousel/item_attributes' , function( $attributes, $instance, $item ) {
    if(is_fornt_page()){
        unset($attributes ['loading']);
        $attributes['fetchpriority'] = 'high';
        $attributes['decoding'] = 'sync';
    }
    return $attributes;
}, 10, 3);




add_action( 'wp_head', function() {
    if ( is_front_page() ) {
        // We look for the specific image URL you provided in the LCP report
        $lcp_url = 'https://digitalsoftwarekey.com/wp-content/uploads/2026/02/Valentines-slider-26.webp';
        
        echo '<link rel="preload" as="image" href="' . esc_url( $lcp_url ) . '" fetchpriority="high">';
    }
}, 1 );







