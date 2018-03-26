<?php
/**
 * Plugin Name: Polylang Fallback Language
 * Description: Set Polylang Fallback Language to English
 * Author: charliecek
 * Author URI: http://charliecek.eu/
 * Version: 0.1
 */
 
$strFallbackLangSlug = 'en';

function srd_pll_preferred_language( $strLangSlug ) {
  // file_put_contents( "/home/clients/multi_156612/salsarueda.dance/srd_pll_preferred_language.debug.txt", var_export($strLangSlug, true). PHP_EOL . var_export(PLL()->options, true) );

  // False is when preferred browser language didn't match any of our languages OR when detecting browser languages is disabled //
  if (function_exists('PLL') && PLL()->options['browser']) {
    // Language detecting by browser is enabled //
    return $strLangSlug === false ? 'en' : $strLangSlug;
  } else {
    // Language detecting by browser is disabled //
    return $strLangSlug;
  }
}
add_filter( 'pll_preferred_language', 'srd_pll_preferred_language' );