<?php

/*
Plugin Name: Cooked HUN Measurement Units
Plugin URI: https://cooked.pro
Description: This plugin extends Cooked with common kitchen measurements units in Hungary. dkg, csipet, db, doboz, csokor, etc.
Version: 1.0.0
Author: Miklos Bagi
Author URI: https://tnk.mb.pvt/wordpress
*/

add_filter( 'cooked_measurements', 'custom_cooked_measurements', 10, 1 );

function custom_cooked_measurements( $measurements ){
    // Remove "Grams" and "Cups"
    $unsetstuff = array ('g','kg','mg','oz','floz','stick', "cup", "tsp", "tbsp", "ml", "l", "lb", "dash", "drop", "gal", "pinch", "pt", "qt");
    foreach ($unsetstuff as $item) {
      if (isset($measurements[$item])): unset ($measurements[$item]); endif;
    }

   // Add stuff
   $hunstuff = array('mg', 'g', 'dkg', 'kg', 'ml', 'dl', 'l', 'db', 'ek.', 'tk.', 'doboz', 'csomag', 'szelet', 'gerezd', 'fej', 'csipet', 'szem', 'csepp', 'csokor');
   foreach ($hunstuff as $item) {
     $measurements[$item] = array(
        'singular_abbr' => esc_html__( $item, 'cooked' ),  // Abbreviated (Singular)
        'plural_abbr' => esc_html__( $item, 'cooked' ),   // Abbreviated (Plural)
        'singular' => esc_html__($item,'cooked'),          // Singular
        'plural' => esc_html__($item,'cooked'),           // Plural
      );
   }
    // Add "Tons"
//    $measurements['ton'] = array(
//        'singular_abbr' => esc_html__( 'ton', 'cooked' ),  // Abbreviated (Singular)
//        'plural_abbr' => esc_html__( 'tons', 'cooked' ),   // Abbreviated (Plural)
//        'singular' => esc_html__('ton','cooked'),          // Singular
//        'plural' => esc_html__('tons','cooked'),           // Plural
//    );

    // Return customized array
    return $measurements;
}

