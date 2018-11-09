<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require __DIR__ . '/vendor/autoload.php';
if(file_exists(__DIR__ . '/SECRET_braintree_creds.php')){
  require __DIR__ . '/SECRET_braintree_creds.php';
} else {
  $ProductionBraintreeGatewayCreds = false;
}

$is_production = true;
$sandboxCreds = [
  'environment' => 'sandbox',
  'merchantId' => 'f2r4bd7nhxzy34wz',
  'publicKey' => 'jqb2fnh9jfxcq5qh',
  'privateKey' => '5cc1b806b6398d33693e2b79decbd301'
];

$gatewayCreds = $ProductionBraintreeGatewayCreds ? $ProductionBraintreeGatewayCreds : $sandboxCreds;

$BraintreeGateway = new Braintree_Gateway($gatewayCreds);

function create_tour_post_type() {
  register_post_type( 'tour',
    array(
      'labels' => array(
        'name' => __( 'Tours' ),
        'singular_name' => __( 'Tour' ),
        'supports' => array( 'title', 'custom-fields' ),
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Tour',
        'edit' => 'Edit',
        'edit_item' => 'Edit Tour',
        'new_item' => 'New Tour',
        'view' => 'View',
        'view_item' => 'View Tour',
        'search_items' => 'Search Tours',
        'not_found' => 'No Tours found',
        'not_found_in_trash' => 'No Tours found in Trash',
        'parent' => 'Parent Tour'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  remove_post_type_support( 'tour', 'editor' );
}

add_action( 'init', 'create_tour_post_type' );


function create_tourguide_post_type() {
  register_post_type( 'tourguide',
    array(
      'labels' => array(
        'name' => __( 'Tourguides' ),
        'singular_name' => __( 'Tourguide' ),
        'supports' => array( 'title', 'custom-fields' ),
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Tourguide',
        'edit' => 'Edit',
        'edit_item' => 'Edit Tourguide',
        'new_item' => 'New Tourguide',
        'view' => 'View',
        'view_item' => 'View Tourguide',
        'search_items' => 'Search Tourguides',
        'not_found' => 'No Tourguides found',
        'not_found_in_trash' => 'No Tourguides found in Trash',
        'parent' => 'Parent Tourguide'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  remove_post_type_support( 'tourguide', 'editor' );
}

add_action( 'init', 'create_tourguide_post_type' );


add_image_size( 'fullscreen', 1366, 768, true );
add_image_size( 'thumbnail-no-crop', 150, 105, false );

/**
 * This is our callback function that embeds our phrase in a WP_REST_Response
 */
function transact($request) {
    require __DIR__ . '/vendor/autoload.php';
    if(file_exists(__DIR__ . '/SECRET_braintree_creds.php')){
      require __DIR__ . '/SECRET_braintree_creds.php';
    } else {
      $ProductionBraintreeGatewayCreds = false;
    }
    $parameters = $request->get_params();

    $is_production = true;
    $sandboxCreds = [
      'environment' => 'sandbox',
      'merchantId' => 'f2r4bd7nhxzy34wz',
      'publicKey' => 'jqb2fnh9jfxcq5qh',
      'privateKey' => '5cc1b806b6398d33693e2b79decbd301'
    ];

    $gatewayCreds = $ProductionBraintreeGatewayCreds ? $ProductionBraintreeGatewayCreds : $sandboxCreds;

    $BraintreeGateway = new Braintree_Gateway($gatewayCreds);

    $nonce = $parameters['nonce'];
    $amount = $parameters['amount'];
    $first_name = $parameters['first_name'];
    $last_name = $parameters['last_name'];
    $group_name = $parameters['group_name'];
    $email = $parameters['email'];
    $tip_amount = $parameters['tip_amount'];
    $base_amount = $parameters['base_amount'];
    $street_address = $parameters['street_address'];
    $locality = $parameters['locality'];
    $region = $parameters['region'];
    $postal_code = $parameters['postal_code'];
    $country = $parameters['country'];
    $food_preferences = $parameters['food_preferences'];
    $lead_source = $parameters['lead_source'];

    $result = $BraintreeGateway->transaction()->sale([
      'amount' => $amount,
      'paymentMethodNonce' => $nonce,
      'customer' => {
        'first_name' => $first_name,
        'last_name' => $last_name,
        'company' => $group_name,
        'email' => $email
      },
      'shipping' => [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'street_address' => $street_address,
        'locality' => $locality,
        'region' => $region,  
        'postal_code' => $postal_code,
        'country' => $country
      ],
      'customFields' => [
        'base_amount' => $base_amount,
        'tip_amount' => $tip_amount,
        'food_preferences' => $food_preferences,
        'lead_source' => $lead_source
      ],
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    return $result;
}
add_theme_support( 'post-thumbnails' );

add_action( 'rest_api_init', function () {
    register_rest_route( 'braintree/v1', 'transact', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => 'POST',
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'transact',
    ) );
} );

?>
