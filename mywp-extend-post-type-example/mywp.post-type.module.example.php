<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if( ! class_exists( 'MywpPostTypeAbstractModule' ) ) {
  return false;
}

if ( ! class_exists( 'MywpPostTypeModuleExample' ) ) :

final class MywpPostTypeModuleExample extends MywpPostTypeAbstractModule {

  protected static $id = 'mywp_example';

  protected static function get_regist_post_type_args() {

    $args = array(
      'label' => 'My WP Example Post Type',
      'public' => true,
      'show_ui' => true,
      'supports' => array( 'title' , 'page-attributes' , 'custom-fields' ),
    );

    return $args;

  }

  public static function current_mywp_post_type_get_post( $post ) {

    $post_id = $post->ID;

    $post->example_field = MywpPostType::get_post_meta( $post_id , 'example_field' );

    return $post;

  }

  public static function current_manage_posts_columns( $posts_columns ) {

    $old_columns = $posts_columns;

    $posts_columns = array();

    $posts_columns['cb'] = $old_columns['cb'];
    $posts_columns['id'] = 'ID';
    $posts_columns['title'] = $old_columns['title'];
    $posts_columns['field'] = 'Field';

    return $posts_columns;

  }

  public static function current_manage_posts_custom_column( $column_name , $post_id ) {

    $mywp_post = MywpPostType::get_post( $post_id );

    if( empty( $mywp_post ) ) {

      return false;

    }

    if( $column_name == 'field' ) {

      echo $mywp_post->example_field;

    }

  }

  public static function current_edit_per_page( $per_page ) {

    $per_page = 1;

    return $per_page;

  }

}

MywpPostTypeModuleExample::init();

endif;
