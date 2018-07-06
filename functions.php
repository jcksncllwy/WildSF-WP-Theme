<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/SECRET_braintree_creds.php';

$is_production = true;
$sandboxCreds = [
  'environment' => 'sandbox',
  'merchantId' => 'f2r4bd7nhxzy34wz',
  'publicKey' => 'jqb2fnh9jfxcq5qh',
  'privateKey' => '5cc1b806b6398d33693e2b79decbd301'
];

$gatewayCreds = $is_production ? $ProductionBraintreeGatewayCreds : $sandboxCreds;

$BraintreeGateway = new Braintree_Gateway($gatewayCreds);

function create_private_tour_post_type() {
  register_post_type( 'Private Tour',
    array(
      'labels' => array(
        'name' => __( 'Private Tours' ),
        'singular_name' => __( 'Private Tour' ),
        'supports' => array( 'title', 'custom-fields' ),
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Private Tour',
        'edit' => 'Edit',
        'edit_item' => 'Edit Private Tour',
        'new_item' => 'New Private Tour',
        'view' => 'View',
        'view_item' => 'View Private Tour',
        'search_items' => 'Search Private Tours',
        'not_found' => 'No Private Tours found',
        'not_found_in_trash' => 'No Private Tours found in Trash',
        'parent' => 'Parent Private Tour'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  remove_post_type_support( 'Private Tour', 'editor' );
}

add_action( 'init', 'create_private_tour_post_type' );

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


// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

/**
 * This is our callback function that embeds our phrase in a WP_REST_Response
 */
function transact($request) {
    require __DIR__ . '/vendor/autoload.php';
    require __DIR__ . '/SECRET_braintree_creds.php';

    $is_production = true;
    $sandboxCreds = [
      'environment' => 'sandbox',
      'merchantId' => 'f2r4bd7nhxzy34wz',
      'publicKey' => 'jqb2fnh9jfxcq5qh',
      'privateKey' => '5cc1b806b6398d33693e2b79decbd301'
    ];

    $gatewayCreds = $is_production ? $ProductionBraintreeGatewayCreds : $sandboxCreds;

    $BraintreeGateway = new Braintree_Gateway($gatewayCreds);

    $nonce = $parameters['nonce'];
    $amount = $parameters['amount'];
    $name = $parameters['name'];

    $result = $BraintreeGateway->transaction()->sale([
      'amount' => $amount,
      'paymentMethodNonce' => $nonce,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    return $result;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'braintree/v1', 'transact', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => 'POST',
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'transact',
    ) );
} );

?>
