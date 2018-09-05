<?php
/*
Plugin Name: My WP Post Type Extends Example
Plugin URI: https://mywpcustomize.com/document/mywp-post-type-extends-class/
Description: My WP Post Type Extends Example
Version: 1.0.2
Author: gqevu6bsiz
Author URI: http://gqevu6bsiz.chicappa.jp/
Text Domain: mywpextend-post-type-example
Domain Path: /languages
My WP Test working: 1.7
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! class_exists( 'MywpExtendsPostTypeExample' ) ) :

final class MywpExtendsPostTypeExample {

  private static $instance;

  private function __construct() {}

  public static function get_instance() {

    if ( !isset( self::$instance ) ) {

      self::$instance = new self();

    }

    return self::$instance;

  }

  private function __clone() {}

  private function __wakeup() {}

  public static function init() {

    add_filter( 'mywp_post_type_plugins_loaded_include_modules' , array( __CLASS__ , 'mywp_post_type_plugins_loaded_include_modules' ) );

  }

  public static function mywp_post_type_plugins_loaded_include_modules( $includes ) {

    $dir = dirname( __FILE__ ) . '/';

    $file = $dir . 'mywp.post-type.module.example.php';

    $includes['example_post_type_include'] = $file;

    return $includes;

  }

}

MywpExtendsPostTypeExample::init();

endif;
